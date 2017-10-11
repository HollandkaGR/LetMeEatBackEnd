import store from '../vuex'
import localforage from 'localforage'

export const beforeEach = ((to, from, next) => {
	store.dispatch('auth/checkTokenExists').then( () => {
		if (to.meta.guest) {
			next({ name: 'welcome' })
			return
		}

		next()
	}).catch( () => {
		
		if (to.meta.needsAuth) {
			localforage.setItem('intended', to.name)
			$('#loginBtn').trigger('click')
			next({ name: 'welcome' })
			return
		}

		next()
	})
})