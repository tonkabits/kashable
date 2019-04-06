import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistance from 'vuex-persist';


Vue.use(Vuex)

const state = {
    persons: []
    
}
const getters = {
    personsStored: state => (state.persons) ? state.persons.length : 0,
}
const mutations = {
    ADD_PERSON_TO_LOCALSTORAGE({persons}, person){
        persons.push({
            
            name: person.name,
            lastname: person.lastname,
            
        })
    },
    REMOVE_PERSON_FROM_LOCALSTORAGE({persons} , person){
        persons.splice(
            persons.indexOf(person), 1);
    }
    
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