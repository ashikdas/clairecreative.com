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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */,
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(7);


/***/ }),
/* 7 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var throttle_debounce__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(8);
/* harmony import */ var rafl__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(9);
/* harmony import */ var rafl__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(rafl__WEBPACK_IMPORTED_MODULE_1__);


var tween = window.TweenMax;
var $ = window.jQuery;
var Skylith = window.Skylith;
var $html = $('html');
var $body = $('body');
var $doc = $(document);
var $window = $(window);
var $preloader = $('.nk-preloader');
var $main = $('.nk-main'); // page dark background

if ($body.hasClass('skylith-body-dark')) {
  $html.addClass('skylith-html-dark');
} // preloader


var preloaderTimer;

function closePreloader() {
  clearTimeout(preloaderTimer);
  $preloader.addClass('nk-preloader-hide');
  $doc.trigger('hidePreloader.skylith');
  setTimeout(function () {
    $preloader.hide();
  }, 1000);
}

if ($preloader.length) {
  $window.on('load', closePreloader);
  preloaderTimer = setTimeout(closePreloader, 5000);
} // fix posts pagination position.


$('.nk-blog-post-single > .nk-pagination').each(function () {
  $(this).closest('.site-main').append(this);
}); // fix navbar position if admin bar showed

$(function () {
  var $adminBar = $('#wpadminbar');
  var $navbars = $('.nk-navbar-sticky, .nk-header:not(.nk-header-opaque) > .nk-navbar-top, .nk-header-left > .nk-navbar-cont, .nk-header-left > .nk-navbar-left, .nk-navbar-full, .nk-navbar-side');

  if ($adminBar.length && $navbars.length) {
    $window.on('scroll resize load', Object(throttle_debounce__WEBPACK_IMPORTED_MODULE_0__["throttle"])(200, function () {
      var rect = $adminBar[0].getBoundingClientRect();
      $navbars.each(function () {
        var $nav = $(this);
        var result = {
          top: 0
        };

        if ($nav.is('.nk-navbar-fixed, .nk-header:not(.nk-header-opaque) > .nk-navbar-top, .nk-navbar-cont, .nk-navbar-left, .nk-navbar-full, .nk-navbar-side')) {
          result.top = Math.max(0, rect.top + rect.height);
        }

        if ($nav.is('.nk-navbar-cont')) {
          result.height = "calc(100% - ".concat(result.top, "px)");
        }

        $nav.css(result);
      });
    }));
  }
}); // prepare mega menu

$('.nk-navbar-top .nk-nav > .ghost_menu__mega-menu').each(function () {
  var $megaMenu = $(this);
  var $dropdown = $megaMenu.children('.dropdown');
  var $newDropdown = $('<div>').attr('class', $dropdown.attr('class'));
  $newDropdown.append('<ul>'); // each column

  $dropdown.children('li').each(function () {
    var $column = $(this);
    var $items = $column.children('ul').find('li');
    var columnLabel = $column.children('a').html();
    var $newColumn = $('<li>');
    $('<label>').html(columnLabel).appendTo($newColumn);
    $('<ul>').html($items).appendTo($newColumn);
    $newDropdown.children('ul').append($newColumn);
  });
  $megaMenu.addClass('nk-mega-item');
  $newDropdown.insertAfter($dropdown);
  $dropdown.remove();
});
var socials = ['rss', 'behance', 'bitbucket', 'dropbox', 'dribbble', 'deviantart', 'facebook', 'flickr', 'foursquare', 'github', 'google-plus', 'instagram', 'linkedin', 'medium', 'odnoklassniki', 'paypal', 'pinterest', 'reddit', 'skype', 'soundcloud', 'slack', 'steam', 'snapchat', 'swarm', 'stumbleupon', 'spotify', 'tumblr', 'twitch', 'twitter', 'vimeo', 'vk', 'wordpress', 'youtube']; // additional classes for social icons.

