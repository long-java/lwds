<template>
    <div>
        <div class="post-relate comment">
            <div class="relate-header">
                <h5 v-if="token != null"> Viết bình luận </h5>
                <h5 v-else> Hãy đăng nhập để có thể bình luận !!! </h5>
            </div>

            <div class="row">
                <label for="" class="error"> {{ error }}</label>
                <textarea name="" id="" cols="145" rows="7" class="text-comment" v-model="commentPost.content">


                </textarea>

                <button v-if="token != null" class="submid-comment btn btn-danger" @click="submitComment" >
                    Submit
                </button>

                <button v-else  class="submid-comment btn btn-danger" disabled  >
                    Submit
                </button>
                
            </div>
        </div> 

        <!-- end comments     -->

        <listCommentPost :key="componentKey"> </listCommentPost>
    </div>
</template>

<script>
    import listCommentPost from './ListCommentPost.vue'

export default {

    components: {
        listCommentPost,
    },

    name: 'comment_post',

    data(){
        return{
            commentPost: {
                content: ''
            },
            error: '',
            componentKey: 0,

            'token': localStorage.getItem('token'),

        }
    },

    // created(){
    //     this.getCommentPostByIdPost();
    // },

    methods: {
        submitComment: function(){
            axios.post("/api/comment-post/"+this.$route.params.id,
                { 
                    content: this.commentPost.content,
                    headers:{
                                // Authorization: 'Bearer ' + localStorage.getItem('token'),
                                // 'Content-Type': 'application/x-www-form-urlencoded',
                                // "Access-Control-Allow-Origin": "*",
                                // "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
                            }
                    }
                )
                .then(res => {
                    
                    if(res.data.status == true){
                        this.componentKey += 1;
                        this.error = "Successfully submitted !!!"
                    }else{                       
                        // this.error = res.data.message;
                        this.error = "Comment can not be null !!!";
                        
                    }



                }); 
        }
    },

}
</script>

<style scoped>
    .submid-comment{
        margin-left: 87%;
        margin-top: 10px;
        width: 140px;
        height: 40px;
    }

    .comment1 .row{
        border: 1px solid #d6d6d7 !important;
        /* height: 150px; */
        padding: 10px 10px 0px 10px;
        margin-top: 20px;
    }

    .comment1{
        margin-top: 30px;
    }

    .cmt1 img{
        width: 25px;
        height: 25px;
        border-radius: 50%;
    }

    .cmt1{
        display: flex;
    }

    .cmt-item{
        display: flex;
    }

    .cmt1-img{
        margin-right: 12px;
    }

    .cmt2{
        z-index: 10;  
        position: absolute;  
        right: 14%;  
    }

    .cmt1-content{
        display: block !important;
        margin-left: 37px;
    }

    .cmt1-control{
        margin-left: 37px;
    }

    .relate-header h5{
        font-weight: bold;
    }

    .error{
        margin-left: 20px;
        color: red;
        font-style: italic;
    }
    

</style>