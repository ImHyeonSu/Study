import {
    createStore
  } from 'vuex'
  
  const store = createStore({
    state() {
      return {
        count: 0,
        cart: [{
          product_id: 1,
          product_name: "a",
          category: "A"
        }]
      }
    },
    getters: {
      cartCount: (state) => {
        return state.cart.length;
      }
    },
    mutations: { //説明ー値を変更しようとしたらぜひmutationsを使わないといけない
      increment(state) {
        state.count++
      }
    },
    actions: {
      increment(context) {
        context.commit('increment')
      }
    }
  })
  
  export default store;