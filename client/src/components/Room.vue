<template>
  <div style="text-align:left">
    <h1>PHP Developer Test</h1>
    <b-form-input v-model="name" placeholder="Location name" @input="getRooms"></b-form-input>
    <b-form-input v-model="bedrooms" type="number" placeholder="bedrooms" @input="getRooms"></b-form-input>
    <b-form-input v-model="bathrooms" type="number" placeholder="bathrooms" @input="getRooms"></b-form-input>
    <b-form-input v-model="storeys" type="number" placeholder="storeys" @input="getRooms"></b-form-input>
    <b-form-input v-model="garages" type="number" placeholder="garages" @input="getRooms"></b-form-input>
    <b-form-input v-model="priceFrom" type="number" placeholder="price From" @input="getRooms"></b-form-input>
    <b-form-input v-model="priceTo" type="number" placeholder="price To" @input="getRooms"></b-form-input>
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
      priceFrom: "",
      priceTo: "",
      rooms: [],
      query: ""
    };
  },

  methods: {
    getRooms() {
      let params = {};
      //Manage search params
      if (this.name !== "") {
        params = { ...params, name: this.name };
      }
      if (this.bedrooms !== "") {
        params = { ...params, bedrooms: this.bedrooms };
      }
      if (this.bathrooms !== "") {
        params = { ...params, bedrooms: this.bathrooms };
      }
      if (this.storeys !== "") {
        params = { ...params, storeys: this.storeys };
      }
      if (this.garages !== "") {
        params = { ...params, garages: this.garages };
      }
      if (this.priceFrom !== "") {
        params = { ...params, priceFrom: this.priceFrom };
      }
      if (this.priceTo !== "") {
        params = { ...params, priceTo: this.priceTo };
      }

      axios
        .get("http://localhost:8000/api/rooms", {
          params
        })
        .then(response => {
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
