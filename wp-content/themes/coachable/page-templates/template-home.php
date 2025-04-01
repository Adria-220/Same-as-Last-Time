<?php
/**
 *
 * Template Name: Home Page Template

 *
 * @package Coachable
 */
 
get_header();

$coachable_options = coachable_theme_options();
$about_sec_show = $coachable_options['about_sec_show'];
$cta_sec_show = $coachable_options['cta_sec_show'];
$blog_sec_show = $coachable_options['blog_sec_show'];
$callout_checkbox = $coachable_options['callout_checkbox'];
$testimonial_checkbox = $coachable_options['testimonial_checkbox'];


get_template_part('template-parts/homepage/banner', 'section');

if($callout_checkbox == 1)
get_template_part('template-parts/homepage/callout', 'section');

if($about_sec_show == 1)
get_template_part('template-parts/homepage/about', 'section');

if($testimonial_checkbox == 1)
get_template_part('template-parts/homepage/testimonial', 'section');


if($blog_sec_show == 1)
get_template_part('template-parts/homepage/blog', 'section');

if($cta_sec_show == 1)
get_template_part('template-parts/homepage/cta', 'section');




get_footer();
