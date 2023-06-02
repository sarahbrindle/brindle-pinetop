jQuery(document).ready(function ($) {
    // Loop through each element with class 'full-list'
    $('.full-list').each(function () {
        // If the element exists
        if ($(this).length) {
            // Hide its list item children after the fifth item (0-indexed)
            $(this).children('li:gt(3)').hide();
        }
    });

    // Listen for a click event on the element with class 'view-full-list'
    $('.view-full-list').on('click', function (e) {
        // Prevent the default action for the event
        e.preventDefault();

        // Get the parent's 'full-list'
        const fullList = $(this).parent().parent().find('.full-list');
        const listItems = fullList.children('li:gt(3)');

        // If the additional list items are visible
        if (listItems.is(':visible')) {
            // Hide the additional list items and change button text to 'View More'
            listItems.hide();
            $(this).text('View More');
        } else {
            // Show the additional list items and change button text to 'View Less'
            listItems.show();
            $(this).text('View Less');
        }
    });
});
