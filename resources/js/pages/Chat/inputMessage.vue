<template>
    <div class="" @keydown.esc="turnOffEmoji()" tabindex="0">
		<div class="contai-input" >


            <div class="icon">

                <!-- Icon Emoji -->
                <img class="img-emoji" src="https://i.pinimg.com/564x/e9/c2/c5/e9c2c5c10beda12fe489ae2a783e36b8.jpg"
                    @click="toggleEmo" fab dark small color="red"
                />

                <!-- Upload File -->
                <label for="file-input">
                    <img id="output" for="file-input" class="img-file" src="https://png.pngtree.com/png-vector/20190321/ourlarge/pngtree-vector-attachment-icon-png-image_856741.jpg" alt="Avatar">
                    <input type="file" hidden
                        id="file-input"
                        accept="image/png, image/jpeg, image/jpg, video/mp4"
                        @change="test(); handleFileChange($event); upload()"

                        name="file" >
                </label>

            </div>

            
            <!-- Emoji toggle -->
            <div class="floating-div" >
                <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />
            </div>

            
            <!-- Text Input Message  -->
			<textarea type="text"  @click="turnOffEmoji()"
				v-model="message"
                @keydown.enter.shift.exact.prevent="shiftEnter(); message += '\n'"
                @keydown.enter.exact.prevent="sendMessage()"
				placeholder="New Message"
				class="contai-text" />

            <!-- Button Send Message -->
			<button @click="sendMessage()"
				class="bt-submit">
				Send
			</button>

				
		</div>
	</div>
</template>

<script>
import { Picker } from 'emoji-mart-vue'
export default {
    props: ['room'],  //Get "room number" from parent component (container.vue)
    components:{
        Picker,
    },
    data: function() {
        return {
            message: '',
            emoStatus: false,

            //cloudinary
            errors: [],
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

    },

    methods: {
        test(){
            // alert('tetete');
        },
        //Cloudinary
        handleFileChange: function(event) {
            // console.log("handlefilechange", event.target.files);
            console.log("handeler")
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
            let reader = new FileReader();
            reader.addEventListener("load", function() {
                this.fileContents = reader.result;
                this.prepareFormData();
                let cloudinaryUploadURL = `https://api.cloudinary.com/v1_1/dm9r6ilqz/upload`;
                // var cors_url = "https://cors-anywhere.herokuapp.com/";
                 var cors_url = "https://protected-peak-41888.herokuapp.com/";
                let requestObj = {
                    url: cors_url + cloudinaryUploadURL,
                    method: "POST",
                    data: this.formData
                };
                    // headers: {
                    //     'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
                    //     "Access-Control-Allow-Origin": "*",
                    //     'Access-Control-Max-Age': '1728000',
                    //     'Content-Type': 'application/json; application/x-www-form-urlencoded;  charset=utf-8',
                    //     'Vary': 'Accept-Encoding',
                    //     'Access-Control-Allow-Headers': 'Origin, X-Requested-With,  X-Auth-Token,  Content-Type, Accept, Authorization',
                    // }

                this.$alertify.success('<h4>Insert success, Wait a moment for the image to appear.</h4>')
                axios(requestObj)
                .then(response => 
                {

                    console.log(response)
                    this.results = response.data;
                    // console.log('object:  '+ response.data.resource_type);
                    if(response.data.resource_type == 'image'){
                            this.message = this.message + `<img src="${this.results.url}"/>` 
                    }else{
                        this.message = this.message + `<iframe src="${this.results.url}"/>` 
                    }

                })
                .catch(error => {
                    this.errors.push(error);
                    console.log(error);
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




        turnOffEmoji(){
            if(this.emoStatus == true){
                this.emoStatus = false;
            }
        },


        onInput(e){
            if(!e){
                return false;
            }
            if(!this.message){
                this.message=e.native;
            }else{
                this.message=this.message + e.native;
            }
        },


        toggleEmo(){
            this.emoStatus= !this.emoStatus;
        },


        shiftEnter: function(){
            this.message += '</br>';
        },

        sendMessage() {
            if(this.message == ''){
                return;
            }

            axios.post('/api/chat/room/' + this.room.id + '/message', {
                message: this.message
            })
            .then( res => {
                if(res.status == 201){
                    this.message = ''; 
                    this.$emit('messagesent');

                    var data = { soundurl : 'https://res.cloudinary.com/dm9r6ilqz/video/upload/v1633516053/Sound/sms-alert-3-daniel_simon_pyvgdw.mp3'}
                    var audio = new Audio(data.soundurl);
                    audio.play();
                }
            })
            .catch(error => {
                console.log(error);
            })

        }

    }



}
</script>

<style scoped>
    .icon img{
        width: 27px !important;
        height: 27px !important;
    }

    .img-file{
        width: 26px;
        height: 26px;
        margin-top: 15px;
    }

    .floating-div{
        position: absolute;
    }

    .img-emoji{
        width: 30px;
        height: 30px;
        margin-right: 10px;
    }



    .bt-submit{
        float: right;
        height: 35px;
        width: 10%;
        border-radius: 7px;
        color: white;
        background-color: rgb(238, 24, 24);
        margin-top: 5px;
    }

    .contai-input{
        padding-top: 20px ;
        display: flex;
        padding-left: 20px;
        padding-right: 20px;
    }

    .contai-text{
        border: none;
        width: 88%;
        font-size: 13px;

        resize: none;
        /* overflow: hidden; */
        min-height: 70px;
        max-height: 200px;
    }

    .contai-text:focus{
        outline: none !important;
    }
</style>