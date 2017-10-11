import { Welcome } from '../components'
import { Products } from '../components'

export default [
	{
		path: '/',
		component: Welcome,
		name: 'welcome',
		meta: {
			needsAuth: false
		}
	},
	{
		path: '/:slug',
		component: Products,
		name: 'products',
		meta: {
			needsAuth: false
		}
	}
]