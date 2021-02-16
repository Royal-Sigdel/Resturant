<template>
    <div class="wrapper">
        <menu-search :items="items"></menu-search>
        <menu-items :items="items"></menu-items>
    </div>
</template>
<script>
import  MenuItems from './MenuItems';
import MenuSearch from './MenuSearch';
export default {
    components:{
        MenuItems,MenuSearch
    },
    props : ['items']
}

</script>