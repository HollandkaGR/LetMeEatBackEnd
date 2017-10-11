<template>
	<div>
		<div class="pizzas-wrapper">
			<div class="pizza-card" data-ix="ken-burns-effect">
				<div class="pizza-desc">
					<div class="pizza-name-cont">
						<h3 class="pizza-name">Songoku</h3>
						<div class="prod-name-link-indi"></div>
					</div>
					<div class="pizza-image-wrapper"><img alt="Pizza" class="pizza-image" sizes="(max-width: 479px) 48vw, (max-width: 767px) 27vw, (max-width: 991px) 202.390625px, 266px" src="images/naplas_pizza03.jpg" srcset="images/naplas_pizza03-p-500x282.jpeg 500w, images/naplas_pizza03-p-800x450.jpeg 800w, images/naplas_pizza03-p-1600x900.jpeg 1600w, images/naplas_pizza03.jpg 1920w">
						<div class="pizza-picture-overlay">
							<div class="pizza-price">32 cm: 1.300,-</div>
							<div class="pizza-price">45 cm: 2.200,-</div>
							<div class="pizza-price">60 cm: 3.000,-</div>
						</div>
					</div>
					<div class="pizza-ingredients">
						<div class="fwflex pizza-ingredient">Paradicsomos szósz</div>
						<div class="pizza-ingredient">Gomba</div>
						<div class="pizza-ingredient">Hagyma</div>
						<div class="pizza-ingredient">Hagyma</div>
						<div class="pizza-ingredient">Hagyma</div>
						<div class="pizza-ingredient">Hagyma</div>
						<div class="pizza-ingredient">Hagyma</div>
						<div class="pizza-ingredient">Hagyma</div>
						<div class="pizza-ingredient">Hagyma</div>
						<div class="pizza-ingredient">Hagyma</div>
					</div>
				</div>
				<div class="pizza-buyin-wrapper">
					<div class="form-wrapper w-form">
						<form class="form" id="buyForm" action="#">
							<select class="countselector w-select" id="pizzaCount" name="pizzaCount">
								<option value="1">32 cm</option>
								<option value="2">45 cm</option>
								<option value="3">60 cm</option>
							</select>
							<input class="putincartbtn w-button" type="submit" value="Kosárba">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		
	}
</script>