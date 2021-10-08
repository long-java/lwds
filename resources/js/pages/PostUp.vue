<template>
    <div class="overall">
        <div class="card-header head">
            <center> <h3>Trang đăng bài</h3> </center>
        </div>

        <div class="title">
                <input v-model="title"  class="input-title" placeholder="  Add Title"> 
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

                        <button type="submit" :disabled="filesSelected < 1">Insert</button>
                    </form>

                    <!-- <section v-if="results && results.secure_url">
                    <img :src="results.secure_url" :alt="results.public_id" />
                    </section>
                    <h2 v-if="results">{{ results.url }}</h2> -->

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


        <center>
            <button class="btn btn-danger bt-submit" @click="storePost(); checkForm()"> Submit </button>
        </center>


 
        <div class="null"> </div>
    </div>
</template>



<script>
    import VueTagsInput from '@johmun/vue-tags-input';

    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'
    import { quillEditor } from 'vue-quill-editor'

    



    export default {
        name: 'postup',
        components: { 
            quillEditor,
            VueTagsInput,
        },

        data() {
            return {
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

                
            };
        },

        created(){
            this.getAllTags();
        },


        methods: {
            //Cloudinary
            handleFileChange: function(event) {
                console.log("handlefilechange: ", event.target.files);
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
                console.log("File Name: ", this.file.name);
                let reader = new FileReader();
                reader.addEventListener("load", function() {
                    this.fileContents = reader.result;
                    this.prepareFormData();
                    let cloudinaryUploadURL = `https://api.cloudinary.com/v1_1/dm9r6ilqz/upload`;
                    // var cors_url = "https://cors-anywhere.herokuapp.com/";
                    // var cors_url = "https://protected-peak-41888.herokuapp.com/";
                    let requestObj = {
                        url: cloudinaryUploadURL,
                        method: "POST",
                        data: this.formData,
                    };
                    this.$alertify.success('<h4>Insert success, Wait a moment for the image to appear.</h4>')

                    axios(requestObj,
                        { 
                            headers:{ 
                                Authorization: 'Bearer ' + localStorage.getItem('token'),
                                crossDomain: true
                            }
                        }
                    )
                    .then(response => {
                        this.results = response.data;
                        this.content_html = this.content_html + `<img src="${this.results.url}"/>` 
                        console.log('Response: '+  response);
                    })
                    .catch((error) => {
                                console.log(error)   
                    })
                    .finally(() => { });
                    }
                    .bind(this),
                    false
                );
                if (this.file && this.file.name) {
                    reader.readAsDataURL(this.file);
                }
            },
            //End Cloudinary

            //Save Post-Up
            storePost: function() {
                axios.post("/api/post",
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
                    console.log(res.data);

					if(res.data.status == true){
						this.$router.push({ path: "/account/my"}); 
                    }else{
                        // this.error = res.data.message;
                    }

                });
            },

            // Get All Tag 
            getAllTags: function() {
                axios.get("/api/tags")
                .then(res => {
					if(res.data.status == true){
						this.autocompleteItems = res.data.tags;  
                    }
                });
            },

            // input: function(){
            //     $('input').tagsinput({
            //         tagClass: function(item) {
            //             return (item.length > 10 ? 'big' : 'small');
            //         }
            //     });
            // },

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


        },
        // End methods

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

<style>

    /* Quill */
    .ql-container{
        background: #fff;
        min-height: 450px;
    }
    .quill-editor{
        width: 95%;
        min-height: 450px;
        height: auto;
        
    }





    .ck{
        margin-top: 30px;
    }

    .bt-submit{
        margin-top: 20px;
        width: 150px;
        height: 55px;
    }

    .null{
        height: 80px;
    }

    .jodit-workplace{
        height: 450px !important;
        min-height: 450px !important;
    }

    .jodit{
        width: 95% !important;
        min-width: 95% !important;
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
    button {
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