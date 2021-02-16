<template>
    <table class="table table-hover table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>Order Id</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Customer Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
        <order-items 
        :orders="orders.data" 
        @OnComplete="handleOrderComplete" 
        @OnDelete="handleOrderDelete"></order-items>    
    </table>
</template>
<script>
import OrderItems from './../../components/OrderItems.vue';
import axios from 'axios';
export default {
    props:['orders'],
    components:{
        OrderItems
    },
    data(){
    return{
        localorders: null
        }
    },
    created(){
            this.localorders = this.orders;
    },
    methods: {
        handleOrderComplete(order){
            if(!confirm("Are you sure you want to close the order???")){
                return;
            }
            const postdata = {order_id: order.id};
            axios.post("/api/order/complete",postdata).then(response =>{
                this.localorders.data.forEach((order,index) =>{
                    if(order.id===response.data.id){
                            this.localorders.data[index].isComplete = 1;
                        }
                    });
            });
        },
        handleOrderDelete(order){
            if(!confirm("Are you sure you want to delete the order?")){
                return;
            }
            const postdata = {order_id: order.id};
            axios.post("/api/order/remove",postdata).then(response =>{
                this.localorders.data = this.localorders.data.filter(localorders=>{
                return localorders.id !== order.id;
                });
                
            });
        }
    }

}
</script>