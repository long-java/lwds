<template>
    <div>
        <div class="profile">
            <div>
                <img class="avatar" :src="user.avatar" alt="">
            </div>
            <div class="div-rigth">
                <h2>{{user.name}}</h2>
                <p>{{user.user_web}}</p>




                <div class="fl" v-if="isFollow==false">
                    <button class="bt-fl" @click="addOrDeleteFollow()">
                        <font-awesome-icon class="icon  controler-icon" icon="plus" size="1x" :style="{ color: '#fff' }"/>
                        Theo dõi
                    </button>
                </div>

                <div class="fl" v-if="isFollow==true">
                    <button class="bt-fl"  @click="addOrDeleteFollow()" >
                        <font-awesome-icon class="icon  controler-icon" icon="check" size="1x" :style="{ color: '#fff' }"/>
                        Đã theo dõi
                    </button>
                </div>



            </div>
        </div>

        <div class="acc-menu">
            <div class="acc-menu1">
                <nav class="menu3 navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <router-link class="nav-link" 
                                    :class="[{active: $route.name === 'my_posts'}]" 
                                    :to="'/account/'+routeId"
                                    > Bài viết
                                </router-link>
                            </li>


                            <!-- <li class="nav-item">
                                <router-link class="nav-link" 
                                    :class="[{active: $route.name === 'my_questions'}]" 
                                    :to="'/my-questions/'+this.$route.params.id"
                                    > Câu hỏi
                                </router-link>
                            </li> -->

                            <li class="nav-item">
                                <router-link class="nav-link" 
                                    :class="[{active: $route.name === 'my_follow_to'}]" 
                                    :to="'/my-follow-to/'+this.$route.params.id"
                                    > Đang theo dõi
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link class="nav-link" 
                                    :class="[{active: $route.name === 'my_follow_from'}]" 
                                    :to="'/my-follow-from/'+this.$route.params.id"
                                    > Người theo dõi
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link class="nav-link" 
                                    :class="[{active: $route.name === 'my_contact'}]" 
                                    :to="'/my-contact/'+this.$route.params.id"
                                    > Liên hệ
                                </router-link>
                            </li>

                        </ul>
                    
                    </div>
                </nav>
            </div>
        </div>

        <router-view ></router-view>


    </div>
</template>

<script>
export default {

    data(){
        return {
            routeId:'',
            user:{
                name: '',
                avatar: '',
                user_web: '',
            },
            isFollow: 'isMe',
        }
    },

    created(){
        this.getProfileUser()
        this.routeId = this.$route.params.id;
    },


    methods:{
        addOrDeleteFollow: function(){

            axios.post('/api/follow/'+this.$route.params.id, { 
                isFollow: this.isFollow +'',
            })
            .then(res =>{
                console.log(res.data);
                this.isFollow = !this.isFollow;
            })

        },


        getProfileUser: function(){
            axios.get('/api/profile/'+this.$route.params.id, { 
                
            })
            .then(res =>{
                console.log(res.data);
                this.user.name = res.data.user.name;
                this.user.user_web = '@'+res.data.user.user_web;
                this.user.avatar = res.data.user.avatar;
                this.isFollow = res.data.isFollow;
            })
        }


    }

}
</script>

<style scoped>
    .fl{
        margin-top: 10px;
    }

    .bt-fl{
        background: rgb(105, 89, 205);
        border-radius: 5px;
        font-size: 13px;
        color:#fff;
        padding-right: 12px;
    }

    .bt-fl:hover{
        background: rgb(70, 54, 175);

    }

    .active{
        color: red;
        font-weight: bold;
        font-size: 15px;
    }

    .navbar-nav{
        width: 100%;
    }

    .navbar-toggler{
        height:35px;
        margin-top: -6px;
    }

    .nav-item{
        margin-left: 3% !important;
    }

    .menu3{
        background: #fff !important;
        font-size:14px;
        height: 40px;
    }

    .acc-menu1{
        margin-left: 17%;
    }

    .acc-menu {
        margin-top: 2%;
        border: 1px solid gainsboro;
    }

    .profile {
        display: flex;
        margin-left: 17%;
        margin-top: 2%;
        height: 100px;
    }

    .div-rigth{
        margin-left: 2%;
    }

    .div-rigth h2{
        line-height: 1.2;
        font-size: 23px;
        
    }

    .avatar{
        max-width:60px;
        max-height:60px;
        border-radius: 50%;
    }

</style>