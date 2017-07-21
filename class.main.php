<?php
/**
* Plugin 6.0 Class
*/
class WCP_Photo_Book_Gallery
{
	
	function __construct()
	{
		add_action( 'admin_enqueue_scripts', array($this, 'loading_scripts_admin'));
		add_action( 'init', array($this, 'wcp_register_books') );
		add_action( 'add_meta_boxes', array($this, 'books_data_boxes') );
        add_action( 'save_post', array($this, 'saving_photo_book_galleries') );
		// add_action( 'admin_notices', array($this, 'render_pbg_notice') );

        add_filter('manage_photo_book_posts_columns', array($this, 'photo_book_column_head'));
        add_action('manage_photo_book_posts_custom_column', array($this, 'photo_book_column_content'), 10, 2);		

        add_shortcode( 'photo-book-gallery', array($this, 'render_photo_book_gallery') );
	}

    /**
    * Registers a new post type
    * @uses $wp_post_types Inserts new post type object into the list
    *
    * @param string  Post type key, must not exceed 20 characters
    * @param array|string  See optional args description above.
    * @return object|WP_Error the registered post type object, or an error object
    */
    function wcp_register_books() {
    
        $custom_labels = array(
            'name'                => __( 'Photo Books', 'photo-book' ),
            'singular_name'       => __( 'Photo Book', 'photo-book' ),
            'add_new'             => _x( 'Add New Book', 'photo-book', 'photo-book' ),
            'add_new_item'        => __( 'Add New Book', 'photo-book' ),
            'edit_item'           => __( 'Edit Book', 'photo-book' ),
            'new_item'            => __( 'New Book', 'photo-book' ),
            'view_item'           => __( 'View Photo Book', 'photo-book' ),
            'search_items'        => __( 'Search Books', 'photo-book' ),
            'not_found'           => __( 'No Photo Books found', 'photo-book' ),
            'not_found_in_trash'  => __( 'No Photo Books found in Trash', 'photo-book' ),
            'parent_item_colon'   => __( 'Parent Book:', 'photo-book' ),
            'menu_name'           => __( 'Photo Books', 'photo-book' ),
        );
    
        $anim_args = array(
            'labels'              => $custom_labels,
            'hierarchical'        => false,
            'description'         => 'Photo Books',
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'dashicons-book-alt',
            'show_in_nav_menus'   => false,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post',
            'supports'            => array(
                'title'
                )
        );
    
        register_post_type( 'photo_book', $anim_args );
    }

    function loading_scripts_admin($check){
        global $post;
        if ( $check == 'post-new.php' || $check == 'post.php' || 'edit.php') {
            if (isset($post->post_type) && 'photo_book' === $post->post_type) {
                wp_enqueue_media();
                wp_enqueue_script( 'photo-book-js-main', plugin_dir_url( __FILE__ ). '/admin/photo.book.js', array('jquery', 'wp-color-picker', 'jquery-ui-sortable'));
                wp_enqueue_style( 'photo-book-css-main', plugin_dir_url( __FILE__ ). '/admin/style.css');
            }
        }
    }

    function books_data_boxes(){
        add_meta_box( 'wcp_photo_book_images', __( 'Images', 'photo-book' ), array($this, 'render_images_box'), 'photo_book');
        add_meta_box( 'wcp_photo_book_shortcode', 'Shortcode', array($this, 'render_shortcode_box'), 'photo_book', 'side');
        add_meta_box( 'wcp_photo_book_settings', __( 'Settings', 'photo-book' ), array($this, 'render_settings_box'), 'photo_book');

        add_meta_box( 'wcp_photo_book_get_pro', __( 'Help and Support', 'photo-book' ), array($this, 'render_get_pro_box'), 'photo_book', 'side');
    }

    function render_shortcode_box(){
        global $post;
        if (isset($post->ID)) {
            echo '<p class="description">'.__( 'Use following shortcode in text section of editor.', 'photo-book' ).'</p>';
            echo '<p style="text-align:center;">[photo-book-gallery id="'.$post->ID.'"]</p>';
        } else {
            echo 'Please Save settings to see shortcode';
        }
    }

