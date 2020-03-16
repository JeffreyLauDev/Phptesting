<template>
  <div style="text-align:left">
    <h1>PHP Developer Test</h1>
    <b-form-input v-model="name" placeholder="Location name" @input="getRooms"></b-form-input>
    <b-form-input v-model="bedrooms" type="number" placeholder="bedrooms" @input="getRooms"></b-form-input>
    <b-form-input v-model="bathrooms" type="number" placeholder="bathrooms" @input="getRooms"></b-form-input>
    <b-form-input v-model="storeys" type="number" placeholder="storeys" @input="getRooms"></b-form-input>
    <b-form-input v-model="garages" type="number" placeholder="garages" @input="getRooms"></b-form-input>
    <b-form-input v-model="price[0]" type="number" placeholder="price X" @input="getRooms"></b-form-input>
    <b-form-input v-model="price[1]" type="number" placeholder="price Y" @input="getRooms"></b-form-input>
    <b-table striped hover :items="rooms"></b-table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      name: "",
      bedrooms: "",
      bathrooms: "",
      storeys: "",
      garages: "",
      price: [],
      rooms: [],
      query: ""
    };
  },

  methods: {
    getRooms() {
      let query = "?q=" + this.name !== "" ? name : "";
      console.log("room", this.name);
      axios
        .get("http://localhost:8000/api/rooms", {
          params: {
            name: this.name,
            bedrooms: this.bedrooms,
            bathrooms: this.bathrooms,
            storeys: this.storeys,
            garages: this.garages,
            price: this.price
          }
        })
        .then(response => {
          console.log("query", query);
          this.rooms = [...response.data];
        })
        .catch(err => {
          // Manage the state of the application if the request
          // has failed
          console.log(err);
        });
    }
  },
  mounted() {
    this.getRooms();
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
