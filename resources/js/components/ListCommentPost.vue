<template>
    <div class="post-relate comment1">
        <div class="relate-header">
            <h5> Các bình luận </h5>
        </div>

        <div class="row"  v-for="item in commentPosts" :key="item.id">
            <div>
                <div class="cmt-item">
                    <div class="cmt1">
                        <div class="cmt1-img">
                            <img :src="item.avatar" alt="">
                        </div>
                        <div class="name">
                            <label for=""> {{ item.name }} </label> 
                            <label for=""> @{{ item.user_web }} </label> 
                        </div>
                    </div>
                    <div class="cmt2">
                        <p class="cmt2-info"> 09/08/2021 21:45 PM  </p>
                    </div>
                </div>
                <div class="cmt1-content">
                    <label> {{ item.content }} </label> 
                </div>
                <div class="cmt1-control">
                    <label>Trả lời | Thích | Báo cáo</label> 
                </div>
            </div>
        </div>


        <div class="comment-null" v-if="commentPosts[0] == null">
            <h3>Chưa có bình luận nào. </h3>
        </div>



    </div>
</template>

<script>
export default {

    data(){
        return{
            commentPosts: [],
            error: '',
            componentKey: 0,
        }
    },
    created(){
        this.getCommentPostByIdPost();
    },

    methods: {
        getCommentPostByIdPost: function(){
            axios.get("/api/comment-post/"+this.$route.params.id)
                .then(res => {
                    // console.log(res);
                    if(res.data.status == true){
                        this.commentPosts = res.data.CommentPosts;

                        // console.log(this.commentPosts);
                    }else{
                        
                        this.error = res.data.message;
                        // console.log(this.error);
                    }
                });

        },


    },
}
</script>

<style scoped>

    .comment-null{
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
        text-align: center;
        margin-top: 40px;
        margin-left: 20%;

    }

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

</style>