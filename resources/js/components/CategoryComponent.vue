<template>
    <div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <a href="en">
                    <i class="flag-icon flag-icon-us mr-1"></i>
                </a>
                <a href="ar">
                    <i class="flag-icon flag-icon-sa mr-1"></i>
                </a>
                <a href="tr">
                    <i class="flag-icon flag-icon-tr mr-1"></i>
                </a>

                <i class="fas fa-cog fa-spin px-2 text-primary" v-show="loading"></i>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input
                            type="text"
                            name="table_search"
                            v-model="keywords"
                            class="form-control float-right"
                            placeholder="Search"
                        />

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover table-head-fixed">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Hash</th>
                        <th>Date</th>
                        <th>
                            <span class="badge badge-info">{{categories.total}}</span>
                            <i :class="'flag-icon flag-icon-'+this.flag"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="cat in categories.data" :key="cat.id">
                        <td>
                            <img :src="cat.cover" class="img-thumbnail" alt="">
                        </td>
                        <td >
                            {{cat.name}}
                        </td>
                        <td>{{cat.description}}</td>
                        <td>{{cat.hash}}</td>
                        <td>{{cat.created_at}}</td>
                        <td width="20%">
                            <a
                                :href="path+'/admin/category/edit/'+cat.id"
                                role="button"
                                class="btn btn-sm btn-info text-white"
                            >
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" @click="removeCat(cat)">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr />
                <div class="p-2">
                    <pagination :data="Object.assign({},categories)" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import CONFIG from "../app";
    export default {
        name: "CategoryComponent.vue",
        props: ["auth", "lang", "flag"],
        data() {
            return {
                path: CONFIG.PATH,
                loading: false,
                categories: [],
                keywords: null,
                errors: []
            };
        },
        created() {
            this.getResults();
        },
        watch: {
            keywords(after, before) {
                if (this.keywords.length > 2 || this.keywords.length === 0) {
                    this.search();
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
                        "lang/categories/" +
                        this.lang +
                        "/?page=" +
                        page +
                        "&api_token=" +
                        this.auth.api_token
                    )
                    .then(res => {
                        this.categories = res.data;
                        this.loading = false;
                    });
            },
            search(page) {
                this.loading = true;
                if (typeof page === "undefined") {
                    page = 1;
                }
                axios
                    .get(
                        CONFIG.API_URL +
                        "search/categories/" +
                        this.lang +
                        "?page=" +
                        page +
                        "&keywords=" +
                        this.keywords +
                        "&api_token=" +
                        this.auth.api_token
                    )
                    .then(res => {
                        this.categories = res.data;
                        this.loading = false;
                    });
            },
            removeCat(cat) {
                this.loading = false;
                axios
                    .delete(
                        CONFIG.API_URL +
                        "categories/" +
                        cat.id +
                        "?api_token=" +
                        this.auth.api_token
                    )
                    .then(res => {
                        this.loading = false;
                        toastr["success"]("it's removed!", "Success");
                        this.getResults(1);
                    })
                    .catch(error => {
                        this.loading = false;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        } else {
                            toastr["error"]("Unexpected Error??", "Error");
                        }
                    });
            }
        }
    };
</script>

<style scoped>
</style>
