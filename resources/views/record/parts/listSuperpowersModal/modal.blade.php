<div class="modal fade" id="listSuperpowersModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content customized-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="">Superpowers</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" v-model="superpowerArgument" v-on:keyup="listSuperpowers()" placeholder="Search">
                        @include('record.parts.listSuperpowersModal.parts.table')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @include('record.parts.listSuperpowersModal.parts.footer')
            </div>
        </div>
    </div>
</div>
