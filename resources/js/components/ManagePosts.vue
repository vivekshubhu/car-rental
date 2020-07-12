<template>
    <div class="container">
        <div class="row pt-4">
            <to-do />
            <div class="col-md-9">
                <!-- <page-components v-bind:pageId = "pageId" /> -->
                <router-view  />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data(){
            return{
                pageId :null,
            }
        },

        methods:{
            // getPageId (pageId) {
            //     console.log(pageId);
            //     this.pageId = pageId;
            // }
        }
    }
</script>

<style scoped>

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }
</style>
