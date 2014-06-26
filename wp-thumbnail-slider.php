<?php
/*
  Plugin Name: WP Thumbnail Slider
  Plugin URI: http://www.e2soft.com/wordpress-plugin/wp-thumbnail-slider
  Description: WP Thumbnail Slider is a wordpress image slider plugin with thumbnail. Use this shortcode <strong>[WPT-SLIDER]</strong> in the post/page" where you want to display slider.
  Version: 1.0
  Author: S M Hasibul Islam
  Author URI: https://www.odesk.com/o/profiles/users/_~~f23680b391834fd1/
  Copyright: 2013 S M Hasibul Islam http:/`/www.e2soft.com
  License URI: license.txt
 */


#######################	WP Thumbnail Slider ###############################

function wptPostRegister() {
    $wptLabels = array(
        'name' => 'WPT Slides',
        'singular_name' => 'WPT Slid',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Slide',
        'edit_item' => 'Edit Slide',
        'new_item' => 'New Slide',
        'all_items' => 'All Slides',
        'view_item' => 'View Slide',
        'search_items' => 'Search Slide',
        'not_found' => 'No slides found',
        'not_found_in_trash' => 'No slides found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'WPT Slider'
    );

    $wptCustomPost = array(
        'labels' => $wptLabels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'wptslider'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('wptpost', $wptCustomPost);
}

add_action('init', 'wptPostRegister');

function registerWptScript() {
    wp_enqueue_script('wpt-js', plugins_url('/js/wpt-js.js', __FILE__), array('jquery'));
    wp_enqueue_style('wpt-slide', plugins_url('/css/wpt-slide.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'registerWptScript');

function WptAdminScript() {
    wp_enqueue_style('wpt-admin', plugins_url('/css/wpt-admin.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'WptAdminScript');

function wPTPostLoop() {
    echo '<div id="wptSlider">';
    echo '<div id="slider" class="flexslider"><ul class="slides">';
    $wptArgs = array(
        'post_type' => 'wptpost',
        'showposts' => 20,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $wptQuery = new WP_Query($wptArgs);
    while ($wptQuery->have_posts()) : $wptQuery->the_post();

        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
        ?>
        <li><img src="<?php echo $thumb_url[0]; ?>" /></li>
        <?php
    endwhile;
    echo '</ul>
        </div>';

    wp_reset_query();

    echo '<div id="carousel" class="flexslider"><ul class="slides">';
    $wptArgs1 = array(
        'post_type' => 'wptpost',
        'showposts' => 20,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $wptQuery1 = new WP_Query($wptArgs1);
    while ($wptQuery1->have_posts()) : $wptQuery1->the_post();

        $thumb_id1 = get_post_thumbnail_id();
        $thumb_url1 = wp_get_attachment_image_src($thumb_id1, 'thumbnail', true);
        ?>
        <li><img src="<?php echo $thumb_url1[0]; ?>" /></li>
        <?php
    endwhile;
    echo '</ul>
        </div>
		</div>';
}

function slideScript() {
    ?>
    <script type="text/javascript">
        jQuery(function() {
            SyntaxHighlighter.all();
        });
        jQuery(window).load(function() {
            jQuery('#carousel').flexslider({
                animation: "slide",
                controlNav: true,
                animationLoop: false,
                slideshow: true,
                itemWidth: 85,
                itemMargin: 5,
                asNavFor: '#slider'
            });

            jQuery('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                sync: "#carousel",
                start: function(slider) {
                    jQuery('body').removeClass('loading');
                }
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'slideScript');

function wptThumbnailSlider() {
    return wPTPostLoop();
}

add_shortcode('WPT-SLIDER', 'wPTPostLoop');

foreach ( glob( plugin_dir_path( __FILE__ )."lib/*.php" ) as $wptfile )
    include_once $wptfile;