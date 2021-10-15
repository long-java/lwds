<template>
    <div>
        

        <div class="container">


            <div class="follow-null" v-if="posts[0] == null">
                <h3>Chưa có bài viết nào. </h3>
            </div>

            <div class="row pt-3 pb-1">
                <div class="col-lg-9 pl-md-0 posts"> 


                    <div class="post-item " v-for="(item, index) in posts" :key="index" >
                        <div class="post-img">
                            <img :src="item.avatar" alt="">
                        </div>

                        <div class="post-content">
                            <p class="post-name">
                                    {{item.name}}
                                <label> {{item.time_before}} giờ trước -  3 phút đọc</label>  
                            </p>

                            <router-link class="link-detail" :to="'/detail-post/' + item.id">
                                <p class="post-question">{{ item.title }}</p>
                            </router-link>

                            <div class="post-status"> 
                                <div class="post-status-icon">
                                    <font-awesome-icon class="icon  controler-icon" icon="eye" size="1x" :style="{ color: '#9b9b9b' }"/> {{item.number_view}} </div>

                                <div class="post-status-icon">
                                    <font-awesome-icon class="icon  controler-icon" icon="bookmark" size="1x" :style="{ color: '#9b9b9b' }"/> {{item.bookmark}} </div>

                                <div class="post-status-icon">
                                    <font-awesome-icon class="icon  controler-icon" icon="comments" size="1x" :style="{ color: '#9b9b9b' }"/> {{ item.number_comment }} </div>
                                
                            </div>

                            
                        </div>

                        <div class="control" v-if="isEdit==true">
                            <button class="edit" @click="edit(item.id)">
                                Edit
                            </button>

                            <button class="delete" @click="destroyPost(item.id)">
                                Delete
                            </button>
                        </div>


                    </div>
                    

                <!-- end =================================== -->



                <!-- end =================================== -->
                </div>

                <div class="col-lg-3 hidden-md-down px-0 new-questionn">
                    <h6 class="title-new"> __THÔNG TIN LIÊN HỆ ______________</h6>
                    <div class=" new-question scrollbar "  id="style-1">
                        <div class="force-overflow"></div>

                    </div>
                </div>

            </div>
        </div>

        



         <!-- Modal -->
        <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <!-- body -->
                    <div class="overall">
                        <div class="title">
                                <input v-model="title"   class="input-title" placeholder="  Add Title"> 
                                <p class='error'>{{errors.title}}</p>

                                <vue-tags-input
                                    v-model="tag"
                                    :tags="tags"
                                    :autocomplete-items="filteredItems"
                                    @tags-changed="newTags => tags = newTags"
                                />
                                
                                <p class='error'>{{errors.tags}}</p>

                                <div class="cl-upload">
                                    <!-- supply h2 heading -->
                                    <h5>Insert image: </h5>
                                    <form v-on:submit.prevent="upload">
                                        <label for="file-input">Upload:</label>
                                        <input
                                            id="file-input"
                                            type="file"
                                            accept="image/png, image/jpeg"
                                            @change="handleFileChange($event)"
                                        />
                                        <button class="btn-insert" type="submit" :disabled="filesSelected < 1">Insert</button>
                                    </form>
                                </div>

   
                        </div>

                        <div class="ck" id="">
                            <center>
                                <quill-editor v-model="content_html"
                                                ref="myQuillEditor"
                                                :options="editorOption"
                                                v-on:change="val($event)">    
                                </quill-editor>
                            </center>
                        </div>
                        <p class='error er-content'>{{errors.content}}</p>

                    </div>


                <!-- End body  -->

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="button" class="btn btn-primary"  @click="updatePost(id_edit); checkForm()">Save changes</button>
                </div>
            </div>
            </div>
        </div>










    </div>
</template>


