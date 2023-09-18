<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));

});

add_filter( 'wpsl_templates',  function ( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'custom',
        'name' => 'Custom template',
        'path' => get_stylesheet_directory() . '/' . 'resources/views/template-locater.php',
    );

    return $templates;
});

add_filter( 'wpsl_listing_template', function () {

    global $wpsl, $wpsl_settings; 

    return 
    "<li>
        <div class='store d-flex gap-4 p-3'>
            <%= thumb %>
            <div>
                <div>
                    <h3 class='store-name text-primary fw-semibold fs-5 store-single-title'> <%= store %> </h3>
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

                <div class='locator-buttons d-flex gap-3 mt-2'>
                    <button type='button' class='btn btn-primary text-capitalize btnTouch' data-bs-toggle='modal' data-bs-target='#iTouchModal'> Get In Touch</button>
                    <p><a href='<%= permalink %>' class='btn btn-light border-dark-subtle text-capitalize'>more info</a></p>
                </div>
            </div>
        </div>

        <div class='modal fade ' id='iTouchModal' tabindex='-1' aria-labelledby='iTouchModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered modal-lg'>
            <div class='modal-content'>
                <div class='modal-header border-0 px-4 pb-0'>
                    <h1 class='modal-title text-primary fw-semibold fs-2 px-1' id='iTouchModalLabel'>Contact Us</h1>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='d-flex px-3 align-items-center'>
                    <p class='modal-description px-3 pt-0'>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Recusandae,facilis.
                    </p>
                    <img src='' alt='photo1' style='height: 118px; width: 180px;'>
                </div>
    
                <div class='modal-body'>
                    " .do_shortcode("[advanced_form form='613']"). "
                </div>
            </div>
        </div>
    </div>
    
    </li>";
});

add_filter( 'wpsl_skip_cpt_template', '__return_true' );


add_action('af/form/submission/key=form_65080d43a229d', function ($form, $fields, $args) {

    $zip = af_get_field('find_a_doctor_in_your_area');

    $urlQuery = http_build_query(
        [
            'zip_code' => $zip
        ]
    );

    // $location = $args['redirect'] . '?' . $urlQuery;

    $location = 'http://bunion-relief.test/find-a-doctor/' . '?' . $urlQuery;

    header("Location: " . $location);
    exit;
}, 10, 3);


