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
/******/ 	return __webpack_require__(__webpack_require__.s = 30);
/******/ })
/************************************************************************/
/******/ ({

/***/ 30:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(31);


/***/ }),

/***/ 31:
/***/ (function(module, exports) {

/* eslint-disable */
jQuery(document).ready(function () {
  wp.customize.section.each(function (section) {
    // Get the pane element.
    var pane = jQuery("#sub-accordion-section-".concat(section.id)),
        sectionLi = jQuery("#accordion-section-".concat(section.id)); // Check if the section is expanded.

    if (sectionLi.hasClass('control-section-kirki-expanded')) {
      // Move element.
      pane.appendTo(sectionLi);
    }
  });
});
/**
 * See https://github.com/justintadlock/trt-customizer-pro
 */

(function () {
  wp.customize.sectionConstructor['kirki-link'] = wp.customize.Section.extend({
    attachEvents: function attachEvents() {},
    isContextuallyActive: function isContextuallyActive() {
      return true;
    }
  });
})();
/**
 * @see https://wordpress.stackexchange.com/a/256103/17078
 */


(function () {
  var _panelEmbed, _panelIsContextuallyActive, _panelAttachEvents, _sectionEmbed, _sectionIsContextuallyActive, _sectionAttachEvents;

  wp.customize.bind('pane-contents-reflowed', function () {
    var panels = [],
        sections = []; // Reflow Sections.

    wp.customize.section.each(function (section) {
      if (section.params.type !== 'kirki-nested' || _.isUndefined(section.params.section)) {
        return;
      }

      sections.push(section);
    });
    sections.sort(wp.customize.utils.prioritySort).reverse();
    jQuery.each(sections, function (i, section) {
      var parentContainer = jQuery("#sub-accordion-section-".concat(section.params.section));
      parentContainer.children('.section-meta').after(section.headContainer);
    }); // Reflow Panels.

    wp.customize.panel.each(function (panel) {
      if (panel.params.type !== 'kirki-nested' || _.isUndefined(panel.params.panel)) {
        return;
      }

      panels.push(panel);
    });
    panels.sort(wp.customize.utils.prioritySort).reverse();
    jQuery.each(panels, function (i, panel) {
      var parentContainer = jQuery("#sub-accordion-panel-".concat(panel.params.panel));
      parentContainer.children('.panel-meta').after(panel.headContainer);
    });
  }); // Extend Panel.

  _panelEmbed = wp.customize.Panel.prototype.embed;
  _panelIsContextuallyActive = wp.customize.Panel.prototype.isContextuallyActive;
  _panelAttachEvents = wp.customize.Panel.prototype.attachEvents;
  wp.customize.Panel = wp.customize.Panel.extend({
    attachEvents: function attachEvents() {
      var panel;

      if (this.params.type !== 'kirki-nested' || _.isUndefined(this.params.panel)) {
        _panelAttachEvents.call(this);

        return;
      }

      _panelAttachEvents.call(this);

      panel = this;
      panel.expanded.bind(function (expanded) {
        var parent = wp.customize.panel(panel.params.panel);

        if (expanded) {
          parent.contentContainer.addClass('current-panel-parent');
        } else {
          parent.contentContainer.removeClass('current-panel-parent');
        }
      });
      panel.container.find('.customize-panel-back').off('click keydown').on('click keydown', function (event) {
        if (wp.customize.utils.isKeydownButNotEnterEvent(event)) {
          return;
        }

        event.preventDefault(); // Keep this AFTER the key filter above

        if (panel.expanded()) {
          wp.customize.panel(panel.params.panel).expand();
        }
      });
    },
    embed: function embed() {
      var panel = this,
          parentContainer;

      if (this.params.type !== 'kirki-nested' || _.isUndefined(this.params.panel)) {
        _panelEmbed.call(this);

        return;
      }

      _panelEmbed.call(this);

      parentContainer = jQuery("#sub-accordion-panel-".concat(this.params.panel));
      parentContainer.append(panel.headContainer);
    },
    isContextuallyActive: function isContextuallyActive() {
      var panel = this,
          children,
          activeCount = 0;

      if (this.params.type !== 'kirki-nested') {
        return _panelIsContextuallyActive.call(this);
      }

      children = this._children('panel', 'section');
      wp.customize.panel.each(function (child) {
        if (!child.params.panel) {
          return;
        }

        if (child.params.panel !== panel.id) {
          return;
        }

        children.push(child);
      });
      children.sort(wp.customize.utils.prioritySort);

      _(children).each(function (child) {
        if (child.active() && child.isContextuallyActive()) {
          activeCount += 1;
        }
      });

      return activeCount !== 0;
    }
  }); // Extend Section.

  _sectionEmbed = wp.customize.Section.prototype.embed;
  _sectionIsContextuallyActive = wp.customize.Section.prototype.isContextuallyActive;
  _sectionAttachEvents = wp.customize.Section.prototype.attachEvents;
  wp.customize.Section = wp.customize.Section.extend({
    attachEvents: function attachEvents() {
      var section = this;

      if (this.params.type !== 'kirki-nested' || _.isUndefined(this.params.section)) {
        _sectionAttachEvents.call(section);

        return;
      }

      _sectionAttachEvents.call(section);

      section.expanded.bind(function (expanded) {
        var parent = wp.customize.section(section.params.section);

        if (expanded) {
          parent.contentContainer.addClass('current-section-parent');
        } else {
          parent.contentContainer.removeClass('current-section-parent');
        }
      });
      section.container.find('.customize-section-back').off('click keydown').on('click keydown', function (event) {
        if (wp.customize.utils.isKeydownButNotEnterEvent(event)) {
          return;
        }

        event.preventDefault(); // Keep this AFTER the key filter above

        if (section.expanded()) {
          wp.customize.section(section.params.section).expand();
        }
      });
    },
    embed: function embed() {
      var section = this,
          parentContainer;

      if (this.params.type !== 'kirki-nested' || _.isUndefined(this.params.section)) {
        _sectionEmbed.call(section);

        return;
      }

      _sectionEmbed.call(section);

      parentContainer = jQuery("#sub-accordion-section-".concat(this.params.section));
      parentContainer.append(section.headContainer);
    },
    isContextuallyActive: function isContextuallyActive() {
      var section = this,
          children,
          activeCount = 0;

      if (this.params.type !== 'kirki-nested') {
        return _sectionIsContextuallyActive.call(this);
      }

      children = this._children('section', 'control');
      wp.customize.section.each(function (child) {
        if (!child.params.section) {
          return;
        }

        if (child.params.section !== section.id) {
          return;
        }

        children.push(child);
      });
      children.sort(wp.customize.utils.prioritySort);

      _(children).each(function (child) {
        if (typeof child.isContextuallyActive !== 'undefined') {
          if (child.active() && child.isContextuallyActive()) {
            activeCount += 1;
          }
        } else if (child.active()) {
          activeCount += 1;
        }
      });

      return activeCount !== 0;
    }
  });
})(jQuery);
/* eslint-enable */

/***/ })

/******/ });