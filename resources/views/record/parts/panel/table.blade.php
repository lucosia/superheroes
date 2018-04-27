<table class="table">
    <thead>
        <tr>
            <th class="text-center">Nickname</th>
            <th class="text-center">Image</th>
            <th class="text-center"><i class="fa fa-cogs"></i></th>
        </tr>
    </thead>
    <tbody v-if="heroes.data.length>0">
        <tr v-for="hero in heroes.data">
            <td class="text-center">@{{hero.nickname}}</td>
            <td class="text-center">
                <div v-if="hero.images.length > 0">
                    <img :src="hero.images[0].path" :alt="hero.nickname+' image'" :title="hero.nickname+' image'" height="60" width="60">
                </div>
                <div v-else>
                    <span class="text-muted">This hero has no image</span>
                </div>
            </td>
            <td class="text-center">
                <a class="btn btn-default " data-toggle="modal" data-target="#editHeroModal" v-on:click="editHero(hero)"><i class="fa fa-pencil" title="Edit"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-default " v-on:click="deleteHero(hero)"><i class="fa fa-trash-o text-danger" title="Delete"></i></a>
            </td>
        </tr>
    </tbody>
</table>
