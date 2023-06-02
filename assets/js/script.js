// Wait until the document is ready
jQuery(document).ready(function ($) {
    // Fix the masthead to the top when scrolling
    $('#masthead').scrollToFixed();

    // Listen for a click event on the element with class 'close-bar'
    $('.close-bar').on('click', function (e) {
        // Prevent the default action for the event (like navigation)
        e.preventDefault();

        // Apply a css transform to move the body up by the height of the top bar
        $('body').css('transformY', '-145px');
    });
});
