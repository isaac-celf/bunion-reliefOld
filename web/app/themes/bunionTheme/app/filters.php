<?php

/**
 * Theme filters.
 */

namespace App;

use WP_Query;
use Log1x\SageSvg\SageSvg;
use function Roots\app;


/**
 * ajaxURL access global.
 */
function ajax_url()
{
    echo '<script type="text/javascript">
            const ajaxurl = "' . admin_url('admin-ajax.php') . '";
        </script>';
}

add_action('wp_head', __NAMESPACE__ . '\\ajax_url');
/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return false;
});

add_filter('wpsl_templates',  function ($templates) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array(
        'id'   => 'custom',
        'name' => 'Custom template',
        'path' => get_stylesheet_directory() . '/' . 'resources/views/template-locater.php',
    );

    return $templates;
});

/**
 * prevent default template to load
 */
add_filter('wpsl_skip_cpt_template', '__return_true');

/**
 * load store-locator
 */
add_filter('wpsl_listing_template', function () {

    global $wpsl, $wpsl_settings;
    // render svg tag
    $formIcon = \App(SageSvg::class)->render('images.human-form', 'w-75');
    $formDescription = get_field('form_description', 'option');

    return
        "
    <li data-key='<%= id %>'>
        <div class='store d-flex gap-3 p-3 flex-column flex-lg-row'>
            <%= thumb %>
            <div>
                <div>
                    <h3 class='store-single-title text-primary fw-semibold fs-5'> <%= store %> </h3>
                        <p class='store-address mb-0'> <%= city %>, <%= state %> </p>
                        <span class='store-address'> <%= address %> </span>

                        <% if ( address2 ) { %> 
                        <span class='store-address'><%= address2 %></span>
                        <% } %>
                </div>
                <div>
                    <p>
                        <i class='bi bi-geo-alt'></i> 
                        <%= distance %> $wpsl_settings[distance_unit]
                    </p>
                </div>

                <div class ='locator-buttons d-flex gap-3 mt-2'>
                    <button type='button' class='btn btn-primary text-capitalize btnTouch' data-bs-toggle='modal' data-bs-target='#iTouchModal-<%= id %>'>Get In Touch</button>
                    <p><a href='<%= permalink %>' class='btn btn-light border-dark-subtle text-capitalize'>more info</a></p>
                </div>
            </div>
        </div>
    </li>

        <div class='modal fade ' id='iTouchModal-<%= id %>' tabindex='-1' aria-labelledby='iTouchModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered modal-lg'>
                <div class='modal-content'>
                    <div class='modal-header border-0 px-4 pb-0'>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-img-box row px-3 align-items-center w-100 m-auto'>
                        <div class='col-8'>
                            <h1 class='modal-title text-primary fw-semibold fs-2 px-1' id='iTouchModalLabel'>Contact Us</h1>
                            <p class='modal-description ps-2 pt-0'> $formDescription</p>
                        </div>
                        <div class='col-4'>
                            $formIcon
                        </div>
                    </div>
        
                    <div class='modal-body pt-0'>
                        " . do_shortcode("[advanced_form form='form_get_in_touch']") . "
                    </div>
                </div>
            </div>
        </div>
        ";
});

/**
 * Home search form redirect > URL
 */
add_action('af/form/submission/key=form_search_location', function ($form, $fields, $args) {

    $zip = af_get_field('find_a_bunion_doctor_near_you');

    $urlQuery = http_build_query(
        [
            'zip_code' => $zip
        ]
    );

    $location = home_url() . '/find-a-doctor/' . '?' . $urlQuery;

    header("Location: " . $location);
    exit;
}, 10, 3);


/**
 * 
 */
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/**
 * Blog load more posts
 */
function load_more_posts()
{
    $next_page = $_POST['current_page'] + 1;
    $query = new WP_Query([
        'post_type' => 'blog',
        'posts_per_page' => 6,
        'paged' => $next_page,
    ]);

    if ($query->have_posts());

    // to not pre-load blog
    ob_start();


    while ($query->have_posts()) : $query->the_post();

        $title = get_the_title();
        $description = get_the_excerpt();
        $image = get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'img-fluid']);
        $link = get_permalink();

        echo \Roots\view("components.card")->with([
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'link' => $link,
        ])->render();

    endwhile;

    wp_send_json_success(ob_get_clean());
}

add_action('wp_ajax_nopriv_load_more_posts', __NAMESPACE__ . '\\load_more_posts');
add_action('wp_ajax_load_more_posts', __NAMESPACE__ . '\\load_more_posts');
