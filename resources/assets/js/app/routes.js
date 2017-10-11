import welcome from './welcome/routes'
import home from './home/routes'
import timeline from './timeline/routes'
import errors from './errors/routes'

export default [...welcome, ...home, ...timeline, ...errors]