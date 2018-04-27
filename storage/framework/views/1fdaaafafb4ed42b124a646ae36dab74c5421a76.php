<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12 main" id="record">
            <h3 class='page-header'><i class="fa fa-users"></i> Superheros Database </h3>
        </div>
    </div>
</div>
<script type="text/javascript" src="/resources/js/app.record.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