$('.nk-social a').each(function () {
  var $this = $(this);
  var classname = $this.attr('class'); // add social classname

  if (!classname || !(classname.indexOf('nk-social-') !== -1)) {
    var $icon = $this.children('i, span').eq(0);

    if ($icon.length) {
      var iconClass = $icon.attr('class');
      var contains = false;
      socials.forEach(function (val) {
        if (iconClass.indexOf(val) !== -1 && !contains) {
          contains = val;
        }
      });

      if (contains) {
        $this.addClass("nk-social-".concat(contains));
      }
    } // add wrappers


    var html = $this.html();
    $this.html("<span><span class=\"nk-social-front\">".concat(html, "</span><span class=\"nk-social-back\">").concat(html, "</span></span>"));
  }
});
/**
 * Widgets
 */
// categories.

$("\n    .nk-widget.widget_categories:not(.nk-widget-categories-ready),\n    .nk-widget.widget_archive:not(.nk-widget-categories-ready),\n    .nk-widget.widget_pages:not(.nk-widget-categories-ready),\n    .nk-widget.widget_meta:not(.nk-widget-categories-ready),\n    .nk-widget.widget_nav_menu:not(.nk-widget-categories-ready),\n    .nk-widget[id^=\"woocommerce_layered_nav-\"]:not(.nk-widget-categories-ready)\n").each(function () {
  var $this = $(this);
  $this.addClass('nk-widget-categories-ready'); // categories list.

  $this.find('> ul').addClass('nk-categories-list');
  $this.find('ul > li').each(function () {
    var $li = $(this);
    var $a = $li.find('> a'); // add arrow icon.

    $a.prepend('<span class="pe-7s-angle-right"></span> '); // add count tooltip.
    // support for woocommerce layered nav widget.

    var $count = $li.find('.count'); // default WP categories widget.

    if (!$count.length) {
      $count = $li.contents().filter(function () {
        return this.nodeType === 3;
      })[0];
    } else {
      $count = $count[0].firstChild;
    }

    var count = $count ? parseInt($count.nodeValue.replace(/\D/g, ''), 10) : false;

    if (count) {
      $a.attr({
        'data-toggle': 'tooltip',
        'data-placement': 'left',
        title: count
      }); // remove old count text node.

      $count.parentNode.removeChild($count);
    }
  });
}); // widgets select

$('.nk-widget select:not(.form-control)').addClass('form-control'); // tagscloud.

$('.nk-widget .tagcloud:not(.nk-widget-tagcloud-ready)').each(function () {
  var $this = $(this);
  $this.addClass('nk-widget-tagcloud-ready'); // tags counts.

  $this.find('.tag-link-count').each(function () {
    var $count = $(this);
    var count = parseInt($count.text().replace(/\D/g, ''), 10);

    if (count) {
      $count.parent().attr({
        'data-toggle': 'tooltip',
        'data-placement': 'top',
        title: count
      });
    } // remove old count text node.


    $count.remove();
  });
}); // fullwidth gutenberg feature.

