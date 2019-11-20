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
              <th>Name</th>
              <th>City</th>
              <th>Category</th>
              <th>Date</th>
              <th>
                <span class="badge badge-info">{{feeds.total}}</span>
                <i :class="'flag-icon flag-icon-'+this.flag"></i>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="feed in feeds.data" :key="feed.id">
              <td width="30%">
                <a href="#" :title="feed.description" target="_blank">{{feed.name}}</a>
              </td>
              <td>{{feed.city}}</td>
              <td>{{feed.category.name}}</td>
              <td>{{feed.created_at}}</td>
              <td>
                <a
                  :href="path+'/admin/feed/edit/'+feed.id"
                  role="button"
                  class="btn btn-sm btn-info text-white"
                >
                  <i class="fa fa-edit"></i>
                </a>
                <button type="button" class="btn btn-sm btn-danger" @click="removeFeed(feed)">
                  <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <hr />
        <div class="p-2">
          <pagination :data="Object.assign({},feeds)" @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CONFIG from "../../app";
export default {
  name: "FeedenComponent.vue",
  props: ["auth", "lang", "flag"],
  data() {
    return {
      path: CONFIG.PATH,
      loading: false,
      feeds: [],
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
            "lang/feeds/" +
            this.lang +
            "/?page=" +
            page +
            "&api_token=" +
            this.auth.api_token
        )
        .then(res => {
          this.feeds = res.data;
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
            "search/feeds/" +
            this.lang +
            "?page=" +
            page +
            "&keywords=" +
            this.keywords +
            "&api_token=" +
            this.auth.api_token
        )
        .then(res => {
          this.feeds = res.data;
          this.loading = false;
        });
    },
    removeFeed(feed) {
      this.loading = false;
      axios
        .delete(
          CONFIG.API_URL +
            "feeds/" +
            feed.id +
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
