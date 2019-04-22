<template>
    <div class="flex">
        <div class="absolute pin-r p-1">
         <button 
            @click="editLayout(tables)" 
            :class="{'bg-green' : editingActive}"
            class="w--12 h-8 px-4  bg-blue rounded"
            
            >
            <span v-show="editingActive">
                editing
            </span>
            <span v-show="!editingActive">
                edit
            </span>
        </button>
         <button 
            @click="RESET_STATE()" 
            class="w--12 h-8 px-4 bg-purple rounded"
            
            >
            <span>
                reset state
            </span>
        
        </button>

        </div>
  
        <div class="w-full h-screen" :style="'background-color: ' + backgroundColor">
            <div class="h-8">
                <span v-show="editingActive">

                    <!-- begin of color picker -->
                    <span class="flex">
                        <button @click="togglePicker()" class="border bg-grey-lighter border-grey-light rounded-sm  w-8 h-8 m-2 ">
                            <span class="inline-block bg-black h-4 w-4 rounded-sm" :style="'background-color: ' + backgroundColor"></span>
                        </button>
                        <p>background color</p>
                    </span>
                    <sketch-picker
                        v-if="displayPicker"
                        @input="updateValue"
                        v-model="colors"
                        class="mt-2 z-50"
                    >
                    </sketch-picker>
                    <!-- end of color picker -->
            
                <vdr
                    
                    v-for="(table, index) in tables"
                    v-bind:key="index"
                    :w="100" 
                    :h="100"
                    :x="table.left"
                    :y="table.top"
                    :parent="true"
                    :class="'bg-green h-32 w-32'"
                    @dragging="onDrag(index, ...arguments)" 
                >
                     <span class="">         
                         {{table.number}}         
                    </span>
                </vdr>
            
                </span>
                <div v-for="(table, index) in tables" v-bind:key="index" v-show="!editingActive">
                      <a  
                            @click="OPEN_BILL(table)"  
                            :style="'top:'+ table.top + 'px;left:' + table.left + 'px;'"  
                            :key="table.id" 
                            :href="'/tables/'+ table.id"
                            style="position: absolute;"  
                            class="w-32 h-32 flex mr-2 mb-2 rounded bg-grey cursor-pointer items-center justify-center text-3xl font-bold text-white no-underline ">
                            
                                <span class="">
                                
                                    {{table.number}}
                                    
                                </span>
                            
                        </a>
                        <a 
                            @click="CLOSE_BILL(table)" 
                            :style="'top:'+ table.top + 'px;left:' + table.left + 'px;'" 
                            style="position: absolute;"   
                            class="w-32 h-8 rounded-t bg-blue cursor-pointer  pin-t pin-r"> 
                        
                          
                            ask for bill
                            
                        </a>
                </div> 
            </div >
            
        </div>
    </div>
</template>
<script>

//vuex import begin
import {mapState} from "vuex"
import {mapMutations} from "vuex";
import {mapGetters} from "vuex";
//vuex import end

// we are importing the color picker
import sketch from '../../../node_modules/vue-color/src/components/Sketch.vue'


// and creating the variable it uses
var colors = {
    hex: '#194d33',
    hsl: { h: 150, s: 0.5, l: 0.2, a: 1 },
    hsv: { h: 150, s: 0.66, v: 0.30, a: 1 },
    rgba: { r: 25, g: 77, b: 51, a: 1 },
    a: 1
};

// end of color picker import

// begin of vue-pose import
import vdr from  '../../../node_modules/vue-draggable-resizable'


// end of draggable import

export default {
    
    components:{
        'sketch-picker': sketch,
        vdr,
         
       
    },
    data() {
        return{
            test: 'test working',
            // tables
            tables: {},

            //api requests
            getUrl: '/api/v.01/tables',
            postUrl: '/api/v.01/tables',


            // editing data
            editingActive: false,

                // background color picker
                colors,
                currentColor: '',
                displayPicker: false,
                backgroundColor: '#413F3E'

                // position
        }
    },
    computed: {...mapState(['bills'])},
    methods: {
         //we map all methods referent to adding and closing tables
        ...mapMutations(['RESET_STATE','OPEN_BILL' , 'CLOSE_BILL']),

        // we do a ajax request to get the table data
        fetchTables() {
            axios.get(this.getUrl).then((res) => {
                this.tables = res.data.data;
            });
        },

        updateTable(tables) {
            axios.post(this.postUrl , this.tables).then((res) => {
                
            });
        },

        // editing methods
            // background color
            updateValue(value) {
                this.currentColor = value;
                this.backgroundColor = this.currentColor.hex;

            },
            //editing method
            editLayout(tables){

               let postedTables =  this.tables;
                    console.log(this.postedTables);
                axios.post(this.postUrl , this.postedTables).then((res) => {

                });
                this.editingActive =!this.editingActive;                
            },
            // vue-color input methods
            togglePicker() {
                this.displayPicker = !this.displayPicker;
            },
            //dragged methods
            onDrag(index, x, y) {
                const old = [index , x ,y];
                this.tables[index].top = y; 
                this.tables[index].left = x; 
              console.log(index , x, y, old);
            }, 

    },
    created(){
        },
    mounted() {
        this.fetchTables();
    
    },
}
</script>

