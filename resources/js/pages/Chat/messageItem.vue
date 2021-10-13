<template>
	<div class="ctn">
		<div class="col1">
			<img class="avatar" :src="message.avatar" alt="">
		</div>
		<div class="col2">
			<div class="col2-1">

				<router-link :to="'account/'+message.user_id">
					{{message.name}}
				</router-link>

			</div>
			
			<div class="col2-2">
				<div class="message-content" v-html="message.message"></div>
			</div>

		</div>
		
	</div>
</template>

<script>
	export default{
		props:['message'],

		created(){
			
		},

		methods: {




		}
	}
</script>

<style scoped>
	.col2-2{
		background: rgb(232 230 245);;
		border-radius: 0px 8px 8px 0px;
	}

	.message-content{
		padding: 5px 5px 5px 5px;
		font-size: 13px;
	}

	.ctn{
		display: flex;
		margin-top: 15px;
		max-width: 1050px;

	}

	/* ::v-deep .message-content img {
		max-width: 100px !important;
		max-height: 100px !important;
	} */

	.message-content >>> img {
		max-width: 400px !important;
		max-height: 200px !important;
		display: block;
	}

	.message-content >>> iframe{
		min-width: 400px !important;
		min-height: 250px !important;
		max-width: 400px !important;
		max-height: 300px !important;
		display: block;
	}

	.ctn .col2 .col2-2:hover{
		color: rgb(33, 5, 111);
	}

	.avatar{
		width: 33px;
		height: 33px;
		border-radius: 50%;
		margin-top: 5px;
	}

	.col2{
		margin-left: 12px;
		
	}

	.col2-1{
		font-weight: bold;
	}

	.col2-1 a{
		font-size: 13px;
		
	}

	.col2-2{
		margin-top: 7px;

	}

	.col2-2 h6{
		overflow: hidden;
	}
</style>