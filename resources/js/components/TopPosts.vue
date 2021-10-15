<template>
    <div class="col-lg-3 hidden-md-down px-0 new-questionn">
        <h6 class="title-new"> __LƯỢT XEM NHIỀU NHẤT _________</h6>

        <div class=" new-question scrollbar "  id="style-1">

            <!-- Start item -->
            <div class="new-question-item" v-for="(item, index) in topPosts" :key="index">
                    <h6 type="text" class="new-question-question qss" maxlength="2">

                    <router-link class="link-detail" :to="'/detail-post/' + item.id">
                        <p class="post-question-title">{{ item.title }} </p>
                    </router-link>

                </h6>

                <div class="post-status new-question-status">
                        <div class="post-status-icon"><font-awesome-icon icon="vote-yea" /> {{item.number_vote}} </div>

                        <div class="post-status-icon"><font-awesome-icon icon="eye" /> {{item.number_view}} </div>

                        <div class="post-status-icon"><font-awesome-icon icon="comments" /> {{item.number_comment}} </div>

                        <div class="post-status-icon by"> -  by: {{ item.name }} </div>
                </div>
            </div>
            <!-- End Item -->


            <div class="force-overflow"></div>

        </div>
        
    </div>

</template>

<script>
export default {
    data(){
        return{
            topPosts: []
        }
    },

    created(){
        this.getTopPosts()
    },

    methods:{
        getTopPosts(){
            axios.get("/api/posts?column=number_view&sort=DESC")
            .then(res => {
                // console.log(res.data);
                if(res.data.status == true){
                    this.topPosts = res.data.posts;
                }else{
                    window.location.href = '/error';
                }
            });
        },

    }

    

}
</script>

<style scoped> 
    .post-status-icon{
        font-size: 12px !important;
    }

    .post-question-title{
        font-size: 13px;
    }

    .link-detail{
        color: rgb(32, 30, 30);
    }

    .link-detail:hover{
        text-decoration: none;
        color: rgb(14, 101, 189);
        /* font-size: 102%; */
    }

    .qss{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    .by{
        display: block !important;
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
        font-weight: bold;
        color: blue;
    }


    .title-new{
        margin-left: 8%;
        font-size: 13px;
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
        margin-bottom: 12px;
        padding-bottom: 12px;

    }




</style>