<template>
    <div class="resto-group__wrapper mb-5">
        <div class="row">
            <div class="col-md-3 mt-md-4" v-for="resto in localResto" :key="resto.id">
                <card-component>
                    <template slot="title">
                    {{resto.location}}
                    </template>
                    <template slot="main">
                        {{resto.name}}
                        <br>
                        <br>
                        <br>
                        <br>
                        <a v-bind:href="resto.slug" class="card-link">Menu</a>
                        <a v-bind:href="resto.ordersSlug" class="card-link">Orders</a>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4 mt-md-4" v-if="showAddForm">
                <card-component>
                    <template slot="title">
                        Add New Table
                    </template>
                    <template slot="main">
                        <span @click="handleNewResto">+</span>
                    </template>
                </card-component>
                <modal name="add-new-resto" height="50%">
                    <div class="container-padding">
                        <RestoAddForm 
                          @modalCancel="handleCancelResto"
                          @addRestoEvent="handelSaveResto">
                        </RestoAddForm>
                    </div>
                </modal>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import RestoAddForm from './RestoAddForm.vue';
export default {
    components: {
        RestoAddForm
        },
    props: ['restos'],
    created(){
        console.log('this.restos.length',this.restos.length);
        this.localResto = this.restos;

    },
    computed:{
        showAddForm(){
            return (this.localResto.length<8)?true:false;
        }
    },
    data(){
    return {
        localResto: []
    }
    },
    methods:{
      handleNewResto()
      {
         this.$modal.show('add-new-resto');
      },
      handleCancelResto(){
          this.$modal.hide('add-new-resto');
      },
      handelSaveResto(restodata)
      {
          console.log('restodata',restodata);
          axios.post('/api/resto',restodata).then(response => this.localResto.unshift(response.data));
          this.$modal.hide('add-new-resto');
      }
      
    }
}
</script>