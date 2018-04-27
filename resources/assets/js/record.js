Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('value');
var app = new Vue({
    el: '#record',
    data: {
        heroes:{data:[]},
        selectedHero:{
            id:null,
            images:[],
            powers:[]
        },
        superpowerArgument:'',
        superpowers:[],
        newImage:null,
        addingSuperpower:false,
        creatingHero:false,
        newSuperpower:{description:''},
        error:null
    },
    mounted:function(){
        this.listHeroes();
    },
    methods:{
        listHeroes:function(page){
            var url = this.pagination('/api/record/listHeroes',page,this.heroes);
            this.$http.get(url).then(
                function(response){
                    this.$set(this,'heroes',response.data);
                },
                function(response){
                    this.$set(this,'error',response.data);
                }
            );
        },
        pagination:function(url,page,object){
            if(page){
                switch (page) {
                    case 1:
                        return url+'?page='+1;
                    break;
                    case 2:
                        return url+'?page='+(object.current_page-1);
                    break;
                    case 3:
                    return url+'?page='+(object.current_page+1);
                    break;
                    case 4:
                    return url+'?page='+object.last_page;
                    break;
                }
            }else{
                return url;
            }
        },
        editHero:function(hero){
            this.$set(this,'selectedHero',{
                id:(hero)?hero.id:null,
                nickname:(hero)?hero.nickname:'',
                real_name:(hero)?hero.real_name:'',
                catch_phrase:(hero)?hero.catch_phrase:'',
                origin_description:(hero)?hero.origin_description:'',
                images:(hero)?hero.images:[],
                superpowers:(hero)?hero.superpowers:[]
            });
        },
        getImage:function(ev){
            this.$set(this,'newImage',ev.target.files[0] || ev.dataTransfer.files[0]);
        },
        deleteImage:function(image){
            var answer = confirm("Are you sure you want to delete this image?");
            if(answer){
                this.$http.post('/api/record/deleteImage',image).then(
                    function(response){
                        this.$set(this.selectedHero,'images',response.data);
                        this.listHeroes();
                    },
                    function(response){
                        this.$set(this,'error',response.data);
                    }
                )
            }
        },
        deleteHeroSuperpower:function(superpower){
            var answer = confirm("Are you sure you want to delete this superpower from this hero?");
            if(answer){
                this.$http.post('/api/record/deleteHeroSuperpower',superpower).then(
                    function(response){
                        this.$set(this.selectedHero,'superpowers',response.data);
                    },
                    function(response){
                        this.$set(this,'error',response.data);
                    }
                )
            }
        },
        listSuperpowers:function(){
            this.$http.post('/api/record/listSuperpowers',{
                superpowerArgument:this.superpowerArgument
            }).then(
                function(response){
                    this.$set(this,'superpowers',response.data);
                },
                function(response){
                    this.$set(this,'error',response.data);
                }
            )
        },
        startAddingSuperpower:function(){
            this.$set(this,'addingSuperpower',true);
            this.$set(this,'newSuperpower',{description:''});
        },
        createSuperpower:function(){
            this.$http.post('/api/record/createSuperpower',{
                superpower:this.newSuperpower,
                superpowerArgument:this.superpowerArgument
            }).then(
                function(response){
                    this.$set(this,'addingSuperpower',false);
                    this.$set(this,'newSuperpower',{description:''});
                    this.$set(this,'superpowers',response.data);
                },
                function(response){
                    this.$set(this,'error',response.data);
                }
            )
        },
        addHeroSuperpower:function(superpower){
            this.$http.post('/api/record/addHeroSuperpower',{
                superpowerId:superpower,
                heroId:this.selectedHero.id
            }).then(
                function(response){
                    this.$set(this.selectedHero,'superpowers',response.data);
                    $('#listSuperpowersModal').modal('hide');
                },
                function(response){
                    this.$set(this,'error',response.data);
                }
            )
        },
        deleteHero:function(hero){
            var answer = confirm("Are you sure you want to delete this hero?");
            if(answer){
                this.$http.post('/api/record/deleteHero',{
                    heroId:hero.id
                }).then(
                    function(response){
                        this.listHeroes();
                    },
                    function(response){
                        this.$set(this,'error',response.data);
                    }
                )
            }
        },
        submitImage:function(){
            let data = new FormData();
            data.append('image',this.newImage);
            data.append('hero',this.selectedHero.id);
            this.$http.post('/api/record/submitImage',data).then(
                function(response){
                    this.$set(this.selectedHero,'images',response.data);
                    this.$set(this,'newImage',null);
                    $("#inputImage").val('');
                    this.listHeroes();
                    alert('Success!');
                },
                function(response){
                    this.$set(this,'error',response.data);
                }
            )
        },
        createHero:function(){
            if(this.selectedHero.nickname && this.selectedHero.real_name && this.selectedHero.catch_phrase && this.selectedHero.origin_description){
                this.$set(this,'creatingHero',true);
                this.$http.post('/api/record/createHero',{
                    hero:this.selectedHero
                }).then(
                    function(response){
                        this.$set(this,'selectedHero',response.data);
                        this.listHeroes();
                        this.$set(this,'creatingHero',false);
                    },
                    function(response){
                        this.$set(this,'error',response.data);
                    }
                )
            }else{
                alert("Oops! All fields are required to proceed!");
            }
        },
        saveHero:function(){
            if(this.selectedHero.nickname && this.selectedHero.real_name && this.selectedHero.catch_phrase && this.selectedHero.origin_description){
                this.$http.post('/api/record/saveHero',{
                    hero:this.selectedHero
                }).then(
                    function(response){
                        this.listHeroes();
                        $('#editHeroModal').modal('hide');
                    },
                    function(response){
                        this.$set(this,'error',response.data);
                    }
                )
            }else{
                alert("Oops! All fields are required to proceed!");
            }
        }
    }
});
