<template>
    <div class="ov">



        <!-- <img class="baner" src="/storage/img/logo3.png" alt=""> -->

        <img class="baner" src="https://res.cloudinary.com/dm9r6ilqz/image/upload/v1634056288/Lazy/logo3_xofees.png" alt="">


        <div class="noti "> 
            <h5 class="fb"><a href="https://fb.com"> >>&ensp;LEWANDOWSKI&ensp;>>&ensp;Tham gia Facebook group "Lazy Community" để cùng nhau học tập và kết nối&ensp;>> </a> 
                <router-link to="/post-up">
                    <button class="write-post"> Viết bài</button>
                </router-link>
            </h5>
        </div>



        <div class="menu" v-if="isAuthenticated==1">
            <div class="menu-item" :class="[ isActiveNews ? 'active' : '', '' ]"  @click="news()">
                <label> Mới Nhất </label>
            </div>
            <div class="menu-item" :class="[ isActiveFollow ? 'active' : '', '' ]"   @click="follow()">
                <label> Đang theo dõi </label>
            </div>
        </div>




        <div class="container">
            <div class="row pt-3 pb-1">
                <div class="col-lg-9 pl-md-0 posts"> 

                    <div class="post-item " v-for="(item, index) in posts" :key="index" >
                        <div class="post-img">
                            <img :src="item.avatar" alt="">
                        </div>

                        <div class="post-content">
                            <p class="post-name">

                                <router-link :to="'account/'+item.users.id">
                                    {{item.name}}
                                </router-link>

                                <label class="time-before"> {{item.time_before}} giờ trước 
                                    <!-- -  3 phút đọc -->
                                </label>  
                            </p>

                            <!-- <router-link class="link-detail" :to="'/detail-post/' + item.id">
                                <div class="post-question">
                                    <p class="post-question-title">{{ item.title }} </p>
                                    <div class="post-null"> </div>

                                    <div class="post-tag" v-for="(tag, index) in item.tags" :key="index"> {{tag.text}} </div>

                                </div>
                            </router-link> -->

                            <div class="link-detail">
                                <div class="post-question">

                                    <router-link class="link-detail" :to="'/detail-post/' + item.id">
                                        <p class="post-question-title">{{ item.title }} </p>
                                    </router-link>

                                    <div class="post-null"> </div>

                                    <div class="post-tag" v-for="(tag, index) in item.tags" :key="index"> 
                                        
                                        <router-link class=""
                                            :to="'/tag/' + tag.id" >  #{{ tag.text }}
                                        </router-link>


                                    </div>
                                    
                                </div>
                            </div>

                            <div class="post-status"> 
                                <div class="post-status-icon">
                                    <font-awesome-icon class="icon  controler-icon" icon="eye" size="1x" :style="{ color: '#9b9b9b' }"/> {{item.number_view}} </div>

                                <div class="post-status-icon">
                                    <font-awesome-icon class="icon  controler-icon" icon="bookmark" size="1x" :style="{ color: '#9b9b9b' }"/> {{item.bookmark}} </div>

                                <div class="post-status-icon">
                                    <font-awesome-icon class="icon  controler-icon" icon="comments" size="1x" :style="{ color: '#9b9b9b' }"/> {{ item.number_comment }} </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="comment-null" v-if="posts[0] == null">
                        <h3>không có Posts nào để hiển thị... </h3>
                    </div>
                    
                </div>

                
                <!-- end =================================== -->

                


                <TopPosts/>

            </div>

        </div>
        

    </div>
</template>


