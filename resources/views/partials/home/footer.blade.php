<?php 
$aboutus=null;
$record = \App\ContentPage::select('page_text')->limit(1)->orderBy('id','asc')->get();
if ($record)
    $aboutus = $record[0]->page_text;


$pages = \App\ContentPage::select('title','slug')->limit(6)->orderBy('id','asc')->get();



$networks = \App\Settings::getSettingRecord('social_networks');
 
?>

 <!--Footer Section-->
    <footer class="au-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 au-details">
                    <p>{{getPhrase('contact_details')}}</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 au-common-details">
                    <div class="media au-icon-media"> <i class="pe-7s-map"></i>
                        <div class="media-body au-media-body">
                            <h4 class="au-card-title">{{getPhrase('visit_us')}}</h4>
                            <p class="au-card-text">{{getSetting('site_address','site_settings')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 au-common-details">
                    <div class="media au-icon-media"> <i class="pe-7s-mail-open-file"></i>
                        <div class="media-body au-media-body">
                            <h4 class="au-card-title">{{getPhrase('email_us')}}</h4>
                            <p class="au-card-text">{{getSetting('contact_email','site_settings')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 au-common-details">
                    <div class="media au-icon-media"> <i class="pe-7s-phone"></i>
                        <div class="media-body au-media-body">
                            <h4 class="au-card-title">{{getPhrase('call_us')}}</h4>
                            <p class="au-card-text">{{getSetting('site_phone','site_settings')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer body section-->
            <div class="row au-footer-areas">
                <div class="col-lg-4 col-md-12 col-sm-12 au-body-footer">
                    <h4>{{getPhrase('about_us')}}</h4>
                    <p> {!! str_limit($aboutus,200,'...') !!} </p>


                    @if ($networks->facebook->value)
                    <a href="{{$networks->facebook->value}}" target="_blank"> <i class="fab fa-facebook-f"></i> </a>
                    @endif

                    @if ($networks->google_plus->value)
                    <a href="{{$networks->google_plus->value}}" target="_blank"> <i class="fab fa-google"></i> </a>
                    @endif

                    @if ($networks->twitter->value)
                    <a href="{{$networks->twitter->value}}" target="_blank"> <i class="fab fa-twitter"></i> </a>
                    @endif

                    @if ($networks->instagram->value)
                    <a href="{{$networks->instagram->value}}" target="_blank"> <i class="fab fa-instagram"></i> </a>
                    @endif

                    @if ($networks->linkedin->value)
                    <a href="{{$networks->linkedin->value}}" target="_blank"> <i class="fab fa-linkedin"></i> </a>
                    @endif

                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 au-body-footer">
                    <h4> {{getPhrase('useful_links')}} </h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                            <ul class="au-links">
                                <li><a href="{{URL_CONTACT_US}}">{{getPhrase('contact_us')}}</a></li>
                                <li><a href="{{URL_HOME_AUCTIONS}}">{{getPhrase('upcoming_auctions')}}</a></li>
                                <li><a href="{{URL_HOME_AUCTIONS}}">{{getPhrase('auctions_near_you')}}</a></li>
                                <li><a href="{{URL_HOME_AUCTIONS}}">{{getPhrase('past_auctions')}}</a></li>
                                <li><a href="{{URL_FAQS}}">{{getPhrase('faqs')}}</a></li>
                                @if (!Auth::check())
                                <li><a href="{{URL_USERS_LOGIN}}">{{getPhrase('login')}}</a></li>
                                @endif
                                
                            </ul>
                        </div>

                        @if ($pages)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                            <ul class="au-links">
                                @foreach ($pages as $page)

                               <li><a href="{{PREFIX}}{{$page->slug}}" title="{{$page->title}}">{{$page->title}}</a></li>

                                @endforeach
                            </ul>
                        </div>
                        @endif




                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 au-body-footer">
                    <h4>{{getPhrase('news_letter')}}</h4>
                    <p>{{getPhrase('signup_for_new_auction_updates')}}</p>


                        <div class="au-subscribe">
                            <input required type="email" ng-model="subscriber_email" class="form-control" placeholder="{{getPhrase('enter_email_address')}}" />
                            <button type="button" class="btn btn-default login-bttn" ng-click="saveSubscriber(subscriber_email)">{{getPhrase('subscribe')}}</button>
                        </div>

                </div>
            </div>
            <!--FOOTER SUB SECTION-->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 au-sub-footer">
                    <p class="text-center"> {{getSetting('rights_reserved','site_settings')}} @include('mastersettings.settings.file') </p>
                </div>
            </div>
            <!--footer body section-->
        </div>
        <a href="#" class="btn-primary back-to-top show mt-2" title="Move to top"><i class="pe-7s-angle-up pe-2x"></i></a>
    </footer>
    <!--Footer Section-->


    


@section('footer_scripts')
@include('common.validations')
@include('common.alertify')

@include('home.pages.auctions.auctions-js-script')

{{-- Script for Google Custom Search --}}
<script async src="https://cse.google.com/cse.js?cx=014936675441434333392:ry8uso0q6ow"></script>

{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
@stop 