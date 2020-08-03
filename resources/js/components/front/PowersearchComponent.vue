<template>
  <div>
    <div class="search-box search-header bg-theme mb-2 card-style mr-3 ml-3">
      <i class="fa fa-search" v-show="!loading"></i>
      <i class="fas fa-cog color-highlight fa-spin" v-show="loading"></i>

      <input
        type="text"
        class="border-0"
        :placeholder="local[lang+'.fronthome']['menu']['search_hint']"
        v-model="keywords"
      />
      <a href="#" class="disabled">
        <i class="fa fa-times-circle color-red2-dark"></i>
      </a>
      <div class="border-top"></div>
      <select class="form-control mt-1 border-0" v-model="filterCat" v-show="filter.cat">
        <option
          value="-1"
          disabled
          selected
        >{{ local[lang+'.fronthome']['menu']['select_category'] }}</option>
        <option value="0">{{ local[lang+'.fronthome']['menu']['all'] }}</option>
        <option v-for="category in categories" :value="category.id">{{category.name}}</option>
      </select>
      <div class="border-top"></div>
      <select class="form-control mt-1 border-0" v-model="filterCity" v-show="filter.city">
        <option value="-1" disabled selected>{{local[lang+'.fronthome']['menu']['select_city']}}</option>
        <option value="0">{{ local[lang+'.fronthome']['menu']['all'] }}</option>
        <option v-for="cityitem in cities" :value="cityitem.city">{{cityitem.city}}</option>
      </select>

      <div class="text-center">
        <button
          type="button"
          @click.prevent="filterToggle()"
          class="btn btn-xs rounded-sm text-uppercase font-600 shadow-xl bg-violet-dark"
        >{{local[lang+'.fronthome']['menu']['options']}}</button>
      </div>
    </div>
    <!-- search results -->
    <div class="card mt-0 card-style shadow-l" v-show="keywords && keywords.length>2">
      <div class="content">
        <div class="p-1 border-bottom" v-for="feed in feeds.data" :key="feed.id">
          <h2 class="font-24">
            <a :href="'factory/'+feed.slug">{{feed.name}}</a>
          </h2>
          <p class="m-1 font-12">
            <a :href="'category/'+feed.category.hash" class="color-highlight">{{feed.category.name}}</a>,
            <a href="#" class="color-highlight">{{feed.city}}</a>
          </p>
          <span class="exerpt efade" @click="showMore">
            {{feed.tags.substring(0, 50)}}
            <span>{{feed.tags.substring(50, 320)}}</span>
          </span>
        </div>

        <div :class="(dataSize>0)?'search-no-results disabled':'search-no-results'">
          <h3 class="bold top-10 color-highlight">Nothing found...</h3>
          <span
            class="under-heading font-11 opacity-70 color-theme"
          >There's nothing matching the description you're looking for, try a different keyword.</span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import CONFIG from "../../app";
export default {
  name: "PowersearchComponent.vue",
  props: ["lang", "categories", "cities"],
  data() {
    return {
      path: CONFIG.PATH,
      loading: false,
      local: CONFIG.LANG,
      errors: [],
      feeds: [],
      dataSize: 0,
      keywords: null,
      filterCity: "0",
      filterCat: "0",
      filter: {
        cat: false,
        city: false,
      },
    };
  },
  created() {},
  watch: {
    keywords(after, before) {
      if (this.keywords.length > 2 || this.keywords.length === 0) {
        this.getResults();
      }
    },
    filterCity(after, before) {
      this.getResults();
    },
    filterCat(after, before) {
      this.getResults();
    },
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
            "search/deep/feeds?page=" +
            page +
            "&keywords=" +
            this.keywords +
            "&category_id=" +
            this.filterCat +
            "&city=" +
            this.filterCity
        )
        .then((res) => {
          this.feeds = res.data;
          this.dataSize = res.data.hasOwnProperty("total") ? res.data.total : 0;
          this.loading = false;
        });
    },
    filterToggle(p) {
      this.filter.cat = !this.filter.cat;
      this.filter.city = !this.filter.city;
    },
    showMore(event) {
      event.target.classList.toggle("efade");
    },
  },
};
</script>
