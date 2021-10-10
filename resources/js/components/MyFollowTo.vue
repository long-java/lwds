<template>
    <div>
        <div class="over">
            <div class="row">

                <div class="card" v-for="follow in followers" :key="follow.id">
                    <div class="card-body">
                        <div class="c-img">
                            <img class="c-avatar" :src="follow.avatar" alt="">
                        </div>

                        <div class="info">
                            <div class="name">
                                <p class="user"> {{ follow.name }} </p>

                                <div class="in">
                                    <font-awesome-icon class="icon  controler-icon" icon="pen-alt" size="1x" :style="{ color: '#ff9999' }"/>

                                    {{ follow.count_posts }} bài viết
                                </div>

                                <div class="in">
                                    <font-awesome-icon class="icon  controler-icon" icon="user-plus" size="1x" :style="{ color: '#ff9999' }"/>
                                    {{ follow.count_follow }} lượt theo dõi
                                </div>
                            </div>

                            <div class="fl">


                                <button

                                    @click="addOrDeleteFollow('true', follow.id)" class="bt-fl">
                                    
                                    <font-awesome-icon class="icon  controler-icon" icon="user-times" size="1x" :style="{ color: '#fff' }"/>
                                    Bỏ theo dõi
                                </button>


                            </div>
                        </div>
                    </div>
                </div>

                






            </div>

        </div>

        <div class="follow-null" v-if="followers[0] == null">
            <h3>Chưa theo dõi ai. </h3>
        </div>

        <div class="null"></div>
    </div>
</template>

<script>
export default {

    data(){
        return{
            followers: [],
        }
    },

    created(){
        this.getAllFollow()
    },

    methods:{

        addOrDeleteFollow: function(isFollow, id){

            axios.post('/api/follow/'+id, { 
                isFollow: isFollow +'',
            })
            .then(res =>{
                console.log(res.data);

                this.getAllFollow();



                

            })


        },

        

        getAllFollow: function(){
            axios.get("/api/my-follow/"+this.$route.params.id)
            .then(res => { 
                console.log(res.data);
                if(res.data.status == true){
                    if(res.data.message == "Success"){
                        this.followers = res.data.follow;
                    }else{
                        this.followers = [];
                    }
                }else{
                    this.error = res.data.message;
                }
            });

        },

    }

}
</script>

<style scoped>

    .follow-null{
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
        text-align: center;

    }

    .over{
        margin: 5% 20% 0% 16%;
    }

    .info{
        margin-left: 18px;
    }

    .name .user{
        font-weight: bold;
        font-size: 22px;
        margin-bottom: 0px;
        font-family: "Times New Roman", Times, serif;

        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    .card{
        border: 1px solid rgb(230, 227, 227) !important;
        width: 290px;
        height: 135px;
        margin-right: 30px;
        border-radius: 15px !important;
        margin-bottom: 28px;
    }

    .card-body{
        padding: 14px 0px 10px 10px !important;
        display: flex;

    }

    .c-img img{
        width: 100px;
        height: 100px;
        border-radius: 10px;
    }

    .fl{
        margin-top: 10px;
    }

    .bt-fl{
        background: rgb(105, 89, 205);
        border-radius: 5px;
        font-size: 13px;
        color:#fff;
    }

    .bt-fl:hover{
        background: rgb(70, 54, 175);

    }

    .null{
        height: 500px;
    }

    .name .in{
        font-size: 12px;
        color:rgb(84, 70, 70);
    }

</style>