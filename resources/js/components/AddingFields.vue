<template>
    <div>
        <ul v-for="(person, index) in persons" v-bind:key="index">
            <li class="py-2">{{person.name}}  |  {{person.lastname}} <button @click="REMOVE_PERSON_FROM_LOCALSTORAGE(person)" class="text-xs rounded-sm bg-red text-white px-2 py-1">remove</button></li>
        </ul>
      
      <input type="text" placeholder="Name" class="border" v-model="person.name">
      <input type="text" placeholder="Lastame" class="border" v-model="person.lastname">
      <button @click="ADD_PERSON_TO_LOCALSTORAGE(person)" class="bg-blue px-2 py-1">add item</button>
    </div>
    
</template>
<script>

//vuex import begin
import {mapState} from "vuex"
import {mapMutations} from "vuex";
import {mapGetters} from "vuex";
//vuex import end

export default {
    data(){
        return{
         person: {
             name: this.name,
             lastname: this.lastname,

         }
        }
    
    },
    computed: {...mapState(['persons'])},
    methods:{
        ...mapMutations(['ADD_PERSON_TO_LOCALSTORAGE' , 'REMOVE_PERSON_FROM_LOCALSTORAGE']),
        // this are the methods for no persistence

        // addItem(name, lastname){
        //     this.persons.push({
        //         name: name,
        //         lastname: lastname,
        //     });
        //     this.name = null,
        //     this.lastname = null
        // },

        // removeItem(index){
        //     this.persons.splice(index, 1);
        // }
    }
}
</script>
