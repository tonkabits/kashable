<template>
    <div @click="pressed()" v-show="activeCategory == this.plate.category_id" class="w-32 h-32 bg-green-dark mr-4 mb-4 pr-1 pb-1 rounded-lg cursor-pointer">
       
        
         {{this.plate.name}}
        
       
       
    </div>
</template>
<script>

//vuex import begin
import {mapState} from "vuex"
import {mapMutations} from "vuex";
import {mapGetters} from "vuex";
//vuex import end

export default {
    props: ['plate', 'activeCategory'],
    
    data(){
        return{
            text: 'plate',
            
        }
    },
    computed: {...mapState(['currentBills'])},
    methods:{
        pressed(){
            alert('added product ' + this.plate.name)
        },
        ...mapMutations([
            
            'OPEN_TABLE',
            'CLOSE_TABLE',
            'ADD_DISH_TO_TABLE_BILL',
            'REMOVE_DISH_FROM_TABLE_BILL',
        
        ]),
    }
}
</script>
