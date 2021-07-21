'use strict';

/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 34);
/******/ })
/************************************************************************/
/******/ ({

/***/ 34:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(35);


/***/ }),

/***/ 35:
/***/ (function(module, exports) {

/* eslint-disable */
var kirkiDependencies = {
  listenTo: {},
  init: function init() {
    var self = this;
    wp.customize.control.each(function (control) {
      self.showKirkiControl(control);
    });

    _.each(self.listenTo, function (slaves, master) {
      _.each(slaves, function (slave) {
        wp.customize(master, function (setting) {
          var setupControl = function setupControl(control) {
            var setActiveState, isDisplayed;

            isDisplayed = function isDisplayed() {
              return self.showKirkiControl(wp.customize.control(slave));
            };

            setActiveState = function setActiveState() {
              control.active.set(isDisplayed());
            };

            setActiveState();
            setting.bind(setActiveState);
            control.active.validate = isDisplayed;
          };

          wp.customize.control(slave, setupControl);
        });
      });
    });
  },

  /**
  * Should we show the control?
  *
  * @since 3.0.17
  * @param {string|object} control - The control-id or the control object.
  * @returns {bool}
  */
  showKirkiControl: function showKirkiControl(control) {
    var self = this,
        show = true,
        isOption = control.params && // Check if control.params exists.
    control.params.kirkiOptionType && // Check if option_type exists.
    control.params.kirkiOptionType === 'option' && // We're using options.
    control.params.kirkiOptionName && // Check if option_name exists.
    !_.isEmpty(control.params.kirkiOptionName) // Check if option_name is not empty.
    ,
        i;

    if (_.isString(control)) {
      control = wp.customize.control(control);
    } // Exit early if control not found or if "required" argument is not defined.


    if (typeof control === 'undefined' || control.params && _.isEmpty(control.params.required)) {
      return true;
    } // Loop control requirements.


    for (i = 0; i < control.params.required.length; i++) {
      if (!self.checkCondition(control.params.required[i], control, isOption, 'AND')) {
        show = false;
      }
    }

    return show;
  },

  /**
  * Check a condition.
  *
  * @param {Object} requirement - The requirement, inherited from showKirkiControl.
  * @param {Object} control - The control object.
  * @param {bool}   isOption - Whether it's an option or not.
  * @param {string} relation - Can be one of 'AND' or 'OR'.
  */
  checkCondition: function checkCondition(requirement, control, isOption, relation) {
    var self = this,
        childRelation = relation === 'AND' ? 'OR' : 'AND',
        nestedItems,
        i; // Tweak for using active callbacks with serialized options instead of theme_mods.

    if (isOption && requirement.setting) {
      // Make sure we don't already have the option_name in there.
      if (requirement.setting.indexOf("".concat(control.params.kirkiOptionName, "[")) === -1) {
        requirement.setting = "".concat(control.params.kirkiOptionName, "[").concat(requirement.setting, "]");
      }
    } // If an array of other requirements nested, we need to process them separately.


    if (typeof requirement[0] !== 'undefined' && typeof requirement.setting === 'undefined') {
      nestedItems = []; // Loop sub-requirements.

      for (i = 0; i < requirement.length; i++) {
        nestedItems.push(self.checkCondition(requirement[i], control, isOption, childRelation));
      } // OR relation. Check that true is part of the array.


      if (childRelation === 'OR') {
        return nestedItems.indexOf(true) !== -1;
      } // AND relation. Check that false is not part of the array.


      return nestedItems.indexOf(false) === -1;
    } // Early exit if setting is not defined.


    if (typeof wp.customize.control(requirement.setting) === 'undefined') {
      return true;
    }

    self.listenTo[requirement.setting] = self.listenTo[requirement.setting] || [];

    if (self.listenTo[requirement.setting].indexOf(control.id) === -1) {
      self.listenTo[requirement.setting].push(control.id);
    }

    return self.evaluate(requirement.value, wp.customize.control(requirement.setting).setting._value, requirement.operator);
  },

  /**
  * Figure out if the 2 values have the relation we want.
  *
  * @since 3.0.17
  * @param {mixed} value1 - The 1st value.
  * @param {mixed} value2 - The 2nd value.
  * @param {string} operator - The comparison to use.
  * @returns {bool}
  */
  evaluate: function evaluate(value1, value2, operator) {
    var found = false;

    if (operator === '===') {
      return value1 === value2;
    }

    if (operator === '==' || operator === '=' || operator === 'equals' || operator === 'equal') {
      return value1 == value2;
    }

    if (operator === '!==') {
      return value1 !== value2;
    }

    if (operator === '!=' || operator === 'not equal') {
      return value1 != value2;
    }

    if (operator === '>=' || operator === 'greater or equal' || operator === 'equal or greater') {
      return value2 >= value1;
    }

    if (operator === '<=' || operator === 'smaller or equal' || operator === 'equal or smaller') {
      return value2 <= value1;
    }

    if (operator === '>' || operator === 'greater') {
      return value2 > value1;
    }

    if (operator === '<' || operator === 'smaller') {
      return value2 < value1;
    }

    if (operator === 'contains' || operator === 'in') {
      if (_.isArray(value1) && _.isArray(value2)) {
        _.each(value2, function (value) {
          if (value1.indexOf(value) !== -1) {
            found = true;
            return false;
          }
        });

        return found;
      }

      if (_.isArray(value2)) {
        _.each(value2, function (value) {
          if (value == value1) {
            // jshint ignore:line
            found = true;
          }
        });

        return found;
      }

      if (_.isObject(value2)) {
        if (!_.isUndefined(value2[value1])) {
          found = true;
        }

        _.each(value2, function (subValue) {
          if (value1 === subValue) {
            found = true;
          }
        });

        return found;
      }

      if (_.isString(value2)) {
        if (_.isString(value1)) {
          return value1.indexOf(value2) > -1 && value2.indexOf(value1) > -1;
        }

        return value1.indexOf(value2) > -1;
      }
    }

    return value1 == value2;
  }
};
jQuery(document).ready(function () {
  kirkiDependencies.init();
});
/* eslint-enable */

/***/ })

/******/ });