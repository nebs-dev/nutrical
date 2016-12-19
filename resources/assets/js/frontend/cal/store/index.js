import Vue from 'vue'
import Vuex from 'vuex'

// import * as mutations from './mutations'
// import * as actions from './actions'
// import * as getters from './getters'

Vue.use(Vuex)


export default new Vuex.Store({

 state: {
  'selectedFoods': [
  {'id': 5, 'name': 'pizza'},
  {'id': 9, 'name': 'oreo keksi'},
  ],
  'test': 'This is STORE test'
},

mutations: {
  ADD_FOOD(state, todo){
    state.selectedFoods.push(todo)
  },
  REMOVE_FOOD(state, food){
    var selectedFoods = state.selectedFoods
    state.selectedFoods = selectedFoods.filter(function(o) { return o.id !== food.id; });
  },
  GET_TEST(state, test){
   state.test = test
 },
},

actions: {
  addFood({commit}, food){
   commit('ADD_FOOD', food)
 },
 removeFood({commit}, food){
   commit('REMOVE_FOOD', food)
 },
 getTest({commit}, test){
   commit('GET_TEST', test)
 },
},

getters: {
  selectedFoodsIds: state => {
    return _.map(state.selectedFoods, 'id');
  },
  testGetter: state => state.test,
}

});
