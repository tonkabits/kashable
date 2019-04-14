<template>
    <div @click="pressed()" v-show="activeCategory == this.plate.category_id" class="w-32 h-32 bg-green-dark mr-4 mb-4 pr-1 pb-1 rounded-lg cursor-pointer">
       
        
         {{this.plate.name}}
        
       
       
    </div>
</template>
<script>
export default {
    props: ['plate', 'activeCategory'],
    
    data(){
        return{
            text: 'plate',
            
        }
    },
    methods:{
        pressed(){
            alert('added product ' + this.plate.name)
        }
    }
}
</script>
