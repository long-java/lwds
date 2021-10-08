<template>
    <div>

		<vue-tags-input
			v-model="tag"
			:tags="tags"
			:autocomplete-items="filteredItems"
			@tags-changed="newTags => tags = newTags"
		/>
     
    </div>
</template>



<script>
	
	import VueTagsInput from '@johmun/vue-tags-input';


    export default {

		components: {
			VueTagsInput,
		},

		data() {
			return {
				tag: '',
				tags: [],
				
				autocompleteItems: [
					{
						value: 1, 
						text: '',
						
					}, 
					{
						value: 2,
						text: '',
					}


				],


			};
		},

		created() {
			this.getAllTags()
		},

		methods: {
			getAllTags: function() {
                axios.get("/api/tag")
                .then(res => {
					if(res.data.status == true){
						this.autocompleteItems = res.data.tags;
						console.log(res);
                        
                    }else{
                        
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
		},

		
	};


</script>


<style scoped>

    .vue-tags-input{
        max-width: 97% !important;
        min-width: 97% !important;
        width: 97% !important;
		margin-top: 20px;
    }



</style>