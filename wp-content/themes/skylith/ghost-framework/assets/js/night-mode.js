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
/******/ 	return __webpack_require__(__webpack_require__.s = 18);
/******/ })
/************************************************************************/
/******/ ({

/***/ 18:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(19);


/***/ }),

/***/ 19:
/***/ (function(module, exports) {

(function () {
  var _window = window,
      ghostFrameworkNightMode = _window.ghostFrameworkNightMode,
      localStorage = _window.localStorage,
      matchMedia = _window.matchMedia,
      $ = _window.jQuery;

  if ('undefined' === typeof ghostFrameworkNightMode) {
    return;
  }

  var $html = $('html');
  var $doc = $(document);

  function switchMode() {
    var toggle = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
    var storedState = localStorage.getItem(ghostFrameworkNightMode.night_class);
    var defaultValue = ghostFrameworkNightMode["default"]; // Get local storage value.

    if (ghostFrameworkNightMode.use_local_storage && storedState) {
      defaultValue = storedState; // Get system color scheme.
    } else if (matchMedia && 'auto' === defaultValue) {
      defaultValue = matchMedia('(prefers-color-scheme: dark)').matches ? 'night' : 'day';
    } // Toggle night mode.


    if (toggle) {
      defaultValue = 'day' === defaultValue ? 'night' : 'day';
    }

    $html.addClass(ghostFrameworkNightMode.switching_class); // Enable Night.

    if ('night' === defaultValue) {
      $html.addClass(ghostFrameworkNightMode.night_class);

      if (toggle) {
        localStorage.setItem(ghostFrameworkNightMode.night_class, 'night');
      } // Disable Night.

    } else {
      $html.removeClass(ghostFrameworkNightMode.night_class);

      if (toggle) {
        localStorage.setItem(ghostFrameworkNightMode.night_class, 'day');
      }
    } // Trigger a reflow, flushing the CSS changes. This need to apply the changes from the new class added.
    // Info here - https://stackoverflow.com/questions/11131875/what-is-the-cleanest-way-to-disable-css-transition-effects-temporarily
    // eslint-disable-next-line no-unused-expressions


    $html[0].offsetHeight;
    $html.removeClass(ghostFrameworkNightMode.switching_class);
  } // Set default state.


  switchMode(false); // Toggle state when switched system color scheme.

  if (matchMedia) {
    matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function () {
      var storedState = localStorage.getItem(ghostFrameworkNightMode.night_class);
      var defaultValue = ghostFrameworkNightMode["default"];

      if (!(ghostFrameworkNightMode.use_local_storage && storedState) && 'auto' === defaultValue) {
        switchMode(false);
      }
    });
  } // Click on switch button.


  $doc.on('click', ghostFrameworkNightMode.toggle_selector, function (e) {
    e.preventDefault();
    switchMode();
  });
})();

/***/ })

/******/ });