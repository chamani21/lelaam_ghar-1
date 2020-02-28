@extends($layout)



@section('content')

<!--CONTACT SECTION-->
    <section class="au-contacts">

        <div class="container">
<div class="row">

         <div class="col-lg-6 lg-offse-3 mx-auto">
         <div class="panel-login">

             <div class="au-who-main">
                <h2 class="text-center">{{$title}}</h2>
              </div>  
              
          <div class="panel-body form-auth-style">

            {{--@include('home/pages/support-center')--}}




               {!! Form::open(array('url' => URL_CONTACT_US, 'method' => 'POST','name'=>'formValidate', 'novalidate'=>'')) !!}

                <div class="row">

                    <div class="form-group col-lg-12">


                      {{ Form::text('name', old('name'), $attributes =

                      array('class' => 'form-control',

                      'placeholder' => 'Name',

                      'ng-model' => 'name',

                      'required' => 'true',

                      'ng-minlength' => '2',

                      'ng-maxlength' => '50',

                      'ng-class'=>'{"has-error": formValidate.name.$touched && formValidate.name.$invalid}',

                      )) }}


                      <div class="validation-error" ng-messages="formValidate.name.$error" >

                              {!! getValidationMessage()!!}

                              {!! getValidationMessage('minlength')!!}

                              {!! getValidationMessage('maxlength')!!}

                              {!! getValidationMessage('pattern')!!}

                      </div>

                   </div>


                   <div class="form-group col-lg-12">


                    {{ Form::text('contact_email', old('contact_email'), $attributes =

                    array('class' => 'form-control',

                    'placeholder' => 'Email',

                    'ng-model' => 'contact_email',

                    'required' => 'true',

                    'ng-class'=>'{"has-error": formValidate.contact_email.$touched && formValidate.contact_email.$invalid}',

                    )) }}


                    <div class="validation-error" ng-messages="formValidate.contact_email.$error" >

                            {!! getValidationMessage()!!}

                            {!! getValidationMessage('email')!!}

                    </div>

                </div>

                 <div class="form-group col-lg-12">



                      {{ Form::tel('phone_number', old('phone_number'), $attributes =

                      array('class' => 'form-control',

                      'placeholder' => 'Contact Number',

                      'ng-model' => 'phone_number',

                      'required' => 'true',

                      'ng-minlength' => '2',

                      'ng-maxlength' => '15',

                      'ng-class'=>'{"has-error": formValidate.phone_number.$touched && formValidate.phone_number.$invalid}',

                      )) }}


                      <div class="validation-error" ng-messages="formValidate.phone_number.$error" >

                              {!! getValidationMessage()!!}

                              {!! getValidationMessage('minlength')!!}

                              {!! getValidationMessage('maxlength')!!}

                              {!! getValidationMessage('pattern')!!}

                      </div>

                   </div>



                    <div class="form-group col-lg-12">




                    {{ Form::text('country', old('country'), $attributes =

                    array('class' => 'form-control',

                    'rows'=>'3',

                    'cols'=>'5',

                    'placeholder' => 'Country',

                    'ng-model' => 'country',

                    'required' => 'true',

                    'ng-maxlength' => '20',

                    'ng-class'=>'{"has-error": formValidate.country.$touched && formValidate.country.$invalid}',

                    )) }}



                    <div class="validation-error" ng-messages="formValidate.country.$error" >

                      {!! getValidationMessage()!!}

                      {!! getValidationMessage('maxlength')!!}

                   </div>

                </div>

                <div class="form-group col-lg-12">
                      {{ Form::text('city', old('city'), $attributes =

                      array('class' => 'form-control',

                      'placeholder' => 'City',

                      'ng-model' => 'city',

                      'required' => 'true',

                      'ng-minlength' => '2',

                      'ng-maxlength' => '20',

                      'ng-class'=>'{"has-error": formValidate.city.$touched && formValidate.city.$invalid}',

                      )) }}


                      <div class="validation-error" ng-messages="formValidate.city.$error" >

                              {!! getValidationMessage()!!}

                              {!! getValidationMessage('minlength')!!}

                              {!! getValidationMessage('maxlength')!!}

                              {!! getValidationMessage('pattern')!!}

                      </div>

                </div>
                <div class="form-group col-lg-12">
                      {{ Form::text('shop', old('shop'), $attributes =

                      array('class' => 'form-control',

                      'placeholder' => 'Shop or Company name',

                      'ng-model' => 'shop',

                      'required' => 'true',

                      'ng-minlength' => '2',

                      'ng-maxlength' => '20',

                      'ng-class'=>'{"has-error": formValidate.shop.$touched && formValidate.shop.$invalid}',

                      )) }}


                      <div class="validation-error" ng-messages="formValidate.shop.$error" >

                              {!! getValidationMessage()!!}

                              {!! getValidationMessage('minlength')!!}

                              {!! getValidationMessage('maxlength')!!}

                              {!! getValidationMessage('pattern')!!}

                      </div>

                </div>

                 <div class="form-group col-lg-12">



                      {{ Form::text('subject', old('subject'), $attributes =

                      array('class' => 'form-control',

                      'placeholder' => 'Subject',

                      'ng-model' => 'subject',

                      'required' => 'true',

                      'ng-minlength' => '2',

                      'ng-maxlength' => '100',

                      'ng-class'=>'{"has-error": formValidate.subject.$touched && formValidate.subject.$invalid}',

                      )) }}


                      <div class="validation-error" ng-messages="formValidate.subject.$error" >

                              {!! getValidationMessage()!!}

                              {!! getValidationMessage('minlength')!!}

                              {!! getValidationMessage('maxlength')!!}

                              {!! getValidationMessage('pattern')!!}

                      </div>

                   </div>



                    <div class="form-group col-lg-12">




                    {{ Form::textarea('message', old('message'), $attributes =

                    array('class' => 'form-control',

                    'rows'=>'3',

                    'cols'=>'5',

                    'placeholder' => 'Message',

                    'ng-model' => 'message',

                    'required' => 'true',

                    'ng-maxlength' => '300',

                    'ng-class'=>'{"has-error": formValidate.message.$touched && formValidate.message.$invalid}',

                    )) }}



                    <div class="validation-error" ng-messages="formValidate.message.$error" >

                      {!! getValidationMessage()!!}

                      {!! getValidationMessage('maxlength')!!}

                   </div>

                </div>




                  <div class="form-group text-center col-lg-12">

                      <button class="btn btn-primary login-bttn" ng-disabled='!formValidate.$valid'>{{ getPhrase('contact') }}</button>

                   </div>


               </div>
               <!--6-->


                {!! Form::close() !!}



                   </div>
             </div>

 </div>
            </div>





            {{Form::hidden('site_address', getSetting('site_address','site_settings'))}}
            {{Form::hidden('site_city', getSetting('site_city','site_settings'))}}
            {{Form::hidden('site_state', getSetting('site_state','site_settings'))}}
            {{Form::hidden('site_zipcode', getSetting('site_zipcode','site_settings'))}}
            {{Form::hidden('latitude', getSetting('latitude','site_settings'))}}
            {{Form::hidden('longitude', getSetting('longitude','site_settings'))}}
        </div>

    </section>
    <!--CONTACT SECTION-->



    <!-- Google Maps -->
    <div class="google-map" id="am-portal-map"></div>
    <!-- /Google Maps -->


    <!--RECENT WINNERS SECTION-->
    @include('home.pages.auctions.recent-winners')
    <!--RECENT WINNERS SECTION-->


    <!--RECENT BUYERS SECTION-->
    @include('home.pages.auctions.recent-buyers')
    <!--RECENT BUYERS SECTION-->


    @include('home/testimonials')


@endsection

@section('footer_scripts')

@include('common.validations')
@include('common.alertify')
@include('home.pages.auctions.auctions-js-script')

<script src="{{JS_HOME}}google-map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{getSetting('api_key','site_settings')}}"></script>


<script>
$(document).ready(function () {

  var latitude  = {{getSetting('latitude','site_settings')}}
  var longitude = {{getSetting('longitude','site_settings')}}

  var address  = "{{getSetting('site_address','site_settings')}}";
  address += "<br/>";
  address += " "+"{{getSetting('site_state','site_settings')}}";
  address += " "+"{{getSetting('site_city','site_settings')}}";
  address += " "+"{{getSetting('site_zipcode','site_settings')}}";

  // console.log("ADDRES  "+address);
  googlemap(latitude, longitude, address);
});
</script>
@stop
