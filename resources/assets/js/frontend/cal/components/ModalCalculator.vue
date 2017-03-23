<template>
  <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-hidden="true" style="display: block; padding-right: 15px;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
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
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button @click="$emit('close')" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>
</template>

<script>
  import { mapState } from 'vuex';

  export default {
    name: 'modal-calculator',

    computed: {
      foodValue(food){
        return 100;
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
