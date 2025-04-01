<?php
$coachable_options = coachable_theme_options();

$banner_title = $coachable_options['banner_title'];
$banner_title_font = $coachable_options['banner_title_font'];
$banner_sub_title = $coachable_options['banner_sub_title'];
$banner_image = $coachable_options['banner_image'];
$banner_btn_text	 = $coachable_options['banner_btn_text'];
$banner_button_url		 = $coachable_options['banner_button_url'];

if(!empty($banner_image)){
  $background_img = "style='background-image:url(".esc_url($banner_image).")'";
}
else{
  $background_img = '';
}

?>
<div class="banner-section section-overlay" <?php echo wp_kses_post($background_img); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-wrap">
				
                  		<?php

                  		 if ($banner_sub_title)
                            echo '<span>' . esc_html($banner_sub_title) . '</span>';

                        if ($banner_title)
                            echo '<h1 style="font-size:'. esc_html($banner_title_font) .'px;">' . esc_html($banner_title) . '</h1>';

                       
  if( $banner_btn_text && $banner_button_url):?>
                            <a href="<?php echo esc_url($banner_button_url); ?>" class="btn-default"><?php echo esc_html($banner_btn_text); ?></a>
                        <?php endif; ?>
                       </div>

			</div>
		</div>
	</div>
</div>