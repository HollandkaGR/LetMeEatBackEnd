<template>
	<div class="restaurants-wrapper">
		<div class="restaurant" v-for="etterem in ettermek">
			<div class="restaurant-desc">
            <div class="restaurant-name">{{ etterem.name }}</div><img class="image" sizes="(max-width: 479px) 143px, (max-width: 767px) 30vw, (max-width: 991px) 206.390625px, 270px" src="images/tivadar-rigoletto-pizzeria5.jpg" srcset="images/tivadar-rigoletto-pizzeria5-p-800x426.jpeg 800w, images/tivadar-rigoletto-pizzeria5.jpg 857w">
            <div class="restaurant-open">Rendelés: 9:00 - 21:30</div>
            <div class="restaurant-address">7632 Pécs, Hungária út 24</div>
            <div class="restaurant-categories">
              <div class="restaurant-category">Pizzák</div>
              <div class="restaurant-category">Steakek</div>
              <div class="restaurant-category">Steakek</div>
              <div class="restaurant-category">Pizzák</div>
            </div>
          </div>
          <div class="restaurant-details">
            <div class="restaurant-rating">Értékelés: 4,2
              <br>(30 szavazat alapján)</div>
          </div>
			<router-link class="restaurant-link" :to="{ name: 'products', params: { slug: etterem.slug }}">Részletek</router-link>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'

	export default {
		data: function() {
			return {
				ettermek: {}
			}
		},
		mounted: function() {
			axios.get('/api/ettermek').then((response) => {
				this.ettermek = response.data.data
			})
		}
	}
</script>