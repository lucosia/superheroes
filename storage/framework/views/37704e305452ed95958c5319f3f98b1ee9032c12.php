<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12 main" id="record">
            <h3 class='page-header'><i class="fa fa-users"></i> Superheroes Database </h3>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <?php echo $__env->make('record.parts.panel.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('record.parts.editHeroModal.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('record.parts.listSuperpowersModal.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/resources/js/app.record.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>