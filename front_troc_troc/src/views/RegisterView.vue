<template>
<div id="form">
  <v-container>
    <v-row>
      <v-col cols="12" md="6">
        <FormRegisterComponents />
      </v-col>
    </v-row>
  </v-container>
</div>

</template>


<style> 
#form {
  width: 140%;
  margin-top: 5%;
}

</style>

<script>
import FormRegisterComponents from '@/components/register/FormRegisterComponents.vue'

export default {
  name: 'test',

  components: {
    FormRegisterComponents
  },
};



</script>