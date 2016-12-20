<template>

  <ul class="nav side-menu">

    <li class="active"><a><i class="fa fa-list"></i> Selected Foods <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: block;">
        <li v-for="food in selectedFoods">
          <a href="javascript:void(0)"> {{ food.title }} <i v-on:click="$store.dispatch('removeFood', food)" class="fa fa-close"></i></a>
        </li>
      </ul>
    </li>

  </ul>

</template>

<script>
  import { mapState } from 'vuex';

  export default {
    name: 'sidebar-calculator',

    computed: mapState([
      'selectedFoods'
      ])
  }

</script>
