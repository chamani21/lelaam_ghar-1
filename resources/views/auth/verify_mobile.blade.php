
@extends('layouts.home')
@section('content')
    <div class="container py-5">
        <a href="{{URL_HOME}}" class="au-middles justify-content-start"> {{getPhrase('home')}} &nbsp;<span> / {{getPhrase('Verification')}} </span></a>
        <div class="jumbotron">
            <h2 class="text-center h2 mb-5">
                Mobile Verification
                <i class="fa fa-mobile-phone"></i>
            </h2>
            {{-- <form action="{{action('Auth\LoginController@verify_phone')}}" method="POST"> --}}
                {!! Form::open(array('url' => 'phone/verify', 'method' => 'POST', 'novalidate'=>'', 'class'=>"form-horizontal", 'name'=>"verificationForm",'id'=>'login-form', 'style'=>'display:block')) !!}
                <input name="id" type="hidden" value="{{$id}}">
                <div class="form-row">
                    <div class="col-md-6 offset-md-3">
                        <label for="">Verification Code</label>
                        <input type="text" placeholder="Enter 6-Digit Verification Code" name="code" class="form-control" minlength="6" maxlength="6" required>
                        {{-- <a href="{{url('resend/code/'.$id)}}" class="link text-primary">Resend Code?</a> --}}
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-md-6 offset-md-3">
                        <button class="btn btn-success" type="submit">
                            Verify Phone Number
                        </button>
                    </div>
                </div>
                {!!Form::close()!!}
            {{-- </form> --}}
        </div>
    </div>
@endsection