function fullwidthGutenberg() {
  var wndW = $body.width();
  $('.alignfull, .alignwide').each(function () {
    var fixIsotope = false;
    var $this = $(this);
    var isAWB = $this.hasClass('nk-awb');
    var isWide = $this.hasClass('alignwide'); // stop if there is sidebar.

    if ($this.closest('.row').find('> div > .nk-sidebar').length) {
      return;
    } // stop if isotope blog list.


    if ($this.closest('.nk-blog-isotope-2').length) {
      return;
    }

    if (isAWB) {
      $this = $this.children('.nk-awb-wrap');
    } else if ($this.hasClass('vp-pagination')) {
      $this = $this.parent();
      $this.css('flex', 'auto');
    } else {
      fixIsotope = $this.closest('.vp-portfolio__items-style-skylith-wide').data('isotope');
    }

    if (!$this[0] || !$main[0]) {
      return;
    }

    var rect = $this[0].getBoundingClientRect();
    var mainRect = $main[0].getBoundingClientRect();
    var left = rect.left;
    var right = wndW - rect.right;
    var bottom = rect.bottom; // fix offset when used left navbar / side image or page border.

    if (mainRect.left) {
      left -= mainRect.left;
    }

    if (wndW - mainRect.right) {
      right -= wndW - mainRect.right;
    }

    var ml = parseFloat($this.css('margin-left') || 0);
    var mr = parseFloat($this.css('margin-right') || 0);
    var mb = parseFloat($this.css('margin-bottom') || 0);
    var changeLeft = ml - left;
    var changeRight = mr - right;
    var changeBottom = ''; // Ghostkit column support

    if ($this.closest('.ghostkit-col').length) {
      var $row = $this.closest('.ghostkit-grid');
      var $col = $this.closest('.ghostkit-col'); // prevent if there is only 1 column

      if ($row.children('.ghostkit-grid-inner').children('.ghostkit-col').length > 1) {
        var rectRow = $row[0].getBoundingClientRect();
        var rectCol = $col[0].getBoundingClientRect();
        var leftRow = rectRow.left;
        var rightRow = wndW - rectRow.right;
        var leftCol = rectCol.left;
        var rightCol = wndW - rectCol.right;
        var bottomCol = rectCol.bottom; // We need to round numbers because in some situations the same blocks has different offsets, for example
        // Row right is 68
        // Col right is 68.015625
        // I don't know why :(

        if (Math.round(leftRow) !== Math.round(leftCol)) {
          changeLeft = leftCol - left + ml; // disable fix for left offset when used left navbar or image.

          if (mainRect.left) {
            changeLeft -= mainRect.left;
          }
        }

        if (Math.round(rightRow) !== Math.round(rightCol)) {
          changeRight = rightCol - right + mr;
        }

        if (isAWB) {
          changeBottom = mb - (bottomCol - bottom);
        }
      }
    } // alignwide


    if (isWide) {
      // 1140 - 30 (padding in top menu)
      var availableOffset = Math.min(1110, wndW) - (rect.width + ml + mr);

      if (availableOffset > 0) {
        changeLeft = -availableOffset / 2;
        changeRight = -availableOffset / 2;
      } else {
        changeLeft = 0;
        changeRight = 0;
      }
    }

    $this.css({
      'margin-left': changeLeft,
      'margin-right': changeRight,
      'margin-bottom': changeBottom
    }); // fix isotope in VisualPortfolio skylith-wide style.

    if (fixIsotope && fixIsotope.layout) {
      fixIsotope.layout();
    }
  });
}

fullwidthGutenberg();
$window.on('resize orientationchange load', Object(throttle_debounce__WEBPACK_IMPORTED_MODULE_0__["throttle"])(200, function () {
  rafl__WEBPACK_IMPORTED_MODULE_1___default()(fullwidthGutenberg);
})); // filter toggle button.

$doc.on('click', '.vp-filter__pagination a', function (e) {
  e.preventDefault();
  var $pagination = $(this).closest('.vp-filter__pagination');

  if ($pagination.hasClass('vp-filter__pagination-busy')) {
    return;
  }

  var $filter = $pagination.next().find('.vp-filter');
  var isActive = $pagination.hasClass('vp-filter__pagination-active');
  $pagination.addClass('vp-filter__pagination-busy');

  if (isActive) {
    tween.to($filter.children(), 0.2, {
      opacity: 0
    });
    tween.to($filter, 0.2, {
      height: 0,
      marginBottom: 0,
      marginTop: 0,
      force3D: true,
      delay: 0.2,
      onComplete: function onComplete() {
        $pagination.removeClass('vp-filter__pagination-active');
        $pagination.removeClass('vp-filter__pagination-busy');
      }
    });
  } else {
    $pagination.addClass('vp-filter__pagination-active');
    $filter.css('height', 'auto');
    var filterHeight = $filter.height();
    $filter.css('height', 0);
    tween.set($filter.children(), {
      y: -10,
      opacity: 0
    });
    tween.to($filter, 0.2, {
      height: filterHeight,
      marginBottom: 24,
      marginTop: -10,
      force3D: true
    });
    tween.staggerTo($filter.children(), 0.2, {
      y: 0,
      opacity: 1,
      delay: 0.1
    }, 0.04, function () {
      $pagination.removeClass('vp-filter__pagination-busy');
    });
  }
}); // fix Skylith filter after ajax load.