    function render_get_pro_box(){
        ?>
            <p class="description">
                <?php _e( 'Having trouble? Book is not working properly?', 'photo-book' ); ?>
                <a href="http://webcodingplace.com/how-to-use-photo-book-gallery-wordpress-plugin/" target="_blank"><?php _e( 'How to use', 'photo-book' ); ?></a>,
                <a target="_blank" href="http://webcodingplace.com/contact-us/"><?php _e( 'contact us for help', 'photo-book' ); ?></a>
            </p>
            <hr>
            
            <h3><?php _e( 'Why Upgrade to Pro?', 'photo-book' ); ?></h3>
            <p>
                <?php _e( 'In pro version you will be able to add page title and chapter title with each page.', 'photo-book' ); ?>
                <?php _e( 'By upgrading to pro, your existing books will remain saved.', 'photo-book' ); ?>
            </p>
            <a style="width: 100%; text-align:center;" target="_blank" class="button button-primary button-hero" href="http://webcodingplace.com/wordpress-pro-plugins/photo-book-gallery-pro-wordpress-plugin/">
                <?php _e( 'Unlock Pro Features', 'photo-book' ); ?>
            </a>
            <hr>
            <h3 style="display:none;"><?php _e( 'Visual Composer Addon', 'photo-book' ); ?></h3>
            <p class="description" style="display:none;">
                <?php _e( 'Photo Book is now available as visual composer extension', 'photo-book' ); ?>.
                <a class="button" href="http://codecanyon.net/item/photo-book-page-flip-book-for-visual-composer/16814883?ref=Rameez_Iqbal" target="_blank"><?php _e( 'Get Here', 'photo-book' ); ?>.</a>
            </p>
            <hr style="display:none;">
            <h3 style="display:none;"><?php _e( 'Real 3D Flip Book', 'photo-book' ); ?></h3>
            <p class="description" style="display:none;">
                <?php _e( 'We have developed a new plugin with real 3d effect and touch support', 'photo-book' ); ?>.
                <a href="#" class="button" target="_blank"><?php _e( 'Download FREE', 'photo-book' ); ?>.</a>
            </p>
        <?php
    }

