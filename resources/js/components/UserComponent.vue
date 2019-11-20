<template>
  <div>
    <div class="card card-primary card-outline">
      <div class="card-header">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addFeed">
          <i class="fas fa-plus"></i>
        </button>
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
              <th>Email</th>
              <th>
                <span class="badge badge-info">{{users.total}}</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users.data" :key="user.id">
              <td>{{user.name}}</td>
              <td>{{user.email}}</td>
              <td>
                <button
                  type="button"
                  class="btn btn-sm btn-info text-white"
                  @click="editUser(user)"
                >
                  <i class="fa fa-edit"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger" @click="removeUser(user)">
                  <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <hr />
        <div class="p-2">
          <pagination :data="Object.assign({},users)" @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>

    <!-- The Modal -->
    <div
      class="modal fade"
      id="addFeed"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold" v-show="user.id==null">Create User</h4>
            <h4 class="modal-title w-100 font-weight-bold" v-show="user.id!=null">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="addEditUser">
            <div class="modal-body mx-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input
                  type="text"
                  v-model="user.name"
                  class="form-control"
                  placeholder="Name.."
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
                  v-model="user.email"
                  class="form-control"
                  placeholder="Email.."
                  required
                />
              </div>
              <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>

              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </span>
                </div>
                <input
                  type="password"
                  v-model="user.password"
                  class="form-control"
                  placeholder="Password.."
                  :required="user.id==null"
                />
              </div>
              <div v-if="errors && errors.password" class="text-danger">{{ errors.password[0] }}</div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-cog fa-spin" v-show="loading"></i>
                <i class="fas fa-cog" v-show="!loading"></i>
                <span class="px-1">Save</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CONFIG from "../app";
export default {
  name: "UserComponent.vue",
  props: ["auth"],
  data() {
    return {
      path: CONFIG.PATH,
      loading: false,
      users: [],
      user: {
        id: null,
        name: null,
        email: null,
        password: null
      },
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
            "users?page=" +
            page +
            "&api_token=" +
            this.auth.api_token
        )
        .then(res => {
          this.users = res.data;
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
            "search/users?page=" +
            page +
            "&keywords=" +
            this.keywords +
            "&api_token=" +
            this.auth.api_token
        )
        .then(res => {
          this.users = res.data;
          this.loading = false;
        });
    },
    addEditUser(user = null) {
      this.loading = true;
      if (this.user.id) {
        axios
          .put(
            CONFIG.API_URL +
              "users/" +
              this.user.id +
              "?api_token=" +
              this.auth.api_token,
            this.user
          )
          .then(res => {
            this.loading = false;
            $("#addFeed").modal("hide");
            toastr["success"]("it's Updated!", "Success");
            this.getResults(1);
            this.clearFields();
          })
          .catch(error => {
            this.loading = false;
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
            } else {
              $("#addFeed").modal("hide");
              toastr["error"]("Unexpected Error??", "Error");
              this.clearFields();
            }
          });
      } else {
        axios
          .post(
            CONFIG.API_URL + "users" + "?api_token=" + this.auth.api_token,
            this.user
          )
          .then(res => {
            this.loading = false;
            $("#addFeed").modal("hide");
            toastr["success"]("it's Added!", "Success");
            this.getResults(1);
            this.clearFields();
          })
          .catch(error => {
            this.loading = false;
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
            } else {
              $("#addFeed").modal("hide");
              toastr["error"]("Unexpected Error??", "Error");
              this.clearFields();
            }
          });
      }
    },
    editUser(user) {
      this.user.id = user.id;
      this.user.name = user.name;
      this.user.email = user.email;
      $("#addFeed").modal("show");
    },
    removeUser(user) {
      this.loading = false;
      axios
        .delete(
          CONFIG.API_URL +
            "users/" +
            user.id +
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
    },
    clearFields() {
      this.user.name = this.user.email = this.user.password = null;
    }
  }
};
</script>

<style scoped>
</style>