$doc.on('startLoadingNewItems.vpf', function (event) {
  var $this = $(event.target);
  $this.data('skylith-vpf-filter-opened', !!$this.find('.vp-filter__pagination-active').length);
});
$doc.on('endLoadingNewItems.vpf', function (event) {
  var $this = $(event.target);

  if ($this.data('skylith-vpf-filter-opened')) {
    $this.find('.vp-filter__pagination').addClass('vp-filter__pagination-active');
  }
}); // Swiper number bullets.

$doc.on('initSwiper.vpf', function () {
  $('.swiper-pagination-bullet').each(function () {
    var $bullet = $(this);
    var number = parseInt($bullet.attr('data-bullet-number'), 10);

    if (number < 10) {
      $bullet.attr('data-bullet-number', "0".concat(number));
    }
  });
}); // Tilt effect.

$doc.on('init.vpf endLoadingNewItems.vpf', function (e) {
  var $this = $(e.target).filter('[data-portfolio-skylith-tilt="true"]');
  var itemsStyle = $this.attr('data-vp-items-style');
  var tiltMeta = !/^default|skylith-default|skylith-default-2|skylith-icon|skylith-wide$/g.test(itemsStyle);
  var $items = $this.find("".concat(tiltMeta ? '.vp-portfolio__item' : '.vp-portfolio__item-img', ":not(.vp-portfolio__item-tilt)"));

  if ($items.length) {
    $items.each(function () {
      var $item = $(this);
      var $meta = $item.find('.vp-portfolio__item-meta');

      if (tiltMeta && $meta.length) {
        $item.on('change', function (evt, data) {
          var tiltX = parseFloat(data.tiltX) * 1.5;
          var tiltY = -parseFloat(data.tiltY) * 1.5;
          $meta.css('transform', "translateY(".concat(tiltY, "px) translateX(").concat(tiltX, "px)"));
        });
        $item.on('tilt.mouseLeave', function () {
          $meta.css('transform', '');
        });
      }

      $item.addClass('vp-portfolio__item-tilt').tilt({
        maxTilt: 15,
        perspective: 1000,
        scale: 1,
        speed: 500,
        transition: 500,
        disableAxis: null,
        reset: true,
        glare: false,
        maxGlare: 1
      });
    });
  }
}); // Fix fullpage sliders overflow

var $fullpage = $('.nk-fullpage');

if ($fullpage.length) {
  $body.css('overflow', 'hidden');
} // Fullpage first title animation on load.


if ($preloader.length && $fullpage.length) {
  var $fullPageTitle = $fullpage.find('.nk-fullpage-content .display-big');

  if ($fullPageTitle.length) {
    $fullPageTitle.each(function () {
      var $title = $(this);
      $title.addClass('nk-fullpage-title-effect');
      $title.html("<span>".concat($title.html(), "</span>"));
    });
    $doc.one('hidePreloader.skylith', function () {
      setTimeout(function () {
        $fullpage.addClass('nk-fullpage-title-effect-show');
      }, 650);
    });
  }
} // AWB scroll down button click.


$doc.on('click', '.nk-awb-scroll-down', function (e) {
  e.preventDefault();
  var $awb = $(this).closest('.nk-awb');

  if ($awb.length) {
    Skylith.scrollTo($awb.offset().top + $awb.outerHeight());
  }
}); // WooCommerce cart.

