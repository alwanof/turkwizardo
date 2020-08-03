<template>
  <div>
    <h5 class="text-warning text-center">{{ local[lang+".frontform"]["menu"]['title'] }}</h5>
    <hr />
    <form @submit.prevent="sendFeed">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-envelope"></i>
          </span>
        </div>

        <input
          type="text"
          v-model="feed.name"
          class="form-control"
          :placeholder="local[lang+'.frontform']['menu']['name']+'..'"
          required
        />
      </div>
      <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>

      <div class="input-group mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span>
        </div>
        <input
          type="email"
          v-model="feed.email"
          class="form-control"
          :placeholder="local[lang+'.frontform']['menu']['email']+'..'"
          required
        />
      </div>
      <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
      <div class="input-group mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-phone"></i>
          </span>
        </div>
        <input
          type="text"
          v-model="feed.phone"
          class="form-control"
          :placeholder="local[lang+'.frontform']['menu']['phone']+'..'"
          required
        />
      </div>
      <div v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</div>
      <div class="input-group mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-list-ul"></i>
          </span>
        </div>
        <select name="service" v-model="feed.service" class="form-control" required>
          <option value="0" selected disabled>{{local[lang+'.frontform']['menu']['service_title']}}</option>
          <option
            v-for="(item,index) in local[lang+'.frontform']['menu']['service']"
            :key="index"
            :value="item"
          >{{item}}</option>
        </select>
      </div>
      <div v-if="errors && errors.service" class="text-danger">{{ errors.service[0] }}</div>
      <div class="input-group mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-comment-alt"></i>
          </span>
        </div>
        <textarea
          v-model="feed.note"
          class="form-control"
          :placeholder="local[lang+'.frontform']['menu']['note']+'..'"
          cols="30"
          rows="5"
          required
        ></textarea>
      </div>
      <div v-if="errors && errors.note" class="text-danger">{{ errors.note[0] }}</div>

      <div class="text-center my-3">
        <button
          type="submit"
          class="btn rounded-sm text-uppercase font-600 shadow-xl bg-violet-dark"
          :disabled="loading"
        >
          <i class="fas fa-cog fa-spin" v-show="loading"></i>
          <i class="fas fa-cog" v-show="!loading"></i>
          <span class="px-1">{{local[lang+'.frontform']['send_query']}}</span>
        </button>
      </div>
      <div class="alert alert-success alert-dismissible fade show" v-show="success" role="alert">
        {{local[lang+'.email']['welcome1']['line2']}}
        <button
          type="button"
          class="close"
          data-dismiss="alert"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import CONFIG from "../../app";
export default {
  name: "FormComponent.vue",
  props: ["lang"],
  data() {
    return {
      path: CONFIG.PATH,
      loading: false,
      local: CONFIG.LANG,
      success: false,
      feed: {
        name: null,
        email: null,
        phone: null,
        service: 0,
        note: null,
        url: window.location.href,
      },
      errors: [],
    };
  },
  created() {},
  watch: {},
  methods: {
    sendFeed() {
      this.loading = true;
      axios
        .post(CONFIG.API_URL + "front/form/forward", this.feed)
        .then((res) => {
          this.loading = false;
          this.success = true;
          this.clearFields();
        })
        .catch((error) => {
          this.loading = false;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          } else {
            $("#addFeed").modal("hide");
            /*toastr["error"](
                                this.local[this.lang + ".alerts"]["error"],
                                this.local[this.lang + ".alerts"]["err"]
                            );*/
            this.clearFields();
          }
        });
    },
    clearFields() {
      this.feed.name = this.feed.email = this.feed.phone = this.feed.note = this.feed.note = this.feed.service = null;
    },
  },
};
</script>

<style scoped>
</style>
