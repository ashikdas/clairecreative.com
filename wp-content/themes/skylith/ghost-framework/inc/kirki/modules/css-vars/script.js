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
/******/ 	return __webpack_require__(__webpack_require__.s = 26);
/******/ })
/************************************************************************/
/******/ ({

/***/ 26:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(27);


/***/ }),

/***/ 27:
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/* global kirkiCssVarFields */

/*eslint-disable */
var kirkiCssVars = {
  /**
  * Get styles.
  *
  * @since 3.0.28
  * @returns {Object}
  */
  getStyles: function getStyles() {
    var style = jQuery('#kirki-css-vars'),
        styles = style.html().replace(':root{', '').replace('}', '').split(';'),
        stylesObj = {}; // Format styles as a object we can then tweak.

    _.each(styles, function (style) {
      style = style.split(':');

      if (style[0] && style[1]) {
        stylesObj[style[0]] = style[1];
      }
    });

    return stylesObj;
  },

  /**
  * Builds the styles from an object.
  *
  * @since 3.0.28
  * @param {Object} vars - The vars.
  * @returns {string}
  */
  buildStyle: function buildStyle(vars) {
    var style = '';

    _.each(vars, function (val, name) {
      style += "".concat(name, ":").concat(val, ";");
    });

    return ":root{".concat(style, "}");
  }
};
jQuery(document).ready(function () {
  _.each(kirkiCssVarFields, function (field) {
    wp.customize(field.settings, function (value) {
      value.bind(function (newVal) {
        var styles = kirkiCssVars.getStyles();

        _.each(field.css_vars, function (cssVar) {
          if (_typeof(newVal) === 'object') {
            if (cssVar[2] && newVal[cssVar[2]]) {
              styles[cssVar[0]] = cssVar[1].replace('$', newVal[cssVar[2]]);
            }
          } else {
            styles[cssVar[0]] = cssVar[1].replace('$', newVal);
          }
        });

        jQuery('#kirki-css-vars').html(kirkiCssVars.buildStyle(styles));
      });
    });
  });
});
wp.customize.bind('preview-ready', function () {
  wp.customize.preview.bind('active', function () {
    _.each(kirkiCssVarFields, function (field) {
      wp.customize(field.settings, function (value) {
        var styles = kirkiCssVars.getStyles(),
            newVal = window.parent.wp.customize(value.id).get();

        _.each(field.css_vars, function (cssVar) {
          if (_typeof(newVal) === 'object') {
            if (cssVar[2] && newVal[cssVar[2]]) {
              styles[cssVar[0]] = cssVar[1].replace('$', newVal[cssVar[2]]);
            }
          } else {
            styles[cssVar[0]] = cssVar[1].replace('$', newVal);
          }
        });

        jQuery('#kirki-css-vars').html(kirkiCssVars.buildStyle(styles));
      });
    });
  });
});
/* eslint-enable */

/***/ })

/******/ });