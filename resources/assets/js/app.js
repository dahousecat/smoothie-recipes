
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


$(document).ready(function () {

    $('#recipe_ingredients').sortable({
        revert: true,
        receive: function(event, ui) {
            // console.log(ui, 'sortable ui');
        },
    });

    $('#pantry_ingredients .ingredient').draggable({
        connectToSortable: "#recipe_ingredients",
        helper: "clone",
        revert: "invalid",
        stop: function(event, ui) {

            var row_num = ui.helper.parent().find('.ingredient').length - 1; // don't count the placeholder
            var units = JSON.parse(ui.helper.attr('data-units'));

            ui.helper
                .addClass('recipe-row-form')
                .prepend($('.recipe-ingredient-template').html())
                .removeAttr('style')

                // Set the ingredient id
                .find('.id').val( ui.helper.attr('data-id') )

                // Add the delta to this ingredients fields
                .find('.form-control').each(function(){
                    var name = $(this).attr('name').replace('_x', '_' + row_num)
                    $(this).attr('name', name);
                });

            // Remove unit options that are not applicable
            ui.helper.find('.unit option').each(function(){
                if(!units.includes(parseInt($(this).val()))) {
                    $(this).remove();
                }
            });
        },
    });

    $('.ingredients-list, .ingredients-list li').disableSelection();


    $('.create-ingredient-form').on('submit',function(e){
        e.preventDefault(e);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            // url: '/api/ingredient',
            url: '/ingredient',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data){

                if(typeof data.id != 'undefined') {

                    $('#addIngredientModal').modal('hide');

                } else {
                    console.log('ERROR');
                }

                console.log(data);
            },
            error: function(data){

            }
        });
    });


});

