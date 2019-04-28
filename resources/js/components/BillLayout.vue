<template>
    <div class="bg-white flex justify-between rounded mx-2 p-4 flex flex-col">
        <div class="flex flex-col h-64 overflow-y-scroll">
            <span class="">
                <h3>Table {{selectedtable}} Bill</h3>
            </span>
            <hr>
            <div  v-for="item in this.activeTableBill" :key="item" class="">
                <div class="flex h-6 justify-between w-full px-1 py-1">
                {{item.name}}
                    <span class="flex">{{item.price}}</span>
                </div>
            </div>
        </div>
        <div class="h-16 bg-grey-lightest rounded flex flex-col">
            <div class="w-full mb-0 h-8">
                <div class="flex justify-between w-full px-2 py-2"> before tax
                    <span class="flex">{{beforeTax()}}</span>
                </div>
            </div>
            <div>
                <div class="flex justify-between w-full px-2 py-2 font-bold">Total
                    <span class="flex font-bold">{{afterTax()}}</span>
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


export default {
    props: ['selectedtable'],
    computed: {...mapState(['bills'])},
    created(){
        this.fetchBill();
    },
    data() {
        return{
             activeTableBill: [],
             taxPercentage: 7,
        }
    },
    methods: {
       fetchBill(){
            const bill = this.bills.find( b => b.tableBill.id == this.selectedtable);
            // console.log(this.bills[2].tableBill.id == this.selectedtable);
            // console.log(bill);
            let activeTableBill = bill.tableBill.content;
            this.activeTableBill = activeTableBill;
            // console.log(activeTableBill);
            // return activeTableBill;
        
       },
       beforeTax(){
           return this.activeTableBill.reduce((beforeTax , bt) => {return beforeTax + bt.price}, 0)
       },
       afterTax(){
           let beforeTax = this.beforeTax();
           console.log(beforeTax);
           let afterTax = beforeTax + (beforeTax * this.taxPercentage / 100);
           return afterTax;
        //    return beforeTax() * this.taxPercentage;
       }
    }
}
</script>
