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