$(document.body).on('wc_fragments_loaded wc_fragments_refreshed', function () {
  var $badge = $('.skylith-woocommerce-cart-count');
  var $smallCartCount = $('.widget_shopping_cart_content:eq(0) [data-skylith-cart-count]');
  var $fullscreenCart = $('.nk-shop-cart');
  var count = parseInt($smallCartCount.attr('data-skylith-cart-count'), 10); // add badge count.

  if (typeof count === 'number') {
    $badge.text(count);
    $badge[count ? 'removeClass' : 'addClass']('d-none');
  } // change position of items in fullscreen cart.


  $fullscreenCart.find('.mini_cart_item').each(function () {
    var $this = $(this);
    var $remove = $this.find('.remove_from_cart_button');
    var $thumb = $this.find('img');
    var $quantity = $this.find('.quantity');
    var $title = $thumb.parent().addClass('nk-shop-cart-item-title');
    var $thumbWrap = $('<div class="nk-shop-cart-item-thumb">').appendTo($this);
    var $contWrap = $('<div class="nk-shop-cart-item-cont">').appendTo($this);
    $thumbWrap.append($thumb);
    $thumb.wrap("<a href=\"".concat($title.attr('href'), "\">"));
    $contWrap.append($title);
    $contWrap.append($quantity);
    $quantity.wrap('<div class="nk-shop-cart-item-price">');
    $quantity.parent().append($remove);
  });
}); // WooCommerce layout toggle.

var $shopHeader = $('.nk-shop-header');
var $products = $('.products');
/**
 * Set shop layout.
 *
 * @param Int cols - columns number.
 */

function setShopLayout(cols) {
  if (cols) {
    $products.attr('class', "products columns-".concat(cols));
    $('.nk-shop-layout-toggle').removeClass('active').filter("[data-cols=\"".concat(cols, "\"]")).addClass('active');
    localStorage.setItem('skylith-shop-layout-size', cols);
  }
}

if ($shopHeader.length && $products.length) {
  // saved layout size.
  var layoutSize = localStorage.getItem('skylith-shop-layout-size');

  if (!layoutSize || !$(".nk-shop-layout-toggle[data-cols=".concat(layoutSize, "]")).length) {
    if ($products.hasClass('columns-1')) {
      layoutSize = 1;
    } else if ($products.hasClass('columns-2')) {
      layoutSize = 2;
    } else if ($products.hasClass('columns-4')) {
      layoutSize = 4;
    } else {
      layoutSize = 3;
    }
  }

  setShopLayout(layoutSize);
  $shopHeader.on('click', '.nk-shop-layout-toggle', function (e) {
    e.preventDefault();
    var $this = $(this);
    var cols = parseInt($this.attr('data-cols'), 10);
    setShopLayout(cols);
  });
} // WooCommerce load more.


var $shopPagination = $('.woocommerce-pagination');

if ($shopPagination.length) {
  var nextPageUrl = $shopPagination.find('.next').attr('href');

  if (nextPageUrl) {
    $shopPagination.replaceWith("\n            <div class=\"nk-shop-load-more pt-30\">\n                <a href=\"".concat(nextPageUrl, "\" class=\"nk-shop-load-more-btn\">Load more products</a>\n            </div>\n        "));
    var $loadMore = $('.nk-shop-load-more a');
    $body.on('click', '.nk-shop-load-more a:not(.loading)', function (e) {
      e.preventDefault();
      $loadMore.addClass('loading');
      $.get({
        url: $loadMore.attr('href'),
        dataType: 'html'
      }).done(function (response) {
        if (response) {
          var $response = $(response);
          var $newProducts = $response.find('.products');
          var nextUrl = $response.find('.woocommerce-pagination .next').attr('href');
          $products.append($newProducts.children());

          if (nextUrl) {
            $loadMore.attr('href', nextUrl);
          } else {
            $loadMore.replaceWith('<p class="text-center">You’ve reached the end of the products list.</a>');
          }

          $loadMore.removeClass('loading');
        }
      });
    });
  }
} // WooCommerce prepare flex slider video button.


$(function () {
  $('.woocommerce-product-gallery').each(function () {
    var $this = $(this);
    var $videoBtn = $this.find('.flex-viewport .nk-video-fullscreen-toggle');

    if ($videoBtn.length) {
      $this.prepend($videoBtn);
    }
  });
}); // WooCommerce number input

