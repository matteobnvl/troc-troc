<template>
<div id="form">
  <v-container>
    <v-row>
      <v-col cols="12" md="6">
        <v-card>
          <v-card-title>
            <h3><center>Register</center></h3>
          </v-card-title>
          <v-card-text>
            <v-form>
              <v-text-field
                v-model="firstName"
                label="Prénom"
                required
              ></v-text-field>
              <v-text-field
                v-model="lastname"
                label="Nom"
                required
              ></v-text-field>
              <v-text-field
                v-model="email"
                label="Email"
                type="email"
                required
              ></v-text-field>
              <v-text-field
                v-model="sexe"
                label="Sexe"
                type="sexe"
                required
              ></v-text-field>
              <v-text-field
                v-model="birthday"
                label="Date de naissance"
                type="birthday"
                required
              ></v-text-field>
              <v-text-field
                v-model="streetNumber"
                label="Numéro de rue"
                type="streetNumber"
                required
              ></v-text-field> <v-text-field
                v-model="streetName"
                label="Nom de rue"
                type="streetName"
                required
              ></v-text-field>
              <v-text-field
                v-model="postalCode"
                label="Code postal"
                type="postalCode"
                required
              ></v-text-field>
              <v-text-field
                v-model="city"
                label="Ville"
                type="city"
                required
              ></v-text-field>
              <v-btn class="text-right" color="primary" @click="register">Register</v-btn>
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
}

</style>

<script>

import Header from '../components/Header.vue'; // import the Header component 

export default {
  name: 'test',

  components: {
    Header, // register the register component
  },
};



</script>