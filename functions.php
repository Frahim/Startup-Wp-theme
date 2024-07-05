<?php

/**
 * Wp-Yeasfi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wp-ouie
 */
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}


/**
 * Enqueue scripts and styles.
 */
function wp_ouie_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);
    //wp_enqueue_style('google-font','https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    wp_enqueue_style('wp-ouie-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.0/animate.min.css');
     wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');

    wp_enqueue_style('splide', get_template_directory_uri() . '/css/splide.min.css');
    wp_enqueue_script('wp-ouie-splide', get_template_directory_uri() . '/js/splide.min.js', array(), _S_VERSION, true);
    //wp_enqueue_script('wp-ouie-splide-video', get_template_directory_uri() . '/js/splide-extension-video.js', array(), _S_VERSION, true);   
    
 wp_enqueue_style('wp-ouie-style', get_stylesheet_uri(), array(), _S_VERSION);
 
    wp_enqueue_script('wp-ouie-jquery', get_template_directory_uri() . '/js/jquery-3.6.1.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('wp-ouie-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('wp-ouie-wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('wp-ouie-custome', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true);
    
   

//    if (is_singular() && comments_open() && get_option('thread_comments')) {
//        wp_enqueue_script('comment-reply');
//    }

}

add_action('wp_enqueue_scripts', 'wp_ouie_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . 'jetpack.php';
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker() {
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');

/**
 * Register Carbon Field
 */
require get_template_directory() . '/carbonfield.php';



//Add class to anchor tag.

function add_menu_link_class($atts, $item, $args) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

function add_menu_list_item_class($classes, $item, $args) {
    if (property_exists($args, 'list_item_class')) {
        $classes[] = $args->list_item_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);


//Pagination

function wpbeginner_numeric_posts_nav() {

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (( $paged + 2 ) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li><span><svg width="38" height="37" viewBox="0 0 38 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M21.2496 23.6199L17.4463 19.8165C16.9971 19.3674 16.9971 18.6324 17.4463 18.1832L21.2496 14.3799" stroke="#4C4C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<rect x="1" y="0.5" width="36" height="36" rx="7.5" stroke="#B5B5B5"/>
</svg>
</span></li>' . "\n", get_previous_posts_link());

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li><span><svg width="38" height="37" viewBox="0 0 38 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.7504 23.6199L20.5537 19.8165C21.0029 19.3674 21.0029 18.6324 20.5537 18.1832L16.7504 14.3799" stroke="#4C4C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<rect x="-0.5" y="0.5" width="36" height="36" rx="7.5" transform="matrix(-1 0 0 1 36.5 0)" stroke="#B5B5B5"/>
</svg></span></li>' . "\n", get_next_posts_link());

    echo '</ul></div>' . "\n";
}

/*
  Reding Time
 *  */

function get_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Assuming an average reading speed of 200 words per minute
    return $reading_time;
}

function display_reading_time() {
    $reading_time = get_reading_time();
    echo '<p class="reading-time"> ' . $reading_time . ' mins</p>';
}

/* Table of Content */

function generate_table_of_contents($content) {
    preg_match_all('/<h([1-6])[^>]*class="wp-block-heading toc-heading"[^>]*>(.*?)<\/h\1>/', $content, $matches);

    if ($matches && isset($matches[0]) && count($matches[0]) > 1) {
        $toc = '<div class="tableofcontent-wrapper"><h3>Table of Content</h3><ul class="list-content-wrapper">';

        foreach ($matches[2] as $index => $heading) {
            $id = sanitize_title($heading);
            $toc .= '<li><a class="d-flex gap-3 align-items-center" href="#' . $id . '">' . $heading . '</a></li>';
            $content = str_replace($matches[0][$index], '<h' . $matches[1][$index] . ' id="' . $id . '">' . $heading . '</h' . $matches[1][$index] . '>', $content);
        }

        $toc .= '</ul></div>';

        // Register a global variable to store the table of contents
        global $custom_table_of_contents;
        $custom_table_of_contents = $toc;

        // Return the modified content without the table of contents
        return $content;
    }

    return $content;
}

add_filter('the_content', 'generate_table_of_contents');

function table_of_contents_shortcode() {
    // Retrieve the table of contents stored in the global variable
    global $custom_table_of_contents;

    // Return the table of contents
    return $custom_table_of_contents;
}

add_shortcode('table_of_contents', 'table_of_contents_shortcode');

// Add Shortcode
function socialsher_shortcode($atts) {
    $atts = shortcode_atts(
            array(
                'title' => '',
                'sectitle' => '',
            ),
            $atts, ''
    );
    // Get the current page URL
    $url = esc_url(get_permalink());

    // Get the current page title
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));

    // Create an array of social networks and their respective sharing URLs
    $social_networks = array(
        '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 24 24">
    <path d="M16.403,9H14V7c0-1.032,0.084-1.682,1.563-1.682h0.868c0.552,0,1-0.448,1-1V3.064c0-0.523-0.401-0.97-0.923-1.005 C15.904,2.018,15.299,1.999,14.693,2C11.98,2,10,3.657,10,6.699V9H8c-0.552,0-1,0.448-1,1v2c0,0.552,0.448,1,1,1l2-0.001V21 c0,0.552,0.448,1,1,1h2c0.552,0,1-0.448,1-1v-8.003l2.174-0.001c0.508,0,0.935-0.381,0.993-0.886l0.229-1.996 C17.465,9.521,17.001,9,16.403,9z"></path>
</svg>' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url,
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="18px" height="18px"><path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"/></svg>' => 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title,
        '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.859 15.8571V10.8343C15.859 8.36569 15.3275 6.47998 12.4475 6.47998C11.059 6.47998 10.1332 7.23427 9.75609 7.95427H9.72181V6.70284H6.99609V15.8571H9.84181V11.3143C9.84181 10.1143 10.0647 8.96569 11.539 8.96569C12.9961 8.96569 13.0132 10.32 13.0132 11.3828V15.84H15.859V15.8571Z" fill="#757575"/>
<path d="M2.36719 6.70285H5.2129V15.8571H2.36719V6.70285Z" fill="#757575"/>
<path d="M3.79025 2.14285C2.88167 2.14285 2.14453 2.88 2.14453 3.78857C2.14453 4.69714 2.88167 5.45142 3.79025 5.45142C4.69882 5.45142 5.43596 4.69714 5.43596 3.78857C5.43596 2.88 4.69882 2.14285 3.79025 2.14285Z" fill="#757575"/>
</svg>' => 'https://www.linkedin.com/shareArticle?url=' . $url . '&title=' . $title,
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="18px" height="18px"><path d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609825 4 46 13.390175 46 25 C 46 36.609825 36.609825 46 25 46 C 22.876355 46 20.82771 45.682142 18.896484 45.097656 C 19.75673 43.659418 20.867347 41.60359 21.308594 39.90625 C 21.570728 38.899887 22.648438 34.794922 22.648438 34.794922 C 23.348841 36.132057 25.395277 37.263672 27.574219 37.263672 C 34.058123 37.263672 38.732422 31.300682 38.732422 23.890625 C 38.732422 16.78653 32.935409 11.472656 25.476562 11.472656 C 16.196831 11.472656 11.271484 17.700825 11.271484 24.482422 C 11.271484 27.636307 12.94892 31.562193 15.634766 32.8125 C 16.041611 33.001865 16.260073 32.919834 16.353516 32.525391 C 16.425459 32.226044 16.788267 30.766792 16.951172 30.087891 C 17.003269 29.871239 16.978043 29.68405 16.802734 29.470703 C 15.913793 28.392399 15.201172 26.4118 15.201172 24.564453 C 15.201172 19.822048 18.791452 15.232422 24.908203 15.232422 C 30.18976 15.232422 33.888672 18.832872 33.888672 23.980469 C 33.888672 29.796219 30.95207 33.826172 27.130859 33.826172 C 25.020554 33.826172 23.440361 32.080359 23.947266 29.939453 C 24.555054 27.38426 25.728516 24.626944 25.728516 22.78125 C 25.728516 21.130713 24.842754 19.753906 23.007812 19.753906 C 20.850369 19.753906 19.117188 21.984457 19.117188 24.974609 C 19.117187 26.877359 19.761719 28.166016 19.761719 28.166016 C 19.761719 28.166016 17.630543 37.176514 17.240234 38.853516 C 16.849091 40.52931 16.953851 42.786365 17.115234 44.466797 C 9.421139 41.352465 4 33.819328 4 25 C 4 13.390175 13.390175 4 25 4 z"/></svg>' => 'https://pinterest.com/pin/create/button/?url=' . $url . '&description=' . $title,
    );

    // Initialize the share buttons HTML
    $share_buttons = '<div class="tableofcontent-wrapper social-share-buttons d-none d-md-block">' .
            (!empty($atts["sectitle"]) ? '<h3>' . $atts["sectitle"] . '</h3>' : '' ) .
            '<ul class=""><span class="ss_title">' . $atts["title"] . '</span>';

    // Loop through the social networks and generate the share buttons HTML
    foreach ($social_networks as $network => $share_url) {
        $share_buttons .= '<li><a href="' . $share_url . '" target="_blank" rel="noopener">' . $network . '</a></li>';
    }

    // Close the share buttons HTML
    $share_buttons .= '</ul></div>';

    // Return the share buttons HTML
    return $share_buttons;
}

// Register shortcode
add_shortcode('socialsher', 'socialsher_shortcode');


