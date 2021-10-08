<template>
    <div>

         <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <!-- body -->
                    <div class="overall">
                        <div class="title">


   
                        </div>


                    </div>


                <!-- End body  -->

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="button" class="btn btn-primary"  @click="updatePost(id_edit); checkForm()">Save changes</button>
                </div>
            </div>
            </div>
        </div>

        <!-- End Model -->

        <button @click=edit()> Click</button>

        <div id="to-hover">
           111111 <div id="to-show"> 2222222222 </div> 
        </div>


          <div class="container">
            <h3>Popover Example</h3>
            <a href="#" title="Header" data-toggle="popover" data-trigger="hover" data-content="Some content">Hover over me</a>
        </div>


        
    </div>
</template>

<script>
    export default {
        name: 'exam',
        components:{
            
        },

        data(){
            return{

            }
        },

        created(){

        },
        
        methods:{
            //Click show page edit
            edit: function(id){
                $('#post').modal('show');
            },

        }

    }
</script>

// <script>
// $(document).ready(function(){
//     $('[data-toggle="popover"]').popover();   
// });
// </script>

<style scoped>
    #to-show {
        display: none;
    }
    #to-hover:hover > #to-show {
        display: block; 
    }
</style>
