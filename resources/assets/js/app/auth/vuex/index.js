import state from './state'
import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

import * as components from '../components'

export default {
	namespaced: true,
	state,
	mutations,
	getters,
	actions,
	components
}