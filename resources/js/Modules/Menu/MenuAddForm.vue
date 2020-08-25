<template>
  <div class="add_form__wrapper">
    <form v-on:submit.prevent="handleSubmit">
      <div class="form-group">
        <label for="name">Food item</label>
        <input class="form-control" type="text" placeholder="Enter food item name" v-model="food.item">
        <div class="validation-message" v-text="validation.getMessages('item')"></div>
      </div>

      <div class="form-group">
        <label for="name">Select category</label>
        <multiselect
          v-model="food.category"
          :options="categories"
        ></multiselect>
        <div class="validation-message" v-text="validation.getMessages('category')"></div>
      </div>

      <div class="form-group">
        <label for="name">Price</label>
        <input class="form-control" type="number" placeholder="Enter food item price" v-model="food.price">
        <div class="validation-message" v-text="validation.getMessages('price')"></div>
      </div>

      <div class="form-group">
        <label for="name">Description</label>
        <textarea class="form-control" v-model="food.description" placeholder="Enter item description"></textarea>
        <div class="validation-message" v-text="validation.getMessages('description')"></div>
      </div>

      <div class="form-group">
        <button class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import Validation from './../../utils/Validation.js';
export default {
  props: ['categories', 'restoId'],
  components: {
    Multiselect
  },
  data() {
    return {
      food: this.getBasicMenuItem(),
      validation: new Validation()
    }
  },
  methods: {
    getBasicMenuItem() {
      return {
        item: '',
        category: '',
        price: 100,
        description: '',
      }
    },
    handleSubmit() {
      
      let food = this.food;
      food.restoId = this.restoId;

      window.axios.post('/api/item', food).then(response => {
        console.log('response', response.data);
        this.$emit('newItemAdded', response.data,food.category);
        this.food = this.getBasicMenuItem();
      }).catch(error => {
        if (error.response.status && error.response.status == 422) {
          this.validation.setMessages(error.response.data.errors);
        }
        console.log('error', error);
      });
    }
  }
}
</script>
