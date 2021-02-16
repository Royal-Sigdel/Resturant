<template>
    <div class="resto_add_form_wrapper">
        <h3>Add New Table</h3>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" 
            class="form-control" 
            name="name" 
            placeholder="Enter Resturant Name"
            v-model="resto.name">
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" 
            class="form-control" 
            name="location" 
            placeholder="Enter Resturant Address"
            v-model="resto.location"
            >
        </div>
        <div class="form-group">
            <label for="name">No. of Tables</label>
            <input type="number" 
            class="form-control" 
            name="tables" 
            placeholder="Enter Resturant Tables"
            v-model="resto.tables">
        </div>
        <button class="btn btn-primary" @click="handleAddbutton">Add</button>
        <button class="btn btn-warning" @click="handleCancelbutton">Cancel</button>

    </div>
</template>
<script>
//import axios from 'axios';
export default {
    /*created(){
        axios.get('/api/user').then(response => console.log(response.data));
    },
    */
    data(){
        return{
            resto:this.basicResto()
        }
    },
    methods:{
        basicResto(){
            return {
                name: "", 
                location: "",
                tables: 0
                }
        },
        handleAddbutton(){
          this.$emit('addRestoEvent',this.resto);
      },
      handleCancelbutton(){
          this.resto = this.basicResto();
          this.$emit('modalCancel');
      }
    }
}
</script>