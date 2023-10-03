<template>
    <router-view/>
</template>
<script>
export default {
    name: "App",
    data() {
        return {}
    },
    mounted(){
        this.$emit('vue-loaded', 'Button was clicked!');
    }
}
</script>