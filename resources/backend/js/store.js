import { createStore } from 'vuex'
export default createStore({
  state () {
    return {
        theme: null,
    }
  },
  mutations: {
    setTheme(state, theme){
        state.theme = theme
    }
  },
})
