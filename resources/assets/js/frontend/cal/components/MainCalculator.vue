<template>
  <div>
    <div class="page-title">
      <div class="title_left">

      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <!-- table -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Basic Tables <small>basic table subtitle</small></h2>
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

            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="column-title">Title </th>
                  <th class="column-title">Category </th>
                  <th class="column-title">Energy (kcal) </th>
                  <th class="column-title">Protein (g) </th>
                  <th class="column-title">Carbohydrate (g) </th>
                  <th class="column-title">Fat (g) </th>
                  <th class="column-title">Sugars (g) </th>
                  <th class="column-title">Value</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="food in selectedFoods">
                  <th scope="row">{{ food.title }}</th>
                  <td>{{ food.category.title }}</td>
                  <td>{{ getNutrientValue(food, 'Energy') }}</td>
                  <td class=" ">{{ getNutrientValue(food, 'Protein') }}</td>
                  <td class=" ">{{ getNutrientValue(food, 'Carbohydrate, by difference') }}</td>
                  <td class=" ">{{ getNutrientValue(food, 'Total lipid (fat)') }}</td>
                  <td class=" ">{{ getNutrientValue(food, 'Sugars, total') }}</td>
                  <td>
                    <input class="col-xs-6" type="range" name="range" min="1" v-model="food.value" max="2000">
                    <input class="col-xs-6" v-model="food.value">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /table -->

    <div class="clearfix"></div>

    <!-- calculator -->
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="x_panel" style="height:600px;">
          <div class="x_title">
            <h2>Pricing Tables Design</h2>
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
            <div class="row">

              <div class="col-md-12">

                <!-- price element -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="pricing">
                    <div class="title">
                      <h1>Calculator</h1>
                    </div>
                    <div class="x_content">
                      <div class="">
                        <div class="pricing_features">
                          <ul class="list-unstyled text-left">
                            <li>
                              <strong>Protein:</strong> {{ nutrients_total.protein }}
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="pricing_footer">
                        <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Save meal</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- price element -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /calculator -->

  </div>
</template>

<script>
  import { mapState } from 'vuex';

  export default {
    name: 'main-calculator',

    computed: {
      foodValue(food){
        return 100;
      },
      nutrients_total(){
        return this.$store.getters.testGetter
      },
      ...mapState([
        'selectedFoods'
        ])
    },

    methods: {
      getNutrientValue(food, title) {
        var nutrient = _.filter(food.nutrients, function(nutrient){
          return nutrient['title'] == title;
        });

        return ((nutrient[0].pivot.value * food.value) / 100).toFixed(2);
      }
    }
  }
</script>
