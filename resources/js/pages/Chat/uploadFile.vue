<template>
    <div>

        <label for="file-input">
            <img id="output" for="file-input" class="img-file" src="https://png.pngtree.com/png-vector/20190321/ourlarge/pngtree-vector-attachment-icon-png-image_856741.jpg" alt="Avatar">

            <input type="file" hidden
                id="file-input"
                accept="image/png, image/jpeg"
                @change="test(); handleFileChange($event); upload()"
                name="file" >

        </label>



    </div>
</template>

<script>

export default {

    data(){
        return{
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

    methods:{
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
            console.log("upload:::", this.file.name);
            let reader = new FileReader();
            reader.addEventListener(
                "load",
                function() {
                    this.fileContents = reader.result;

                    this.prepareFormData();
                    //   let cloudinaryUploadURL = `https://api.cloudinary.com/v1_1/${this.cloudName}/upload`;
                    let cloudinaryUploadURL = `https://api.cloudinary.com/v1_1/dm9r6ilqz/upload`;
                    let requestObj = {
                        url: cloudinaryUploadURL,
                        method: "POST",
                        data: this.formData,
                    };

                this.$alertify.success('<h4>Insert success, Wait a moment for the image to appear.</h4>')
                axios(requestObj)


                    .then(response => {
                        this.results = response.data;
                        // console.log(this.results);
                        this.content_html = this.content_html + `<img src="${this.results.url}"/>` 
                        console.log(this.results);
                    })
                    .catch((error) => {
                        // this.errors.push(error);
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

        

    }
    



}
</script>

<style scoped>

    .img-file{
        width: 27px;
        height: 27px;
        margin-top: 15px;
    }

</style>