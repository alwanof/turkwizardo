<template>
    <div>
        <div class="input-group">

            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-cog text-primary fa-spin " v-show="loading"></i>
                    <i class="fas fa-cog text-primary " v-show="!loading"></i>

                </div>
            </div>
            <input type="text" class="form-control" v-model="keywords"  :placeholder="local[lang+'.fronthome']['menu']['search_hint']">
            <select  class="form-control" v-model="searchkey.category_id">
                <option value="0" selected>Category...</option>
                <option v-for="category in categories" :value="category.id"  >{{category.name}}</option>
            </select>
            <select  class="form-control" v-model="searchkey.city">
                <option value="0" selected>City...</option>
                <option v-for="cityitem in cities" :value="cityitem.city" >{{cityitem.city}}</option>
            </select>

        </div>
        <hr>
        <section class="row mb-5">
            <div class=" col-12 text-danger  h5 my-3 p-2 text-center">
                <i class="fa fa-info-circle"></i>
                {{local[lang+'.category']['hint']['part1']}}<a href="/"><i class="fa fa-search"></i> {{local[lang+'.category']['hint']['search']}}</a> {{local[lang+'.category']['hint']['part2']}}
                <hr>
            </div>
            <div class="col-12">
                <div v-for="feed in feeds.data" :key="feed.id" class="mb-4">
                    <img :src="feed.cover" :alt="feed.name" :title="feed.name" class="img-thumbnail" width="75px" alt="">
                    <a :href="'category/'+feed.category.hash"><span class="badge badge-primary mx-1">{{feed.category.name}}</span></a>
                    <a :href="'factory/'+feed.slug"><h5 style="display:inline">{{feed.name}}.</h5></a>
                    <span class="mx-4"><i class="fas fa-map-marker-alt text-primary"></i> <a href="#">{{feed.city}}</a></span>
                    <p class="text-muted">{{feed.tags}}</p>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <h3 class="text-danger">You may be also like :</h3>
            </div>
            <div class="col-12 bg-light">
                <div v-for="feed in otherfeeds.data" :key="feed.id" class="mb-4">
                    <img :src="feed.cover" :alt="feed.name" :title="feed.name" class="img-thumbnail" width="75px" alt="">
                    <a :href="'category/'+feed.category.hash"><span class="badge badge-primary mx-1">{{feed.category.name}}</span></a>
                    <a :href="'factory/'+feed.slug"><h5 style="display:inline">{{feed.name}}.</h5></a>
                    <span class="mx-4"><i class="fas fa-map-marker-alt text-primary"></i> <a href="#">{{feed.city}}</a></span>
                    <p class="text-muted">{{feed.tags}}</p>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    import CONFIG from "../../app";
    export default {
        name: "SearchresultComponent.vue",
        props: ["lang",'keywords','category_id','city','categories','cities'],
        data() {
            return {
                path: CONFIG.PATH,
                loading: false,
                local: CONFIG.LANG,
                errors: [],
                feeds:[],
                otherfeeds:[],
                searchkey:{
                    city:'0',
                    category_id:0
                }
            };
        },
        created() {
            this.searchkey.city=this.city;
            this.searchkey.category_id=this.category_id;
            this.getResults();
            this.getOtherResults();
        },
        watch: {
            keywords(after, before) {
                if (this.keywords.length > 2 || this.keywords.length === 0) {
                    this.getResults();
                }
            }

        },
        methods: {

            getResults(page = 1) {
                this.loading = true;
                if (typeof page === "undefined") {
                    page = 1;
                }
                axios
                    .get(
                        CONFIG.API_URL +
                        "search/deep/feeds?page="
                        + page
                        +"&keywords="+this.keywords
                        +"&category_id="+this.searchkey.category_id
                        +"&city="+this.searchkey.city
                    )
                    .then(res => {
                        this.feeds = res.data;
                        this.loading = false;
                    });
            },
            getOtherResults(page = 1) {
                this.loading = true;
                if (typeof page === "undefined") {
                    page = 1;
                }
                axios
                    .get(
                        CONFIG.API_URL +
                        "search/deep/feeds?page="
                        + page
                        +"&keywords="
                        +"&category_id=0"
                        +"&city=0"
                    )
                    .then(res => {
                        this.otherfeeds = res.data;
                        this.loading = false;
                    });
            },


        }
    };
</script>
