import {createStore, createLogger} from 'vuex'

import main    from './main.js'
import canvas  from './canvas.js'
import builder from './builder.js'

export default createStore({
    modules: {
        main,
        canvas,
        builder,
    },
})
