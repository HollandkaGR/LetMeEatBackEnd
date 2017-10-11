<template>
	<div class="registermodal" data-ix="modal-init">
		<div class="close-btn" data-ix="close-modal">X</div>
		<div class="modal-title">Regisztráció</div>
		<div class="errors" v-if="hasError">
			<div class="errormessage" v-for="error in errors">{{error[0]}}</div>
		</div>
		<div class="login-form w-form">
			<form class="form-flex" id="registerForm" action="#" @submit.prevent="submit">
				<div class="vertical-form-group">
					<label class="form-label" for="regLastname">Vezetéknév:</label>
					<input class="form-field w-input" id="regLastname" name="regLastname" v-model="last_name" placeholder="Az Ön vezetékneve" required="required" type="text">
				</div>
				<div class="vertical-form-group">
					<label class="form-label" for="regFirstname">Keresztnév:</label>
					<input class="form-field w-input" id="regFirstname" name="regFirstname" v-model="first_name" placeholder="Az Ön keresztneve" required="required" type="text">
				</div>
				<div class="vertical-form-group">
					<label class="form-label" for="regEmail">Email cím:</label>
					<input class="form-field w-input" id="regEmail" name="regEmail" v-model="email" placeholder="Email cím" required="required" type="email">
				</div>
				<div class="vertical-form-group">
					<label class="form-label" for="regPassword">Jelszó:</label>
					<input class="form-field w-input" id="regPassword" name="regPassword" v-model="password" placeholder="Jelszó" required="required" type="password">
				</div>
				<div class="submit-wrapper">
					<input class="form-submit-btn w-button" type="submit" value="Regisztráció">
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	import  { mapActions } from 'vuex'
	import { isEmpty } from 'lodash'

	export default {
		data() {
			return {
				last_name: null,
				first_name: null,
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
				register: 'auth/register'
			}),
			submit () {
				this.errors = []
				this.register({
					payload: {
						last_name: this.last_name,
						first_name: this.first_name,
						email: this.email,
						password: this.password
					},
					context: this
				}).then(() => {
					if (isEmpty(this.errors)) {
						this.closeModal()
						this.clearFields()
					}
					// this.$router.replace({ name: 'home' })
				})
			},
			clearFields() {
				this.first_name = null,
				this.last_name = null,
				this.password = null,
				this.email = null
			},
			closeModal() {
				$('.registermodal .close-btn').trigger('click')
			}
		}
	}
</script>