<template>
  <div class="ov">
          
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading">
            Customize Graph
          <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-cog"></a>
            <a href="javascript:;" class="fa fa-times"></a>
          </span>
          </header>
          <div class="panel-body">
            <div id="graph-area">
              Form tìm kiếm
            </div>
          </div>
        </section>
      </div>
    </div>


    <div class="card">

      <div class="card-body">     
        <v-btn color="primary" dark class="mb-2" @click="deleteMulti()">
            Delete
        </v-btn>
      </div>

      <!-- ========== Table ========== -->
      <div class="card-body card-table">
        <v-app>

          <template>
            <v-data-table
              :headers="headers"
              :items="desserts"
              :footer-props="{
                'items-per-page-options': [5, 10, 20, 30, 40, 50]
              }"
              class="elevation-1"
              v-model="selected"
              :single-select="singleSelect"
              item-key="id"
              show-select

            >     


         




                        
              



              <template v-slot:top>
                <v-toolbar flat>
                  <v-toolbar-title>TABLE MESSAGES</v-toolbar-title>
                  <v-divider class="mx-4" inset vertical>
                  </v-divider>

                  <v-spacer></v-spacer>

                  
                  <!-- <template v-slot:activator="{ on, attrs }">
                      <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on" >
                          New Item
                      </v-btn>
                  </template> -->
                  

                <v-dialog v-model="dialog" max-width="900px">

                  <v-card>
                      <v-card-title>
                        <span class="text-h5">{{ formTitle }}</span>
                      </v-card-title>

                      <v-card-text>
                        <v-container>
                          <v-row>
                            {{error}}

                            <v-col cols="12" sm="6" md="12">
                                <v-textarea solo label="Title" auto-grow outlined rows="1" row-height="15"
                                    v-model="editedItem.title"
                                ></v-textarea>
                            </v-col>

                            <v-col cols="12" sm="6" md="12">
                                <v-textarea solo name="input-7-4" rows="7" label="Content"
                                  v-model="editedItem.content_html">
                                </v-textarea>
                                <!-- <p v-html="editedItem.content_html"  ></p> -->
                            </v-col>
                          
                          </v-row>
                        </v-container>
                      </v-card-text>

                      <v-card-actions>
                      <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" text @click="close">
                            Cancel
                        </v-btn>
                        <v-btn color="blue darken-1" text @click="save">
                            Save
                        </v-btn>
                      </v-card-actions>
                  </v-card>

                </v-dialog>



                <v-dialog v-model="dialogDelete" max-width="500px">
                  <v-card>
                    <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                        <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                  </v-card>
                </v-dialog>


                <!-- Dialog Preview -->
                <v-dialog v-model="dialogPreview" max-width="900px">
                  <v-card>
                      <v-card-title>
                        <span class="text-h5">{{ formTitle }}</span>
                      </v-card-title>

                      <v-card-text>
                        <v-container>
                          <v-row>

                            <v-col cols="12" sm="6" md="12">
                                <!-- <v-textarea solo name="input-7-4" rows="7" label="Content"
                                  v-model="editedItem.content_html">
                                </v-textarea> -->
                                <p v-html="editedItem.content_html"  ></p>
                            </v-col>
                          
                          </v-row>
                        </v-container>
                      </v-card-text>

                      <v-card-actions>
                      <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" text @click="close">
                            Cancel
                        </v-btn>
                      </v-card-actions>
                  </v-card>
                </v-dialog>


                    
                </v-toolbar>
                  
              </template>
              


              <!-- action delete edit -->
              <template v-slot:[`item.actions`]="{ item }">
                <v-icon small class="mr-1" @click="editItem(item)">
                  mdi-pencil
                </v-icon>


                <v-icon small class="mr-1" @click="deleteItem(item)">
                    mdi-delete
                </v-icon>

                <v-icon small class="mr-1" @click="previewItem(item)">
                  mdi-eye
                </v-icon>

              </template>

              <template v-slot:no-data>
                  <v-btn color="primary" @click="initialize">
                      Reset
                  </v-btn>
              </template>

            </v-data-table>
          </template>



        </v-app>


      </div>
    </div>

      
  </div>
</template>

