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
