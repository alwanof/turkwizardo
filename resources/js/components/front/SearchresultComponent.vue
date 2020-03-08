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

        </div>
        <hr>
        <section class="row mb-5">
            <div class="col">


                <div v-for="feed in feeds.data" :key="feed.id" class="mb-4">
                    <img :src="feed.cover" :alt="feed.name" :title="feed.name" class="img-thumbnail" width="75px" alt="">
                    <a :href="'category/'+feed.category.hash"><span class="badge badge-primary mx-1">{{feed.category.name}}</span></a>
                    <a :href="'factory/'+feed.hash"><h5 style="display:inline">{{feed.name}}.</h5></a>
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
        props: ["lang","data",'keywords'],
        data() {
            return {
                path: CONFIG.PATH,
                loading: false,
                local: CONFIG.LANG,
                errors: [],
                feeds:[],
            };
        },
        created() {
            this.getResults();
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
                        +"&category_id="+this.category_id
                    )
                    .then(res => {
                        this.feeds = res.data;
                        this.loading = false;
                    });
            },


        }
    };
</script>
