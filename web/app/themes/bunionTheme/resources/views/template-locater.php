<?php

global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css(); 
$autoload_class = ( !$wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';
?>



<div class="locator alignfull row mt-0 vh-100">
  <div class="locator-left col-md-5 h-100 p-0">
    <div class="form-header px-3">
      <form autocomplete="off" class="row gap-2 mb-2">
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

    <div class="form-content" style="height:80%">
      <div class="h-100" id="wpsl-result-lists">
        <!-- TODO > autoload_class -->
        <div id="wpsl-stores" class="h-100">
          <ul class="p-0 list-unstyled">
          </ul>
        </div>
        <div id="wpsl-direction-details">
          <ul></ul>
        </div>
      </div>
    </div>

  </div>

  <div class="locator-right col-md-7 p-0">
  <div id="wpsl-gmap" class="wpsl-gmap-canvas w-100 h-100"></div>
  </div>
</div>
