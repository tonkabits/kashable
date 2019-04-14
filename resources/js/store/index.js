import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistance from 'vuex-persist';


Vue.use(Vuex)

const state = {
    persons: [],
    opentables: [],
    
}
const getters = {
    personsStored: state => (state.persons) ? state.persons.length : 0,
    openTables: state => (state.opentables) ? state.opentables.length : 0,
}
const mutations = {
    // begin this are the methods for adding persons
    ADD_PERSON_TO_LOCALSTORAGE({persons}, person){
        persons.push({
            
            name: person.name,
            lastname: person.lastname,
            
        });
        person.name = " ",
        person.lastname = " "
    },
    REMOVE_PERSON_FROM_LOCALSTORAGE({persons} , person){
        persons.splice(
            persons.indexOf(person), 1);
    },
    // end of methods for adding persons

    // begin of VUEX methods to open and close tables
    OPEN_TABLE({opentables} , table){
        opentables.push({
            tableNumber: table.id,
            serviceCosts: {
                minimun: 2,
                tax: 1,
            }

        });
    },
    CLOSE_TABLE({opentables} , table){
        opentables.splice(
            opentables.indexOf(table), 1);
    },
    // end of open and close table code

}
const vuexLocal = new VuexPersistance({
    storage: window.localStorage
}) 

export default new Vuex.Store({
    state,
    getters,
    mutations,
    plugins: [vuexLocal.plugin]
});