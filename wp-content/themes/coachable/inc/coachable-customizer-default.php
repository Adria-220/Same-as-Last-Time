<?php
if (!function_exists('coachable_theme_options')) :
    function coachable_theme_options()
    {
        $defaults = array(

            'fb_url' => '',
            'youtube_url' => '',
            'insta_url' => '',
            'twitter_url' => '',
            'header_layout' => 'header1',
            'dark_header' => 0,
            'header_full_width' => 0,
            'transparent_header' => 0,
            

            
     //Banner section
            'banner_title' => '',
            'banner_sub_title' => '',
            'banner_image' => '',
            'banner_btn_text' => '',
            'banner_button_url' => '',
            'banner_title_font' => '',


            'callout_checkbox' => 0,
            'callout1_image' => '',
            'callout1_title' => '',
            'callout1_url' => '',




            'callout2_image' => '',
            'callout2_title' => '',
            'callout2_url' => '',

            'callout3_image' => '',
            'callout3_title' => '',
            'callout3_url' => '',


            'testimonial_checkbox' => 0,
            'testimonial_section_title' => '',
            'testimonial_content' => '',
            'person_name' => '',
            'person_desg' => '',


            'about_sec_show' => 0,
            'about_sec_title' => '',
            'about_sec_description' => '',
            'about_btn_text' => '',
            'about_button_url' => '',

            //CTA section
            'cta_sec_show' => 1,
            'cta_sec_title' => '',
            'cta_description' => '',
            'cta_image' => '',
            'cta_btn_text' => '',
            'cta_button_url' => '',

            //Blog section
            'blog_sec_show' => 1,
            'blog_sec_title' => '',
            'blog_post_no' => '',


            'show_widgets' => 1,

            'sidebar_show' => 1,
        
        );

        $options = get_option('coachable_theme_options', $defaults);

        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;
