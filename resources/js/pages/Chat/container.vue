<template>
    <div class="">

        <div class="room">
            <template>
                
                <h2 class="">
                    <chat-room-selection 
                        v-if="currentRoom.id"
                        :rooms="chatRooms"
                        :currentRoom="currentRoom"
                        v-on:roomchanged="setRoom( $event )"

                    
                    />
                </h2>
            </template>
        </div>

        <div class="contai">
            <div class="">

                <div class="flex">

                    <div class="chat-current">
                        <member-online 
                            :membersOnline = "membersOnline"
                        />
                    </div>

                    <div class="chat-main">
                        <message-container
                            :currentRoom="currentRoom"
                            :messages="messages" />
                        <input-message 
                            :room="currentRoom" 
                            v-on:messagesent="getMessages()"/>
                    </div>



                </div>
            </div>
        </div>


        <div class="null"></div>



    </div>


</template>

<script>
    // import { defineComponent } from 'vue'
    import MessageContainer from './messageContainer.vue'
    import InputMessage from './inputMessage.vue'
    import ChatRoomSelection from './chatRoomSelection.vue'
    import MemberOnline from './memberOnline.vue'

    import Echo from 'laravel-echo'
    import Pusher from 'pusher-js';

    export default{
        components: {
            MessageContainer,
            InputMessage,
            ChatRoomSelection,
            MemberOnline
        },

        data: function(){
            return {
                chatRooms: [],
                currentRoom: [],
                messages: [],
                membersOnline: [],

            }
        },

        created(){
            this.getRooms();

        },

        mounted(){

        },

        watch: {
            currentRoom(val, oldVal){
                if(oldVal.id){
                    this.disconnect( oldVal );
                }
                this.connect();
            },

        },

        methods: {

            playSound () {
                var data = { soundurl : 'https://res.cloudinary.com/dm9r6ilqz/video/upload/v1633515677/Sound/sms-alert-2-daniel_simon_umiosp.mp3'}
                var audio = new Audio(data.soundurl);
                audio.play();
            },

            connect(){
                if(this.currentRoom.id){
                    let vm = this;
                    this.getMessages();

                    // window.Echo.join("chat." + this.currentRoom.id).  //join => private
                    // listen('.message.new', e => {
                    //     vm.getMessages();
                    // }).
                    // here((users) =>{
                    //     console.log(users);
                    // });

                    const echo = new Echo({
                        broadcaster: "pusher",
                        key: "77101dd21815570bff42",
                        cluster: "us2"
                    })

                    echo.join("chat." + this.currentRoom.id)
                    .listen('.message.new', e => {
                        vm.getMessages();
                        this.playSound();


                    })
                    .here((users) => {
                        this.membersOnline = users;
                    });




                }
            },


            disconnect(room){
                // window.Echo.leave("chat." + room.id);

                const echo = new Echo({
                    broadcaster: "pusher",
                    key: "77101dd21815570bff42",
                    cluster: "us2"
                })
                echo.leave("chat." + room.id);

            },

            getRooms(){
                axios.get('/api/chat/rooms')
                .then(res => {
                    this.chatRooms = res.data;
                    this.setRoom( res.data[0]);
                })
                .catch( error => {
                    console.log(error);
                })
            },

            setRoom( room ){
                this.currentRoom = room;
            },

            getMessages(){
                axios.get('/api/chat/room/' + this.currentRoom.id + '/messages')
                .then( res => {
                    this.messages = res.data;
                })
                .catch( error => {
                    console.log(error);
                })
            }
        }
    }
</script>

<style scoped>
    .flex{
        display: flex;
    }

    .chat-current{
        background: rgb(139 207 111);
        width: 17%;
        border-radius: 10px 0px 0px 10px;
    }

    .chat-main{
        width: 83%;
        background: rgb(253, 249, 249);
        padding-bottom: 20px;
        border-radius: 0px 10px 5px 0px;
    }


    /* old */
    .contai{
        margin-left: 4%;
        margin-right: 4%;
        margin-top: 1%;
        background: #fff;
        height: auto;
        border-radius: 10px 10px 10px 10px;
    }

    .room{
        background: #fff;
        height: 80px;
    }

    .null{
        height: 100px;
    }
</style>