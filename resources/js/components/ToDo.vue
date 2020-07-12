<template>
  <div class="card col-md-3">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <!-- <router-link
          to="/manage_posts/pages"
          class="nav-link p-0"
        > -->
          <li class="nav-item px-3 py-2" @click="pageClicked"
           :class="pageActive ? 'active-tab':''"><a
            >Pages</a></li>
        <!-- </router-link> -->
        <!-- <router-link
          to="/manage_posts/components"
          class="nav-link p-0 ml-3"
        > -->
          <li class="nav-item px-3 py-2" @click="componentClicked"
           :class="!pageActive ? 'active-tab':''"><a
            >Components</a></li>
        <!-- </router-link> -->
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body p-0">
      <div class="tab-content">
        <div
        v-show="pageActive"
        >
          <!-- <page @clicked="getPageId($event)" /> -->
          <page />
        </div>
        <div
        v-show="!pageActive"
        >
          <components />
        </div>
      
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pageId:null,
      pageActive:true,
      name: "",
      errors: {},
      pages: []
    };
  },
  mounted() {
    axios
      .get("/page")
      .then(({ data }) => {
        this.pages = data;
      })
      .catch(error => {
        console.log(error);
      });
  },
  methods: {
    addTask() {
      axios
        .post("api/pages", { name: this.name })
        .then(response => {
          console.log(response.data);
          this.name = "";
          this.errors = {};
          Swal.fire({
            ...toast,
            icon: "success",
            title: response.data.success
          });
          console.log(response);
        })
        .catch(error => {
          console.log(error.response.data);
          this.errors = error.response.data;
          Swal.fire({
            ...toast,
            icon: "error",
            title: error.response.data.name[0]
          });
        });
    },
    getPageId(value) {
      this.pageId = value;
      // this.$emit("clicked", value);
    },
    pageClicked() {
      this.pageActive = true;
    },
    componentClicked() {
      this.pageActive = false;
    }
  }
};
</script>

<style scoped>
  /* .router-link-exact-active  {
  } */
  .active-tab {
    background-color: #3490dc;
    color: #fff;
  }

</style>

