import {createStore, createLogger} from 'vuex'

import main from './main.js'

export default createStore({
    modules: {
        main,
    },
})
