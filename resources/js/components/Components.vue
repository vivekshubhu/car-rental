<template>
    <div class="timeline timeline-inverse mb-0">
        <ul class="list-group list-group-unbordered py-3">
          <div v-for="component in componentsName" :key="component.id">
             <router-link
                :to="`/manage_posts/components/${componentName}`"
                class="nav-link p-0"
              >
            <li class="list-group-item" @click="handleClick(component)">
                <b>{{component}}</b> 
            </li>
             </router-link>
          </div>
        </ul>
    </div>
</template>

<script>
    export default {
      data() {
        return {
          componentName : '',
          componentsName:[],
        }
      },
       mounted() {
          //  console.log(pageId);
          axios
            .get("/scan_components")
            .then(({ data }) => {
              // console.log(data);
              this.componentsName = Object.values(data);
            })
            .catch(error => {
              console.log(error);
            });
        
      },
      methods: {
        handleClick(componentName) {
          this.componentName = componentName.split(' ').join('_');
        }
      }
    }
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

.list-group li{
    padding: 10px;
}

.list-group :hover{
    cursor: pointer;
    background-color: #d2d6da;
}

.form-control.form-control-sm{
    padding :17px!important;
}
</style>