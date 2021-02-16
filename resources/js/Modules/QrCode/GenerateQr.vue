<template>
    <div> 
        <form>
            <qrcode :value='datas' :options="{ width: 500 }"></qrcode>
        </form> 
    </div>
</template>

<script>

    export default {
        props: ['datas'],
    }
</script>

<style lang="scss" scoped>

</style>