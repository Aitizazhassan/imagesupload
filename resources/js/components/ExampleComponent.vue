<template>
    <div class="container">
        <div class="row justify-content-center mb-3 px-3 my-3" ref="imageupload">
            <div  class="col-12 rounded bg-dark py-3 my-3 text-white">
                Drag images Here !
            </div>
        </div>
    </div>
</template>

<script>
    import Dropzone from 'dropzone'
    export default {
        data: function(){
          return {
              dropzone: null
          }
        },
        mounted() {
            this.dropzone = new Dropzone(this.$refs.imageupload,{
                url: 'api/images'
            });
            console.log('Component mounted.')
        }
    }
</script>
