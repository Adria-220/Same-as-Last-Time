<?php
$coachable_options = coachable_theme_options();

$testimonial_section_title = $coachable_options['testimonial_section_title'];
$testimonial_content = $coachable_options['testimonial_content'];
$person_desg = $coachable_options['person_desg'];
$person_name	 = $coachable_options['person_name'];


if(!empty($cta_image)){
  $background_img = "style='background-image:url(".esc_url($cta_image).")'";
}
else{
  $background_img = '';
}

?>
<div class="testimonial-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				                <div class="section-headings section-title">
                        <?php
                        if ($testimonial_section_title)
                            echo '<h2>' . esc_html($testimonial_section_title) . '</h2>';

                        ?>
                </div>
                
                <div class="testimonial-wrap">
                   <?php echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/quote.png' ) . '" >'; ?>
                  		<?php

                        if ($testimonial_content)
                            echo '<span class="test-content">' . esc_html($testimonial_content) . '</span>';

                             if ($person_name)
                            echo '<h3>' . esc_html($person_name) . '</h3>';

                            if ($person_desg)
                            echo '<span>' . esc_html($person_desg) . '</span>';

                           
 								  ?>
                </div>
                       
			</div>
		</div>
	</div>
</div>