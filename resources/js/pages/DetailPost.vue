<template>
    <div>
        <!-- <img class="baner" src="/storage/img/logo3.png" alt=""> -->
        <img class="baner" src="https://res.cloudinary.com/dm9r6ilqz/image/upload/v1634056288/Lazy/logo3_xofees.png" alt="">
        <div class="noti "> 
            <h5 class="fb"><a href="https://fb.com"> >>&ensp;LEWANDOWSKI&ensp;>>&ensp;Tham gia Facebook group "Lazy Community" để cùng nhau học tập và kết nối&ensp;>> </a> 
                <router-link to="/post-up">
                    <button class="write-post"> Viết bài</button>
                </router-link>
            </h5>
        </div>


        <div class="overall">


            <div class="container">
                <div class="row pt-3 pb-1">
                    <div class="col-lg-9 pl-md-0 div-left"> 

                        <div class="control">
                            <div class="control-img">
                                <img :src="post.user_avatar" alt="Avatar Author">
                            </div>

                            <VotePost> </VotePost>

                            <div class="border icon">
                                <p class="p-icon icon-bookmark"><font-awesome-icon class="icon" icon="bookmark" size="1x" :style="{ color: '#9b9b9b' }"/></p>
                            </div>

                            <div class="border icon">
                                <h3>f</h3>
                            </div>

                        </div>







                        <div class="test"   id="style-1">
                            <div class="content">
                                <div class="content-header">
                                    <div class="header-img">
                                        <img :src="post.user_avatar" alt="Avatar Author">
                                    </div>


                                    <div class="header-controler">
                                        <div class="p-icon controler-header"> 
                                            <label class="h-name">

                                                <router-link class="h-name" :to="'/account/'+post.user_id">
                                                    {{post.user_name}}
                                                </router-link>
                                                
                                            </label> 
                                            <label class="h-mail"> @{{ post.user_web }} </label> 

                                            <button class="btn-follow"  v-on:click="follow"> 
                                                <router-link :to="'/account/'+post.user_id">
                                                    Follow 
                                                </router-link>
                                            </button>
                                            
                                        </div>

                                        <div class="controler-control">
                                            <div class="div-icon">
                                                <font-awesome-icon class="icon  controler-icon" icon="star" size="1x" :style="{ color: '#9b9b9b' }"/> -1
                                            </div>
                                            
                                            <div class="div-icon">
                                                <font-awesome-icon class="icon  controler-icon" icon="user-plus" size="1x" :style="{ color: '#9b9b9b' }"/> -1
                                            </div>                                        
                                            
                                            <div class="div-icon">
                                                <font-awesome-icon class="icon  controler-icon" icon="pen-alt" size="1x" :style="{ color: '#9b9b9b' }"/> -1
                                            </div>                                    
                                        
                                        </div>
                                    </div>

                                    <div class="info-post">
                                        <p class="date">Đã đăng vào {{ post.time_before }} giờ trước - 8 phút đọc</p>
                                        
                                        <div class="controler-control info-post2">
                                            <div class="div-icon ">
                                                <font-awesome-icon class="icon  controler-icon" icon="eye" size="1x" :style="{ color: '#9b9b9b' }"/> {{ post.number_view }}
                                            </div>
                                            
                                            <div class="div-icon div-icon2">
                                                <font-awesome-icon class="icon  controler-icon" icon="comments" size="1x" :style="{ color: '#9b9b9b' }"/> {{ post.number_comment }}
                                            </div>                                        
                                            
                                            <div class="div-icon div-icon2">
                                                <font-awesome-icon class="icon  controler-icon" icon="bookmark" size="1x" :style="{ color: '#9b9b9b' }"/> {{ post.bookmark }}
                                            </div>                                    
                                        
                                        </div>
                                        
                                    </div>


                                </div>

                                <!-- end header -->

                                <div class="post-content">


                                <p class="p-title"> {{ post.title }}  {{post.catch}} </p>


                                
                                <div v-html="post.content_html"></div>
                                
                                <div class="bottom-border-content"></div>

                                <p>Tài liệu tham khảo</p>
                                <p><a href="">https://aws.amazon.com/premiumsupport/knowledge-center/s3-upload-large-files/</a></p>
                                <p><a href="">https://aws.amazon.com/premiumsupport/knowledge-center/s3-upload-large-files/</a></p>
                                <p><a href="">https://aws.amazon.com/premiumsupport/knowledge-center/s3-upload-large-files/</a></p>
                                
                                </div>


                            </div>
                            <!-- <div class="force-overflow"></div> -->
                        </div>


                        

                        

                    </div>
                                
                    <!-- end =================================== -->
                        

                    <!-- <div id="new-question" class="col-lg-3 hidden-md-down px-0 new-questionn">
                        <h6 class="title-new"> __CÂU HỎI MỚI NHẤT ______________</h6>

                        <div class=" new-question scrollbar "  id="style-1">

                            <div class="new-question-item">
                                <h6 class="new-question-question">
                                    - Lệnh npm tự động check gói package không được sử dụng và tự remove nó đi
                                </h6>

                                <div class="post-status new-question-status">
                                    <div class="post-status-icon"><font-awesome-icon icon="plus-square" /> 13 </div>

                                        <div class="post-status-icon"><font-awesome-icon icon="plus-square" /> 0 </div>

                                        <div class="post-status-icon"><font-awesome-icon icon="plus-square" /> 2 </div>

                                        <div class="post-status-icon"> -  by: Tiến Long </div>
                                </div>
                            </div>

                            <div class="force-overflow"></div>
                        </div>

                    </div> -->
                    
                    <TopPosts/>

                    <!-- end ============================================================================= -->
                    <div class="post-relate">
                        <div class="relate-header">
                            <h5> Bài viết liên quan </h5>
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="card relate-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card relate-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card relate-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>
                            </div>

                        

                        </div>



                    </div>
                    <!-- end relate   -->

                    <!-- start comment  -->
                    <div class="component-comment">
                        <CommentPostComponent> </CommentPostComponent>

                    </div>

                    <!-- end comments  1    -->


                </div>
            </div>


                
        </div>
    </div>
