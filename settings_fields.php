<?php
    $all_fields = array(
        array(
            'type' => 'section',
            'name' => 'general',
            'title' => __( 'General Settings', 'photo-book' ),
        ),
        
        array(
            'type'      => 'number', 
            'name'      => 'bookwidth', 
            'title'     => __( 'Book Width', 'photo-book' ),
            'help'      => __( 'Provide width for closed book in pixels, leave blank for responsive', 'photo-book' ), 
            'default'   => 'auto', 
        ),

        array(
            'type'      => 'number', 
            'name'      => 'bookheight', 
            'title'     => __( 'Book Height', 'photo-book' ),
            'help'      => __( 'Provide height for book in pixels, leave blank for responsive', 'photo-book' ), 
            'default'   => 'auto', 
        ),

        array(
            'type'      => 'number', 
            'name'      => 'speedofturn', 
            'title'     => __( 'Speed', 'photo-book' ),
            'help'      => __( 'Provide speed of page turn in milliseconds', 'photo-book' ), 
            'default'   => '1000',
        ),

        array(
            'type'      => 'select',
            'name'      => 'readingdirection',
            'title'     => __( 'Reading Direction', 'photo-book' ),
            'options'   => array(
                'RTL'   => __( 'Right to Left', 'photo-book' ),
                'LTR'   => __( 'Left to Right', 'photo-book' ),
            ),
            'help'      => __( 'Choose reading direction for pages', 'photo-book' ),
            'default'   => 'LTR',
        ),

        array(
            'type'      => 'number',
            'name'      => 'startingpage',
            'title'     => __( 'Starting Page', 'photo-book' ),
            'help'      => __( 'Provide starting page for the book', 'photo-book' ),
            'default'   => '0',
        ),

        array(
            'type'      => 'text',
            'name'      => 'easing',
            'title'     => __( 'Easing', 'photo-book' ),
            'help'      => __( 'Easing method for the complete page transition', 'photo-book' ),
            'default'   => 'easeInOutQuad',
        ),

        array(
            'type'      => 'text',
            'name'      => 'easein',
            'title'     => __( 'Ease In', 'photo-book' ),
            'help'      => __( 'Easing method for the first half of the page transition', 'photo-book' ),
            'default'   => 'easeInQuad',
        ),

        array(
            'type'      => 'text',
            'name'      => 'easeout',
            'title'     => __( 'Ease Out', 'photo-book' ),
            'help'      => __( 'Easing method for the second half of the page transition', 'photo-book' ),
            'default'   => 'easeOutQuad',
        ),

        array(
            'type'      => 'section',
            'name'      => 'closedcovers',
            'title'     => __( 'Closed Book and Covers', 'photo-book' ),
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'closedbook',
            'title'     => __( 'Closed Book', 'photo-book' ),
            'help'      => __( 'Enable it to give the book the appearance of being closed', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'bookcovers',
            'title'     => __( 'Covers', 'photo-book' ),
            'help'      => __( 'Makes the first and last pages into covers by hiding page numbers', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'autocenter',
            'title'     => __( 'Auto Center', 'photo-book' ),
            'help'      => __( 'Makes the book position in the center of its container when closed', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type'      => 'section',
            'name'      => 'pages',
            'title'     => __( 'Pages', 'photo-book' ),
        ),

        array(
            'type'      => 'number',
            'name'      => 'pagepadding',
            'title'     => __( 'Page Padding', 'photo-book' ),
            'help'      => __( 'Provide inner space for pages in pixels', 'photo-book' ),
            'default'   => '0',
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'pagenumbers',
            'title'     => __( 'Page Numbers', 'photo-book' ),
            'help'      => __( 'Check to display page numbers', 'photo-book' ),
            'default'   => 'Enable',
        ),

        array(
            'type'      => 'number',
            'name'      => 'pageborder',
            'title'     => __( 'Page Border', 'photo-book' ),
            'help'      => __( 'The size of the border around each page', 'photo-book' ),
            'default'   => '0',
        ),

        array(
            'type'      => 'section',
            'name'      => 'controls',
            'title'     => __( 'Controls', 'photo-book' ),
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'manualcontrol',
            'title'     => __( 'Manual Control', 'photo-book' ),
            'help'      => __( 'Enables manual page turning using click and drag', 'photo-book' ),
            'default'   => 'Enable',
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'hovers',
            'title'     => __( 'Hovers', 'photo-book' ),
            'help'      => __( 'Shows a small preview of page turn on hover', 'photo-book' ),
            'default'   => 'Enable',
        ),

        array(
            'type'      => 'number',
            'name'      => 'hoverwidth',
            'title'     => __( 'Hover Width', 'photo-book' ),
            'help'      => __( 'The width of the page turn hover preview in pixels', 'photo-book' ),
            'default'   => '50',
        ),

        /*array(
            'type'      => 'number',
            'name'      => 'hoverspeed',
            'title'     => __( 'Hover Speed', 'photo-book' ),
            'help'      => __( 'The speed in milliseconds of the page turn hover preview', 'photo-book' ),
            'default'   => '500',
        ),*/

        /*array(
            'type'      => 'number',
            'name'      => 'hovertreshold',
            'title'     => __( 'Hover Treshold', 'photo-book' ),
            'help'      => __( 'The percentage used with manual page dragging', 'photo-book' ),
            'default'   => '0.25',
        ),*/

        array(
            'type'      => 'checkbox',
            'name'      => 'hoverclick',
            'title'     => __( 'Hover Click', 'photo-book' ),
            'help'      => __( 'Enables a "click" on the page turn hover preview, when using manual page turning, to begin the page turn', 'photo-book' ),
            'default'   => 'Enable',
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'overlays',
            'title'     => __( 'Overlays', 'photo-book' ),
            'help'      => __( 'Enables navigation using a page sized overlay. When enabled page content, like links, will not be clickable. If manual option is enabled, overlays are removed', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type' => 'checkbox',
            'name' => 'booktabs',
            'title' => __( 'Navigation Tabs', 'photo-book' ),
            'help' => __( 'Adds tabs along the top of the book', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type' => 'text',
            'name' => 'tabwidth',
            'title' => __( 'Tab Width', 'photo-book' ),
            'help' => __( 'Set the width of each tab. Can be a number or CSS string value', 'photo-book' ),
            'default'   => '60',
        ),

        array(
            'type' => 'text',
            'name' => 'tabheight',
            'title' => __( 'Tab Height', 'photo-book' ),
            'help' => __( 'Set the height of each tab. Can be a number or CSS string value', 'photo-book' ),
            'default'   => '20',
        ),

        array(
            'type' => 'text',
            'name' => 'nextcontroltext',
            'title' => __( 'Next Text', 'photo-book' ),
            'help' => __( 'Set the inline text for all "next" controls (tabs, arrows, etc.)', 'photo-book' ),
            'default'   => 'Next',
        ),

        array(
            'type' => 'text',
            'name' => 'previouscontroltext',
            'title' => __( 'Previous Text', 'photo-book' ),
            'help' => __( 'Set the inline text for all "previous" controls (tabs, arrows, etc.)', 'photo-book' ),
            'default'   => 'Previous',
        ),

        array(
            'type' => 'text',
            'name' => 'nextcontroltitle',
            'title' => __( 'Next Title', 'photo-book' ),
            'help' => __( 'Set the text for the title attributes of all "next" controls (tabs, arrows, etc.)', 'photo-book' ),
            'default'   => 'Next Page',
        ),

        array(
            'type' => 'text',
            'name' => 'previouscontroltitle',
            'title' => __( 'Previous Title', 'photo-book' ),
            'help' => __( 'Set text for title attributes of all "previous" controls (tabs, arrows, etc.)', 'photo-book' ),
            'default'   => 'Previous Page',
        ),

        array(
            'type' => 'checkbox',
            'name' => 'bookarrows',
            'title' => __( 'Arrows', 'photo-book' ),
            'help' => __( 'Check to display arrows for navigation', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type' => 'checkbox',
            'name' => 'arrowshide',
            'title' => __( 'Auto Hide Arrows', 'photo-book' ),
            'help' => __( 'Auto hide the arrows when the controls are not hovered', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type' => 'text',
            'name' => 'cursor',
            'title' => __( 'Cursor', 'photo-book' ),
            'help' => __( 'The CSS cursor used for all controls (tabs, arrows, etc.). Accepts any CSS Cursor', 'photo-book' ),
            'default'   => 'pointer',
        ),

        array(
            'type' => 'checkbox',
            'name' => 'hash',
            'title' => __( 'Hash', 'photo-book' ),
            'help' => __( 'Enables navigation using a hash string (e.g. "#/page/1")', 'photo-book' ),
            'default'   => 'Disable',
            'disable'   => 'true',
        ),

        /*array(
            'type' => 'text',
            'name' => 'hashtitletext',
            'title' => __( 'Hash Title Text', 'photo-book' ),
            'help' => __( 'Text which forms the hash page title (e.g. "Book - Page 1")', 'photo-book' ),
            'default'   => '- Page',
        ),*/

        array(
            'type' => 'checkbox',
            'name' => 'keyboardcontrols',
            'title' => __( 'Keyboard Controls', 'photo-book' ),
            'help' => __( 'Check to enable page flipping by keyboard arrow keys', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type' => 'section',
            'name' => 'autoplay',
            'title' => __( 'Auto Play', 'photo-book' ),
        ),

        array(
            'type' => 'checkbox',
            'name' => 'autoplay',
            'title' => __( 'Auto Play', 'photo-book' ),
            'help' => __( 'Check to enable auto flipping pages', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type' => 'number',
            'name' => 'bookautoplaydelay',
            'title' => __( 'Auto Play Delay', 'photo-book' ),
            'help' => __( 'The time in milliseconds between each automatic page flip transition', 'photo-book' ),
            'default'   => '5000',
        ),

        array(
            'type' => 'section',
            'name' => 'zoom',
            'title' => __( 'Zoom', 'photo-book' ),
        ),

        array(
            'type' => 'checkbox',
            'name' => 'zoomonhover',
            'title' => __( 'Zoom', 'photo-book' ),
            'help' => __( 'Enable Zoom on hover', 'photo-book' ),
            'default'   => 'Disable',
        ),

        array(
            'type' => 'number',
            'name' => 'zoomdepth',
            'title' => __( 'Zoom Depth', 'photo-book' ),
            'help' => __( 'Provide zoom depth, 1 for 100%, 2 for 200% etc', 'photo-book' ),
            'default'   => '1',
        ),


        array(
            'type' => 'section',
            'name' => 'shadows',
            'title' => __( 'Shadows', 'photo-book' ),
        ),

        array(
            'type' => 'checkbox',
            'name' => 'shadows',
            'title' => __( 'Shadows', 'photo-book' ),
            'help' => __( 'Display shadows on pages during animations', 'photo-book' ),
            'default'   => 'Enable',
            'disable'   => 'true',
        ),

        array(
            'type' => 'number',
            'name' => 'shadowtopfwdwidth',
            'title' => __( 'Shadow Top Forward Width', 'photo-book' ),
            'help' => __( 'The width of the top forward shadow. Only change if you change the shadow images', 'photo-book' ),
            'default'   => '166',
            'disable'   => 'true',
        ),

        array(
            'type' => 'number',
            'name' => 'shadowtopbackwidth',
            'title' => __( 'Shadow Top Back Width', 'photo-book' ),
            'help' => __( 'The width of the top back animation shadow. Only change if you change the shadow images', 'photo-book' ),
            'default'   => '166',
            'disable'   => 'true',
        ),

        array(
            'type' => 'number',
            'name' => 'shadowbtmwidth',
            'title' => __( 'Shadow Bottom Width', 'photo-book' ),
            'help' => __( 'The width of the bottom animation shadow. Only change if you change the shadow images', 'photo-book' ),
            'default'   => '50',
            'disable'   => 'true',
        ),

        array(
            'type' => 'section',
            'name' => 'toolbar',
            'title' => __( 'Toolbar', 'photo-book' ),
        ),

        array(
            'type' => 'checkbox',
            'name' => 'bottomtoolbar',
            'title' => __( 'Bottom Toolbar', 'photo-book' ),
            'help' => __( 'It will display bottom toolbar for navigation', 'photo-book' ),
            'default'   => 'Disable',
            'disable'   => 'true',
        ),

        array(
            'type' => 'text',
            'name' => 'toolbarbg',
            'title' => __( 'Toolbar Background Color', 'photo-book' ),
            'help' => __( 'Choose toolbar background color', 'photo-book' ),
            'default'   => '#000',
            'disable'   => 'true',
        ),

        array(
            'type' => 'text',
            'name' => 'toolbarfont',
            'title' => __( 'Toolbar Text Color', 'photo-book' ),
            'help' => __( 'Choose toolbar text color', 'photo-book' ),
            'default'   => '#FFF',
            'disable'   => 'true',
        ),

        array(
            'type' => 'checkbox',
            'name' => 'enablepopup',
            'title' => __( 'Enable Popup', 'photo-book' ),
            'help' => __( 'A popup button will appear to open pages in popup', 'photo-book' ),
            'default'   => 'Disable',
            'disable'   => 'true',
        ),

        array(
            'type' => 'text',
            'name' => 'closedfronttitle',
            'title' => __( 'Book Front Title', 'photo-book' ),
            'help' => __( 'Determines title of blank starting page', 'photo-book' ),
            'default'   => 'Beginning',
            'disable'   => 'true',
        ),

        array(
            'type' => 'text',
            'name' => 'closedfrontchapter',
            'title' => __( 'Book Front Chapter', 'photo-book' ),
            'help' => __( 'Determines chapter name of blank starting page', 'photo-book' ),
            'default'   => 'Beginning of Book',
            'disable'   => 'true',
        ),

        array(
            'type' => 'text',
            'name' => 'closedbacktitle',
            'title' => __( 'Book Back Title', 'photo-book' ),
            'help' => __( 'Determines title of blank ending page', 'photo-book' ),
            'default'   => 'End',
            'disable'   => 'true',
        ),

        array(
            'type' => 'text',
            'name' => 'closedbackchapter',
            'title' => __( 'Book Back Chapter', 'photo-book' ),
            'help' => __( 'Determines chapter name of blank ending page', 'photo-book' ),
            'default'   => 'End of Book',
            'disable'   => 'true',
        ),            
    );
?>