<script>
  export default {
    data: () => ({
      singleSelect: false,
      selected: [],


      dialog: false,
      dialogDelete: false,
      dialogPreview: false,
      headers: [
        { text: 'id', value: 'id', width: '6%' },
        { text: 'name', align: 'start', sortable: true, value: 'name', width: '15%'},
        { text: 'title', value: 'title', width: '25%' },
        { text: 'created_at', value: 'created_at', sortable: true, width: '7%' },
        { text: 'vote', value: 'number_vote', width: '9%' },
        { text: 'view', value: 'number_view', width: '9%' },
        { text: 'comment', value: 'number_comment', width: '10%' },
        { text: 'action', value: 'actions', width: '13%' },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        id: '',
        name: '',
        title: '',
        number_vote: '',
        number_view: '',
        number_comment: '',
        content_html: '',
      },
      // defaultItem: {
      //   name: '',
      //   email: '',
      //   address: '',
      // },

      error: ''
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
    },

    created () {
      this.initialize()
    },

    methods: {
      deleteMulti(){
        var str = '';
        for (var i = 0; i < this.selected.length; i++){
          str += this.selected[i].id + ',';
        }

        console.log(this.selected);
        console.log(str);

        axios.delete('/api/admin/post/destroy/'+str)
        .then((res) => {
          console.log(res.data);
          this.initialize();
        })


      },


      initialize () {
        axios.get('/api/posts?tag=home&&search=')
        .then((res) =>{
          console.log(res.data.posts);
          this.desserts = res.data.posts;
        });


        this.desserts = [
          // {
          //     id: 100,
          //     name: 'Arozen Yogurt1',
          //     email: 159,
          //     address: 6.0,
          // },
        ]
      },

      previewItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogPreview = true
      },


      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true

        // console.log(this.editedIndex);
        // console.log(item.id);
      },

      deleteItemConfirm () {
        this.desserts.splice(this.editedIndex, 1)
        this.closeDelete()

        console.log("Deleted: "+ this.editedIndex);
        console.log(this.editedItem.id);

        axios.delete("/api/post/"+this.editedItem.id)
          .then((res) => {
            console.log(res.data);
        })



      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {

        // console.log(this.editedItem)
        
        //check null
        if(this.editedItem.name == "" || this.editedItem.user_web == "" || this.editedItem.email == "" ){
          this.error = "Can not null";
          console.log("null")
          return 0;
        }

          //edit
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)

          axios.put("/api/admin/post/"+this.editedItem.id,{
            title: this.editedItem.title,
            content_html: this.editedItem.content_html,
          })
          .then((res) => {
            console.log(res.data);
          })

        } else {   //add new
          this.desserts.push(this.editedItem)

        //   axios.post("/api/user/",{
        //     name: this.editedItem.name,
        //     email: this.editedItem.email,
        //     address: this.editedItem.address
        //   })
        //   .then((res) => {
        //     console.log(res.data);
        //     this.initialize()
        //   })

        }
        this.close()
      },
    },
  }
</script>

<style scoped>

  ::v-deep p img{
    width: 40% !important;
    height: 40% !important;
  }

  ::v-deep .v-dialog{
    margin-top: 105px !important;
    max-width: 1200px !important;
    max-height: 540px !important;
  }

  ::v-deep .v-text-field__slot textarea{
      font-size: 14px;
  }

  .card-table{
    padding-left: 0px;
    padding-right: 0px;
  }

  ::v-deep .v-icon{
    font-size: 20px !important;
  }

  ::v-deep .v-input--selection-controls__input{
      margin-right: -12px !important;
  }

  ::v-deep .text-start {
      font-size: 12px !important;

  }

  ::v-deep td{
      height: 40px !important;
  }

</style>


<style scoped>



    .ov{
        margin-left: 0px;
        margin-top: 0px;
        padding-right: 10px;
    }

    .panel{
        width: 103%;
        margin-top: -8px;
        margin-bottom: 9px !important;
        margin-left: -9px;
    }

    .card{
        width: 103%;
        margin-left: -9px;
    }


</style>

<style scoped src="../assets/bs3/css/bootstrap.min.css"></style>
<style scoped src="../assets/css/bootstrap-reset.css"></style>
<style scoped src="../assets/css/style.css"></style>
<style scoped src="../assets/css/style-responsive.css"></style>

<style scoped src="../assets/font-awesome/css/font-awesome.css"></style>
