<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

use Twilio\Jwt\ClientToken;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Auth;
use Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->role()->attach(config('app_service.default_role_id'));

        return $user;
    }


    /**
     * [showRegistrationForm description]
     * @return [type] [description]
     */
    public function showRegistrationForm()
    {
        $user = Auth::user();
        if ($user)
            return redirect(PREFIX);

        return view('auth.register');
    }

    /**
     *  Send SMS for Mobile Number Verification
     * 
     * 
     */
    public function sendSms($code, $contact_number)
    {
        $accountSid = getSetting('twilio_sid', 'sms_settings');
        $authToken = getSetting('twilio_token', 'sms_settings');
        try {
            $client = new Client(['auth' => [$accountSid, $authToken]]);
            $result = $client->post(
                'https://api.twilio.com/2010-04-01/Accounts/' . $accountSid . '/Messages.json',
                ['form_params' => [
                    'Body' => 'Welcome to LeLaamGhar. Please enter the code to verify your phone number' . $contact_number . '. Your verification Code is : ' . $code, //set message body
                    'To' => $contact_number,
                    'From' => '+12058283632' //we get this number from twilio
                ]]
            );
            return $result;
        } catch (Exception $e) {
            flash('Error..', 'Cannot send sms to your phone number please try again', 'error');
            return redirect()->back();
        }
    }

    /**
     * [register description]
     * @param  Request $request [description]
     * @return [type]           [description]
     * 
     */
    public function register(Request $request)
    {
        $columns = array(
            'name'      => 'bail|required|max:20',
            'username'  => 'bail|required',
            'email'     => 'bail|required',
            'password'  => 'bail|required',
            'password_confirmation'  => 'bail|required|same:password',
            'cnic'  => 'bail|required|min:15|max:15',
            'phone_number'  => 'bail|required',
            'city'  => 'bail|required',
            'state'  => 'bail|required',
            'country'  => 'bail|required',
            'streetaddress'  => 'bail|required',
        );
        $this->validate($request, $columns);

        $emails = User::where('email', '=', $request->email)->count();
        $phones = User::where('phone', '=', $request->phone_number)->count();
        // dd($request->input());
        if ($emails >= 2) {
            flash('Error', 'Email is already in use', 'error');
            return redirect()->back();
        }
        if ($phones >= 2) {
            flash('Error', 'Phone Number is already in use', 'error');
            return redirect()->back();
        }
        // $role_id = getRoleData('bidder');

        // if ($request->user_type=='seller')
        //     $role_id = getRoleData('seller');
        $code = rand(100000, 999999);
        $contact_number = $request->phone_number;
        $this->sendSms($code, $contact_number);

        // return "SMS Sent";

        $user           = new User();

        $name           = $request->name;

        $user->name     = $name;
        $user->slug     = $user->makeSlug($user->name);

        $user->username = $request->username;
        $user->email    = $request->email;
        $password       = $request->password;
        $user->phone       = $request->phone_number;
        $user->verification_code       = $code;
        $user->address       = $request->city . ', ' . $request->state . ', ' . $request->country . ', ' . $request->streetaddress;
        $user->password       = bcrypt($password);
        $user->cnic       = $request->cnic;
        $user->role_id        = getRoleData('seller');
        $user->login_enabled  = 1;
        $user->approved  = 1;

        $user->save();

        try {

            if (!env('DEMO_MODE')) {

                $user->roles()->attach($user->role_id);

                //send db and email notification to admin - when user registered
                $admin = User::where('role_id', getRoleData('admin'))->first();
                if ($admin)
                    $admin->notify(new \App\Notifications\NewUserRegistration($user, 'admin'));


                //send email notification to user - when user registered
                $user->notify(new \App\Notifications\NewUserRegistration($user, 'user', $password));
            }
        } catch (Exception $ex) {

            $message = getPhrase('registered_successfully ');
            $message .= getPhrase('\ncannot_send_email_to_user, please_check_your_server_settings');
        }

        $user           = new User();

        $name           = $request->name;

        $user->name     = $name;
        $user->slug     = $user->makeSlug($user->name);

        $user->username = $request->username;
        $user->email    = $request->email;
        $password       = $request->password;
        $user->phone       = $request->phone_number;
        $user->verification_code       = $code;
        $user->address       = $request->city . ', ' . $request->state . ', ' . $request->country . ', ' . $request->streetaddress;
        $user->password       = bcrypt($password);
        $user->cnic       = $request->cnic;
        $user->role_id        = getRoleData('bidder');
        $user->login_enabled  = 1;
        $user->approved  = 1;

        $user->save();

        $message = 'registered_successfully_as_bidder_and_seller';

        try {
            if (!env('DEMO_MODE')) {

                $user->roles()->attach($user->role_id);

                //send db and email notification to admin - when user registered
                $admin = User::where('role_id', getRoleData('admin'))->first();
                if ($admin)
                    $admin->notify(new \App\Notifications\NewUserRegistration($user, 'admin'));
                //send email notification to user - when user registered
                $user->notify(new \App\Notifications\NewUserRegistration($user, 'user', $password));
            }
        } catch (Exception $ex) {

            $message = getPhrase('registered_successfully ');
            $message .= getPhrase('\ncannot_send_email_to_user, please_check_your_server_settings');
        }

        flash('Success..', $message, 'success');
        return redirect(url('phone/verify/' . $user->id));
        // return redirect(URL_USERS_LOGIN);
    }

    /**
     * Resend Code to Mobile Number
     * 
     */
    public function resend_code($id)
    {
        $user = User::find($id);
        $allUsers = User::where('phone', '=', $user->phone)->get();
        $code = rand(100000, 999999);
        $contact_number = $user->phone;
        $this->sendSms($code, $contact_number);

        for ($i = 0; $i < count($allUsers); $i++) {
            $allUsers[$i]->verification_code = $code;
            $allUsers[$i]->is_phonenumber_verified = 0;
            $allUsers[$i]->save();
        }

        flash('Success..', 'Code resended to ' . $user->phone, 'success');
        return redirect(url('phone/verify/' . $user->id));
        // dd($allUsers);
        // return view('auth.verify_mobile')->with('id', $id);
    }
}