/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

eval("\n/**\n * First we will load all of this project's JavaScript dependencies which\n * includes Vue and other libraries. It is a great starting point when\n * building robust, powerful web applications using Vue and Laravel.\n */\n\n//require('./bootstrap');\n\n// window.Vue = require('vue');\n\n/**\n * Next, we will create a fresh Vue application instance and attach it to\n * the page. Then, you may begin adding components to this application\n * or customize the JavaScript scaffolding to fit your unique needs.\n */\n\n// Vue.component('example', require('./components/Example.vue'));\n//\n// const app = new Vue({\n//     el: '#app'\n// });\n\n\n$(document).ready(function () {\n\n    $('#recipe_ingredients').sortable({\n        revert: true,\n        receive: function(event, ui) {\n            // console.log(ui, 'sortable ui');\n        },\n    });\n\n    $('#pantry_ingredients .ingredient').draggable({\n        connectToSortable: \"#recipe_ingredients\",\n        helper: \"clone\",\n        revert: \"invalid\",\n        stop: function(event, ui) {\n\n            var row_num = ui.helper.parent().find('.ingredient').length - 1; // don't count the placeholder\n            var units = JSON.parse(ui.helper.attr('data-units'));\n\n            ui.helper\n                .addClass('recipe-row-form')\n                .prepend($('.recipe-ingredient-template').html())\n                .removeAttr('style')\n\n                // Set the ingredient id\n                .find('.id').val( ui.helper.attr('data-id') )\n\n                // Add the delta to this ingredients fields\n                .find('.form-control').each(function(){\n                    var name = $(this).attr('name').replace('_x', '_' + row_num)\n                    $(this).attr('name', name);\n                });\n\n            // Remove unit options that are not applicable\n            ui.helper.find('.unit option').each(function(){\n                if(!units.includes(parseInt($(this).val()))) {\n                    $(this).remove();\n                }\n            });\n        },\n    });\n\n    $('.ingredients-list, .ingredients-list li').disableSelection();\n\n\n    $('.create-ingredient-form').on('submit',function(e){\n        e.preventDefault(e);\n\n        $.ajaxSetup({\n            headers: {\n                'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n            }\n        });\n\n        $.ajax({\n            type: 'POST',\n            // url: '/api/ingredient',\n            url: '/ingredient',\n            data: $(this).serialize(),\n            dataType: 'json',\n            success: function(data){\n\n                if(typeof data.id != 'undefined') {\n\n                    $('#addIngredientModal').modal('hide');\n\n                } else {\n                    console.log('ERROR');\n                }\n\n                console.log(data);\n            },\n            error: function(data){\n\n            }\n        });\n    });\n\n\n});\n\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcz84YjY3Il0sInNvdXJjZXNDb250ZW50IjpbIlxuLyoqXG4gKiBGaXJzdCB3ZSB3aWxsIGxvYWQgYWxsIG9mIHRoaXMgcHJvamVjdCdzIEphdmFTY3JpcHQgZGVwZW5kZW5jaWVzIHdoaWNoXG4gKiBpbmNsdWRlcyBWdWUgYW5kIG90aGVyIGxpYnJhcmllcy4gSXQgaXMgYSBncmVhdCBzdGFydGluZyBwb2ludCB3aGVuXG4gKiBidWlsZGluZyByb2J1c3QsIHBvd2VyZnVsIHdlYiBhcHBsaWNhdGlvbnMgdXNpbmcgVnVlIGFuZCBMYXJhdmVsLlxuICovXG5cbi8vcmVxdWlyZSgnLi9ib290c3RyYXAnKTtcblxuLy8gd2luZG93LlZ1ZSA9IHJlcXVpcmUoJ3Z1ZScpO1xuXG4vKipcbiAqIE5leHQsIHdlIHdpbGwgY3JlYXRlIGEgZnJlc2ggVnVlIGFwcGxpY2F0aW9uIGluc3RhbmNlIGFuZCBhdHRhY2ggaXQgdG9cbiAqIHRoZSBwYWdlLiBUaGVuLCB5b3UgbWF5IGJlZ2luIGFkZGluZyBjb21wb25lbnRzIHRvIHRoaXMgYXBwbGljYXRpb25cbiAqIG9yIGN1c3RvbWl6ZSB0aGUgSmF2YVNjcmlwdCBzY2FmZm9sZGluZyB0byBmaXQgeW91ciB1bmlxdWUgbmVlZHMuXG4gKi9cblxuLy8gVnVlLmNvbXBvbmVudCgnZXhhbXBsZScsIHJlcXVpcmUoJy4vY29tcG9uZW50cy9FeGFtcGxlLnZ1ZScpKTtcbi8vXG4vLyBjb25zdCBhcHAgPSBuZXcgVnVlKHtcbi8vICAgICBlbDogJyNhcHAnXG4vLyB9KTtcblxuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG5cbiAgICAkKCcjcmVjaXBlX2luZ3JlZGllbnRzJykuc29ydGFibGUoe1xuICAgICAgICByZXZlcnQ6IHRydWUsXG4gICAgICAgIHJlY2VpdmU6IGZ1bmN0aW9uKGV2ZW50LCB1aSkge1xuICAgICAgICAgICAgLy8gY29uc29sZS5sb2codWksICdzb3J0YWJsZSB1aScpO1xuICAgICAgICB9LFxuICAgIH0pO1xuXG4gICAgJCgnI3BhbnRyeV9pbmdyZWRpZW50cyAuaW5ncmVkaWVudCcpLmRyYWdnYWJsZSh7XG4gICAgICAgIGNvbm5lY3RUb1NvcnRhYmxlOiBcIiNyZWNpcGVfaW5ncmVkaWVudHNcIixcbiAgICAgICAgaGVscGVyOiBcImNsb25lXCIsXG4gICAgICAgIHJldmVydDogXCJpbnZhbGlkXCIsXG4gICAgICAgIHN0b3A6IGZ1bmN0aW9uKGV2ZW50LCB1aSkge1xuXG4gICAgICAgICAgICB2YXIgcm93X251bSA9IHVpLmhlbHBlci5wYXJlbnQoKS5maW5kKCcuaW5ncmVkaWVudCcpLmxlbmd0aCAtIDE7IC8vIGRvbid0IGNvdW50IHRoZSBwbGFjZWhvbGRlclxuICAgICAgICAgICAgdmFyIHVuaXRzID0gSlNPTi5wYXJzZSh1aS5oZWxwZXIuYXR0cignZGF0YS11bml0cycpKTtcblxuICAgICAgICAgICAgdWkuaGVscGVyXG4gICAgICAgICAgICAgICAgLmFkZENsYXNzKCdyZWNpcGUtcm93LWZvcm0nKVxuICAgICAgICAgICAgICAgIC5wcmVwZW5kKCQoJy5yZWNpcGUtaW5ncmVkaWVudC10ZW1wbGF0ZScpLmh0bWwoKSlcbiAgICAgICAgICAgICAgICAucmVtb3ZlQXR0cignc3R5bGUnKVxuXG4gICAgICAgICAgICAgICAgLy8gU2V0IHRoZSBpbmdyZWRpZW50IGlkXG4gICAgICAgICAgICAgICAgLmZpbmQoJy5pZCcpLnZhbCggdWkuaGVscGVyLmF0dHIoJ2RhdGEtaWQnKSApXG5cbiAgICAgICAgICAgICAgICAvLyBBZGQgdGhlIGRlbHRhIHRvIHRoaXMgaW5ncmVkaWVudHMgZmllbGRzXG4gICAgICAgICAgICAgICAgLmZpbmQoJy5mb3JtLWNvbnRyb2wnKS5lYWNoKGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICAgICAgICAgIHZhciBuYW1lID0gJCh0aGlzKS5hdHRyKCduYW1lJykucmVwbGFjZSgnX3gnLCAnXycgKyByb3dfbnVtKVxuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmF0dHIoJ25hbWUnLCBuYW1lKTtcbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgLy8gUmVtb3ZlIHVuaXQgb3B0aW9ucyB0aGF0IGFyZSBub3QgYXBwbGljYWJsZVxuICAgICAgICAgICAgdWkuaGVscGVyLmZpbmQoJy51bml0IG9wdGlvbicpLmVhY2goZnVuY3Rpb24oKXtcbiAgICAgICAgICAgICAgICBpZighdW5pdHMuaW5jbHVkZXMocGFyc2VJbnQoJCh0aGlzKS52YWwoKSkpKSB7XG4gICAgICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0sXG4gICAgfSk7XG5cbiAgICAkKCcuaW5ncmVkaWVudHMtbGlzdCwgLmluZ3JlZGllbnRzLWxpc3QgbGknKS5kaXNhYmxlU2VsZWN0aW9uKCk7XG5cblxuICAgICQoJy5jcmVhdGUtaW5ncmVkaWVudC1mb3JtJykub24oJ3N1Ym1pdCcsZnVuY3Rpb24oZSl7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoZSk7XG5cbiAgICAgICAgJC5hamF4U2V0dXAoe1xuICAgICAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuXG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICB0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICAvLyB1cmw6ICcvYXBpL2luZ3JlZGllbnQnLFxuICAgICAgICAgICAgdXJsOiAnL2luZ3JlZGllbnQnLFxuICAgICAgICAgICAgZGF0YTogJCh0aGlzKS5zZXJpYWxpemUoKSxcbiAgICAgICAgICAgIGRhdGFUeXBlOiAnanNvbicsXG4gICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKXtcblxuICAgICAgICAgICAgICAgIGlmKHR5cGVvZiBkYXRhLmlkICE9ICd1bmRlZmluZWQnKSB7XG5cbiAgICAgICAgICAgICAgICAgICAgJCgnI2FkZEluZ3JlZGllbnRNb2RhbCcpLm1vZGFsKCdoaWRlJyk7XG5cbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnRVJST1InKTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24oZGF0YSl7XG5cbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgfSk7XG5cblxufSk7XG5cblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyByZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQXdCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);