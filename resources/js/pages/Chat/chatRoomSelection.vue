<template>
	<div class="">
		<div class="chat">
			Room: {{ selected.name }}
		</div>

		<div>
			<select
				v-model="selected"
				@change="$emit('roomchanged',selected)"
				class="float-right rounded-full form-control">
				<option v-for="(room,index) in rooms" 
					class="form-control"
					:key="index" 
					:value="room">
					{{room.name}}
				</option>
	
				
			</select>		
		</div>
	</div>
</template>

<script>
	export default{
		props:['rooms','currentRoom'],
		data: function(){
			return{
				selected:''
			}
		},
		created(){
			this.selected = this.currentRoom;
		}
	}
</script>


<style scoped>
	select{
		width: 200px;
		margin-top: -35px;
		margin-right: 12%;
	}

	.chat{
		font-weight: bold;
		padding-top: 27px;
		padding-left: 12%;
	}
</style>