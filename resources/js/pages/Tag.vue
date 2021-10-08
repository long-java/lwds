<template>
    <div>

        <img class="baner" src="/storage/img/logo3.PNG" alt="">
        <div class="noti "> 
            <h5 class="fb"><a href="https://fb.com"> >> Tham gia Facebook group "Viblo Community" để cùng nhau học tập và kết nối >> </a> 
                <router-link to="/post-up">
                    <button class="write-post"> Viết bài</button>
                </router-link>
            </h5>
        </div>


        <div class="container">
            <div class="top">
                <h1>Tags</h1>
                Đây là toàn bộ tag bài viết.
                <br> Bạn có thể bấm vào tag để xem toàn bộ bài viết.

                <div class="menu-top">
                    <p class="view"> Sắp xếp theo: </p>
                    <div class="select" >
                        <div class="select-item" :class="[ isActivePopular ? 'active' : '', '' ]"  
                            @click="changeLink('popular'); isPopular()">
                            Popular
                        </div>

                        <div class="select-item" :class="[ isActiveName ? 'active' : '', '' ]" 
                            @click="changeLink('name'); isName()">
                            Name
                        </div>

                        <div class="select-item" :class="[ isActiveNew ? 'active' : '', '' ]" 
                            @click="changeLink('test'); isNew()">
                            New
                        </div>
                    </div>
                    
                </div>

            </div>

            <div class="card-container row">

                <div class="card" v-for="(tag, index) in tags" :key="index">
                    <div class="card-body">
                        <div class="card-title flex">
                            <div class="title-img">
                                <img :src="tag.image">
                            </div>
                            <p class="p-title">  
                                <!-- #{{ tag.text }} -->


                                <router-link class=""
                                    :to="'/tag/' + tag.id" >  #{{ tag.text }}
                                </router-link>

                                
                                
                                
                            </p>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted sub-title">Creative: @{{ tag.user_web }}</h6>
                        <p class="card-text"> {{ tag.description }} </p>

                        <div class="bot">
                            <label class="number-post">Số bài viết:</label> 
                            <font-awesome-icon class="icon  controler-icon" icon="pen-alt" size="1x" :style="{ color: '#9b9b9b' }"/> 
                            {{tag.count_posts}}
                        </div>
                        
                    </div>
                </div>
                
            </div>


            <div class="null"></div>
        </div>
        
    </div>
</template>

<script>

    export default {
        name: 'tag',
        components: {
           
        },

        data(){
            return{
                tags: [],
                ev: 'popular',
                isActivePopular: true,
                isActiveName: false,
                isActiveNew: false
            }
        },

        created(){
            this.getAllTags()
        },

        methods:{
            changeLink(e){
                this.ev = e;
                this.getAllTags();
            },

            isPopular(){
                this.isActivePopular = true;
                this.isActiveName = false;
                this.isActiveNew = false;
            },

            isName(){
                this.isActivePopular = false;
                this.isActiveName = true;
                this.isActiveNew = false;
            },
            
            isNew(){
                this.isActivePopular = false;
                this.isActiveName = false ;
                this.isActiveNew = true;
            },

            getAllTags(){
                axios.get('/api/tags?e='+this.ev)
                .then(res =>{
                    console.log(res)
                    this.tags = res.data.tags;
                })
            }

        }



    }
</script>


<style scoped>

    .view{
        margin-top: 10px;
        margin-right: 20px;
    }

    .active{
        background: rgb(231, 215, 215);
        color: black;
    }

    .select{
        display: flex;
        background: white;
        border: 1px solid gray;
        border-right: none;
        width: 210px;
        height: 40px;
        border-radius: 5px;
    }

    .select-item{
        width: 70px;
        border-right: 1px solid gray;
        text-align: center;
        padding-top: 7px;
        font-size: 14px;
    }

    .menu-top{
        margin-bottom: 40px;
        margin-top: 30px;
        display: flex;
    }

    .null{
        height: 300px;
    }

    .number-post{
        color: rgb(24, 24, 110);;
    }

    .icon{
        margin-left: 10px;
        height: 13px;
    }

    .title-img img{
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }


    .p-title{
        margin-bottom: 0px !important;
        margin-left: 10px;
        margin-top: 2px;
        font-size: 12px;
        background: #f4f4f5;
        border: 1px solid #909399;
        color: #909399;
        border-radius: 10%;
        padding: 3px 6px 0px 6px;
        height: 24px;
    }


    .flex{
        display: flex;
        margin-bottom: 23px;
    }

    p{
        margin-bottom: 10px;
    }

    .card-body{
        padding-bottom: 10px !important;
    }

    .container{
        border: none !important;
        margin-top: 40px;
    }

    .card{
        border: 1px solid rgb(226, 217, 217) !important;
        margin-left: 15px;
        width: 270px;
        min-width: 250px !important;
        margin-top: 15px;
    }

    .card-container{
        display: flex !important;
    }

    .card-text{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; 
        -webkit-box-orient: vertical;
    }

</style>


<style scoped>
    .noti h5 a{
        color: #fff !important;
        font-size: 16px;
    }
    .write-post{
        margin-left: 10%;
        font-size:13px;
        font-weight: bold;
        height: 26px !important;
        width: 90px;
        color: rgb(20, 61, 28);
        background: rgb(226, 206, 206);
        border-radius: 10px;    
    }
    .noti{
        width: 100%;
        height: 40px;
        background: #660033;
        padding-top: 8px;
    }


    .fb{
        color: #fff;
        text-align: center;
    }
    
    .baner{
        width: 100%;
    }
</style>


