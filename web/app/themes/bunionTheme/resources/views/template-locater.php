<?php

global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css(); 
$autoload_class = ( !$wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';
?>



<div class="locator alignfull row mt-0">
  <div class="locator-left col-md-5 ps-lg-5">
    <div class="form-header">
      <form autocomplete="off" class="row gap-2">
        <label for="wpsl-search-input">
          <?php echo esc_html( $wpsl->i18n->get_translation( 'search_label', __( 'Your location', 'wpsl' ) ) ) ?>
        </label>
        <div class="col-8 pe-0">
          <input id="wpsl-search-input" type="text" value="<?php apply_filters( 'wpsl_search_input', '' ) ?>" name="wpsl-search-input" placeholder="" aria-required="true"  />
        </div>
        <input id="wpsl-search-btn" class="col-3 order-last me-0 ms-2" type="submit" value="<?php esc_attr( $wpsl->i18n->get_translation( 'search_btn_label', __( 'Search', 'wpsl' ) ) ) ?> Search">
      </form>
      <div class="" id="wpsl-wrap">
        <div class="" id="wpsl-radius">
          <label for="wpsl-radius-dropdown"><?php echo esc_html( $wpsl->i18n->get_translation( 'radius_label', __( 'Search radius', 'wpsl' ) ) ) ?> </label>
          <select id="wpsl-radius-dropdown" class="wpsl-dropdown" name="wpsl-radius"> <?php echo $this->get_dropdown_list( 'search_radius' ) ?> </select>
        </div>
      </div>
    </div>

    <div class="form-content">
      <div class="h-100" id="wpsl-result-lists">
        <!-- TODO > autoload_class -->
        <div $autoload_class id="wpsl-stores" class="vh-100">
          <ul class="p-0 list-unstyled"></ul>
        </div>
        <div id="wpsl-direction-details">
          <ul></ul>
        </div>
      </div>
    </div>

  </div>

  <div class="locator-right col-md-7 p-0 vh-100">
  <div id="wpsl-gmap" class="wpsl-gmap-canvas w-100 h-100"></div>
  </div>
</div>

<?php

// ===========================================================================

// $output .= "\t\t\t\t" . '<div class="wpsl-search-btn-wrap"><input id="wpsl-search-btn" type="submit" value="' . esc_attr( $wpsl->i18n->get_translation( 'search_btn_label', __( 'Search', 'wpsl' ) ) ) . '"></div>' . "\r\n";

// $output .= "\t\t" . '</form>' . "\r\n";
// $output .= "\t\t" . '</div>' . "\r\n";
// $output .= "\t" . '</div>' . "\r\n";
    
// $output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas"></div>' . "\r\n";

// $output .= "\t" . '<div id="wpsl-result-list">' . "\r\n";
// $output .= "\t\t" . '<div id="wpsl-stores" '. $autoload_class .'>' . "\r\n";
// $output .= "\t\t\t" . '<ul></ul>' . "\r\n";
// $output .= "\t\t" . '</div>' . "\r\n";
// $output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
// $output .= "\t\t\t" . '<ul></ul>' . "\r\n";
// $output .= "\t\t" . '</div>' . "\r\n";
// $output .= "\t" . '</div>' . "\r\n";

// $output .= '<div id="wpsl-wrap">' . "\r\n";
// $output .= "\t" . '<div class="wpsl-search wpsl-clearfix ' . $this->get_css_classes() . '">' . "\r\n";
// $output .= "\t\t" . '<div id="wpsl-search-wrap">' . "\r\n";
// $output .= "\t\t\t" . '<form autocomplete="off">' . "\r\n";
// $output .= "\t\t\t" . '<div class="wpsl-input">' . "\r\n";
// $output .= "\t\t\t\t" . '<div><label for="wpsl-search-input">' . esc_html( $wpsl->i18n->get_translation( 'search_label', __( 'Your location', 'wpsl' ) ) ) . '</label></div>' . "\r\n";
// $output .= "\t\t\t\t" . '<input id="wpsl-search-input" type="text" value="' . apply_filters( 'wpsl_search_input', '' ) . '" name="wpsl-search-input" placeholder="" aria-required="true" />' . "\r\n";
// $output .= "\t\t\t" . '</div>' . "\r\n";

// if ( $wpsl_settings['radius_dropdown'] || $wpsl_settings['results_dropdown']  ) {
//     $output .= "\t\t\t" . '<div class="wpsl-select-wrap">' . "\r\n";

//     if ( $wpsl_settings['radius_dropdown'] ) {
//         $output .= "\t\t\t\t" . '<div id="wpsl-radius">' . "\r\n";
//         $output .= "\t\t\t\t\t" . '<label for="wpsl-radius-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'radius_label', __( 'Search radius', 'wpsl' ) ) ) . '</label>' . "\r\n";
//         $output .= "\t\t\t\t\t" . '<select id="wpsl-radius-dropdown" class="wpsl-dropdown" name="wpsl-radius">' . "\r\n";
//         $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'search_radius' ) . "\r\n";
//         $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
//         $output .= "\t\t\t\t" . '</div>' . "\r\n";
//     }

//     if ( $wpsl_settings['results_dropdown'] ) {
//         $output .= "\t\t\t\t" . '<div id="wpsl-results">' . "\r\n";
//         $output .= "\t\t\t\t\t" . '<label for="wpsl-results-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'results_label', __( 'Results', 'wpsl' ) ) ) . '</label>' . "\r\n";
//         $output .= "\t\t\t\t\t" . '<select id="wpsl-results-dropdown" class="wpsl-dropdown" name="wpsl-results">' . "\r\n";
//         $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'max_results' ) . "\r\n";
//         $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
//         $output .= "\t\t\t\t" . '</div>' . "\r\n";
//     } 

//     $output .= "\t\t\t" . '</div>' . "\r\n";
// }

// // Filter Category
// if ( $this->use_category_filter() ) {
//     $output .= $this->create_category_filter();
// }

// $output .= "\t\t\t\t" . '<div class="wpsl-search-btn-wrap"><input id="wpsl-search-btn" type="submit" value="' . esc_attr( $wpsl->i18n->get_translation( 'search_btn_label', __( 'Search', 'wpsl' ) ) ) . '"></div>' . "\r\n";

// $output .= "\t\t" . '</form>' . "\r\n";
// $output .= "\t\t" . '</div>' . "\r\n";
// $output .= "\t" . '</div>' . "\r\n";
    
// $output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas"></div>' . "\r\n";

// // result lists 
// $output .= "\t" . '<div id="wpsl-result-list">' . "\r\n";
// $output .= "\t\t" . '<div id="wpsl-stores" '. $autoload_class .'>' . "\r\n";
// $output .= "\t\t\t" . '<ul></ul>' . "\r\n";
// $output .= "\t\t" . '</div>' . "\r\n";
// $output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
// $output .= "\t\t\t" . '<ul></ul>' . "\r\n";
// $output .= "\t\t" . '</div>' . "\r\n";
// $output .= "\t" . '</div>' . "\r\n";


// $output .= '</div>' . "\r\n";

// // return $output;