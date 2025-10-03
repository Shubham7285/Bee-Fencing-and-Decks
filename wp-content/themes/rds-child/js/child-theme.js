/*!
  * Understrap v1.1.0 (https://understrap.com)
  * Copyright 2013-2025 The Understrap Authors (https://github.com/understrap/understrap/graphs/contributors)
  * Licensed under GPL (http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
  */
(function (factory) {
	typeof define === 'function' && define.amd ? define(factory) :
	factory();
})((function () { 'use strict';

	/**
	 * File skip-link-focus-fix.js.
	 *
	 * Helps with accessibility for keyboard only users.
	 *
	 * Learn more: https://git.io/vWdr2
	 */
	(function () {
	  var isWebkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1,
	    isOpera = navigator.userAgent.toLowerCase().indexOf('opera') > -1,
	    isIe = navigator.userAgent.toLowerCase().indexOf('msie') > -1;
	  if ((isWebkit || isOpera || isIe) && document.getElementById && window.addEventListener) {
	    window.addEventListener('hashchange', function () {
	      var id = location.hash.substring(1),
	        element;
	      if (!/^[A-z0-9_-]+$/.test(id)) {
	        return;
	      }
	      element = document.getElementById(id);
	      if (element) {
	        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
	          element.tabIndex = -1;
	        }
	        element.focus();
	      }
	    }, false);
	  }
	})();

	// Add your custom JS here.
	jQuery(document).ready(function () {
	  jQuery('.phone-icon, .sticky_bottom_btn').on('click', function () {
	    jQuery('body').addClass('active-modal');
	  });
	  jQuery('#cta-a .close').on('click', function () {
	    jQuery('body').removeClass('active-modal');
	  });
	  // Store the original event handler function
	  var originalClickHandler = null;

	  // Find the original handler and save it
	  jQuery._data(jQuery('.mobile_nav_type_A .nav-link')[0], 'events').click.forEach(function (event) {
	    originalClickHandler = event.handler;
	  });

	  // Remove the original handler
	  jQuery('.mobile_nav_type_A .nav-link').off('touchend click');

	  // Add our modified handler
	  jQuery('.mobile_nav_type_A .nav-link').on('touchend click', function (e) {
	    // Check if the link has target="_blank"
	    if (jQuery(this).attr('target') === '_blank') {
	      // Let the default browser behavior handle it
	      return true;
	    } else {
	      // Call the original handler for all other links
	      return originalClickHandler.call(this, e);
	    }
	  });
	});

}));
//# sourceMappingURL=child-theme.js.map
