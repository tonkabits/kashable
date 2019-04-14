<template>
    <div class="bg-white">
        <div class="h-8">
            current selected table {{selectedtable}}
        </div>
        {{bill}}
    </div>

</template>
<script>
export default {
    props: ['selectedtable'],
    data() {
        return{
            bill:'vue is working'
        }
    },
}
</script>