    /* Prints the box content */
    function render_images_box() {
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'photo_book_gallery_nonce' );
        include 'render_box_contents.php';
    }

    /* Prints the box content */
    function render_settings_box() {
        global $post; 
        $saved_meta = get_post_meta( $post->ID, 'photo_book_data', true );

        if (isset($saved_meta) && $saved_meta != '') {
            include 'settings.php';
        } else {
            include 'settings.php';
        }

    }

    /* Prints the box content */
    function render_pbg_notice() {
        global $pagenow;
        global $post;

        if ($pagenow == 'post.php') {
            if (isset($post->post_type) && 'photo_book' === $post->post_type) { ?>
                <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
                    <p>
                        <?php _e( 'Looking for Real 3D Book?', 'photo-book' ); ?> 
                        <strong>
                            <a class="button" target="_blank" href="#">
                                <?php _e( 'Download Real 3D Flip Book', 'photo-book' ); ?>
                            </a>
                        </strong>
                    </p>
                    <button type="button" class="notice-dismiss">
                        <span class="screen-reader-text"></span>
                    </button>
                </div>
            <?php }
        }
        
    }

    function saving_photo_book_galleries( $post_id ) {
        // verify if this is an auto save routine. 
        // If it is our form has not been submitted, so we dont want to do anything
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !isset( $_POST['photo_book_gallery_nonce'] ) )
            return;

        if ( !wp_verify_nonce( $_POST['photo_book_gallery_nonce'], plugin_basename( __FILE__ ) ) )
            return;

        // OK, we're authenticated: we need to find and save the data

        // exit();

        update_post_meta($post_id, 'photo_book_data', $_POST['photo_book']);
    }   

    function photo_book_column_head($defaults){
        $defaults['photo_book_col'] = 'Shortcode';
        return $defaults;
    }

    function photo_book_column_content($column_name, $book_id){
        if ($column_name == 'photo_book_col') {
            echo '[photo-book-gallery id="'.$book_id.'"]';
        }
    }

    function render_photo_book_gallery($atts){
        $book_meta = get_post_meta( $atts['id'], 'photo_book_data', true );

        wp_enqueue_script( 'easing-js', plugins_url( 'js/jquery.easing.1.3.js' , __FILE__ ), array('jquery') );
        wp_enqueue_script( 'wcp-book-js', plugins_url(   'js/jquery.booklet.latest.min.js' , __FILE__ ), array('jquery', 'jquery-ui-core', 'jquery-ui-draggable') );

        wp_enqueue_style( 'book-css', plugins_url( 'css/jquery.booklet.latest.css' , __FILE__ ));
        if (isset($book_meta['zoomonhover'])) {
            wp_enqueue_script( 'zoom-js', plugins_url( 'js/jquery.zoom.min.js' , __FILE__ ), array('jquery') );
        }
        if(isset($book_meta['plugin_version']) && $book_meta['plugin_version'] == '7') {
            wp_enqueue_script( 'wcp-book-script', plugins_url( 'js/book.js' , __FILE__ ), array('jquery', 'jquery-ui-core') );

            wp_localize_script( 'wcp-book-script', 'wcpbook'.$atts['id'], array(
                'width'     => (isset($book_meta['bookwidth']) && $book_meta['bookwidth'] != '') ? $book_meta['bookwidth']*2 : '800' ,
                'height'    => (isset($book_meta['bookheight']) && $book_meta['bookheight'] != '') ? $book_meta['bookheight'] : '400' ,
                'speed'     => (isset($book_meta['speedofturn']) && $book_meta['speedofturn'] != '') ? $book_meta['speedofturn'] : '1000' ,
                'direction' => (isset($book_meta['readingdirection']) && $book_meta['readingdirection'] != '') ? $book_meta['readingdirection'] : 'LTR' ,
                'startingPage' => (isset($book_meta['startingpage']) && $book_meta['startingpage'] != '') ? $book_meta['startingpage'] : '0' ,
                'easing' => (isset($book_meta['easing']) && $book_meta['easing'] != '') ? $book_meta['easing'] : 'easeInOutQuad' ,
                'easeIn' => (isset($book_meta['easein']) && $book_meta['easein'] != '') ? $book_meta['easein'] : 'easeInQuad' ,
                'easeOut' => (isset($book_meta['easeout']) && $book_meta['easeout'] != '') ? $book_meta['easeout'] : 'easeOutQuad' ,

                'closed' => (isset($book_meta['closedbook'])) ? true : false,
                'covers' => (isset($book_meta['bookcovers'])) ? true : false,
                'autoCenter' => (isset($book_meta['autocenter'])) ? true : false,
                
                'pagePadding' => (isset($book_meta['pagepadding']) && $book_meta['pagepadding'] != '') ? $book_meta['pagepadding'] : '0' ,
                'pageNumbers' => (isset($book_meta['pagenumbers'])) ? true : false,
                'pageBorder' => (isset($book_meta['pageborder']) && $book_meta['pageborder'] != '') ? $book_meta['pageborder'] : '0' ,

                'manual' => (isset($book_meta['manualcontrol'])) ? true : false,
                'hovers' => (isset($book_meta['hovers'])) ? true : false,
                // 'hoverWidth' => (isset($book_meta['hoverwidth']) && $book_meta['hoverwidth'] != '') ? $book_meta['hoverwidth'] : '50' ,
                'hoverSpeed' => (isset($book_meta['hoverspeed']) && $book_meta['hoverspeed'] != '') ? $book_meta['hoverspeed'].'px' : '500' ,
                // 'hoverTreshold' => (isset($book_meta['hovertreshold']) && $book_meta['hovertreshold'] != '') ? $book_meta['hovertreshold'] : '0.25' ,
                'hoverClick' => (isset($book_meta['hoverclick'])) ? true : false,
                'overlays' => (isset($book_meta['overlays'])) ? true : false,
                'tabs' => (isset($book_meta['booktabs'])) ? true : false,
                'tabWidth' => (isset($book_meta['tabwidth']) && $book_meta['tabwidth'] != '') ? $book_meta['tabwidth'] : '60' ,
                'tabHeight' => (isset($book_meta['tabheight']) && $book_meta['tabheight'] != '') ? $book_meta['tabheight'] : '20' ,
                'nextControlText' => (isset($book_meta['nextcontroltext']) && $book_meta['nextcontroltext'] != '') ? $book_meta['nextcontroltext'] : 'Next' ,
                'previousControlText' => (isset($book_meta['previouscontroltext']) && $book_meta['previouscontroltext'] != '') ? $book_meta['previouscontroltext'] : 'Previous' ,
                'nextControlTitle' => (isset($book_meta['nextcontroltitle']) && $book_meta['nextcontroltitle'] != '') ? $book_meta['nextcontroltitle'] : 'Next Page' ,
                'previousControlTitle' => (isset($book_meta['previouscontroltitle']) && $book_meta['previouscontroltitle'] != '') ? $book_meta['previouscontroltitle'] : 'Previous Page' ,
                'previousControlTitle' => (isset($book_meta['previouscontroltitle']) && $book_meta['previouscontroltitle'] != '') ? $book_meta['previouscontroltitle'] : 'Previous Page' ,
                'arrows' => (isset($book_meta['bookarrows'])) ? true : false,
                'arrowsHide' => (isset($book_meta['arrowshide'])) ? true : false,
                'cursor' => (isset($book_meta['cursor']) && $book_meta['cursor'] != '') ? $book_meta['cursor'] : 'pointer' ,
                'hash' => (isset($book_meta['hash'])) ? true : false,
                // 'hashTitleText' => (isset($book_meta['hashtitletext']) && $book_meta['hashtitletext'] != '') ? $book_meta['hashtitletext'] : ' - Page' ,
                'keyboard' => (isset($book_meta['keyboardcontrols'])) ? true : false,

                'auto' => (isset($book_meta['autoplay'])) ? true : false,
                'delay' => (isset($book_meta['bookautoplaydelay']) && $book_meta['bookautoplaydelay'] != '') ? $book_meta['bookautoplaydelay'] : '5000' ,

            ));

            wp_localize_script( 'wcp-book-script', 'wcpbooksettings'.$atts['id'], array(
                'responsive' => ($book_meta['bookwidth'] == '') ? true : false,
                'zoomonhover' => (isset($book_meta['zoomonhover'])) ? true : false,
                'zoomdepth'     => (isset($book_meta['zoomdepth']) && $book_meta['zoomdepth'] != '') ? $book_meta['zoomdepth'] : '1' ,
            ));
            
        } else {

            wp_enqueue_script( 'wcp-custom-script', plugins_url( 'js/script.js' , __FILE__ ), array('jquery', 'jquery-ui-core') );

            wp_localize_script( 'wcp-custom-script', 'book', array(
                'width' => $book_meta['bookwidth'],
                'height' => $book_meta['bookheight'],
                'speedofturn' => $book_meta['speedofturn'],
                'startingpage' => $book_meta['startingpage'],
                'readingdirection' => $book_meta['readingdirection'],
                'pagepadding' => $book_meta['pagepadding'],
                'pagenumbers' => (isset($book_meta['pagenumbers'])) ? 'true' : '',
                'closedbook' => (isset($book_meta['closedbook'])) ? 'true' : '',
                'autoplay' => (isset($book_meta['autoplay'])) ? 'true' : '',
                'delay' => $book_meta['bookautoplaydelay'],
                'manualcontrol' => (isset($book_meta['manualcontrol'])) ? 'true' : '',
                'keyboardcontrols' => (isset($book_meta['keyboardcontrols'])) ? 'true' : '',
                'booktabs' => (isset($book_meta['booktabs'])) ? 'true' : '',
                'bookarrows' => (isset($book_meta['bookarrows'])) ? 'true' : '',
                'zoomonhover' => (isset($book_meta['zoomonhover'])) ? 'true' : '',
                'zoomdepth' => (isset($book_meta['zoomdepth'])) ? $book_meta['zoomdepth'] : '1',
            ));
            
        }



        ob_start();
        include 'render/shortcode.php';
        return ob_get_clean();
    }

    function get_all_fields_data(){

        include 'settings_fields.php';

        return $all_fields;
    }

    function render_settings_fields(){
        global $post;
        $all_fields = $this->get_all_fields_data();
        $wcp_settings = get_post_meta($post->ID, 'photo_book_data' ,true);
        $saved_opt = ($wcp_settings != '') ? $wcp_settings : array() ;

        foreach ($all_fields as $field) {

            $field_name = 'photo_book['.$field['name'].']';
            $field_id = $field['name'];
            $field_value = (isset($saved_opt[$field['name']])) ? $saved_opt[$field['name']] : '' ;
            $disabled = (isset($field['disable']) && $field['disable'] == 'true') ? ' disabled="disabled" ' : '' ;

            switch ($field['type']) {

                case 'text': ?>
                    <tr>
                        <th><label for="<?php echo $field_id; ?>"><?php echo $field['title']; ?></label></th>
                        <td>
                            <input <?php echo $disabled; ?> type="text" name="<?php echo $field_name; ?>" class="regular-text" id="<?php echo $field_id; ?>" value="<?php echo $field_value; ?>">
                            <span class="default-val">
                                <b><?php _e( 'Default', 'photo-book' ); ?>:</b>
                                <?php echo $field['default']; ?>
                            </span>
                            <p class="description">
                                <?php echo $field['help']; ?>
                                <?php if ($disabled != '') { ?>
                                <b>(
                                    <?php _e( 'Pro Feature', 'photo-book' ); ?>
                                )</b>
                                <?php } ?>
                            </p>
                        </td>
                    </tr>
                    <?php break;

                case 'number': ?>
                    <tr>
                        <th><label for="<?php echo $field_id; ?>"><?php echo $field['title']; ?></label></th>
                        <td>
                            <input <?php echo $disabled; ?> type="number" name="<?php echo $field_name; ?>" class="small-text" id="<?php echo $field_id; ?>" value="<?php echo $field_value; ?>">
                            <span class="default-val">
                                <b><?php _e( 'Default', 'photo-book' ); ?>:</b>
                                <?php echo $field['default']; ?>
                            </span>
                            <p class="description">
                                <?php echo $field['help']; ?>
                                <?php if ($disabled != '') { ?>
                                <b>(
                                    <?php _e( 'Pro Feature', 'photo-book' ); ?>
                                )</b>
                                <?php } ?>
                            </p>                            
                        </td>
                    </tr>
                    <?php break;

                case 'select': ?>
                    <tr>
                        <th><label for="<?php echo $field_id; ?>"><?php echo $field['title']; ?></label></th>
                        <td>
                            <select name="<?php echo $field_name; ?>" id="<?php echo $field_id; ?>">
                                <?php
                                if (isset($field['options']) && $field['options'] != '') {
                                    foreach ($field['options'] as $val => $label) {
                                        $selected = ($field_value == $val) ? 'selected' : '' ;

                                        echo '<option value="'.$val.'" '.$selected.'>'.$label.'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <span class="default-val">
                                <b><?php _e( 'Default', 'photo-book' ); ?>:</b>
                                <?php echo $field['default']; ?>
                            </span>
                            <p class="description"><?php echo $field['help']; ?></p>
                        </td>
                    </tr>
                    <?php break;

                case 'checkbox': ?>
                    <tr>
                        <th><label for="<?php echo $field_id; ?>"><?php echo $field['title']; ?></label></th>
                        <td>
                            <label>
                                <?php $checked = ($field_value != '') ? 'checked' : '' ; ?>
                                <input <?php echo $disabled; ?> type="checkbox" name="<?php echo $field_name; ?>" id="<?php echo $field_id; ?>" <?php echo $checked; ?>> <?php _e( 'Enable', 'photo-book' ); ?>
                            </label>                            
                            <span class="default-val">
                                <b><?php _e( 'Default', 'photo-book' ); ?>:</b>
                                <?php echo $field['default']; ?>
                            </span>
                            <p class="description">
                                <?php echo $field['help']; ?>
                                <?php if ($disabled != '') { ?>
                                <b>(
                                    <?php _e( 'Pro Feature', 'photo-book' ); ?>
                                )</b>
                                <?php } ?>
                            </p>
                        </td>
                    </tr>
                    <?php break;

                case 'section': ?>
                    <tr class="wcp-section">
                        <td colspan="2">
                            <h3><?php echo $field['title']; ?></h3>
                        </td>
                    </tr>
                    <?php break;
                
                default:
                    
                    break;
            }
        }
    }    
}
?>