</template>

<script>
    import CommentPostComponent from "../components/CommentPost.vue"
    import VotePost from "../components/VotePost.vue"
    import TopPosts from '../components/TopPosts.vue'
    
    export default {
        name: 'post-detail',
        components:{
            CommentPostComponent,
            VotePost,
            TopPosts,
        },

        data() {
            return{
                test : 4,
                post:{
                    catch : ''
                },


            }
        },

        created(){
            this.getPostById();
        },

        methods:{
            getPostById: function() {
                axios.get("/api/post/"+this.$route.params.id)
                .then(res => {
                    console.log(res.data);
                    if(res.data.status == true){
                        this.post = res.data.post;
                    }else{
                        // window.location.href = '/error';                        
                        this.post.catch = res.data.message;
                        
                    }
                });
            },

            follow: function(){
                this.test += 1;
                console.log(this.test);
            }


        }
        
    }
</script>

<style scoped>

    .content{ 
        padding-left: 50px;
    }

    .component-comment{
        margin-top: 50px;
        margin-bottom: 200px;
        padding-left: 70px;
    }



    .relate-card{
        border: 1px solid #9d9d9d !important;
        margin-top: 10px;
    }

    .relate-header h5{
        font-weight: bold;
    }

    .post-relate{
        width: 100%;
        margin-top: 8%;
        padding-left: 60px;
    }

    .control {position:fixed; top:0px; left:0; width:10%; height:100%; background:#EEE; overflow:auto;}
    .test {width:100%; padding-left:0%;}



    @media screen and (max-height:200px){
        .control {color:blue; font-size:50%;}
    }

    @media screen and (max-width:100px){
        .test {color:blue; font-size:50%; margin-left: 100px;}
        .content{ margin-left: 100px;}
    }

    @media screen and (min-width:1000px){
        .content{ margin-left: 60px;}
        
    }

    @media screen and (min-width:800px){
        .content{ margin-left: 60px;}
    }

    @media screen and (min-width:400px){
        .content{ margin-left: 60px;}
    }

    @media screen and (max-width:1200px){
        .post-relate{margin-left: 60px}
        .controler-control{margin-left: 100px;}
        
    }

    @media screen and (max-width:990px){
        #new-question{width: 100% !important;margin-left: 60px;margin-top: 20px ;}
        
    }

    @media screen and (min-width:1100px){
        .card-header {color:blue; font-size:100%; margin-left: 100px; }
    }


</style>

<style>
    blockquote {
        border-left: 4px solid #ccc;
        margin-bottom: 5px;
        margin-top: 5px;
        padding-left: 16px;
        font-style: italic;
        background: rgb(252, 252, 248);
        margin-bottom: 0 !important;
        margin-top: 0 !important;
        padding-top: 2px;
        padding-bottom: 3px;
        font-size: 13px;
    }

    .ql-syntax{
        background: #f1f2f3 !important;
        color: black !important;
        padding: 10px 0px 10px 0px;
        font-size: 13px;
    }
    p img{
        width: 80% !important;
        height: 80% !important;
        /* max-width: 600px !important;
        max-height: 600px !important; */
        display: block;
        margin-left: auto;
        margin-right: auto;

    }

    .post-content h2{
        font-size: 1.4rem !important;
    }
</style>

<style scoped>

    ::v-deep h2 span {
        font-size: 19px;
    }

    ::v-deep p span {
        font-size: 13px;
    }


    .scrollbar {
        overflow-y: scroll;
        float: left;
        height: 700px;
    }

    .force-overflow {
        min-height: 550px;
    }
    #style-1::-webkit-scrollbar {
        width: 1px;
        background-color: #F5F5F5;
    } 
    #style-1::-webkit-scrollbar-thumb {
        background-color: #d9d9d9;
    }

    .p-title{
        font-size: 23px;
        font-weight: bold;
    }

    .bottom-border-content{
        margin-top: 40px;
        border-bottom: 1px solid #9d9d9d;
    }

    .icon:hover{
        color: red !important;
    }

    .border h3:hover{
        color: red;
    }



    .test{
        display: flex;
    }


    .post-content{
        margin-top: 25px;
        padding-left: 20px;
    }

    .div-icon2{
        margin-left: 10%;
        
    }

    .date{
        height: 20px;
        margin-bottom: 0px;
        font-size: 13px;
    }


    .info-post{
        width: 50%;
    }

    .info-post .info-post2{
        float: right !important;
        clear: both !important;
        margin-right: 38px ;
    }


    .info-post p{
        float: right;
        clear: both !important;
        color: #336699;
    }

    .div-icon{
        display: flex;
        margin-right: 8%;
        font-size: 12px;
    }

    .controler-icon{
        margin-left: 0px !important;
        margin-right: 4px !important;
    }

    .controler-control{
        display: flex;
        margin-top: 10px;
    }

    .controler-header{
        display: flex;
    }

    .content-header {
        display: flex;
    }

    .header-img{
        margin-right: 15px;
    }

    .header-img img{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: block;

    }

    .controler-header .h-name{
        margin-left: 0px !important;
        color: red !important;
        font-weight: bold;
        width: 140px;
        font-size: 13px;
    }

    .controler-header .h-mail{
        margin-left: 10px !important;
        font-size: 13px;
    }

    .btn-follow{
        height: 18px;
        width: 62px;
        border-radius: 5px;
        font-size: 11px !important;
        border: 1px solid #9d9d9d;
        background-color: #fff;
        margin-left: 30px;
    }
    .btn-follow a{
        color: black !important;
        
    }

