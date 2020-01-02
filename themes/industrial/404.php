<?php
  if(get_option('anps_error_page', '0') != '0') {
    query_posts('post_type=page&p=' . get_option('anps_error_page', '0'));

    while(have_posts()) { the_post();
      get_header();
      anps_the_content();
      get_footer();
    }

    /* No need to reset, as the page is over */
  } else {
    get_header();
    ?>
        <div class="error-page-sample">
            <h1 class="text-center"><?php esc_html_e('It seems that something went wrong!', 'industrial'); ?></h1>
            <h6 class="text-center"><span class="grey"><?php esc_html_e('This page does not exist.', 'industrial'); ?></span></h6>
        </div>
    <?php
    get_footer();
  }
?>
