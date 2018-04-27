<div class="modal fade " id="editHeroModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content customized-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="">{{(selectedHero.id)?'Edit':'New'}} Hero</h4>
            </div>
            <div class="modal-body">
                <?php echo $__env->make('record.parts.editHeroModal.parts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <br>
                <div class="row" v-if="selectedHero.id">
                    <div class="col-md-6">
                        <?php echo $__env->make('record.parts.editHeroModal.parts.images', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $__env->make('record.parts.editHeroModal.parts.superpowers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary text-success" v-if="selectedHero.id" v-on:click="saveHero()"><i class="fa fa-save"></i> Save & Close</button>
            </div>
        </div>
    </div>
</div>
