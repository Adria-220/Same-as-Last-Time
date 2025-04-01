<?php
$coachable_options = coachable_theme_options();

$about_sec_title = $coachable_options['about_sec_title'];
$about_sec_description = $coachable_options['about_sec_description'];
$about_front_image = $coachable_options['about_front_image'];
$about_btn_text	 = $coachable_options['about_btn_text'];
$about_button_url		 = $coachable_options['about_button_url'];


?>

<div class="about-section section-spacing">
	<div class="container">
		<div class="row">
				


				<div class="col-md-7">
        		<?php
              if ($about_sec_title)
                  echo '<h2>' . esc_html($about_sec_title) . '</h2>';

              if ($about_sec_description)
                  echo '<span>' . esc_html($about_sec_description) . '</span>';
				  if( $about_btn_text && $about_button_url):?>
                  <a href="<?php echo esc_url($about_button_url); ?>" class="btn-default"><?php echo esc_html($about_btn_text); ?></a>
              <?php endif; ?>
        </div>

 				<div class="col-md-5">
					  <img src="<?php echo esc_url($about_front_image); ?>" alt="" />

				</div>
                       
		</div>
	</div>
</div>