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
            <button type="button" class="btn btn-primary btn-lg" v-if="!selectedHero.id" name="button" v-on:click="createHero()"><i class="fa fa-spinner fa-spin " v-if="creatingHero"></i>@{{(creatingHero)?'':'Create my hero!'}}</button>
        </center>
    </div>
</div>
<br>