<script>
    import TopPosts from '../components/TopPosts.vue'
    export default {
        name: 'posts',
        components:{
            TopPosts
        },

        props: ['search'], 
        
        data() {
            return{
                posts: [],
                idTag: 'home',
                isFollow: '',
                isActiveNews: true,
                isActiveFollow: false,
                isAuthenticated: false,
            }
        },

        watch: { 
            search: function(newVal, oldVal) { // watch it
                console.log('Prop changed: ', newVal, ' | was: ', oldVal);

                this.getAllPosts();
            }
        },

        created(){
            
            if(this.$route.params.id != null){
                this.idTag = this.$route.params.id;
            }

            this.getAllPosts()
            this.checkAuthenticated()
            
        },

        methods:{

            news: function()  {
                this.isActiveNews = true;
                this.isActiveFollow = false;

                this.isFollow = ''
                this.getAllPosts();
            },

            follow: function()  {
                this.isActiveNews = false;
                this.isActiveFollow = true;
                
                this.isFollow = 'yes'
                this.getAllPosts();
            },

            checkAuthenticated: function()  {
                axios.get('/api/athenticated')
                .then(res => {
                    // console.log(res.data);
                    this.isAuthenticated = res.data;
                    // console.log('object: ' + this.isAuthenticated);
                })

            },

            
            getAllPosts: function() {
                axios.get('/api/posts?tag='+this.idTag+'&&isfollow='+this.isFollow +'&&search='+this.search)
                .then(res => {
                    // console.log(res.data);
                    if(res.data.status == true){
                        this.posts = res.data.posts;
                    }else{
                        window.location.href = '/error';
                    }
                });
            }
        }
        
    }
</script>


<style scoped> 
    .time-before{
        font-size: 13px;
    }

    .container{
        padding-left: 50px;
        padding-right: 50px;
    }

    .comment-null{
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
        text-align: center;
        margin-top: 40px;
        margin-left: 20%;

    }

    .ov{
        margin-bottom: 350px;
    }

    .menu-item:hover{
        background: #990099;
    }

    .active{
        background: #3f0c66;
    }

    .menu-item{
        width: 150px;
        padding-left: 20px;
        padding-top: 11px;
    }

    .menu-item label{
        color: #fff;
    }

    .menu{
        width: 100%;
        height: 45px;
        background: rgb(26, 10, 60);
        display: flex;
        padding-left: 13%;

    }

    .post-tag{
        font-size: 11px;
        background: #f4f4f5;
        border: 1px solid #909399;
        color: #909399;
        height: 18px;
        border-radius: 10%;
        margin-right: 5px;
        padding: 0px 8px 0px 8px;
    }

    .post-tag:hover{
        background: #40eeee;
    }

    .post-null{
        width: 20px;
    }

    .post-question{
        display: flex;
    }

    .scrollbar {
        overflow-y: scroll;
    }

    .force-overflow {
        min-height: 100px;
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
        margin-top: 40px;
    }

    .posts{
        height: 400px;
        /* border: 1px solid gray; */
    }

    .post-content{
        margin-left: 17px;
        width: 100%;
    }

    .new-question{
        height: 400px;
        padding-left: 20px;
        /* overflow: auto; */
        /* overflow-y: 2px; */
    }
    .post-item{
        margin-bottom: 11px;
        display: flex;
        /* height: 80px; */
        height: auto;
        border-bottom: 1px solid #d6d6d7;
    }

    .post-name{
        font-size: 15px;
        color: #990099;
         font-family: "Times New Roman", Times, serif;
    }

    .post-question{
        font-size: 15px;
        color:black;
        margin-top: -15px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .post-question-title:hover{
        color: blue;
    }
    
    .post-question-title{
        display: block;/* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 5.6em;
        line-height: 1.2em;
        color: black;
    }

    .link-detail:hover{
        text-decoration: none;
    }

    .post-img img{
        height: 40px;
        width: 40px;
        border-radius: 50%;
        margin-top: 15%;
    }

    .post-status{
        margin-top: -10px;

    }

    .post-status-icon{
        display: inline-block;
        font-size: 11px;
        color: #9b9b9b;
        margin-right: 15px;
    }

    label{
        height: 10px;
        margin-left: 10%;
        color: #9b9b9b;
    }

    h6{
        font-weight: bold;
        color: blue;
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