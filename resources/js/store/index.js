import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistance from 'vuex-persist';


Vue.use(Vuex)

const state = {
    persons: [],
    bills: {},
    
}
const getters = {
    personsStored: state => (state.persons) ? state.persons.length : 0,
    currentBills: state => (state.bills) ? state.bills.lenght : 0,

    // openTables: state => (state.opentables) ? state.opentables.length : 0,
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
    OPEN_TABLE({tables} , table){
        tables.push({
            tableNumber: table.id,
            serviceCosts: {
                minimun: 2,
                tax: 1,
            }

        });
    },
    CLOSE_TABLE({tables} , table){
        tables.splice(
            tables.indexOf(table), 1);
    },
    // end of open and close table code


    // open and close bill from the tables pages
    OPEN_BILL({bills}, table){
        
    },
    CLOSE_BILL({bills} , table){

    },




    //add dish to table
    ADD_DISH_TO_TABLE_BILL({bill}, dish ){
        const inRecord = bill.find( d => d.id === dish.id);
        
        if(!inRecord){

            bill.push({
                dish: dish.id,
                name: dish.name,
                price: dish.price,
                quantity: 1,
            })
        }else{
            inRecord.quantity++
        }
    },
    REMOVE_DISH_FROM_TABLE_BILL({bills}, dish ){
        const inRecord = bill.find( d => d.id === dish.id );
        if(inRecord.quantity > 1){
            inRecord.quantity--
        }
    },
    // end of adding to table



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