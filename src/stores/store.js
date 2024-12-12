import {createStore, createLogger} from 'vuex'

import main   from './main.js'
import canvas from './canvas.js'

export default createStore({
    modules: {
        main,
        canvas,
    },
})
