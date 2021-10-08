<template>
  <div class="cl-upload">
    <!-- supply h2 heading -->
    <h2>Upload an Image to Cloudinary</h2>

    <form v-on:submit.prevent="upload">

      <label for="file-input">Upload:</label>
      <input
        id="file-input"
        type="file"
        accept="image/png, image/jpeg"
        @change="handleFileChange($event)"
      />

      <button type="submit" :disabled="filesSelected < 1">Upload</button>
    </form>

    <!-- display uploaded image if successful -->
    <section v-if="results && results.secure_url">
      <img :src="results.secure_url" :alt="results.public_id" />
    </section>

    <h2 v-if="results">{{ results.url }}</h2>

    <!-- display errors if not successful -->
    <section>
      <ul v-if="errors.length > 0">
        <li v-for="(error,index) in errors" :key="index">{{error}}</li>
      </ul>
    </section>
  </div>
</template>

<script>
export default {
  name: "CloudinaryUpload",
  components: {
  
  },
  data() {

    return {
      results: null,
      errors: [],
      file: null,
      filesSelected: 0,
      tags: "browser-upload",
      progress: 0,
      showProgress: false,
      fileContents: null,
      formData: null
    };
  },
  methods: {

    handleFileChange: function(event) {
      console.log("handlefilechange", event.target.files);
      this.file = event.target.files[0];
      this.filesSelected = event.target.files.length;
    },

    prepareFormData: function() {
      this.formData = new FormData();
      this.formData.append("upload_preset", 'default');
      this.formData.append("tags", this.tags); 
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
        //   let cloudinaryUploadURL = `https://api.cloudinary.com/v1_1/${this.cloudName}/upload`;
          let cloudinaryUploadURL = `https://api.cloudinary.com/v1_1/dm9r6ilqz/upload`;
          let requestObj = {
            url: cloudinaryUploadURL,
            method: "POST",
            data: this.formData,
          };

          axios(requestObj)
            .then(response => {
              this.results = response.data;
              console.log(this.results);
            })
            .catch(error => {
              this.errors.push(error);
              console.log(this.error);
            })
            .finally(() => { });
        }.bind(this),
        false
      );
      // call for file read if there is a file
      if (this.file && this.file.name) {
        reader.readAsDataURL(this.file);
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  form {
    display: grid;
    padding: 1em;
    background: #f9f9f9;
    border: 1px solid #c1c1c1;
    margin: 2rem auto 0 auto;
    max-width: 500px;
    padding: 1em;
  }
  form input {
    background: #fff;
    border: 1px solid #9c9c9c;
  }
  form button {
    background-color: blue;
    color: white;
    font-size: 1em;
    font-weight: bold;
    padding: 0.7em;
    width: 100%;
    border: 0;
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
