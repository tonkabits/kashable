<template>
    <div 

        @click="ADD_PLATE_TO_TABLE_BILL({plate, selectedtable})"
        v-show="activeCategory == this.plate.category_id"
        class="w-32 h-32 bg-indigo-darkest flex flex-col justify-between mr-4 mb-4 rounded-lg cursor-pointer"
        :plate="plate"
        :selectedtable="selectedtable"
        >
        <div class="flex">

        </div>
        <div class="flex bg-indigo-darker text-white h-8 p-2 justify-between rounded-b">

            {{this.plate.name}}
            <span class="flex">
                {{this.plate.price}}
            </span>

        </div>
         
        
       
       
    </div>
</template>
<script>

//vuex import begin
import {mapState} from "vuex"
import {mapMutations} from "vuex";
import {mapGetters} from "vuex";
//vuex import end

export default {
    props: ['plate', 'selectedtable', 'activeCategory'],
    
    data(){
        return{
            text: 'plate',
            
        }
    },
    computed: {...mapState(['bills'])},
    methods:{
        pressed(){
            alert('added product ' + this.plate.name)
        },
        ...mapMutations([
            
            'OPEN_TABLE',
            'CLOSE_TABLE',
            'ADD_PLATE_TO_TABLE_BILL',
            'REMOVE_PLATE_FROM_TABLE_BILL',
        
        ]),
    }
}
</script>
