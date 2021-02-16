<template>
   <div>
       <div class="row mb-3">
           <div class="col-md-12">
               <button @click ="handleOrderSave" class="btn btn-success float-right">Save</button>
           </div>

       </div>
    <div class="row">
        <div class="col-md-7">
            <div class="mb-5">
               <h3>Customer Details</h3>
               <hr>
               <order-form 
               @customerDetailsChanged="customerDetailsHandle">
               </order-form>
            </div>
            <div class="mb-5">
               <h3>
                   Order Details 
                   <span class="float-right" v-if="finalAmount > 0">
                       Total: {{finalAmount}}
                   </span>
                </h3>
               <order-details :order-details="orderDetails"></order-details>
            </div>
        </div>
        <div class="col-md-5">
            <h3>Menu Items</h3>
            <hr>
            <order-menu-items 
            :items="menuItems"
            @addMenuItems="handleNewMenuItem">
            </order-menu-items>
        </div>
    </div>
  </div>
</template>
<script>
import OrderForm from './OrderForm.vue';
import OrderMenuItems from './OrderMenuItems';
import OrderDetails from './OrderDetails';
import axios from 'axios';
export default {
    props:['restoId'],
    components:{
        OrderForm, OrderMenuItems, OrderDetails
    },
    created(){
        this.loadRestoMenuItems();
        window.eventBus.$on('addMenuItems',this.handleNewMenuItem);
        window.eventBus.$on('filteredList',this.handleFilteredList);
        window.eventBus.$on('clearFilteredList',this.handleclearFilteredList);
        window.eventBus.$on('RemoveOrderItem',this.handleRemoveOrderedItem);
        },
    computed: {
                finalAmount(){
                    let nMRP_Rate = 0;
                    this.orderDetails.forEach(order=>{
                        nMRP_Rate = nMRP_Rate+order.nMRP_Rate*order.Quantity;
                    });
                    return nMRP_Rate;
                }
    },
    data(){
        return {
            menuItems : [],
            orderDetails : [],
            originalMenuItems: [],
            OrderIds: [],
            customerDetails: {
                name: 'Not Provided',
                phone: 123456789,
                Address: 'Unknown'
            }
        }
    },
    methods: {
        loadRestoMenuItems(){
          axios.post('/api/resto/menu')
          .then(response =>console.log('response', 
          this.menuItems = response.data,
          this.originalMenuItems = response.data))
          .catch(error => console.error(error.response));
        },
        handleNewMenuItem(item)
            {   
            if(this.orderDetails.some(data=>data.sgroup==item.sgroup)){
                //this.orderDetails.Quantity+=this.orderDetails.Quantity;
                this.orderDetails.find(data=>data.sgroup==item.sgroup).Quantity = this.orderDetails.find(data=>data.sgroup==item.sgroup).Quantity-1+2;
                // = this.orderDetails.find(data=>data.id == item.id).Quantity + i;
                //this.orderDetails.find(data=>data.id == item.id).price = this.orderDetails.find(data=>data.id == item.id).Quantity*this.orderDetails.find(data=>data.id == item.id).price;
                

            }else{
                this.orderDetails.unshift(item);
            
            }
        },
    
        handleFilteredList(filteredList){
            this.menuItems = filteredList;
        },
        handleclearFilteredList(){
            this.menuItems = this.originalMenuItems;
        },
        customerDetailsHandle(customer){
            this.customerDetails = customer;
        },
        handleRemoveOrderedItem(orderDetail){
            this.orderDetails.find(data=>data.sgroup == orderDetail.sgroup).Quantity = this.orderDetails.find(data=>data.sgroup == orderDetail.sgroup).Quantity-1;
            if(this.orderDetails.find(data=>data.sgroup == orderDetail.sgroup).Quantity==0){
             this.orderDetails = this.orderDetails.filter(OrderedItem => OrderedItem.sgroup != orderDetail.sgroup);
             }else{
                    this.orderDetails;
                    }
        },
        handleOrderSave(){
            
            let orderDetailIds = [];
            this.orderDetails.forEach(item=>{
                orderDetailIds.push(item.sgroup);
            console.log('order detail id',orderDetailIds);
            });
            
            let orderData = {
                resto_id: this.restoId,
                order_data: {
                customerDetail: this.customerDetails,
                OrderIds:orderDetailIds,
                orderDetails: this.orderDetails
                }
            };
        console.log('orderdata',orderData);
        axios.post('/api/order/save',orderData).then(response => {
        console.log('ordersave response',response);
        location.reload();
        });
      }
    
    }
}
</script>