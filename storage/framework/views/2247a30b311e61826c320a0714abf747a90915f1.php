<div class="col-md-4">
    <a class="btn btn-default btn-sm" v-on:click="listHeroes(1)" v-bind:class="{disabled:((this.heroes.current_page-1)<=0)}" ><i class="fa fa-fast-backward"></i></a>
    <a class="btn btn-default btn-sm" v-on:click="listHeroes(2)" v-bind:class="{disabled:((this.heroes.current_page-1)<=0)}" ><i class="fa fa-backward"></i></a>
    <div class="btn btn-default btn-sm">
        {{heroes.current_page}}/{{heroes.last_page}}
    </div>
    <a class="btn btn-default btn-sm" v-on:click="listHeroes(3)" v-bind:class="{disabled:((this.heroes.current_page+1)>this.heroes.last_page)}"><i class="fa fa-forward"></i></a>
    <a class="btn btn-default btn-sm" v-on:click="listHeroes(4)" v-bind:class="{disabled:((this.heroes.current_page+1)>this.heroes.last_page)}"><i class="fa fa-fast-forward"></i></a>
</div>
<div class="col-md-4">
    <center>
        <span class="text-muted">{{heroes.total}} Record(s)</span>
    </center>
</div>
<div class="col-md-4">
    <button type="button" class="btn btn-primary pull-right" title="Add new superhero" data-toggle="modal" data-target="#editHeroModal" v-on:click="editHero()">+ New</button>
</div>
