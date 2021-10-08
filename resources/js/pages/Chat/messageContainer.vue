<template>
    <div class="container content scrollbar" id="style-1" ref="scro" >
		<div class="text">
			<div v-for="(message, index) in messages" :key="index">
				<message-item  :message="message"/>
			</div>


			<div v-if="error != ''" class="chat-null"> 
				<label  v-html="error">   </label> 
			</div>

			<div v-else>
				<div class="chat-null" v-if="messages[0] == null"> Chưa có tin nhắn nào tại  {{currentRoom.name}} !!!  </div>
			</div>


		</div>


		<div class="force-overflow"></div>

	</div>
</template>

<script>
import messageItem from './messageItem.vue'
	export default {
		components: {messageItem},
		props: ['messages','currentRoom'], 

		data(){
			return{
				error: '',
			}
		},

		created(){	
			this.checkAuthenticated()
		},

		mounted(){
			this.setScrollDown()
		},


		methods:{
			setScrollDown: function(){
				this.settime = setTimeout(function(){
					var elem = document.getElementById('style-1');
					elem.scrollTop = elem.scrollHeight;
				}.bind(this), 1500);

			},

			// setIntervalScroll: function(){
			// 	this.intervalid1 = setInterval(function(){
			// 		var elem = document.getElementById('style-1');
			// 		elem.scrollTop = elem.scrollHeight;
			// 	}.bind(this), 100);
			// },

			checkAuthenticated: function(){
				axios.get('/api/checkauth')
				.then(res => {
					// console.log(res)
					if(res.data == 1){
						
					}else{
						this.error = 'Đăng nhập đã rồi Chat chứ bạn eyyyy... </br> Chưa đăng nhập mà đòi Chat cái gi... =)))';
					}
				
				})
			}
		}


		 




	}



</script>

<style scoped>
	.scrollbar {
        /* overflow-y: scroll; */
		overflow: hidden;
		overflow-y: scroll;
		height: calc(100vh - 20px);
    }

    .force-overflow {
        min-height: 10px;
    }
    #style-1::-webkit-scrollbar {
        width: 4px;
        background-color: #F5F5F5;
    } 
    #style-1::-webkit-scrollbar-thumb {
        background-color: #d9d9d9;
    }

	.chat-null{
		font-size: 25px;
		padding-left: 27%;
		padding-top: 23%;

	}


	.text{
		/* position: absolute;  */
		/* bottom: 12%; */
		overflow: hidden;
		position:relative; 
		word-wrap: break-word;
	}

	.content{
		height: 500px;
		border-bottom: 1px solid rgb(221, 205, 205) !important;
	}

	.container {
		border-right: none !important;
		border-left: none !important;
		border-top: none !important;
	}
</style>