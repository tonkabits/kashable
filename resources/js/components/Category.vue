<template>
    <div class="">
        <div class="w-32 h-8 my-2 px-4" :class="{'text-blue font-bold' : category.id === activeCategory}">
        {{category.name}}

        </div>
    </div> 
</template>
<script>

export default {
    props: ['category' , 'activeCategory'],
    
    data() {
        return{
            text: 'vue working',
         
        }
    
    },
    computed: {
        
    },
}
</script>
