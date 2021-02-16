<template>
  <div class="card" style="height:200px;">
    <div class="card-header">
      <slot name="title"></slot>
    </div>
    <div class="card-body">
      <slot name="main"></slot>
    </div>
  </div>
</template>

<script>
  export default {
    name:'card-component',
  };

</script>
