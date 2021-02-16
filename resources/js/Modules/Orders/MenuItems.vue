<template>
            <ul class="list-group mb-3">
                <li class="list-group-item" v-for="(item,key) in items" :key="key">
                    <div class="row">
                        <div class="col-md-10">
                            {{item.sprod_code}}
                            <span class="float-right">
                                {{item.nMRP_Rate}}
                            </span>
                            <br>
                            
                        </div>
                        <div class="col-md-2">
                             <button class="btn btn-primary btn-sm" 
                               @click="handleAddbutton(item)">Add
                             </button>
                        </div>
                    </div>
                </li>
            </ul>    
</template>
<script>
export default {
    props: ['items'],
    methods: {
        handleAddbutton(item){
          window.eventBus.$emit('addMenuItems',item);
        }
    }
}
</script>