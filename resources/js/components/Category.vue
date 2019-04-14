<template>
    <div class="">
        <div class="w-32 h-8 my-2 px-4" :class="{'text-blue font-bold' : category.id === activeCategory}">
        {{category.name}}

        </div>
    </div> 
</template>
<script>
import plate from './Plate.vue';
export default {
    props: ['category' , 'activeCategory'],
    components: {plates:'plates'},
    data() {
        return{
            text: 'vue working',
         
        }
    
    },
    computed: {
        
    },
}
</script>
