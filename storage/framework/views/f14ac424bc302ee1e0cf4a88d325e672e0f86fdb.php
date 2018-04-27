<div class="row">
    <div class="col-md-8">
        <input type="text" class="form-control" v-if="addingSuperpower" placeholder="New superpower" v-model="newSuperpower.description">
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-primary" v-if="!addingSuperpower" v-on:click="startAddingSuperpower()">+ New</button>
        <button type="button" class="btn btn-success" v-if="addingSuperpower" v-on:click="createSuperpower()"><i class="fa fa-save"></i> Save</button>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
    </div>
</div>
