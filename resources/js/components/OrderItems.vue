<template>
<tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td>{{order.id}}</td>
                    <td>{{order.amount}}</td>
                    <td>{{order.isComplete? 'Completed':'Incomplete'}}</td>
                    <td>
                        Name : {{order.Customer_Name}}
                        <br>
                        Address: {{order.Customer_Address}}
                        <br>
                        Phone No: {{order.Customer_phone_no}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success" @click="clickComplete(order)">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                        </button>
                        <button type="button" class="btn btn-outline-danger" @click="clickDelete(order)">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </td>
                    
                </tr>
            </tbody>


</template>
<script>
export default {
    props: ['orders'],
    methods: {
        clickComplete(order){
            this.$emit('OnComplete',order);
        },
        clickDelete(order){
            this.$emit('OnDelete',order);
        }
    }
}
</script>