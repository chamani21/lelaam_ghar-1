<?php

//Auction Categories
$categories = \App\Category::getHomeCategories(6);


?>
    <nav class="navbar navbar-expand-md navbar-dark au-navbar d-none d-sm-block">
        <ul class="navbar-nav nav-inner au-nav-inner mr-auto">
            <li class="nav-item au-items text-light pt-2">
                <?php if(Auth::check()): ?>
                    Hello 
                    <span class="font-weight-bold">
                        <?php echo e(Auth::user()->name); ?>!
                    </span>
                <?php endif; ?>
            </li>
        
           <li class="nav-item au-items ml-auto">
                <?php if(Auth::check()): ?>
                    <?php echo $__env->make('bidder.common.notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
           </li>
            <li class="nav-item au-items">
                <a class="au-custom nav-link nav-press scroll text-dark" href="<?php echo e(URL_CONTACT_US); ?>" title="Contact Us"> 
                    <?php echo e(getPhrase('contact_us')); ?> 
                </a>
            </li>
            <?php if(Auth::check()): ?>
                <li>
                    <a href="<?php echo e(URL_DASHBOARD); ?>" title="Dashboard" class="nav-link nav-press scroll text-dark"> 
                        <?php echo e(getPhrase('dashboard')); ?> 
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(URL_LOGOUT); ?>" title="Logout" class="nav-link nav-press scroll text-dark">
                        <?php echo e(getPhrase('logout')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if(!Auth::check()): ?>
                <li>
                    <a href="javascript:void(0);" onclick="showModal('loginModal')" title="Login" class="nav-link nav-press scroll text-dark" >
                        <?php echo e(getPhrase('login')); ?>

                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light nav-custom">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(PREFIX); ?>">
          <img src="<?php echo e(IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')); ?>" alt="Auction Logo">
        </a>
        <a href="#off-canvas" class="js-offcanvas-trigger navbar-toggle collapsed" data-toggle="collapse" data-offcanvas-trigger="off-canvas" aria-expanded="false"></a>
        <button class="navbar-toggler js-offcanvas-trigger wb-btnn" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" data-offcanvas-trigger="off-canvas"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse d-none justify-content-end" id="navbarCollapse">
                <ul class="navbar-nav nav-inner au-nav-inner ">
                    
                    <div class="ml-auto mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mt-3">
                                    <div class="gcse-search"></div>
                                    <script async src="https://cse.google.com/cse.js?cx=014936675441434333392:ry8uso0q6ow"></script>
                                </div>
                            </div>
                        </div>
                        
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
                                    <?php if($categories): ?>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $sub_categories = $category->get_sub_catgories()->get();?>
                                            <?php if(count($sub_categories)): ?>
                                                <li >
                                                    <input class="cat_type category-input" data-label="<?php echo e($category->category); ?>" id="<?php echo e($category->category); ?>" value="<?php echo e($category->category); ?>" name="radios" type="radio" ><label for="<?php echo e($category->category); ?>" >
                                                        <?php echo e($category->category); ?>

                                                    </label>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                            <a class="nav-link text-dark" href="<?php echo e(url('/')); ?>"> 
                                <i class="fa fa-home"></i>
                                <?php echo e(getPhrase('Home')); ?> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(URL_LIVE_AUCTIONS); ?>"> 
                                <i class="fa fa-broadcast-tower"></i>
                                <?php echo e(getPhrase('live_auctions')); ?> 
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
                                    <?php if($categories): ?>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php 
                                            $sub_categories = $category->get_sub_catgories()->get();?>
                                            <?php if(count($sub_categories)): ?>
                                                <div class="col-md-4">
                                                    <li>
                                                        <ul>
                                                            <li class="dropdown-header">
                                                                <a href="javascript:void(0)"> <?php echo e($category->category); ?> </a>
                                                            </li>
                                                            <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $auctions_count = $sub->getMenuSubCategoryAuctions()->count();
                                                                ?>
                                                                <li class="ml-5">
                                                                    <a href="javascript:void(0)" onclick="window.location.href='<?php echo e(URL_HOME_AUCTIONS); ?>?category=<?php echo e($category->slug); ?>&subcategory=<?php echo e($sub->slug); ?>';" class="text-dark"> 
                                                                        <i class="fa fa-bullseye"></i>
                                                                        <?php echo e($sub->sub_category); ?> [<?php echo e($auctions_count); ?>] 
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="divider"></li>
                                                        </ul>
                                                    </li>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-3">
                                                    <li>
                                                        <a href="javascript:void(0)" onclick="window.location.href='<?php echo e(URL_HOME_AUCTIONS); ?>?category=<?php echo e($category->slug); ?>';"> 
                                                            <?php echo e($category->category); ?> 
                                                        </a>
                                                    </li>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </ul>
                            
                        </li>
                        

                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">
                                <i class="fa fa-gavel"></i>
                                Sunday Auctions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">
                                <i class="fa fa-money"></i>
                                Fixed Price Sell
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(URL_HOME_AUCTIONS); ?>" class="nav-link text-dark">
                                <i class="fa fa-shopping-basket"></i>
                                Auctions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="<?php echo e(url('about-us')); ?>" class="nav-link text-dark">
                                <i class="fa fa-globe"></i>
                                About Us
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo e(url('auctions/create')); ?>" class="btn btn-outline-light text-dark m-2">
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

    <?php if(isset($breadcrumb)): ?>
        <!--BREADCRUMBS SECTION-->
        <section class="au-bread-crumbs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6 au-crumbs">
                        <h5><?php echo e(isset($title) ? $title : ''); ?></h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 au-bread">
                        <a href="javascript:void(0);" class="justify-content-end">
                            <?php echo e(getPhrase('home')); ?> &nbsp; 
                            <span> 
                                / <?php echo e(isset($title) ? $title : ''); ?> 
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--BREADCRUMBS SECTION-->
    <?php endif; ?>
