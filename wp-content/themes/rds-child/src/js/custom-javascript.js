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
    jQuery._data(jQuery('.mobile_nav_type_A .nav-link')[0], 'events').click.forEach(function(event) {
      originalClickHandler = event.handler;
    });
    
    // Remove the original handler
    jQuery('.mobile_nav_type_A .nav-link').off('touchend click');
    
    // Add our modified handler
    jQuery('.mobile_nav_type_A .nav-link').on('touchend click', function(e) {
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