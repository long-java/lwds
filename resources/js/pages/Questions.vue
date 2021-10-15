<template>
    <div class="over">


        <!-- <img class="baner" src="/storage/img/logo3.PNG" alt=""> -->
        <img class="baner" src="https://res.cloudinary.com/dm9r6ilqz/image/upload/v1634056288/Lazy/logo3_xofees.png" alt="">
        <div class="noti "> 
            <h5 class="fb"><a href="https://fb.com"> >>&ensp;LEWANDOWSKI&ensp;>>&ensp;Tham gia Facebook group "Lazy Community" để cùng nhau học tập và kết nối&ensp;>> </a> 
                <router-link to="/post-up">
                    <button class="write-post"> Viết bài</button>
                </router-link>
            </h5>
        </div>




        <!-- <h4>Hello, This is questions page</h4> -->
        <!-- <p>We are {{name}}</p> -->
        <!-- <button @click="changeName"> Change Name </button> -->

        <container />

    </div>
</template>

<script>
    import container from "./Chat/container.vue"
    export default {
        name: 'questions',
        components: {
            container,
        },
        data() {
            return{
                users: [],
                name: 'Tien Long'
            }
        },

        methods: {
            changeName: function(){
                this.name = 'Pham Tien Long - Laravel - Vuejs'
            }
        }
    }
</script>


<style scoped>
    .over{
        background:rgb(230, 215, 215);
    }

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