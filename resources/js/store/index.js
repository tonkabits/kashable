import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistance from 'vuex-persist';


Vue.use(Vuex)
//lets create a default state to reset to
const getDefaultState = () => {
    return {
        persons: [],
        bills: [],
        
    }
} 
const state = {
    persons: [],
    bills: [],
    
    
}
const getters = {
    personsStored: state => (state.persons) ? state.persons.length : 0,
    itemsInBills: state => (state.bills) ? state.bills.length : 0,
    

    // openTables: state => (state.opentables) ? state.opentables.length : 0,
}
const mutations = {

    //reset method for the store
    RESET_STATE (state) {
        Object.assign(state, getDefaultState())
    },
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
        const openTable = bills.find( t => t.number === table.number);
            
        if(!openTable) {
            //lets create a date and format it
            let currentTime = new Date();
            let formatedDate = 
            currentTime.getDate() 
            + "-" + currentTime.getMonth()
            + "@" + currentTime.getHours()
            + ":" + currentTime.getMinutes(); 
            
            //open the table (change status from table)
            let tableBill = {
                
                id: table.number,
                status: 1,
                openAt: formatedDate,
                content: [],
                
            }
            bills.push({
                tableBill
            })
            //create a bill
            // console.log(tableBill)
            
            //return bill id
            return this.tableBill
        }else{
            //go to open table bill
            //return bill id
            
        }
    },
    CLOSE_BILL({bills} , table){

    },




    //add dish to table
    ADD_PLATE_TO_TABLE_BILL({bills}, { plate, selectedtable}){

        const bill  = bills.find( b => b.tableBill.id === selectedtable);

        // const plateInBill = bill.find( p => p.tableBill.content === );
        //variable testing
        // console.log(bill.tableBill);
        // console.log(bills);
        // console.log(plate);
        // console.log(selectedtable);
        
        // let billContent = bill.content
        // console.log(selectedtable);
            bill.tableBill.content.push({
                plate: plate.id,
                name: plate.name,
                price: plate.price,
                quantity: 1,
            });
       
    },
    REMOVE_PLATE_FROM_TABLE_BILL({bills}, {item, selectedtable}){
        
        const bill = bills.find(b => b.tableBill.id === selectedtable);
        // const inRecord = bill.splice( d => d.id === dish.id );
        const content = bill.tableBill.content;
        content.splice(
            content.indexOf(item) , 1)
        
        // if(inRecord.quantity > 1){
        //     inRecord.quantity--
        // }
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