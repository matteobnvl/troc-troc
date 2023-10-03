<template>
    <v-container>
        <v-footer class="bg-grey-lighten-1 text-center d-flex flex-column">
            <v-img class="logo"></v-img>
            <v-img class="user">User</v-img>
            <h2>Annonces</h2>
            <v-btn class="crea" variant="outlined"> Créer une annonce </v-btn>
            <input class= "search"
            placeholder="Cherche ton annonce">
            <v-btn icon="$vuetify" variant="outlined">
            </v-btn>
            <v-expansion-panels>
                <v-expansion-panel>
                <input type="checkbox" id="food" value="Nourriture"/>
                <label for="food">Nourriture</label>
                <input type="checkbox" id="books" value="Livres">
                <label for="books">Livres</label>
                <input type="checkbox" id="event" value="Evenement">
                <label for="event">Evenement</label>
                </v-expansion-panel>
            </v-expansion-panels>

        </v-footer>
    </v-container>

    <v-card class="mx-auto" max-width="344">
        <v-card-title>
          Titre de l'annonce
        </v-card-title>
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
          height="200px"
          cover
        ></v-img>

        <v-card-subtitle>
          Date
        </v-card-subtitle>
        <v-card-text>
            Description
        </v-card-text>
        <v-btn class="crea" variant="outlined"> Créer une annonce </v-btn>
    </v-card>

</template>

<script>


</script>

<style lang = "css">

.logo {
    position: absolute;
    height:50;
    left:0;
    top:20 pix;
}

.user {
    position: absolute;
    height:50;
    right:0;
    top:20 pix;
}

.crea {
    position: absolute;
    background-color: white;
}

</style>