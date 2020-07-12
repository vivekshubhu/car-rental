<template>
  <div
    class="tab-pane active"
    id="pages"
  >
    <div>
      <form
        class="form-horizontal py-3"
        @submit.prevent="addPage()"
      >
        <div class="input-group input-group-sm mb-0">
          <input
            class="form-control form-control-sm"
            :class="[Object.keys(errors.add).length ? 'is-invalid' : '']"
            v-model="name"
            placeholder="Page name"
          >
          <div class="input-group-append">
            <button
              type="submit"
              class="btn btn-info btn-flat v-btn-default"
            >Add</button>
          </div>
        </div>
      </form>
      <ul class="list-group list-group-unbordered pb-3">
        <div
          v-for="(page, index) in pages"
          :key="index"
        >
          <router-link :to="`/manage_posts/pages/${pageId}`" >
         <!-- <router-link
          to="/manage_posts/pages/pageId"
          class="nav-link p-0"
        > -->
          <li class="list-group-item" v-if="clickedId!==page.id" @click="getComponents(page.id)">
            <div class="d-flex justify-content-around">
              <div>
                <b>{{page.name}}</b>
              </div>
              <div>
                <i
                  class="fas fa-edit cr-pointer text-primary"
                  @click="handleUpdate(page)"
                ></i>
                <i
                  class="fas fa-trash-alt cr-pointer text-primary ml-3"
                  @click="handleDelete(page.id)"
                ></i>
              </div>
            </div>

          </li>
         </router-link>
          <div v-if="clickedId===page.id">
            <form
              class="form-horizontal py-3"
              @submit.prevent="updatePage(clickedId)"
            >
              <div class="input-group input-group-sm mb-0">
                <input
                  class="form-control form-control-sm"
                  :class="[Object.keys(errors.update).length ? 'is-invalid' : '']"
                  v-model="name"
                  placeholder="Page name"
                >
                <div class="input-group-append">
                  <button
                    type="submit"
                    class="btn btn-info btn-flat v-btn-default"
                  >Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </ul>
    </div>
  </div>
</template>

<script>
import { getConfirmation } from "../helper";
export default {
  data() {
    return {
      pageId:null,
      name: "",
      errors: {add:{}, update:{}},
      pages: [],
      clickedId: null
    };
  },
  mounted() {
    axios
      .get("/api/pages")
      .then(({ data }) => {
        console.log(data);
        this.pages = data;
      })
      .catch(error => {
        console.log(error);
      });
  },
  methods: {
    addPage() {
      axios
        .post("/api/pages", { name: this.name })
        .then(response => {
          console.log(response.data);
          this.name = "";
          this.errors.add = {};
          Swal.fire({
            ...toast,
            icon: "success",
            title: response.data.success
          });
          // console.log(response);
        })
        .catch(error => {
          console.log(error.response.data);
          this.errors.add = error.response.data;
          Swal.fire({
            ...toast,
            icon: "error",
            title: error.response.data.name[0]
          });
        });
    },
    handleDelete(pageId) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
          if(result.value){
            axios
              .delete(`/api/pages/${pageId}`)
              .then(res => {
                Swal.fire({
                  ...toast,
                  icon: "success",
                  title: res.data.message
                });
              })
              .catch(err => console.log(err));
          }
        })
    },
    handleUpdate(page) {
      this.clickedId = page.id;
      this.name = page.name;
    },
    updatePage(pageId) {
      axios.put(`/api/pages/${pageId}`, {name:this.name})
        .then(res => {
          // console.log(res.data);
          // let page = this.pages.find((page) => page.id === res.data.page.id);
          // // console.log(page);
          // page = res.data.page;
          this.clickedId = false;
           Swal.fire({
            ...toast,
            icon: "success",
            title: res.data.message
          });
        })
        .catch(err => {
          this.errors.update = err.response.data;
           Swal.fire({
            ...toast,
            icon: "error",
            title: err.response.data.name[0]
          });
        });
    }, 
    getComponents(pageId) {
     this.pageId = pageId;
    //  this.$router.push({ path: 'pages', params: { pageId: pageId }})
      // this.$emit('clicked', pageId);
    
    }
  }
};
</script>

<style scoped>
.flex {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
}

@media (max-width: 991.98px) {
  .padding {
    padding: 1.5rem;
  }
}

@media (max-width: 767.98px) {
  .padding {
    padding: 1rem;
  }
}

.padding {
  padding: 5rem;
}

.list-group > li {
  padding: 10px;
}
/* 
.list-group :hover {
  cursor: pointer;
  background-color: #d2d6da;
} */

.form-control.form-control-sm {
  padding: 17px !important;
}
</style>