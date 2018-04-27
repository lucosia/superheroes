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
                        <div style="height:200px; overflow-y:auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th style="width:15%;">Select</th>
                                    </tr>
                                </thead>
                                <tbody v-if="superpowers.length > 0">
                                    <tr v-for="superpower in superpowers">
                                        <td>{{superpower.description}}</td>
                                        <td><a class="btn btn-success btn-sm" v-on:click="addHeroSuperpower(superpower.id)"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
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
            </div>
        </div>
    </div>
</div>
