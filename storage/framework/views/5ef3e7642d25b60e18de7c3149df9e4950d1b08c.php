<?php $request = app('Illuminate\Http\Request'); ?>

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

             

            <li class="<?php echo e(isActive($active_class,'dashboard')); ?>  mt-5 mt-sm-0">
                <a href="<?php echo e(PREFIX); ?>index">
                    <i class="fa fa-wrench"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.app_dashboard'); ?></span>
                </a>
            </li>
            



            <li class="<?php echo e(isActive($active_class,'auctions')); ?>">
                <a href="<?php echo e(URL_LIST_AUCTIONS); ?>">
                    <i class="fa fa-gavel"></i>
                    <span class="title">
                       Auctions
                    </span>
                </a>
            </li>
       


            
             <li class="<?php echo e(isActive($active_class,'notifications')); ?>">
                <a href="<?php echo e(URL_USER_NOTIFICATIONS); ?>">
                    <i class="fa fa-briefcase"></i>
                    <span class="title"> <?php echo e(getPhrase('notifications')); ?> </span>
                </a>
            </li>

            
            <?php ($unread = App\MessengerTopic::countUnread()); ?>
            <li class="<?php echo e($request->segment(1) == 'messenger' ? 'active' : ''); ?> <?php echo e(($unread > 0 ? 'unread' : '')); ?>">
                <a href="<?php echo e(URL_MESSENGER); ?>">
                    <i class="fa fa-envelope"></i>

                    <span>Messages</span>
                    <?php if($unread > 0): ?>
                        <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                    <?php endif; ?>
                </a>
            </li>
            <style>
                .page-sidebar-menu .unread * {
                    font-weight:bold !important;
                }
            </style>



           <?php if(Auth::user()->role_id == 2): ?>
               <li class="mt-5 mt-sm-0">
                    <a href="<?php echo e(url('switch/seller')); ?>" class="btn btn-info text-white">
                        <i class="fa fa-user-o text-light"></i>
                        <span class="text-light">
                             Switch to Bidder Account
                        </span>
                    </a>
                </li>
           <?php endif; ?>

            <li>
                <a href="<?php echo e(URL_LOGOUT); ?>">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"> <?php echo e(getPhrase('logout')); ?> </span>
                </a>
            </li>
        </ul>
    </section>
</aside>