</style>

<style scoped>
    .overall{
        margin-top: 4%;
    }

    .div-left{
        display: flex;
    }

    .control{
        width: 8%;
        /* background-color:papayawhip; */
        justify-content: center;
        padding-top: 30px;
    }

    .content{
        width: 100%;
        /* background-color: papayawhip; */
    }


    .control .control-img img{
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: block;
        margin-left: auto;
        margin-right: auto;

    }

    .icon{
        display: block;
        margin-left: auto;
        margin-right: auto;

    }

    .p-icon{
        margin-bottom: 0px;

    }

    .control-vote{
        margin-top: 30%;
    }

    .number-vote{
        color: #9d9d9d;
        font-size: 21px;
        font-weight: bold;
        text-align: center;
        font-family: "Times New Roman", Times, serif;

        margin-top: -10px;
        margin-bottom: -10px;
    }

    .number-vote div{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .icon-bookmark{
        margin-top: 30%;
    }

    .border{
        border: 1px solid #9d9d9d;
        width: 40px;
        height: 40px;
        background-color:#F5F5F5;
        border-radius: 50%;
        margin-top: 20%;
    }

    .border h3{
        text-align: center;
        margin-top:5px;
        font-weight: bold;
        color: #9d9d9d;
    }





</style>


<style scoped>  
    .scrollbar {
        overflow-y: scroll;
    }

    .force-overflow {
        min-height: 550px;
    }
    #style-1::-webkit-scrollbar {
        width: 4px;
        background-color: #F5F5F5;
    } 
    #style-1::-webkit-scrollbar-thumb {
        background-color: #d9d9d9;
    }

    .container {
        border: none !important;
    }

    .new-question{
        height: 400px;
        padding-left: 20px;
        /* overflow: auto; */
        /* overflow-y: 2px; */
    }

    .post-status-icon{
        display: inline-block;
        font-size: 13px;
        color: #9b9b9b;
        margin-right: 15px;
    }

    label{
        height: 10px;
        margin-left: 10%;
        color: #9b9b9b;
    }

    h6{
        color: blue;
        font-weight: bold;
    }
    .title-new{
        margin-left: 8%;
    }

    .new-question-question{
        font-size: 15px;
        color: black !important;
    }

    .new-question-status{
        margin-top: 7px;
        /* margin-left: 10%; */
        font-size: 14px;
    }

    .new-question-item{
        border-bottom: 1px solid #d6d6d7;
        margin-bottom: 14px;

    }



</style>


<style scoped>
    .noti h5 a{
        color: #fff !important;
        font-size: 13px;
    }

    .write-post{
        margin-left: 13%;
        font-size:12px;
        font-weight: bold;
        height: 24px !important;
        width: 90px;
        color: rgb(20, 61, 28);
        background: rgb(226, 206, 206);
        border-radius: 10px;  

    }
    .noti{
        width: 100%;
        height: 35px;
        background: #660033;
        padding-top: 5px;
    }
    .fb{
        color: #fff !important;
        text-align: center;
    }
    
    .baner{
        width: 100%;
    }
</style>