function initNumberInput() {
  $('.woocommerce .quantity:not(.nk-form-control-number) input.qty').each(function () {
    $(this).closest('.quantity').addClass('nk-form-control-number');
    $(this).after($('<span class="nk-form-control-number-up"></span><span class="nk-form-control-number-down"></span>'));
  });
}

$(initNumberInput);
$(document.body).on('updated_cart_totals', initNumberInput); // WooCommerce review form

$('.woocommerce #respond').each(function () {
  var $form = $(this);
  var $rating = $form.find('.comment-form-rating'); // change rating position

  $rating.prependTo($rating.parent()); // remove labels from input fields

  $form.find('p > input, p > textarea').each(function () {
    var $input = $(this);
    var $label = $input.prev('label');

    if ($label.length) {
      $input.attr('placeholder', $label.text());
      $label.hide();
    }
  });
});
/**
 * Typed words.
 */

$('.nk-typed-words:not(.nk-typed-words-ready)').each(function () {
  var $this = $(this);
  var duration = Math.max(parseInt($this.attr('data-duration'), 10) || 1500, 1500);
  $this.children('span:first').addClass('nk-typed-words-active');
  $this.addClass('nk-typed-words-ready');
  $this.width($this.children('span:first').width());
  setInterval(function () {
    var $current = $this.children('.nk-typed-words-active');
    var $next = $current.next();

    if (!$next.length) {
      $next = $this.children('span:first');
    }

    $this.width($next.width());
    $current.one('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', function () {
      $current.removeClass('nk-typed-words-hide');
    });
    $next.one('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', function () {
      $current.removeClass('nk-typed-words-show');
    });
    $current.addClass('nk-typed-words-hide').removeClass('nk-typed-words-active');
    $next.addClass('nk-typed-words-active');
    $next.addClass('nk-typed-words-show');
  }, duration);
});

/***/ }),
/* 8 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "throttle", function() { return throttle; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "debounce", function() { return debounce; });
/* eslint-disable no-undefined,no-param-reassign,no-shadow */

/**
 * Throttle execution of a function. Especially useful for rate limiting
 * execution of handlers on events like resize and scroll.
 *
 * @param  {Number}    delay          A zero-or-greater delay in milliseconds. For event callbacks, values around 100 or 250 (or even higher) are most useful.
 * @param  {Boolean}   [noTrailing]   Optional, defaults to false. If noTrailing is true, callback will only execute every `delay` milliseconds while the
 *                                    throttled-function is being called. If noTrailing is false or unspecified, callback will be executed one final time
 *                                    after the last throttled-function call. (After the throttled-function has not been called for `delay` milliseconds,
 *                                    the internal counter is reset)
 * @param  {Function}  callback       A function to be executed after delay milliseconds. The `this` context and all arguments are passed through, as-is,
 *                                    to `callback` when the throttled-function is executed.
 * @param  {Boolean}   [debounceMode] If `debounceMode` is true (at begin), schedule `clear` to execute after `delay` ms. If `debounceMode` is false (at end),
 *                                    schedule `callback` to execute after `delay` ms.
 *
 * @return {Function}  A new, throttled, function.
 */
