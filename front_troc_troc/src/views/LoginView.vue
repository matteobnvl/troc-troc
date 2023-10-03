<template>
<div id="form">
  <v-container>
    <v-row>
      <v-col cols="12" md="6" flex="center">
        <v-card>
          <v-card-title>
            <h3>Connexion</h3>
          </v-card-title>
          <v-card-text>
            <v-form>
              <v-text-field 
                id="emmail"
                v-model="firstName"
                label="E-mail"
                type="email"
                required
              ></v-text-field>
              <v-text-field 
                id="mdp"
                v-model="email"
                label="Password"
                type="password"
                required
              ></v-text-field>
              <v-btn color="primary" @click="register">Se Connecter</v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</div>
       
</template>

<style>

#form {
  width: 140%;
  margin-top: 12%;
}


</style>


<script>
import { defineComponent } from 'vue';

// Components
import Bloc from '../components/Containeurfichier.vue';

export default defineComponent({
  name: 'Y',

  components: {
    Bloc,
  },
});
</script>