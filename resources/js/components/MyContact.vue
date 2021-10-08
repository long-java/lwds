<template>
    <div class="container">
        <div class="post-relate comment">
            <div class="relate-header">
                <h5 v-if="token != null"> Hãy viết gi đó về tài khoản này !!! </h5>
                <h5 v-else> Hãy đăng nhập để có thể bình luận !!! </h5>
            </div>

            <div class="row">
                <label for="" class="error"> {{ error }}</label>
                <textarea name="" id="" cols="145" rows="5" class="text-comment" v-model="contact.content">


                </textarea>

                <button v-if="token != null" class="submid-comment btn btn-danger" @click="submitContact" >
                    Submit
                </button>

                <button v-else  class="submid-comment btn btn-danger" disabled  >
                    Submit
                </button>
                
            </div>
        </div> 

        <!-- end comments     -->
        <div class="post-relate comment1">
            <div class="relate-header">
                <h5> Ai đó nói gi về tài khoản này. </h5>


            </div>

            <div class="row"  v-for="item in contacts" :key="item.id">
                <div>
                    <div class="cmt-item">

                            <div class="cmt1">
                                <div class="cmt1-img">
                                    <img :src="item.avatar" alt="">
                                </div>

                                <div class="name">
                                    <router-link  :to="'/account/'+item.writer_id">
                                        <label class="lb-name" v-on:click="setRouteId(item.writer_id)"> {{item.name}} </label> 
                                    </router-link>
                                    
                                    <label class="lb-user-web" for=""> <b>@</b> {{ item.user_web }} </label> 
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
        </div>

        <div v-if="contacts[0] == null" class="contact-null">
            <h3>Chưa có ai nói gi về tài khoản này.</h3>
        </div>
        

        <!-- end -->
        <div class="null"></div>
    </div>
</template>

<script>

    export default {
        name: 'my_contact',

        components: {
   
        },

        data(){
            return{
                routeId:'',
                contact: {
                    content: ''
                },
                error: '',
                'token': localStorage.getItem('token'),

                //list
                contacts: [],

            }
        },
        



                

        created(){
            this.getAllContacts();
            
        },

        methods:{
            setRouteId: function(id){
                
                
            },

            submitContact: function(){
                axios.post("/api/contact/"+this.$route.params.id,
                { 
                    content: this.contact.content,
                    headers:{
                                // Authorization: 'Bearer ' + localStorage.getItem('token'),
                                // 'Content-Type': 'application/x-www-form-urlencoded',
                                // "Access-Control-Allow-Origin": "*",
                                // "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
                            }
                    }
                )
                .then(res => {
                    this.getAllContacts();
                    if(res.data.status == true){
                        this.error = "Successfully submitted !!!"
                    }else{                       
                        // this.error = res.data.message;
                        this.error = "Comment can not be null !!!";
                    }
                }); 
            },

            getAllContacts: function(){
                axios.get("/api/contacts/"+this.$route.params.id)
                .then(res => { 
                    // console.log(res.data);
                    if(res.data.status == true){
                        this.contacts = res.data.contacts;
                        // console.log(this.commentPosts);
                    }else{
                        // this.error = res.data.message;
                        // console.log(this.error);
                    }
                });

            },


            
        }



    }


</script>

<style scoped>
    .contact-null{
        margin-top: 50px;
        margin-left: 100px;
        width: 50%;
        padding: 10px;
        text-align: center;
    }

    .row{
        display: block !important;
    }

    .null{
        height: 300px;
    }

    textarea:focus {
        outline: 1px solid #bdbdbe;
    }

    .text-comment{
        width: 80%;
        border: 1px solid #d6d6d7;
        display: block;
    }

    .container{
        border: none;
        margin-top: 50px;
        padding-left: 9%;
    }

    .submid-comment{
        margin-left: 66%;
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
        margin-left: 1%;
        width: 80%;
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
        right: 29%;  
    }

    .cmt1-content{
        display: block !important;
        margin-left: 37px;
    }

    .cmt1-control{
        margin-left: 37px;
    }

    .cmt1-control label{
        font-weight: bold;
    }

    .relate-header h5{
        font-weight: bold;
    }

    .lb-name{
        font-weight: bold;
    }

    .lb-user-web{
        margin-left: 20px;
    }

    .error{
        margin-left: 20px;
        color: red;
        font-style: italic;
    }
    

</style>