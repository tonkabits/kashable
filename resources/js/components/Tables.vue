<template>
    <div class="flex">
        <div class="w-1/4 h-full">1

        </div>
        <div class="w-3/4 h-full">3
            <div v-bind:style="floorplan">
                floorplan
                <ul v-for="(table, index) in tables" v-bind:key="index">
                    <li :style="table.style2" :key="table.id"  >
                        <p>
                            {{table.number}}
                        </p>
                      
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return{
            test: 'test working',
            floorplan:{
                width: '900px',
                height: '400px',
                backgroundColor: '#d4d4d4',
            },
            tables: {}
        }
    },
    methods: {
        fetchTables() {
            axios.get('/api/v.01/tables').then((res) => {
                this.tables = res.data.data;
            });
        }
    },
    created(){
        this.fetchTables();
    },
    mounted() {
        
        //this mounted hook is working
        //     window.axios.get('/api/v.01/tables').then(({ data }) => {
        //         console.log(data)
        //         this.tables.push(data)

        // });
    
    },
}
</script>

