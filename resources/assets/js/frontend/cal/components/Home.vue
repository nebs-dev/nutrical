<template>
  <div class="">
    <div class="page-title">
      <div class="title_left">

        <div class="bs-example" data-example-id="simple-form-inline">
          <form class="form-inline">

            <div class="form-group col-xs-3 col-md-3">
              <div class="control-label">Filter Protein</div>
              <select class="form-control" v-model="proteinFilter" v-on:change="getFoods()">
                <option value="" >Choose option</option>
                <option value="high">High</option>
                <option value="low">Low</option>
              </select>
            </div>

            <div class="form-group col-xs-3 col-md-3">
              <div class="control-label">Filter Carbohydrate</div>
              <select class="form-control" v-model="carbohydrateFilter" v-on:change="getFoods()">
                <option value="" >Choose option</option>
                <option value="high">High</option>
                <option value="low">Low</option>
              </select>
            </div>

            <div class="form-group col-xs-3 col-md-3">
              <div class="control-label">Filter Sugar</div>
              <select class="form-control" v-model="sugarFilter" v-on:change="getFoods()">
                <option value="" >Choose option</option>
                <option value="high">High</option>
                <option value="low">Low</option>
              </select>
            </div>

            <div class="form-group col-xs-3 col-md-3">
              <div class="control-label">Filter Fat</div>
              <select class="form-control" v-model="fatFilter" v-on:change="getFoods()">
                <option value="" >Choose option</option>
                <option value="high">High</option>
                <option value="low">Low</option>
              </select>
            </div>

          </form>
        </div>

      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input v-on:keyup="search" v-model="searchInput" type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="x_content">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Table design <small>Custom design</small></h2>

              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">

              <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th>

                      </th>
                      <th class="column-title">Title </th>
                      <th class="column-title">Category </th>
                      <th class="column-title">Energy (kcal) </th>
                      <th class="column-title">Protein (g) </th>
                      <th class="column-title">Carbohydrate (g) </th>
                      <th class="column-title">Fat (g) </th>
                      <th class="column-title">Sugars (g) </th>
                      <th class="column-title no-link last"><span class="nobr">Action</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr v-for="food in foods.data" class="even pointer" v-bind:class="{ selected: isSelected(food.id) }">
                      <td class="a-center ">
                        <input type="checkbox" v-bind:value="food.id" class="icheckbox_flat-green" style="position: relative;" v-model="selectedIDs" v-on:click="toggleFood(food)" >
                      </td>
                      <td class=" ">{{ food.title }}</td>
                      <td class=" ">{{ food.category.title }}</td>
                      <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                      <td class=" ">John Blank L</td>
                      <td class=" ">Paid</td>
                      <td class="a-right a-right ">$7.45</td>
                      <td class="a-right a-right ">$7.45</td>
                      <td class=" last"><a href="#">View</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <paginator :items="foods"></paginator>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</template>

<script>
  import { mapState } from 'vuex';
  import Paginator from './Paginator.vue';

  export default {

    data() {
      return {
        foods: [],
        searchInput: '',
        proteinFilter: '',
        carbohydrateFilter: '',
        sugarFilter: '',
        fatFilter: ''
      }
    },

    mounted: function() {
      this.getFoods();
    },

    components: { Paginator },

    computed: {
      selectedIDs(){
        return this.$store.getters.selectedFoodsIds
      },
      getURLParams() {
        var urlParams = '';
        if (this.searchInput.length >= 3) urlParams += '&title=' + this.searchInput;
        if (this.proteinFilter != '') urlParams += '&protein=' + this.proteinFilter;
        if (this.carbohydrateFilter != '') urlParams += '&carbohydrate=' + this.carbohydrateFilter;
        if (this.sugarFilter != '') urlParams += '&sugar=' + this.sugarFilter;
        if (this.fatFilter != '') urlParams += '&fat=' + this.fatFilter;

        return urlParams;
      },
      ...mapState([
        'selectedFoods'
        ])
    },

    methods: {
      isSelected: function(food_id) {
        return _.some(this.selectedIDs, function(c) {
          return c == food_id;
        });
      },

      // TODO: handle it with vouex
      getFoods(page = 1) {
        var url = ApiURL + 'api/foods?page=' + page;
        url += this.getURLParams;

        this.$http
        .get(url).then((response) => {
          this.foods = response.body.data
        }, (err) => {
          console.log(err)
        });
      },

      search() {
        if(this.searchInput.length >= 3 || this.searchInput == '') {
          this.getFoods(1);
        }
      },

      toggleFood(food) {
        if (this.selectedIDs.includes(food.id)) {
          this.$store.dispatch('removeFood', food)
        } else {
          this.$store.dispatch('addFood', food)
        }
      }
    }

  }
</script>
