<template>
  <div class="control-vote">
        <p class="p-icon ">
            <font-awesome-icon  
                :class="{active: isActive1}"
                v-on:click="voteUp" class="icon" icon="caret-up" size="3x" :style="{ color: '#9b9b9b' }"/>
        </p>

        <div class="number-vote"> + {{numberVote}} </div>

        <p class="p-icon" >
            <font-awesome-icon 
                :class="{active: isActive2}"
                v-on:click="voteDown"
                class="icon" icon="caret-down" size="3x" :style="{ color: '#9b9b9b' }"/>
        </p>
                     
    </div>

</template>

<script>
export default {

    data(){
        return{
            numberVote: '',
            isActive1: false,
            isActive2: false,

        }
    },

    created(){
        this.getNumberVote();
        this.checkVoteOrDown();
    },

    methods: {
        getNumberVote: function(){
            axios.get("/api/post/get-number-vote/"+this.$route.params.id)
                .then(res => {
                    // console.log(res.data);
                    this.numberVote = res.data.numberVote;
                        
                    }
            );
        },

        checkVoteOrDown: function(){
            axios.get("/api/post/check-vote-or-down/"+this.$route.params.id)
                .then(res => {
                        this.isActive1 = res.data.rsUp;
                        this.isActive2 = res.data.rsDown;
                    }
            );
        },

        voteUp: function(){
            axios.post("/api/post/vote-up/"+this.$route.params.id,
                { 
                    headers:{

                            }
                    }
                )
                .then(res => {
                    if(res.data.status == true){
                        this.numberVote = res.data.number_vote_up;
                        this.isActive1 = !this.isActive1;
                        this.isActive2 = false;
                    }

                })
                .catch(error => {
                    console.log('Error Authorized');
                    this.$router.push({ name: "login"});
                });
                 
        },

        voteDown: function(){
            axios.post("/api/post/vote-down/"+this.$route.params.id,
                { 
                    headers:{
                        
                            }
                    }
                )
                .then(res => {
                    if(res.data.status == true){
                        this.numberVote = res.data.number_vote_down;
                        this.isActive2 = !this.isActive2;
                        this.isActive1 = false;
                    }

                })
                .catch(error => {
                    console.log('Error Authorized');
                    this.$router.push({ name: "login"});
                });; 


        }

    }



}
</script>

<style scoped>
    .control-vote{
        margin-top: 30%;
    }

    .p-icon{
        margin-bottom: 0px;

    }

    .icon:hover{
        color: red !important;
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

    .icon{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .active{
        color: black !important;
    }


</style>