<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coachable
 */
$coachable_options = coachable_theme_options();
$show_widgets = $coachable_options['show_widgets'];
?>

	<footer id="colophon" class="site-footer">
		<?php if($show_widgets):?>
		<div class="prefooter">
		 	<div class="container">
	            <div class="row">
	            	<div class="col-md-12">
	                <?php if (is_active_sidebar('coachable_footer_1')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('coachable_footer_1') ?>
	                    </div>
	                    <?php
	                else: coachable_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('coachable_footer_2')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('coachable_footer_2') ?>
	                    </div>
	                    <?php
	                else: coachable_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('coachable_footer_3')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('coachable_footer_3') ?>
	                    </div>
	                    <?php
	                else: coachable_blank_widget();
	                endif; ?>
	            </div>
	        </div>
	        </div>
       </div>
       <?php endif; ?>
		<div class="site-info">
			<div class="container">
	            <div class="row">
	            	<div class="col-md-12">
<p><?php esc_html_e('Powered By WordPress', 'coachable');
                    esc_html_e(' | ', 'coachable') ?>
                    <span><?php esc_html_e('Coachable' , 'coachable'); ?></span>
                </p>
				    </div>
				</div>
	        </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