function throttle(delay, noTrailing, callback, debounceMode) {
  /*
   * After wrapper has stopped being called, this timeout ensures that
   * `callback` is executed at the proper times in `throttle` and `end`
   * debounce modes.
   */
  var timeoutID;
  var cancelled = false; // Keep track of the last time `callback` was executed.

  var lastExec = 0; // Function to clear existing timeout

  function clearExistingTimeout() {
    if (timeoutID) {
      clearTimeout(timeoutID);
    }
  } // Function to cancel next exec


  function cancel() {
    clearExistingTimeout();
    cancelled = true;
  } // `noTrailing` defaults to falsy.


  if (typeof noTrailing !== 'boolean') {
    debounceMode = callback;
    callback = noTrailing;
    noTrailing = undefined;
  }
  /*
   * The `wrapper` function encapsulates all of the throttling / debouncing
   * functionality and when executed will limit the rate at which `callback`
   * is executed.
   */


  function wrapper() {
    var self = this;
    var elapsed = Date.now() - lastExec;
    var args = arguments;

    if (cancelled) {
      return;
    } // Execute `callback` and update the `lastExec` timestamp.


    function exec() {
      lastExec = Date.now();
      callback.apply(self, args);
    }
    /*
     * If `debounceMode` is true (at begin) this is used to clear the flag
     * to allow future `callback` executions.
     */


    function clear() {
      timeoutID = undefined;
    }

    if (debounceMode && !timeoutID) {
      /*
       * Since `wrapper` is being called for the first time and
       * `debounceMode` is true (at begin), execute `callback`.
       */
      exec();
    }

    clearExistingTimeout();

    if (debounceMode === undefined && elapsed > delay) {
      /*
       * In throttle mode, if `delay` time has been exceeded, execute
       * `callback`.
       */
      exec();
    } else if (noTrailing !== true) {
      /*
       * In trailing throttle mode, since `delay` time has not been
       * exceeded, schedule `callback` to execute `delay` ms after most
       * recent execution.
       *
       * If `debounceMode` is true (at begin), schedule `clear` to execute
       * after `delay` ms.
       *
       * If `debounceMode` is false (at end), schedule `callback` to
       * execute after `delay` ms.
       */
      timeoutID = setTimeout(debounceMode ? clear : exec, debounceMode === undefined ? delay - elapsed : delay);
    }
  }

  wrapper.cancel = cancel; // Return the wrapper function.

  return wrapper;
}
/* eslint-disable no-undefined */

/**
 * Debounce execution of a function. Debouncing, unlike throttling,
 * guarantees that a function is only executed a single time, either at the
 * very beginning of a series of calls, or at the very end.
 *
 * @param  {Number}   delay         A zero-or-greater delay in milliseconds. For event callbacks, values around 100 or 250 (or even higher) are most useful.
 * @param  {Boolean}  [atBegin]     Optional, defaults to false. If atBegin is false or unspecified, callback will only be executed `delay` milliseconds
 *                                  after the last debounced-function call. If atBegin is true, callback will be executed only at the first debounced-function call.
 *                                  (After the throttled-function has not been called for `delay` milliseconds, the internal counter is reset).
 * @param  {Function} callback      A function to be executed after delay milliseconds. The `this` context and all arguments are passed through, as-is,
 *                                  to `callback` when the debounced-function is executed.
 *
 * @return {Function} A new, debounced function.
 */


function debounce(delay, atBegin, callback) {
  return callback === undefined ? throttle(delay, atBegin, false) : throttle(delay, callback, atBegin !== false);
}



/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__(10);
/**
 * `requestAnimationFrame()`
 */


var request = global.requestAnimationFrame || global.webkitRequestAnimationFrame || global.mozRequestAnimationFrame || fallback;
var prev = +new Date();

function fallback(fn) {
  var curr = +new Date();
  var ms = Math.max(0, 16 - (curr - prev));
  var req = setTimeout(fn, ms);
  return prev = curr, req;
}
/**
 * `cancelAnimationFrame()`
 */


var cancel = global.cancelAnimationFrame || global.webkitCancelAnimationFrame || global.mozCancelAnimationFrame || clearTimeout;

if (Function.prototype.bind) {
  request = request.bind(global);
  cancel = cancel.bind(global);
}

exports = module.exports = request;
exports.cancel = cancel;

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {var win;

if (typeof window !== "undefined") {
  win = window;
} else if (typeof global !== "undefined") {
  win = global;
} else if (typeof self !== "undefined") {
  win = self;
} else {
  win = {};
}

module.exports = win;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(11)))

/***/ }),
/* 11 */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var g; // This works in non-strict mode

g = function () {
  return this;
}();

try {
  // This works if eval is allowed (see CSP)
  g = g || new Function("return this")();
} catch (e) {
  // This works if the window reference is available
  if ((typeof window === "undefined" ? "undefined" : _typeof(window)) === "object") g = window;
} // g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}


module.exports = g;

/***/ })
/******/ ]);