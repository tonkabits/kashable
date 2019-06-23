<template>
    <div class="mr-4 bg-blue-dark rounded rounded-l-none" :class="{'bg-indigo-darker' : category.id === activeCategory}">
        <div class="flex items-center text-white w-32 h-16 mb-2 px-4" :class="{'text-white font-bold' : category.id === activeCategory}">
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
