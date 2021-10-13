<template>
    <div>
        <div class="card-header" >
            
            <ul class="nav justify-content-center header-menu "  >

                <li class="nav-item title">
                    <h1 class="nav-title h1-logo">
                        <router-link class="logo"
                            :to="{name: 'posts'}" > Lazy
                        </router-link>
                    </h1>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" 
                        :class="[{active: $route.name === 'posts'}]" to="/"> Bài viết
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link"
                        :class="[{active: $route.name === 'questions'}]" :to="{name: 'questions'}" >  Kênh chat
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link"
                        :class="[{active: $route.name === 'tag'}]" :to="{name: 'tag'}" > Thẻ
                    </router-link>
                </li>



                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Fixed-price
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->

                <li class="right-li">
                    <form @submit="searchMethod()" class="form-inline search" method="get">
                        <input v-model="search" class="form-control mr-sm-2 input-search" type="search" placeholder="Search tag or title" aria-label="Search">
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0 bt-search" type="submit">Search</button> -->
                    </form>
                </li>



                <div class="div-btn-login-register" v-if="user_name === '' ">
                    <li class="nav-item login ">
                        <router-link class="nav-link" 
                            :class="[{active: $route.name === 'exam'}]" to = "/login"> Đăng nhập  |
                        </router-link>
                    </li>
                    <li class="nav-item ">
                        <router-link class="nav-link" 
                            :class="[{active: $route.name === 'exam'}]" to = "/register"> Đăng ký 
                        </router-link>
                    </li>
                </div>
                <div class="div-name-user-logout" v-else>

                    <img :src="avatar" alt="">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{user_name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <router-link class="dropdown-item" :to="'/account/my'"> Tài khoản </router-link>
                            <router-link class="dropdown-item" to="/post-up"> Đăng bài </router-link>
                            <router-link class="dropdown-item" to="/" @click.native="logout"> Đăng xuất </router-link>
                            
                        </div>
                    </li>
                    
                    
                    
                    
        
                </div>

            </ul>
            
        </div>
        <!-- <img src="/storage/img/logo.PNG" alt="">
        <div class="noti "> 
            <h5 class="fb"><a href="https://fb.com"> >> Tham gia Facebook group "Viblo Community" để cùng nhau học tập và kết nối >> </a> 
                <router-link to="/post-up">
                    <button class="write-post"> Viết bài</button>
                </router-link>
            </h5>
            
        </div> -->

        <router-view :search="search" :key="$route.fullPath" ></router-view>

        <!-- <router-view :key="keyRouter" ></router-view> -->


        <!-- Footer -->
        <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <section class="mb-4">

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                    <font-awesome-icon class="icon  controler-icon" icon="check" size="1x" :style="{ color: '#fff' }"/>
                </a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                    <font-awesome-icon class="icon  controler-icon" icon="check" size="1x" :style="{ color: '#fff' }"/>
                </a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                    <font-awesome-icon class="icon  controler-icon" icon="check" size="1x" :style="{ color: '#fff' }"/>
                </a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                    <font-awesome-icon class="icon  controler-icon" icon="check" size="1x" :style="{ color: '#fff' }"/>
                </a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                    <font-awesome-icon class="icon  controler-icon" icon="check" size="1x" :style="{ color: '#fff' }"/>
                </a>

            </section>

            <!-- Section: Form -->
            <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-auto">
                    <p class="pt-2">
                    <strong>Sign up for our newsletter</strong>
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-5 col-12">
                    <!-- Email input -->
                    <div class="form-outline form-white mb-4">
                    <input type="email" id="form5Example2" class="form-control" />
                    <label class="form-label" for="form5Example2">Email address</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-auto">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-outline-light mb-4">
                    Subscribe
                    </button>
                </div>
                <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">
            <p>
                Contact: Phạm Tiến Long - phamtienlong0309@gmail.com
            </p>
            </section>
            <!-- Section: Text -->

            <!-- <section class="">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                        <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                    </div>



                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                        <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                        <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                        <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                        <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                    </div>

                </div>

            </section> -->

        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ©2020 
            <a class="text-white" href=""> LongDecepticon </a>
        </div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>


</template>

<script>
    export default {
        name: 'my-menu',

        data(){
            return{
                user_name: '',
                avatar: '',
                search: ''
            }
        },


        mounted(){
            return{

            }
        },

        created(){
            this.getProfileUser()
        },

        methods: {
            searchMethod: function(){
                console.log(this.search)

            },


            logout: function(){
                axios.post('/api/logout',{}, { 
                    headers:{
                                Authorization: 'Bearer ' + localStorage.getItem('token'),
                                'Content-Type': 'application/x-www-form-urlencoded',
                                "Access-Control-Allow-Origin": "*",
                                "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
                            }
                    }
                )
                .then(res =>{
                    // console.log(res.data);
                    localStorage.removeItem('token');
                    this.$router.go(0);  //reload page
                })
            },

            getProfileUser: function(){
                axios.get('/api/profile/my',{}, { 
                })
                .then(res =>{
                    this.user_name = res.data.user.name;
                    this.avatar = res.data.user.avatar;
                    // this.id = res.data.user.id;
                    // console.log(res);
                })
            }

            // End methods
        }
    }


</script>

<style scoped>
    .h1-logo{
        margin-top: -5px;
    }

    .header-menu{
        margin-bottom: -5px;
    }

    .right-li{
        margin-left: 23%;
    }

    .nav-link{
        font-size: 13px;
    }


    .container{
        border: none;
    }

</style>

<style>
    @media screen and (max-width:1518px){
        .header-menu{ margin-left: 50px; }
    }

    @media screen and (max-width:1480px){
        .header-menu{ margin-left: 50px; }
        .search{margin-left: 280px !important}
    }

    @media screen and (max-width:1440px){
        .header-menu{ margin-left: 50px; }
    }

    @media screen and (max-width:1417px){
        .header-menu{ margin-left: 20px; }
        .search{margin-left: 100px !important}
    }


    @media screen and (max-width:900px){
        .noti h5{ font-size:70%}
        .noti {height: 55px !important;}
    }

    @media screen and (max-width:1100px){
        .noti h5{ font-size:90%}
        .write-post{margin-bottom: 17px !important;}
    }
</style>

<style scoped>

    .input-search{ 
        height: 26px;
        margin-top: 5px;
    }

    img{
        width: 100%;
    }
    .noti{
        width: 100%;
        height: 45px;
        background: #660033;
        padding-top: 10px;
    }
    .fb{
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .logo:hover{
        text-decoration: none;
        color: red;
    }

    .search{
        margin-left: 0px;
    }

    .login{
        margin-right: -25px;
    }

    .write-post{
        margin-left: 10%;
        font-size:12px;
        font-weight: bold;
        height: 25px !important;
        color: #fff;
        background: red;
        border-radius: 10%;
        
    }

    .div-btn-login-register{
        display: flex;
    }

    .div-name-user-logout{
        display: flex;
        margin-left: 3%;
    }

    .div-name-user-logout img{
        height: 35px;
        width: 35px;
        border-radius: 50%;
    }

</style>
