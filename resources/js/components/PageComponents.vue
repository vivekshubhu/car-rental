<template>
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">Components</h3>
        <button
          type="button"
          class="btn btn-info btn-flat v-btn-default"
          data-target="#handleComponent"
          data-toggle="modal"
          @click="openModal"
        >
          <i class="fas fa-plus"></i>
          Component
        </button>
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
              v-if="components.length"
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
                  >Name</th>
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
              <tbody>
                <tr
                  role="row"
                  class="odd"
                  v-for="(component, index) in components"
                  :key="index"
                >
                  <td
                    tabindex="0"
                    class="sorting_1"
                  >{{index+1}}</td>
                  <td>{{component.name}}</td>
                  <td>
                    <div>
                      <i
                        class="fas fa-trash-alt cr-pointer text-primary ml-3"
                        @click="handleDelete(component.id)"
                      ></i>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div v-else-if="!components.length">
              <p>No records found</p>
            </div>
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

    <!-- modal -->
    <div
      class="modal fade"
      id="handleComponent"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
      :class="[!closeModal ? 'show' : '']"
    >
      <div
        class="modal-dialog modal-dialog-centered"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLongTitle"
            >Add Component</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal py-3">
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Select</label>
                  <Multiselect
                    v-model="formData.name"
                    :options="componentsName"
                  >
                  </Multiselect>
                </div>

                <div class="form-group input-group-sm col-md-12">
                  <div class="">
                    <label for="seqNo">Sequence No.</label>
                    <input
                      type="number"
                      class="form-control"
                      id="seqNo"
                      v-model="formData.seq_no"
                    >
                  </div>
                </div>
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >Close</button>
            <button
              type="button"
              class="btn btn-primary"
              @click="handleClick"
            >Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /modal -->
  </div>
</template>

<script>
// import "vue-multiselect/dist/vue-multiselect.css";
import Multiselect from "vue-multiselect";
import "vue-multiselect/dist/vue-multiselect.min.css";
export default {
  components: { Multiselect },
  props: {pageId:{}},
  data() {
    return {
      // selected: null,
      // pageId:this.$route.query.pageId,
      closeModal : true,
      componentsName: [],
      components: [],
      formData: {
        name: "",
        seq_no: null,
        pageId: null
      }
    };
  },
  mounted() {
    //  console.log(pageId);
    axios
      .get("/scan_components")
      .then(({ data }) => {
        this.componentsName = Object.values(data);
      })
      .catch(error => {
        console.log(error);
      });
    // if(pageId){
    //   console.log(pageId);
    // }
     axios
        .get(`/api/pages/${this.pageId}`)
        .then(res => {
          // console.log(res.data);
          this.components = res.data;
        })
        .catch(err => console.log(err));
  },
  watch: {
    // pageIds:this.$route.
    pageId(newVal, oldVal) {
      axios
        .get(`/api/pages/${newVal}`)
        .then(res => {
          // console.log(res.data);
          this.components = res.data;
        })
        .catch(err => console.log(err));
      this.formData.pageId = newVal;
    }
  },
  methods: {
    handleClick() {
      this.closeModal = false;
      axios
        .post("/api/components", this.formData)
        .then(res => {
          this.$emit('hide');
          // this.closeModal = true;
          Swal.fire({
            ...toast,
            icon: "success",
            title: res.data.message
          });
        })
        .catch(err => {
          if(err.response.status == 400) {
            Swal.fire({
              ...toast,
              icon: "error",
              title: err.response.data.message
            });
          }
           Swal.fire({
            ...toast,
            icon: "error",
            title: err.response.data.name[0]
          });
        });
    },
    handleDelete(componentId) {
      axios.delete(`/api/components/${componentId}/?pageId=${this.formData.pageId}`)
      .then(res => {
        Swal.fire({
          ...toast,
          icon: "success",
          title: res.data.message
        });
      })
      .catch(err => console.log(err));
    },
    openModal() {
      this.closeModal = false;
    }
  }
};
</script>  

<style scoped>
</style>