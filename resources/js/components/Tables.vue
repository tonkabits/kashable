<template>
    <div class="flex">
        <div class="w-1/4 h-full">
        <button 
            @click="editingActive = !editingActive" 
            :class="{'bg-green' : editingActive}"
            class="w-full h-8"
            >
            <span v-show="editingActive">
                editing
            </span>
            <span v-show="!editingActive">
                edit
            </span>
        </button>
        <span v-show="editingActive" class="">
            
            <div class="h-16 flex mt-4">
                <h3>TABLES</h3>
                <button class="h-8 bg-orange p-2 rounded text-sm"> update</button>
            </div>
             <div v-for="(table, index) in tables" v-bind:key="index"> 
                
                <span>

                        <div class="flex mb-3">
                            <p>table number {{table.id}}</p>

                            <input 
                            type="text"
                            class="w-16 h-6 border text-xs rounded-l ml-4 p-2"
                            v-model="table.top"
                        
                            >
                        
                            <input 
                            type="text"
                            class="w-16 h-6 border text-xs rounded-r p-2"
                            v-model="table.left"
                        
                            >

                        </div>
                    </span>
                </div>
            
        </span>

        </div>
        <div class="w-3/4 h-screen" :style="'background-color: ' + backgroundColor">
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
            </span>
        </div>
               
                <div v-for="(table, index) in tables" v-bind:key="index" class="w-full flex flex-col flex-wrap"  >
               <!-- <Box v-show="editingActive" class="box"/> -->
                     
                     <a 
                            v-show="editingActive" 
                            :style="'top:'+ table.top + 'px;left:' + table.left + 'px;'" 
                            style="position: absolute;" 
                            class="w-32 h-32 flex mr-2 mb-2 rounded bg-red cursor-pointer items-center justify-center text-3xl font-bold text-white no-underline ">
                        <span>
                            <!-- inline svg icon for moving tables -->
                            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2929 5.29289C15.6834 4.90237 16.3166 4.90237 16.7071 5.29289L19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711C19.3166 10.0976 18.6834 10.0976 18.2929 9.70711L17 8.41421V15H23.5858L22.2929 13.7071C21.9024 13.3166 21.9024 12.6834 22.2929 12.2929C22.6834 11.9024 23.3166 11.9024 23.7071 12.2929L26.7071 15.2929C27.0976 15.6834 27.0976 16.3166 26.7071 16.7071L23.7071 19.7071C23.3166 20.0976 22.6834 20.0976 22.2929 19.7071C21.9024 19.3166 21.9024 18.6834 22.2929 18.2929L23.5858 17H17V23.5858L18.2929 22.2929C18.6834 21.9024 19.3166 21.9024 19.7071 22.2929C20.0976 22.6834 20.0976 23.3166 19.7071 23.7071L16.7071 26.7071C16.3166 27.0976 15.6834 27.0976 15.2929 26.7071L12.2929 23.7071C11.9024 23.3166 11.9024 22.6834 12.2929 22.2929C12.6834 21.9024 13.3166 21.9024 13.7071 22.2929L15 23.5858V17H8.41421L9.70711 18.2929C10.0976 18.6834 10.0976 19.3166 9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071L5.29289 16.7071C4.90237 16.3166 4.90237 15.6834 5.29289 15.2929L8.29289 12.2929C8.68342 11.9024 9.31658 11.9024 9.70711 12.2929C10.0976 12.6834 10.0976 13.3166 9.70711 13.7071L8.41421 15H15V8.41421L13.7071 9.70711C13.3166 10.0976 12.6834 10.0976 12.2929 9.70711C11.9024 9.31658 11.9024 8.68342 12.2929 8.29289L15.2929 5.29289Z" fill="#C4C4C4"/>
                            </svg>
                        </span>
                     </a>
                    
                    
                    <div  v-show="!editingActive" >
                        <a  
                            @click="OPEN_TABLE(table)"  
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
                            @click="CLOSE_TABLE(table)" 
                            :style="'top:'+ table.top + 'px;left:' + table.left + 'px;'" 
                            style="position: absolute;"   
                            class="w-32 h-8 rounded-t bg-blue cursor-pointer  pin-t pin-r"> 
                        
                          
                            ask for bill
                            
                        </a>
                    </div>
                </div>
            
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
import posed from '../../../node_modules/vue-pose'


// end of draggable import

export default {
    
    components:{
        'sketch-picker': sketch,
        Box: posed.div({
            draggable: true,
        }),
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
    computed: {...mapState(['opentables'])},
    methods: {
         //we map all methods referent to adding and closing tables
        ...mapMutations(['OPEN_TABLE' , 'CLOSE_TABLE']),

        // we do a ajax request to get the table data
        fetchTables() {
            axios.get(this.getUrl).then((res) => {
                this.tables = res.data.data;
            });
        },

        updateTable(tables) {
            axios.post(this.postUrl , this.tables).then((res) =>{
                
            });
        },

        // editing methods
            // background color
            updateValue(value) {
                this.currentColor = value;
                this.backgroundColor = this.currentColor.hex;

            },
            // vue-color input methods
            togglePicker() {
                this.displayPicker = !this.displayPicker;
            }, 

    },
    created(){
        },
    mounted() {
        this.fetchTables();
        
        //this mounted hook is working
        //     window.axios.get('/api/v.01/tables').then(({ data }) => {
        //         console.log(data)
        //         this.tables.push(data)

        // });
    
    },
}
</script>
<style>

.box {
  width: 100px;
  height: 100px;
  background: #54E365;
}
.box2 {
  width: 200px;
  height: 200px;
  background: rgb(84, 122, 227);
}
</style>