<script>
    import VueTagsInput from '@johmun/vue-tags-input';

    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'
    import { quillEditor } from 'vue-quill-editor'

    export default {
        name: "MyPosts",
        comments:{
            quillEditor,
            VueTagsInput,
        },
        data() {
            return{
                id_edit:0,
                posts: [],
                is_edit: 'false',

                //Edit
                title: '',
                content_html: 'Write content here !!!',
                content: '',
                editorOption: {},

                errors: [],

                tag: '',
				tags: [],
				autocompleteItems: [
					{
						text: 'a',
					}, 
					{
						text: 'aaa',
					}
				],
                //cloudinary
                results: null,
                file: null,
                filesSelected: 0,
                progress: 0,
                showProgress: false,
                fileContents: null,
                formData: null

            }
        },

        created(){
            this.getAllPosts();
            this.getAllTags();
        },

        methods:{

            //Delete Post-Up
            destroyPost: function(id) {

                if(confirm("Are you sure you want to delete"))
                {
                    axios.delete("/api/post/"+id,
                    { 
                        headers:{ Authorization: 'Bearer ' + localStorage.getItem('token'), }
                    })
                    .then(res => {
                        if(res.data.status == true){
                            this.getAllPosts();
                        	this.$alertify.success('<h3>Delete Success !!!</h3>')
                        }else{
                            // this.error = res.data.message;
                        }
                    });
                }
                



            },

            //Update Post-Up
            updatePost: function(id) {
                axios.put("/api/post/"+id,
                {
                    title: this.title,
                    content: this.content,
                    content_html: this.content_html,
                    tags: this.tags, 
                }, 
                { 
                    headers:{ Authorization: 'Bearer ' + localStorage.getItem('token'), }
                })

                .then(res => {
					if(res.data.status == true){
                        this.getAllPosts();  //rerender data posts after update
						this.$alertify.success('<h3>Update Success !!!</h3>')
                    }
                });
            },

            //Click show page edit
            edit: function(id){
                this.id_edit = id;
                $('#post').modal('show');
                axios.get("/api/post/"+id)
                .then(res => {
                    console.log(res.data);
                    if(res.data.status == true){
                        this.title = res.data.post.title;
                        this.content_html = res.data.post.content_html;
                        this.content = res.data.post.content;
                        this.tags = res.data.post.tags;
                    }else{
                        window.location.href = '/error';
                    }
                });

            },


             //Cloudinary
            handleFileChange: function(event) {
                // console.log("handlefilechange", event.target.files);
                this.file = event.target.files[0];
                this.filesSelected = event.target.files.length;
            },

            prepareFormData: function() {
                this.formData = new FormData();
                this.formData.append("upload_preset", 'default');
                this.formData.append("tags", 'browser-upload'); 
                this.formData.append("file", this.fileContents);
            },

            upload: function() {
                console.log("upload", this.file.name);
                let reader = new FileReader();
                reader.addEventListener(
                    "load",
                    function() {
                    this.fileContents = reader.result;
                    this.prepareFormData();
                    let cloudinaryUploadURL = `https://api.cloudinary.com/v1_1/dm9r6ilqz/upload`;
                    var cors_url = "https://protected-peak-41888.herokuapp.com/";

                    let requestObj = {
                        url: cors_url + cloudinaryUploadURL,
                        method: "POST",
                        data: this.formData,
                    };

                    this.$alertify.success('<h4>Insert success, Wait a moment for the image to appear.</h4>')
                    axios(requestObj)
                        .then(response => {
                            this.results = response.data;
                            // console.log(this.results);
                            this.content_html = this.content_html + `<img src="${this.results.url}"/>` 
                        })
                        .catch(error => {
                        this.errors.push(error);
                            console.log(this.error);
                        })
                        .finally(() => { });
                    }.bind(this),
                    false
                );
                if (this.file && this.file.name) {
                    reader.readAsDataURL(this.file);
                }
            },
            //End Cloudinary

            // Get All Tag 
            getAllTags: function() {
                axios.get("/api/tags")
                .then(res => {
					if(res.data.status == true){
						this.autocompleteItems = res.data.tags;  
                    }
                });
            },

            checkForm: function () {
                this.errors = [];

                if (!this.title) {
                    this.errors.title = 'Title is required';
                    this.$alertify.error('<h3>Can not submit ! Title is required !</h3>')
                }
                if (this.content_html=="" || this.content == "") {
                    this.errors.content = 'Content is required';
                    this.$alertify.error('<h3>Can not submit ! Content is required !</h3>')
                }
                if (this.tags.length == 0) {
                    this.errors.tags = 'Tags is required';
                    this.$alertify.error('<h3>Can not submit ! Tags is required !</h3>');
                }
            },

            val(e) {
                this.content = e.text;
            },

            getAllPosts: function() {
                axios.get("/api/my-posts/"+this.$route.params.id)
                .then(res => {
                    // console.log(res.data);
                    if(res.data.status == true){
                        this.posts = res.data.posts;
                        this.isEdit = res.data.isEdit;
                        // console.log(this.isEdit);
                    }else{
                        window.location.href = '/error';
                    }
                });
            }
        },

        computed: {
            filteredItems() {
				return this.autocompleteItems.filter(i => {
					return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
					// return i;
				});
			},

            editor() {
                return this.$refs.myQuillEditor.quill
            }
        },
        mounted() {
            // console.log('this is current quill instance object', this.editor)
        },

}
</script>

