<template>
    <div>
        <div v-if="orderDetails && orderDetails.length>0">
            <ul class="list-group">
                <li class="list-group-item" v-for = "(orderDetail,key) in orderDetails" :key="key">
                    Item: {{orderDetail.sprod_code}}
                    <span class="col-md-6 ml-5 mr-5">
                        Quantity: {{orderDetail.Quantity}}
                    </span>
                    <span class="float-right">
                    Price:{{orderDetail.nMRP_Rate}}
                    <span><button  class="btn btn-outline-danger ml-3 pointer" @click="handleRemoveItem(orderDetail)"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></button></span>
                    </span>
                </li>
            </ul>
        </div>
        <div v-else>
            <p>No Items Ordered Yet.</p>
        </div>
    </div>
</template>
<script>
export default {
    props: ['orderDetails'],
    methods: {
        handleRemoveItem(orderDetail){
            window.eventBus.$emit('RemoveOrderItem',orderDetail);
        }
    }
}
</script>