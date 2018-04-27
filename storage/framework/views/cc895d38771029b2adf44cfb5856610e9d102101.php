<div class="panel customized-panel">
    <div class="panel-body"  >
        <div class="row" >
            <div class="col-md-12">
                <div  style="height:450px; overflow-y:auto;">
                    <?php echo $__env->make('record.parts.panel.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer customized-panel" >
        <div class="row">
            <?php echo $__env->make('record.parts.panel.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>
