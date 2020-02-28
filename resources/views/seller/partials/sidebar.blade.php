@inject('request', 'Illuminate\Http\Request')

<?php 

if (isset($active_class))
$active_class = $active_class;
else 
$active_class='';
?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu pt-5 pt-sm-0 mt-5 mt-sm-0">

             

            <li class="{{ isActive($active_class,'dashboard')}}  mt-5 mt-sm-0">
                <a href="{{ PREFIX }}index">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>
            



            <li class="{{ isActive($active_class,'auctions')}}">
                <a href="{{ URL_LIST_AUCTIONS }}">
                    <i class="fa fa-gavel"></i>
                    <span class="title">
                       Auctions
                    </span>
                </a>
            </li>
       


            
             <li class="{{ isActive($active_class,'notifications')}}">
                <a href="{{ URL_USER_NOTIFICATIONS }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title"> {{ getPhrase('notifications') }} </span>
                </a>
            </li>

            
            @php ($unread = App\MessengerTopic::countUnread())
            <li class="{{ $request->segment(1) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
                <a href="{{ URL_MESSENGER }}">
                    <i class="fa fa-envelope"></i>

                    <span>Messages</span>
                    @if($unread > 0)
                        {{ ($unread > 0 ? '('.$unread.')' : '') }}
                    @endif
                </a>
            </li>
            <style>
                .page-sidebar-menu .unread * {
                    font-weight:bold !important;
                }
            </style>



           @if (Auth::user()->role_id == 2)
               <li class="{{ isActive($active_class,'swicth-account')}} mt-5 mt-sm-0">
                    <a href="{{url('switch/seller')}}" class="mt-5 mt-sm-0">
                        <i class="fa fa-user-o"></i>
                        <span class="title">
                            Switch to Bidder Account
                        </span>
                    </a>
                </li>
           @endif

            <li>
                <a href="{{URL_LOGOUT}}">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"> {{getPhrase('logout')}} </span>
                </a>
            </li>
        </ul>
    </section>
</aside>

