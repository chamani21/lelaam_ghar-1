<?php

//Auction Categories
$categories = \App\Category::getHomeCategories(6);


?>
    <nav class="navbar navbar-expand-md navbar-dark au-navbar d-none d-sm-block">
        <ul class="navbar-nav nav-inner au-nav-inner mr-auto">
            <li class="nav-item au-items text-dark pt-2">
                @if (Auth::check())
                    Hello 
                    <span class="font-weight-bold">
                        {{Auth::user()->name}}!
                    </span>
                @endif
            </li>
            <li class="nav-item au-items text-dark">
                @if (Auth::check() && Auth::user()->role_id == 3)
                    <a href="{{url('switch/bidder')}}" title="Switch Account" class="nav-link nav-press scroll text-dark">
                        {{getPhrase('| Switch_to_Seller_Account')}}
                    </a>
                @endif
            </li>
        {{-- </ul>
        <ul class="navbar-nav nav-inner au-nav-inner ml-auto text-light"> --}}
           <li class="nav-item au-items ml-auto">
                @if (Auth::check())
                    @include('bidder.common.notifications')
                @endif
           </li>
            <li class="nav-item au-items">
                <a class="au-custom nav-link nav-press scroll text-dark" href="{{URL_CONTACT_US}}" title="Contact Us"> 
                    {{getPhrase('contact_us')}} 
                </a>
            </li>
            @if (Auth::check())
                <li>
                    <a href="{{URL_DASHBOARD}}" title="Dashboard" class="nav-link nav-press scroll text-dark"> 
                        {{getPhrase('dashboard')}} 
                    </a>
                </li>
                <li>
                    <a href="{{URL_LOGOUT}}" title="Logout" class="nav-link nav-press scroll text-dark">
                        {{getPhrase('logout')}}
                    </a>
                </li>
            @endif
            @if (!Auth::check())
                <li>
                    <a href="javascript:void(0);" onclick="showModal('loginModal')" title="Login" class="nav-link nav-press scroll text-dark" >
                        {{getPhrase('login')}}
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light nav-custom">
      <div class="container">
        <a class="navbar-brand" href="{{PREFIX}}">
          <img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="Auction Logo">
        </a>
        <a href="#off-canvas" class="js-offcanvas-trigger navbar-toggle collapsed" data-toggle="collapse" data-offcanvas-trigger="off-canvas" aria-expanded="false"></a>
        <button class="navbar-toggler js-offcanvas-trigger wb-btnn" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" data-offcanvas-trigger="off-canvas"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse d-none justify-content-end" id="navbarCollapse">
                <ul class="navbar-nav nav-inner au-nav-inner ">
                    {{-- 
                        Search box on homepage css is isnide 
                        home/css/styles.css line 5736
                    --}}
                    <div class="ml-auto mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mt-3">
                                    <div class="gcse-search"></div>
                                    <script async src="https://cse.google.com/cse.js?cx=014936675441434333392:ry8uso0q6ow"></script>
                                </div>
                            </div>
                        </div>
                        {{-- Old Searchbar --}}
                        <div class="row searchFilter" style="visibility: hidden">
                            <div class="">
                            <div class="input-group col-12" >
                            <input id="table_filter" type="text" class="form-control search-input" aria-label="Text input with segmented button dropdown" placeholder="Search for anything" >
                            <div class="input-group-btn " >
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="label-icon" >
                                    Category</span> 
                                    <span class="caret" ></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" >
                                <ul class="category_filters" >
                                    <li >
                                        <input class="cat_type category-input" data-label="All" id="all" value="" name="radios" type="radio" ><label for="all" >All</label>
                                    </li>
                                    @if ($categories)
                                        @foreach ($categories as $category)
                                            <?php $sub_categories = $category->get_sub_catgories()->get();?>
                                            @if (count($sub_categories))
                                                <li >
                                                    <input class="cat_type category-input" data-label="{{$category->category}}" id="{{$category->category}}" value="{{$category->category}}" name="radios" type="radio" ><label for="{{$category->category}}" >
                                                        {{$category->category}}
                                                    </label>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                </div>
                                <button id="searchBtn" type="button" class="btn btn-search" >
                                    <span class="label-icon" >
                                        <i class="fa fa-search"></i>
                                    </span>
                                </button>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                   {{-- @if (Auth::check())
                   @include('bidder.common.notifications')
                   @endif --}}

                   {{-- <li class="nav-item au-items"><a class="au-custom nav-link nav-press scroll" href="{{URL_CONTACT_US}}" title="Contact Us"> {{getPhrase('contact_us')}} </a></li>

                   @if (Auth::check())
                   <li><a href="{{URL_DASHBOARD}}" title="Dashboard" class="nav-link nav-press scroll"> {{getPhrase('dashboard')}} </a></li>
                   @endif --}}


                   {{-- @if (!Auth::check())
                   <li><a href="javascript:void(0);" onclick="showModal('loginModal')" title="Login" class="nav-link nav-press scroll" >{{getPhrase('login')}}</a></li>
                   @endif --}}
                </ul>
            </div>
        </div>
    </nav>
     <aside class="js-offcanvas" data-offcanvas-options='{ "modifiers": "left,overlay" }' id="off-canvas"></aside>
    <!-- /Navbar -->
    <section class="au-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md au-navbar text-light" >
                <div class="navbar-header">
                    <button class="navbar-toggler p-2 bg-light mr-auto" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars fa-2x"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{url('/')}}"> 
                                <i class="fa fa-home"></i>
                                {{getPhrase('Home')}} 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{URL_LIVE_AUCTIONS}}"> 
                                <i class="fa fa-broadcast-tower"></i>
                                {{getPhrase('live_auctions')}} 
                            </a>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-dark" data-toggle="dropdown">
                                <i class="fa fa-list-ul"></i>
                                Categories 
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                            
                            <ul class="dropdown-menu mega-dropdown-menu"> 
                                <div class="row">
                                    @if ($categories)
                                        @foreach ($categories as $category)
                                            <?php 
                                            $sub_categories = $category->get_sub_catgories()->get();?>
                                            @if (count($sub_categories))
                                                <div class="col-md-4">
                                                    <li>
                                                        <ul>
                                                            <li class="dropdown-header">
                                                                <a href="javascript:void(0)"> {{$category->category}} </a>
                                                            </li>
                                                            @foreach ($sub_categories as $sub)
                                                                <?php
                                                                    $auctions_count = $sub->getMenuSubCategoryAuctions()->count();
                                                                ?>
                                                                <li class="ml-5">
                                                                    <a href="javascript:void(0)" onclick="window.location.href='{{URL_HOME_AUCTIONS}}?category={{$category->slug}}&subcategory={{$sub->slug}}';" class="text-dark"> 
                                                                        <i class="fa fa-bullseye"></i>
                                                                        {{$sub->sub_category}} [{{$auctions_count}}] 
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                            <li class="divider"></li>
                                                        </ul>
                                                    </li>
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <li>
                                                        <a href="javascript:void(0)" onclick="window.location.href='{{URL_HOME_AUCTIONS}}?category={{$category->slug}}';"> 
                                                            {{$category->category}} 
                                                        </a>
                                                    </li>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </ul>
                            
                        </li>
                        {{-- /mega menu --}}

                        <li class="nav-item">
                            <a href="{{url('index#featured-auctions')}}" class="nav-link text-dark">
                                <i class="fa fa-gavel"></i>
                                Sunday Auctions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/index#fixed-price-sale')}}" class="nav-link text-dark">
                                <i class="fa fa-money"></i>
                                Fixed Price Sell
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{URL_HOME_AUCTIONS}}" class="nav-link text-dark">
                                <i class="fa fa-shopping-basket"></i>
                                Auctions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{url('about-us')}}" class="nav-link text-dark">
                                <i class="fa fa-globe"></i>
                                About Us
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a  href="{{URL_CONTACT_US}}" class="nav-link text-dark">
                                <i class="fa fa-globe"></i>
                                Contact Us
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{url('auctions/create')}}" class="btn btn-dark m-2">
                                <i class="fa fa-plus"></i>
                                Create Auction
                            </a>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse -->  
            </nav>
            
        </div>
    </section>
    <!-- /Navbar-->

    @if (isset($breadcrumb))
        <!--BREADCRUMBS SECTION-->
        <section class="au-bread-crumbs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6 au-crumbs">
                        <h5>{{isset($title) ? $title : ''}}</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 au-bread">
                        <a href="javascript:void(0);" class="justify-content-end">
                            {{getPhrase('home')}} &nbsp; 
                            <span> 
                                / {{isset($title) ? $title : ''}} 
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--BREADCRUMBS SECTION-->
    @endif
