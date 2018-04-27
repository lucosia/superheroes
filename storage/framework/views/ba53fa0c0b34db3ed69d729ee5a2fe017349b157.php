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
