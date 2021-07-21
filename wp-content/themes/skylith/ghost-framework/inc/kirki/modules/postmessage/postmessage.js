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
/******/ 	return __webpack_require__(__webpack_require__.s = 50);
/******/ })
/************************************************************************/
/******/ ({

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(51);


/***/ }),

/***/ 51:
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/* eslint-disable */

/* global kirkiPostMessageFields, WebFont */
var kirkiPostMessage = {
  /**
  * The fields.
  *
  * @since 3.0.26
  */
  fields: {},

  /**
  * A collection of methods for the <style> tags.
  *
  * @since 3.0.26
  */
  styleTag: {
    /**
    * Add a <style> tag in <head> if it doesn't already exist.
    *
    * @since 3.0.26
    * @param {string} id - The field-ID.
    * @returns {void}
    */
    add: function add(id) {
      if (document.getElementById("kirki-postmessage-".concat(id)) === null || typeof document.getElementById("kirki-postmessage-".concat(id)) === 'undefined') {
        jQuery('head').append("<style id=\"kirki-postmessage-".concat(id, "\"></style>"));
      }
    },

    /**
    * Add a <style> tag in <head> if it doesn't already exist,
    * by calling the this.add method, and then add styles inside it.
    *
    * @since 3.0.26
    * @param {string} id - The field-ID.
    * @param {string} styles - The styles to add.
    * @returns {void}
    */
    addData: function addData(id, styles) {
      kirkiPostMessage.styleTag.add(id);
      jQuery("#kirki-postmessage-".concat(id)).text(styles);
    }
  },

  /**
  * Common utilities.
  *
  * @since 3.0.26
  */
  util: {
    /**
    * Processes the value and applies any replacements and/or additions.
    *
    * @since 3.0.26
    * @param {Object} output - The output (js_vars) argument.
    * @param {mixed}  value - The value.
    * @param {string} controlType - The control-type.
    * @returns {string|false} - Returns false if value is excluded, otherwise a string.
    */
    processValue: function processValue(output, value) {
      var self = this,
          settings = window.parent.wp.customize.get(),
          excluded = false;

      if (_typeof(value) === 'object') {
        _.each(value, function (subValue, key) {
          value[key] = self.processValue(output, subValue);
        });

        return value;
      }

      output = _.defaults(output, {
        prefix: '',
        units: '',
        suffix: '',
        value_pattern: '$',
        pattern_replace: {},
        exclude: []
      });

      if (output.exclude.length >= 1) {
        _.each(output.exclude, function (exclusion) {
          if (value == exclusion) {
            excluded = true;
          }
        });
      }

      if (excluded) {
        return false;
      }

      value = output.value_pattern.replace(new RegExp('\\$', 'g'), value);

      _.each(output.pattern_replace, function (id, placeholder) {
        if (!_.isUndefined(settings[id])) {
          value = value.replace(placeholder, settings[id]);
        }
      });

      return output.prefix + value + output.units + output.suffix;
    },

    /**
    * Make sure urls are properly formatted for background-image properties.
    *
    * @since 3.0.26
    * @param {string} url - The URL.
    * @returns {string}
    */
    backgroundImageValue: function backgroundImageValue(url) {
      return url.indexOf('url(') === -1 ? "url(".concat(url, ")") : url;
    }
  },

  /**
  * A collection of utilities for CSS generation.
  *
  * @since 3.0.26
  */
  css: {
    /**
    * Generates the CSS from the output (js_vars) parameter.
    *
    * @since 3.0.26
    * @param {Object} output - The output (js_vars) argument.
    * @param {mixed}  value - The value.
    * @param {string} controlType - The control-type.
    * @returns {string}
    */
    fromOutput: function fromOutput(output, value, controlType) {
      var styles = '',
          kirkiParent = window.parent.kirki,
          googleFont = '',
          mediaQuery = false,
          processedValue;

      if (output.js_callback && typeof window[output.js_callback] === 'function') {
        value = window[output.js_callback[0]](value, output.js_callback[1]);
      }

      switch (controlType) {
        default:
          if (controlType === 'kirki-image') {
            value = !_.isUndefined(value.url) ? kirkiPostMessage.util.backgroundImageValue(value.url) : kirkiPostMessage.util.backgroundImageValue(value);
          }

          if (_.isObject(value)) {
            styles += "".concat(output.element, "{");

            _.each(value, function (val, key) {
              if (output.choice && key !== output.choice) {
                return;
              }

              processedValue = kirkiPostMessage.util.processValue(output, val);

              if (!output.property) {
                output.property = key;
              }

              if (processedValue !== false) {
                styles += "".concat(output.property, ":").concat(processedValue, ";");
              }
            });

            styles += '}';
          } else {
            processedValue = kirkiPostMessage.util.processValue(output, value);

            if (processedValue !== false) {
              styles += "".concat(output.element, "{").concat(output.property, ":").concat(processedValue, ";}");
            }
          }

          break;
      } // Get the media-query.


      if (output.media_query && typeof output.media_query === 'string' && !_.isEmpty(output.media_query)) {
        mediaQuery = output.media_query;

        if (mediaQuery.indexOf('@media') === -1) {
          mediaQuery = "@media ".concat(mediaQuery);
        }
      } // If we have a media-query, add it and return.


      if (mediaQuery) {
        return "".concat(mediaQuery, "{").concat(styles, "}");
      } // Return the styles.


      return styles;
    }
  },

  /**
  * A collection of utilities to change the HTML in the document.
  *
  * @since 3.0.26
  */
  html: {
    /**
    * Modifies the HTML from the output (js_vars) parameter.
    *
    * @since 3.0.26
    * @param {Object} output - The output (js_vars) argument.
    * @param {mixed}  value - The value.
    * @returns {string}
    */
    fromOutput: function fromOutput(output, value) {
      if (output.js_callback && typeof window[output.js_callback] === 'function') {
        value = window[output.js_callback[0]](value, output.js_callback[1]);
      }

      if (_.isObject(value) || _.isArray(value)) {
        if (!output.choice) {
          return;
        }

        _.each(value, function (val, key) {
          if (output.choice && key !== output.choice) {
            return;
          }

          value = val;
        });
      }

      value = kirkiPostMessage.util.processValue(output, value);

      if (output.attr) {
        jQuery(output.element).attr(output.attr, value);
      } else {
        jQuery(output.element).html(value);
      }
    }
  },

  /**
  * A collection of utilities to allow toggling a CSS class.
  *
  * @since 3.0.26
  */
  toggleClass: {
    /**
    * Toggles a CSS class from the output (js_vars) parameter.
    *
    * @since 3.0.21
    * @param {Object} output - The output (js_vars) argument.
    * @param {mixed}  value - The value.
    * @returns {string}
    */
    fromOutput: function fromOutput(output, value) {
      if (typeof output["class"] === 'undefined' || typeof output.value === 'undefined') {
        return;
      }

      if (value === output.value && !jQuery(output.element).hasClass(output["class"])) {
        jQuery(output.element).addClass(output["class"]);
      } else {
        jQuery(output.element).removeClass(output["class"]);
      }
    }
  }
};
jQuery(document).ready(function () {
  _.each(kirkiPostMessageFields, function (field) {
    wp.customize(field.settings, function (value) {
      value.bind(function (newVal) {
        var styles = '';

        _.each(field.js_vars, function (output) {
          if (!output["function"] || typeof kirkiPostMessage[output["function"]] === 'undefined') {
            output["function"] = 'css';
          }

          if (output["function"] === 'css') {
            styles += kirkiPostMessage.css.fromOutput(output, newVal, field.type);
          } else {
            kirkiPostMessage[output["function"]].fromOutput(output, newVal, field.type);
          }
        });

        kirkiPostMessage.styleTag.addData(field.settings, styles);
      });
    });
  });
});
/* eslint-enable */

/***/ })

/******/ });