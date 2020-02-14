<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"> <?php echo e($title); ?> </h3>

    

    
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e(getPhrase('list')); ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_letter_create')): ?>
                <a href="<?php echo e(URL_NEWS_LETTER_ADD); ?>" class="btn btn-success btn-add pull-right"> <?php echo e(getPhrase('add_new')); ?> </a>
            <?php endif; ?>

        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th style="text-align:center;">S.no.</th>

                        <th> <?php echo e(getPhrase('to')); ?> </th>
                        <th> <?php echo e(getPhrase('title')); ?></th>
                        <th> <?php echo e(getPhrase('message')); ?></th>
                     
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                 <?php if(count($records) > 0): ?>
                <tbody>
                    <?php if(count($records) > 0): ?>
                    <?php $i=0;?>
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++;?>
                        
                            <tr data-entry-id="<?php echo e($record->id); ?>">
                               
                               <td style="text-align:center;"><?php echo e($i); ?></td>

                               <td field-key='to'><?php echo e($record->email); ?></td>

                               <td field-key='title'><?php echo e($record->title); ?></td>

                               <td field-key='message'> <?php echo str_limit($record->message,20); ?> </td>

                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_letter_view')): ?>
                                    <a href="<?php echo e(URL_NEWS_LETTER_VIEW); ?>/<?php echo e($record->id); ?>" class="btn btn-xs btn-primary"> <?php echo e(getPhrase('view')); ?> </a>
                                    <?php endif; ?>
                                   

                                   
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_letter_delete')): ?>
                                    <!-- <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('<?php echo e($record->id); ?>')"> <?php echo e(getPhrase('delete')); ?> </a> -->
                                    <?php endif; ?>
                                   
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"> <?php echo e(getPhrase('no_entries_in_table')); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                 <?php endif; ?>

            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?> 


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_letter_delete')): ?> 
        <?php echo $__env->make('common.deletescript', array('route'=>URL_NEWS_LETTER_DELETE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>