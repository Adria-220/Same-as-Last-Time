<?php
$coachable_options = coachable_theme_options();

$cta_sec_title = $coachable_options['cta_sec_title'];
$cta_description = $coachable_options['cta_description'];
$cta_image = $coachable_options['cta_image'];
$cta_btn_text	 = $coachable_options['cta_btn_text'];
$cta_button_url		 = $coachable_options['cta_button_url'];


if(!empty($cta_image)){
  $background_img = "style='background-image:url(".esc_url($cta_image).")'";
}
else{
  $background_img = '';
}

?>
<div class="cta-section section-overlay" <?php echo wp_kses_post($background_img); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
                  		<?php
                        if ($cta_sec_title)
                            echo '<h2>' . esc_html($cta_sec_title) . '</h2>';

                        if ($cta_description)
                            echo '<span>' . esc_html($cta_description) . '</span>';

                            if( $cta_btn_text && $cta_button_url):?>
                            <a href="<?php echo esc_url($cta_button_url); ?>" class="btn-default"><?php echo esc_html($cta_btn_text); ?></a>
                        <?php endif; 
 								  ?>
                       
			</div>
		</div>
	</div>
</div>