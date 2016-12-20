import Vue from 'vue'
import Vuex from 'vuex'

// import * as mutations from './mutations'
// import * as actions from './actions'
// import * as getters from './getters'

Vue.use(Vuex)

var selectedFoods = JSON.parse(localStorage.getItem('selectedFoods'));

export default new Vuex.Store({

 state: {
  'selectedFoods': selectedFoods || [],
},

mutations: {
  ADD_FOOD(state, food){
    state.selectedFoods.push(food)
    window.localStorage.setItem('selectedFoods', JSON.stringify(state.selectedFoods));
  },
  REMOVE_FOOD(state, food){
    var selectedFoods = state.selectedFoods
    state.selectedFoods = selectedFoods.filter(function(o) { return o.id !== food.id; });
    window.localStorage.setItem('selectedFoods', JSON.stringify(state.selectedFoods));
  }
},

actions: {
  addFood({commit}, food){
   commit('ADD_FOOD', food)
 },
 removeFood({commit}, food){
   commit('REMOVE_FOOD', food)
 }
},

getters: {
  selectedFoodsIds: state => {
    return _.map(state.selectedFoods, 'id');
  }
}

});
