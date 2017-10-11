<template>
	<div class="login-modal" data-ix="modal-init">
		<div class="close-btn" data-ix="close-modal">X</div>
		<div class="modal-title">Bejelentkezés</div>
		<div class="errors" v-if="hasError">
			<div class="errormessage" v-for="error in errors">{{error[0]}}</div>
		</div>
		<div class="login-form w-form">
			<form class="form-flex" id="loginForm" action="#" @submit.prevent="submit">
				<label class="form-label" for="loginEmail">Email cím:</label>
				<input class="form-field w-input" id="loginEmail" name="loginEmail" placeholder="Regisztrált email cím" required="required" type="email" v-model="email">
				<label class="form-label" for="loginPassword">Jelszó:</label>
				<input class="form-field w-input" id="loginPassword" name="loginPassword" placeholder="Jelszó" required="required" type="password" v-model="password">
				<div class="submit-wrapper">
					<input class="form-submit-btn w-button" type="submit" value="Bejelentkezés">
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	import  { mapActions } from 'vuex'
	import localforage from 'localforage'
	import { isEmpty } from 'lodash'

	export default {
		data() {
			return {
				email: null,
				password: null,
				errors: []
			}
		},
		computed: {
			hasError: function() {
				if (isEmpty(this.errors)) {
					return false
				}
				return true
			}
		},
		methods: {
			...mapActions({
				login: 'auth/login'
			}),
			submit () {
				this.errors = []
				this.login({
					payload: {
						email: this.email,
						password: this.password
					},
					context: this
				}).then( () => {
					if (isEmpty(this.errors)) {
						this.closeModal()
						localforage.getItem('intended').then( (name) => {
							if (isEmpty(name)) {
								this.$router.replace({ name: 'welcome' })	
								return
							}
							localforage.removeItem('intended')
							this.$router.replace({ name: name })	
						})
					}
				})
			},
			closeModal() {
				$('.login-modal .close-btn').trigger('click')
			}
		}
	}
</script>