<template>
	<div class="w-container">
		<div class="restaurant-main" data-ix="category-sticky">
			<h1 class="heading">Flekken Étterem</h1>
			<div class="rest-desc">
				<div class="rest-ratings">
					<div>Elégedettségi mutató</div>
					<div class="bad-rate rest-rate">4.5</div>
					<div>28 értékelés alapján</div>
				</div>
				<div class="rest-details"><img class="image-2" sizes="(max-width: 767px) 42vw, (max-width: 991px) 324px, 430px" src="images/tivadar-rigoletto-pizzeria5.jpg" srcset="images/tivadar-rigoletto-pizzeria5-p-800x426.jpeg 800w, images/tivadar-rigoletto-pizzeria5.jpg 857w">
					<div class="rest-address">Pécs, Hungária út 25.</div>
				</div>
				<div class="rest-categories">
					<div v-for="category in restaurant.categories" v-scroll-to="{ element: '#' + category.name, offset: -100}" class="category-link restaurant-category">
						{{ category.name }}
					</div>
				</div>
			</div>
		</div>
		<div class="categories-wrapper">
			<div class="rest-category-scroll">
				<div v-for="category in restaurant.categories" v-scroll-to="{ element: '#' + category.name, offset: -100}" class="category-link restaurant-category">
					{{ category.name }}
				</div>
			</div>
			<div v-for="category in restaurant.categories" class="category-wrapper">
				<h3 :id="category.name" class="category-title">{{ category.name }}</h3>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
			</div>
			<div class="category-wrapper">
				<h3 class="category-title">Levesek</h3>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
			</div>
			<div class="category-wrapper">
				<h3 class="category-title">Levesek</h3>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
			</div>
			<div class="category-wrapper">
				<h3 class="category-title">Levesek</h3>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
				<div class="food-wrapper">
					<div class="food-details">
						<div class="food-text-block">
							<h4 class="food-name">Tüzes Barázda-ragu, körettel</h4>
							<div class="food-hr"></div>
							<div class="food-description">Pirított csirkemell, marhahátszín, vegyes köret, savanyúság</div>
						</div>
						<div class="food-buyin-wrapper">
							<div class="food-price">569,-</div><a class="putincartbtn w-button" href="#">Kosárba</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
	import { stickyElement } from '../../../helpers'
	import $ from 'jquery'; 

$(function() {
    $(window).scroll(function() {
    	stickyElement('categories-wrapper', 'rest-category-scroll');
    })
    stickyElement('categories-wrapper', 'rest-category-scroll');
});

	export default {
		data: function () {
			return {
				slug: '',
				restaurant: {},
			}
		},
		methods: {
			scrollTo: function(link) {
				$.scrollTo("'#" + link + "'");
			}
		},
		mounted: function() {
			this.slug = this.$route.params.slug
			axios.get('/api/products/' + this.slug).then(response => {
				this.restaurant = response.data.data
			})
			
		}
  }
</script>
