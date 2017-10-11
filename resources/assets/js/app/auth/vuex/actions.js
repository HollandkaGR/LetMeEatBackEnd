import { isEmpty } from 'lodash'
import { setHttpToken } from '../../../helpers'
import localforage from 'localforage'

export const register = ({ dispatch }, { payload, context }) => {
	return axios.post('/api/register', payload).then( response => {
		dispatch('setToken', response.data.meta.token).then( () => {
			dispatch('fetchUser')
		});
	}).catch( (errors) => {
		context.errors = errors.response.data.errors
	})
}

export const login = ({ dispatch }, { payload, context }) => {
	return axios.post('/api/login', payload).then( response => {
		dispatch('setToken', response.data.meta.token).then( () => {
			dispatch('fetchUser')
		});
	}).catch( (errors) => {
		context.errors = errors.response.data.errors
	})
}

export const logout = ({ dispatch }) => {
	return axios
				.post('/api/logout')
				.then( () => {
					dispatch('clearAuth')
				})
				.catch( (error) => {
					console.log(error.response.data)
				})
}

export const fetchUser = ({ commit}) => {
	return axios.get('/api/me').then( (response) => {
		commit('setAuthenticated', true)
		commit('setUserData', response.data.data)
	});
}

export const setToken = ({ commit, dispatch }, token) => {
	if (isEmpty(token)) {
		return dispatch('checkTokenExists').then( (token) => {
			setHttpToken(token)
		});
	}
	commit('setToken', token)
	setHttpToken(token)
}

export const checkTokenExists = ({ commit, dispatch }, token) => {
	return localforage.getItem('authToken').then( (token) => {
		if (isEmpty(token)) {
			return Promise.reject('NO_STORAGE_TOKEN')
		}
		return Promise.resolve(token)
	})
}

export const clearAuth = ({ commit }) => {
	commit('setAuthenticated', false)
	commit('setUserData', null)
	commit('setToken', null)
	setHttpToken(null)
}
