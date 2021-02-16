<template>
  <div class="wrapper menu__container">
    <div class="row">
      <div class="col-md-8">
        <card-compo>
          <template slot="title">My Menu</template>
          <template slot="main">
            <div class="section mb-3">
              <label for="selector">Select a category</label>
              <multiselect v-model="menu"
                :options="categories"
                :close-on-select="true">
              </multiselect>
            </div>
            <div class="section">
              <label for="selector">Menu items for this category</label>
              <menu-group :items="currentMenuItems"></menu-group>
            </div>
          </template>
        </card-compo>
      </div>
      <div class="col-md-4">
        <card-compo>
          <template slot="title">Add Menu Item</template>
          <template slot="main">
            <menu-add-form
              :categories="categories"
              :resto-id="restoId"
              v-on:newItemAdded="addNewItem"
            ></menu-add-form>
          </template>
        </card-compo>
      </div>
    </div>
  </div>
</template>

<script>
import _ from 'lodash';
import Multiselect from 'vue-multiselect';
import MenuGroup from './MenuGroup.vue';
import MenuAddForm from './MenuAddForm.vue';
export default {
  props: ['items', 'restoId'],
  components: {
    Multiselect, MenuGroup, MenuAddForm
  },
  created() {
    _.forEach(this.items, (item, key) => {
      this.categories.push(key);
    });
    this.menu = this.categories[0];
    this.localItems = this.items;
  },
  data() {
    return {
      localItems: '',
      menu: '',
      categories: []
    }
  },
  computed: {
    currentMenuItems() {
      return this.localItems[this.menu];
    }
  },
  methods: {
    addNewItem(item,category) {
      this.localItems[category].unshift(item);
    }
  }
}
</script>

