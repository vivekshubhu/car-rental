<template>
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">Posts</h3>
        <router-link :to="`/manage_posts/${componentName}/posts/${type}`">
          <button
            type="button"
            class="btn btn-info btn-flat v-btn-default"
            data-target="#handleComponent"
            data-toggle="modal"
          >
            <i class="fas fa-plus"></i>
            Posts
          </button>
        </router-link>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div
        id="example2_wrapper"
        class="dataTables_wrapper dt-bootstrap4"
      >
        <div class="row">
          <div class="col-sm-12 col-md-6"></div>
          <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table
              id="example2"
              class="table table-bordered table-hover dataTable dtr-inline"
              role="grid"
              aria-describedby="example2_info"
            >
              <thead>
                <tr role="row">
                  <th
                    class="sorting_asc"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-sort="ascending"
                    aria-label="Rendering engine: activate to sort column descending"
                  >SN</th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Browser: activate to sort column ascending"
                  >Heading</th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Platform(s): activate to sort column ascending"
                  >modify</th>
                </tr>
              </thead>
              <tbody v-if="posts.length">
                <tr
                  role="row"
                  class="odd"
                  v-for="(post, index) in posts"
                  :key="post.id"
                >
                  <td
                    tabindex="0"
                    class="sorting_1"
                  >{{index + 1}}</td>
                  <td class="text-capitalize">{{post.heading}}</td>
                  <td>
                    <div>
                      <router-link :to="`/manage_posts/${componentName}/posts/${type}/?id=${post.id}`">
                        <i class="fas fa-edit cr-pointer text-primary" @click="haldleEdit(post.id)"></i>
                      </router-link>
                      <i class="fas fa-trash-alt cr-pointer text-primary ml-3" @click="handleDelete(post.id)"></i>
                    </div>
                  </td>
                </tr>
              </tbody>
              <tbody v-else-if="!posts.length">
                <p>Posts Not Added</p>
              </tbody>
            </table>
            <!-- <div>
              <p>No Pots found</p>
            </div> -->
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div
              class="dataTables_info"
              id="example2_info"
              role="status"
              aria-live="polite"
            >Showing 1 to 10 of 57 entries</div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div
              class="dataTables_paginate paging_simple_numbers"
              id="example2_paginate"
            >
              <ul class="pagination">
                <li
                  class="paginate_button page-item previous disabled"
                  id="example2_previous"
                ><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="0"
                    tabindex="0"
                    class="page-link"
                  >Previous</a></li>
                <li class="paginate_button page-item active"><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="1"
                    tabindex="0"
                    class="page-link"
                  >1</a></li>
                <li class="paginate_button page-item "><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="2"
                    tabindex="0"
                    class="page-link"
                  >2</a></li>
                <li class="paginate_button page-item "><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="3"
                    tabindex="0"
                    class="page-link"
                  >3</a></li>
                <li class="paginate_button page-item "><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="4"
                    tabindex="0"
                    class="page-link"
                  >4</a></li>
                <li class="paginate_button page-item "><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="5"
                    tabindex="0"
                    class="page-link"
                  >5</a></li>
                <li class="paginate_button page-item "><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="6"
                    tabindex="0"
                    class="page-link"
                  >6</a></li>
                <li
                  class="paginate_button page-item next"
                  id="example2_next"
                ><a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="7"
                    tabindex="0"
                    class="page-link"
                  >Next</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</template>

<script>
export default {
  props: { componentName: null },
  data() {
    return {
      type:"add",
      posts:[],
      post:[],
    }
  },
  mounted() {
    this.getPosts(this.componentName);
  },
  watch :{
    componentName(newVal, oldVal) {
      this.getPosts(newVal, oldVal);
    }
  },
  methods: {
    getPosts(newVal, oldVal=this.componentName){
      // console.log(newVal);
       axios.get(`/api/posts/?component_name=${newVal.split('_').join(" ")}`)
      .then(res => {
        this.posts = res.data;
          // console.log(res.data);
      })
      .catch(err => {
          console.log(err);
      })
    },
    handleDelete(id) {
      axios.delete(`/api/posts/${id}`)
        .then(res => {
            Swal.fire({
                ...toast,
                icon: "success",
                title: res.data.message
            });
        })
        .catch(err => {
          cosole.log(err);
        })
    },
    haldleEdit(id){
      this.type = "edit"
    }
  }
};
</script>
