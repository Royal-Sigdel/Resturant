<template>
    <div class="container">
        <form action="#" class="wrapper">
            <div class="form-group">
                <label for="name">Customer Name</label>
                <input type="text" class="form-control" v-model="customer.name">
            </div>

            <div class="form-group">
                <label for="name">Phone No.</label>
                <input type="text" class="form-control" v-model="customer.phone">
            </div>

            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" class="form-control" v-model="customer.Address">
            </div>

        </form>
    </div>
</template>
<script>
export default {
    data(){
        return{
            customer: {
                name: 'Not Provided',
                phone: 123456789,
                Address: 'Not Provided'
            }
        
        }
    },
    watch: {
        customer: {
            handler(value){
            let customer = {
                name: value.name,
                Address: value.Address,
                phone: value.phone,
              }
            this.$emit('customerDetailsChanged',customer);
            }, deep:true
        }
    }
}
</script>