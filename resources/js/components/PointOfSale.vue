<template>
<div class="flex">
    <div class="w-3/4 flex bg-green">
        <div class="w-64 pl-4">

            <div v-for="category in this.categories" :key="category.id" class="w-full" @click="makeThisActiveCategory(category.id)">
                <category 
                
                    :category="category"
                    :activeCategory="activeCategory" 
                
                ></category>
            </div>
       

        </div>
        <div class="w-full h-32 flex flex-wrap">

            <div v-for="plate in this.plates" :key="plate.id">
                <plate 
                
                    :plate="plate" 
                    :activeCategory="activeCategory"
                    
                ></plate>
            </div>
         

        </div>
    </div>
    
    <div class="w-1/4 bg-blue">
        <bill-layout
            :selectedtable="selectedtable"
        
        
        ></bill-layout>

    </div>
</div>
</template>
<script>

//vuex import begin
import {mapState} from "vuex"
import {mapMutations} from "vuex";
import {mapGetters} from "vuex";
//vuex import end

// import of components
import category from './Category.vue';
import plate from './Plate.vue';


export default {
    props:['selectedtable' , 'plates' , 'categories' ,],
    data() {
        return{
            activeCategory: 10,
            
        }
    },
    computed: {...mapState(['opentables'])},
    methods:{
        //we map all methods referent to adding and closing tables
        ...mapMutations(['OPEN_TABLE' , 'CLOSE_TABLE']),
        
        makeThisActiveCategory(id){
            this.activeCategory = id;
        },

    },
}
</script>

