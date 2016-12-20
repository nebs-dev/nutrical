<template>
  <div class="row">
    <div class="col-sm-5">
    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing {{ items.from }} to {{ items.to }} of {{ items.total }} entries</div>
    </div>
    <div class="col-sm-7">
      <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination">
        <li class="paginate_button previous" v-bind:class="{ disabled: items.current_page == 1 }" id="datatable_previous">
          <a v-on:click="getFoods(items.current_page - 1)" href="#" tabindex="0">Previous</a>
        </li>
        <li class="paginate_button" v-bind:class="{ disabled: items.current_page == 1 }" >
          <a v-on:click="getFoods()" href="#" tabindex="0">1</a>
        </li>
        <li class="paginate_button disabled" v-if="items.current_page != 1">
          <a href="#"  tabindex="0">...</a>
        </li>
        <li class="paginate_button" v-if="items.current_page != 1 && items.current_page != 2">
          <a v-on:click="getFoods(items.current_page - 1)" href="#" tabindex="0">{{ items.current_page - 1 }}</a>
        </li>
        <li class="paginate_button disabled" v-if="items.current_page != 1 && items.current_page != items.last_page">
          <a href="#" tabindex="0">{{ items.current_page }}</a>
        </li>
        <li class="paginate_button" v-if="items.current_page != items.last_page && items.current_page != items.last_page - 1">
          <a v-on:click="getFoods(items.current_page + 1)" href="#"  tabindex="0">{{ items.current_page + 1 }}</a>
        </li>
        <li class="paginate_button disabled" v-if="items.current_page != items.last_page">
          <a href="#" tabindex="0">...</a>
        </li>
        <li class="paginate_button " v-bind:class="{ disabled: items.current_page == items.last_page }">
          <a v-on:click="getFoods(items.last_page)" href="#" tabindex="0">{{ items.last_page }}</a>
        </li>
        <li class="paginate_button next" v-bind:class="{ disabled: items.current_page == items.last_page }" id="datatable_next">
          <a v-on:click="getFoods(items.current_page + 1)" href="#" tabindex="0">Next</a>
        </li>
      </ul>
    </div>
  </div>
</template>


<script>
  export default {
    name: 'paginator',
    props: ['items']
  }
</script>