<style scoped> 
    .follow-null{
        margin-left: 15%;
        margin-top: 100px;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
        text-align: center;


    }


    .modal-dialog{
        max-width: 1350px;
        margin: 0 0 0 5% !important;

    }

    .control button:hover{
        background: rgb(240, 231, 231);
    }

    .control button{
        height: 23px;
        width: 60px;
        margin-top: 20%;
        background: #fff;
        color: blue;
        border: 1px solid blue;
        border-radius:10%;
    }

    .delete{
        margin-left: 10%;
    }

    .control{
        padding-right: 30px;
        display: flex;
    }

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
        margin-top: 4%;
    }

    .posts{
        height: 400px;
        padding-left: 50px !important;
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
        height: auto;
        border-bottom: 1px solid #d6d6d7;
    }

    .post-name{
        font-size: 13px;
        color: #990099;
        font-family: "Times New Roman", Times, serif;
    }

    .post-question{
        font-size: 14px;
        color:black;
        margin-top: -15px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .post-question:hover{
        color: blue;
    }

    .link-detail:hover{
        text-decoration: none;
    }

    .post-img img{
        height: 35px;
        width: 35px;
        border-radius: 50%;
        margin-top: 25%;
    }

    .post-status{
        margin-top: -17px;

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
    }

</style>


<style scoped>
    .er-content{
        margin-left: 3% !important;
        margin-top: 5px !important;
    }

    .error{
        margin: 5px 0px 0px 15px;
        color: red;
        font-style: italic !important;
    }

    .vue-tags-input{    
        max-width: 97% !important;
        min-width: 97% !important;
        width: 97% !important;
		margin-top: 20px;
    }

    .title{
        margin-left: 3%;
        margin-top: 50px;
        /* display: flex; */

    }

    .title input:focus {
        outline: none !important;
    }

    .title input{
        border: 1px solid #ccc;
        margin-left: 0%;
        width: 97%;
        height: 40px;
        border-radius: 5px;
    }

    .overall{
        background: #99ffff;
    }
</style>

<style scoped>
    .cl-upload{
        margin-top: 40px;
    }

    form {
        display: flex;
        background: #f9f9f9;
        border: 1px solid #c1c1c1;
        max-width: 500px;
        padding: 10px 20px 0px 10px;
    }
    form input {
        background: #fff;
        border: 1px solid #9c9c9c;
        height: 50px !important;
    }
    form button {
        background-color: blue;
        color: white;
        font-size: 1em;
        font-weight: bold;
        padding: 0.7em;
        width: 40%;
        border: 0;
        height: 60%;
        margin-left: 5%;
        margin-top: 1%;
    }
    form button:hover {
        background: gold;
        color: black;
    }
    label {
        padding: 0.5em 0.5em 0.5em 0;
    }
    input {
        padding: 0.7em;
        margin-bottom: 0.5rem;
    }
    input:focus {
        outline: 3px solid gold;
    }
    @media (min-width: 400px) {
        form {
        grid-template-columns: 150px 1fr;
        grid-gap: 16px;
        }
        label {
        text-align: right;
        grid-column: 1 / 2;
        }
        input,
        button {
        grid-column: 2 / 3;
        }
    }
    .btn-insert {
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 10px;
    }
    button:focus {
        outline: none;
    }
    form button:disabled,
    form button[disabled] {
        border: 1px solid #999999;
        background-color: #cccccc;
        color: #666666;
    }
    section {
        margin: 10px 0;
    }
    img {
        max-width: 300px;
        height: auto;
    } 
</style>