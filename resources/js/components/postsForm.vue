<template>
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h3 
        class="card-title"
        v-if="type=='add'"
        >Add Post ({{componentName.split('_').join(' ')}})
        </h3>
        <h3 
        class="card-title"
        v-if="type=='edit'"
        >Edit Post ({{componentName.split('_').join(' ')}})
        </h3>
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

            <form autocomplete="off">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Heading</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCity"
                    v-model="formData.heading"
                  >
                </div>
                <div class="form-group col-md-4">
                  <label for="">Sub Heading</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCity"
                    v-model="formData.sub_heading"
                  >
                </div>
                <div class="form-group col-md-4">
                  <label for="">Title</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCity"
                    v-model="formData.title"
                  >
                </div>
                <div class="form-group col-md-4">
                  <label for="">Sub Title</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCity"
                    v-model="formData.sub_title"
                  >
                </div>
                <div class="form-group col-md-4">
                  <label for="">Sub Title</label>
                  <Multiselect :options="typeOptions" v-model="formData.type" />
                </div>


                <div class="form-group col-md-4">
                  <label for="">Amount</label>
                  <input
                    type="number"
                    class="form-control"
                    id="inputCity"
                    v-model="formData.amount"
                  >
                </div>

                <div class="form-group col-md-12">
                  <label for="">Highlight</label>
                  <vue-editor v-model="formData.highlight" />
                </div>
                <div class="form-group col-md-12">
                  <label for="">Content</label>
                  <vue-editor v-model="formData.content" />
                </div>
                <div class="form-group col-md-12">
                  <label for="">Description</label>
                  <vue-editor v-model="formData.description" />
                </div>
                <div class="form-group col-md-12">
                  <label for="">Short Description</label>
                  <vue-editor v-model="formData.short_description" />
                </div>

                 <div class="form-group col-md-4">
                  <label for="">File</label>
                  <input
                    type="file"
                    class="form-control"
                    id="inputCity"
                    @change="onFileSelected"
                  >
                  <div id="preview" class="mt-3">
                    <img v-if="url" :src="url" />
                    <img v-else-if="formData.file_name" :src="`/cms/post?filename=${formData.file_name}`" />
                  </div>
                </div>
                <!-- <div class="form-group col-md-4">
                  <label for="">Content</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCity"
                    v-model="content"
                  >
                </div>
                <div class="form-group col-md-4">
                  <label for="">Description</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCity"
                    v-model="description"
                  >
                </div>
                <div class="form-group col-md-4">
                  <label for="">Short Description</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCity"
                    v-model="short_description"
                  >
                </div> -->

              </div>
              <button
                class="btn btn-primary"
                v-if="type=='add'"
                @click.prevent="addPost"
              >Save</button>
              <button
                class="btn btn-primary"
                v-if="type == 'edit'"
                @click.prevent="updatePost"
              >Udate</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import Multiselect from "vue-multiselect";
import "vue-multiselect/dist/vue-multiselect.min.css";
export default {
  components: {
    "vue-editor": VueEditor,
    Multiselect,
  },
  props: { componentName: null, type:{default:"add"} },
  data() {
    return {
      url:null,
      file : 0,
      typeOptions: ["Text", "Image", "Audio", "Video"],
      formData:{
        type:'',
        heading: "",
        sub_heading: "",
        title: "",
        sub_title: "",
        highlight: "",
        content: "",
        description: "",
        short_description: "",
        amount: "",
      }
    };
  },
  methods: {
      addPost() {
          let data = new FormData();
          data.append('file', this.file);
          data.append('data', JSON.stringify({...this.formData, component_name:this.componentName.split('_').join(' ')}));
          console.log(data);
          axios.post('/api/posts', data)
            .then(res => {
                 Swal.fire({
                    ...toast,
                    icon: "success",
                    title: res.data.message
                });
            })
            .catch(err => {
                console.log(err.response);
            })
      },
      onFileSelected(e) {
          this.file = e.target.files[0];
          this.url = URL.createObjectURL(this.file);
      },

      updatePost() {
          let data = new FormData();
          data.append('file', this.file);
          data.append('data', JSON.stringify({...this.formData, component_name:this.componentName.split('_').join(' ')}));
          console.log(data);
          axios.post(`/posts/edit/${this.$route.query.id}`, data)
            .then(res => {
                // console.log(res);
                Swal.fire({
                    ...toast,
                    icon: "success",
                    title: res.data.message
                });
            })
            .catch(err => {
                console.log(err.response);
            })
      },
  },
  mounted() {
    if(this.type === "edit") {
        let id = this.$route.query.id;
        console.log(id);
         axios.get(`/api/posts/${id}`)
        .then(res => {
            this.formData = res.data;
            console.log(res.data);
        //   this.post = res.data;
        })
        .catch(err => {
          console.log(err);
        })
    }
  }
};
</script>

<style scoped>
  #preview img {
    max-width: 100%;
    max-height: 500px;
  }
</style>
