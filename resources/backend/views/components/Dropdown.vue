<template>
    <div ref="dropdown"></div>
  </template>
   
  <script>
  import jSuites from "jsuites";
  import "jsuites/dist/jsuites.css";
  
  export default {
    name: "Dropdown",
    props: {
      properties: Object,
    },
    mounted: function () {
      let JSuite = jSuites.dropdown(this.$refs.dropdown, this.$props.properties);
      if(this.$props.properties.value){
        JSuite.setValue(this.$props.properties.value);
      }
    },
  };
</script>