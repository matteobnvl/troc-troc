<template>
  <v-card>
    <v-card-title>
      <h3>M'inscrire à troc-troc</h3>
    </v-card-title>
    <v-card-text>
      <v-form>
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field
                v-model="data.firstname"
                label="Prénom"
                required
            ></v-text-field>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
                v-model="data.lastname"
                label="Nom"
                required
            ></v-text-field>
          </v-col>
        </v-row>
        <v-text-field
            v-model="data.email"
            label="Email"
            type="email"
            required
        ></v-text-field>
        <v-text-field
            v-model="data.password"
            label="Mot de passe"
            type="password"
            required
        ></v-text-field>
        <v-row>
          <v-col cols="12" md="6">
            <v-select
                v-model="data.sexe"
                :items="['men', 'woman', 'not-precise']"
                :rules="[v => !!v || 'Un choix est requis']"
                label="Votre genre"
                required
            ></v-select>
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
                v-model="data.birthday"
                label="Date de naissance"
                type="date"
                required
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-autocomplete
                v-model="data.streetName"
                :items="suggestedAddresses"
                label="Nom de rue"
                required
                @update:search="fetchAddresses"
                return-object
            ></v-autocomplete>
          </v-col>
          <v-col>
            <v-text-field
                v-model="data.postalCode"
                label="Code postal"
                type="string"
                required
            ></v-text-field>
          </v-col>
        </v-row>
        <v-text-field
            v-model="data.city"
            label="Ville"
            type="string"
            required
        ></v-text-field>
        <v-btn class="text-right" color="primary" @click="submitForm">Valider</v-btn>
      </v-form>
    </v-card-text>
  </v-card>
</template>
<script>
export default {
  name: 'FormRegisterComponents',
  data () {
    return {
      streetName: '',
      data: {},
      suggestedAddresses: []
    }
  },
  mounted () {
    this.initializeData()
  },
  methods: {
    fetchAddresses (value) {
      if (value && value.length > 2) {
        let query = encodeURIComponent(value)
        fetch(`https://api-adresse.data.gouv.fr/search/?q=${query}&limit=15`)
            .then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
              }
              return response.json();
            })
            .then(data => {
              this.suggestedAddresses = data.features.map(feature => feature.properties.label);
              if (this.suggestedAddresses.length === 1) {
                this.data.streetName = data.features[0].properties.name
                this.data.postalCode = data.features[0].properties.postcode
                this.data.city = data.features[0].properties.city
              }
            })
            .catch(error => {
              console.error("Une erreur s'est produite lors de la récupération des données:", error);
            });
      }
    },
    initializeData () {
      this.form = {
        firstname: '',
        lastname: '',
        email: '',
        password: '',
        sexe: '',
        birthday: null,
        streetNumber: '',
        streetName: '',
        postalCode: '',
        city: ''
      }
    },
    async submitForm () {
      console.log(this.data)
      const response = await this.$api.register(this.data)
      if(response.success) {
        console.log(response)
      } else {
        console.log(response)
      }
    }
  }
}
</script>