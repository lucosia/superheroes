<div class="modal fade " id="editHeroModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content customized-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="">{{(selectedHero.id)?'Edit':'New'}} Hero</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="nickname">Nickname</label>
                        <input type="text" class="form-control" name="heros_nickname" placeholder="Hero's Nickname" title="Hero's Nickname" v-model="selectedHero.nickname">
                    </div>
                    <div class="col-md-4">
                        <label for="heros_realname">Real Name</label>
                        <input type="text" class="form-control" name="heros_realname" placeholder="Hero's Real Name" title="Hero's Real Name" v-model="selectedHero.real_name">
                    </div>
                    <div class="col-md-5">
                        <label for="heros_catch_phrase">Catch Phrase</label>
                        <input type="text" class="form-control" name="heros_catch_phrase" placeholder="Hero's Catch Phrase" title="Hero's Catch Phrase" v-model="selectedHero.catch_phrase">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="heros_origin_description">Origin Description</label>
                        <textarea class="form-control" name="heros_origin_description" placeholder="Hero's Origin Description" v-model="selectedHero.origin_description" ></textarea>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <span class="text-muted" v-if="selectedHero.id">Edit the hero's info, delete and/or add powers, delete images related and/or submit others. Click the "Save & Close" button when you're done.</span>
                        <center>
                            <button type="button" class="btn btn-primary btn-lg" v-if="!selectedHero.id" name="button" v-on:click="createHero()"><i class="fa fa-spinner fa-spin " v-if="creatingHero"></i>{{(creatingHero)?'':'Create my hero!'}}</button>
                        </center>
                    </div>
                </div>
                <br>
                <div class="row" v-if="selectedHero.id">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                    <h4>Images</h4>
                                </center>
                            </div>
                            <div class="panel-body" style="height:150px; overflow-y:auto;">
                                <table class="table">
                                    <tbody>
                                        <tr v-for="image in selectedHero.images">
                                            <td>
                                                <img :src="image.path" :alt="selectedHero.nickname+' image'" :title="selectedHero.nickname+' image'" height="40" width="40">
                                            </td>
                                            <td><a href="#" title="Delete Image" v-on:click="deleteImage(image)"><i class="fa fa-trash-o text-danger"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a type="button" class="btn btn-primary btn-sm pull-right" v-bind:class="{'disabled':!newImage}" title="Submit image" name="button" v-on:click="submitImage()"><i class="fa fa-upload" aria-hidden="true"></i> Submit</a>
                        <label>Submit a new image</label><input type="file" id="inputImage" accept="image/*" name="image"  v-on:change="getImage($event)">
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                    <h4>Superpowers</h4>
                                </center>
                            </div>
                            <div class="panel-body" style="height:150px; overflow-y:auto;">
                                <table class="table">
                                    <tbody>
                                        <tr v-for="power in selectedHero.superpowers">
                                            <td>{{power.description}}</td>
                                            <td><a href="#" title="Delete superpower" v-on:click="deleteHeroSuperpower(power)"><i class="fa fa-trash-o text-danger"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-success pull-right" name="button" title="Add new superpower" data-toggle="modal" data-target="#listSuperpowersModal" v-on:click="listSuperpowers()"><i class="fa fa-plus"></i> Superpower</button>
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
