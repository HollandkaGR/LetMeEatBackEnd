<template>
	<div>
		<div class="navbar w-nav" data-animation="default" data-collapse="medium" data-doc-height="1" data-duration="400">
			<div class="container w-container">
				<router-link class="brand navbar-brand" :to="{ name: 'welcome' }"><img src="images/Logo.png"></router-link>
				<nav class="nav-menu w-nav-menu" role="navigation">
					<div class="nav-menu-item" data-ix="navlinkhover">
						<a class="bordered-first nav-link w-inline-block" href="#">
							<div class="navlinkbg"></div>
							<div class="navlink-text">Főoldal</div>
						</a>
					</div>
					<div class="nav-menu-item" data-ix="navlinkhover">
						<a class="bordered-first nav-link w-inline-block" href="#">
							<div class="navlinkbg"></div>
							<div class="navlink-text">Pizzák</div>
						</a>
						<div class="navbar-submenu" data-ix="hide-submenu">
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>28 cm</div>
							</a>
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>32 cm</div>
							</a>
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>45 cm</div>
							</a>
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>60 cm</div>
							</a>
						</div>
						<div class="submenu-indicator"></div>
					</div>
					<div class="nav-menu-item" data-ix="navlinkhover">
						<a class="bordered-first nav-link w-inline-block" href="#">
							<div class="navlinkbg"></div>
							<div class="navlink-text">Főtt ételek</div>
						</a>
						<div class="navbar-submenu" data-ix="hide-submenu">
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>Levesek</div>
							</a>
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>Frissensültek</div>
							</a>
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>Tészták</div>
							</a>
							<a class="navbar-submenu-item w-inline-block" href="#">
								<div>Halételek</div>
							</a>
						</div>
						<div class="submenu-indicator"></div>
					</div>
				</nav>
				<div class="accstuffs">
					<div class="notloggedin" v-show="!user.authenticated">
						<a id="loginBtn" class="accbtn w-button" data-ix="open-login-modal">Bejelentkezés</a>
						<a id="regBtn" class="accbtn w-button" data-ix="open-register-modal">Regisztráció</a>
					</div>
					<div class="loggedin" v-if="user.authenticated">
						<div class="loggen-in-message">Üdv, <a class="auth-name" href="#">{{ user.data.first_name}}</a></div>
						<a class="link-block w-inline-block" href="#">
							<div class="cart-link">Kosár: 2 tétel</div>
						</a>
						<a class="accbtn logoutbtn w-button" @click.prevent="signout">Kijelentkezés</a>
					</div>
				</div>
				<div class="menu-button w-nav-button">
					<div class="w-icon-nav-menu"></div>
				</div>
			</div>
		</div>
		<div class="login-modal-overlay" data-ix="modal-init">
			<login></login>
			<register></register>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	export default {
		computed: mapGetters ({
			user: 'auth/user'
		}),
		methods: {
			...mapActions({
				logout: 'auth/logout'
			}),
			signout() {
				this.logout().then(() => {
					this.$router.replace({ name: 'welcome' })
				})
			}
		}
	}
</script>
