<?php
/**
 * Coachable Theme Customizer
 *
 * @package Coachable
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function coachable_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$coachable_options = coachable_theme_options();

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'coachable_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'coachable_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Home Page Options', 'coachable'),
            'priority' => 2,
        )
    );



//Social Links
    $wp_customize->add_section(
    'social_section',
	    array(
	        'title' => esc_html__( 'Social Links','coachable' ),
		     'description' => esc_html__( 'More Social Links are available in Premium Version','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);
	$wp_customize->add_setting('coachable_theme_options[fb_url]',
	    array(
	        'type' => 'option',
	        'default' => $coachable_options['fb_url'],
	        'sanitize_callback' => 'coachable_sanitize_url',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[fb_url]',
	    array(
	        'label' => esc_html__('Facebook Link', 'coachable'),
	        'type' => 'text',
	        'section' => 'social_section',
	        'settings' => 'coachable_theme_options[fb_url]',
	    )
	);
		$wp_customize->add_setting('coachable_theme_options[insta_url]',
	    array(
	        'type' => 'option',
	        'default' => $coachable_options['insta_url'],
	        'sanitize_callback' => 'coachable_sanitize_url',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[insta_url]',
	    array(
	        'label' => esc_html__('Instagram Link', 'coachable'),
	        'type' => 'text',
	        'section' => 'social_section',
	        'settings' => 'coachable_theme_options[insta_url]',
	    )
	);
		$wp_customize->add_setting('coachable_theme_options[twitter_url]',
	    array(
	        'type' => 'option',
	        'default' => $coachable_options['twitter_url'],
	        'sanitize_callback' => 'coachable_sanitize_url',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[twitter_url]',
	    array(
	        'label' => esc_html__('Twiiter X Link', 'coachable'),
	        'type' => 'text',
	        'section' => 'social_section',
	        'settings' => 'coachable_theme_options[twitter_url]',
	    )
	);


    $wp_customize->add_section(
    'article_section',
	    array(
	        'title' => esc_html__( 'Single Article/Blog Page','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[sidebar_show]',
	    array(
	        'type' => 'option',
	        'default'        => true,
	        'default' => $coachable_options['sidebar_show'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[sidebar_show]',
	    array(
	        'label' => esc_html__('Show Sidebar in Single Article?', 'coachable'),
	        'type' => 'Checkbox',
	        'section' => 'article_section',

	    )
	);



//Header Section
    $wp_customize->add_section(
    'header_section',
	    array(
	        'title' => esc_html__( 'Header Section','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);


       $wp_customize->add_setting( 'coachable_theme_options[header_layout]', array(
          'capability' => 'edit_theme_options',
          'default' => 'header1',
          'sanitize_callback' => 'coachable_sanitize_radio',
          'type' => 'option',
    ) );

    $wp_customize->add_control( 'coachable_theme_options[header_layout]', array(
          'type' => 'radio',
          'section' => 'header_section', // Add a default or your own section
          'label' => esc_attr( __('Choose Header Layout', 'coachable') ),
          'choices' => array(
            'header1' => esc_attr( __('Default Header', 'coachable') ),
            'header2' => esc_attr( __('Centered Layout', 'coachable') ),
            'header3' => esc_attr( __('Bottom Menu Layout', 'coachable') ),
          ),
    ) );


	$wp_customize->add_setting('coachable_theme_options[dark_header]',
	    array(
	        'type' => 'option',
	        'default'        => true,
	        'default' => $coachable_options['dark_header'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[dark_header]',
	    array(
	        'label' => esc_html__('Dark Header?', 'coachable'),
	        'type' => 'Checkbox',
	        'section' => 'header_section',

	    )
	);

	$wp_customize->add_setting('coachable_theme_options[header_full_width]',
	    array(
	        'type' => 'option',
	        'default'        => true,
	        'default' => $coachable_options['header_full_width'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[header_full_width]',
	    array(
	        'label' => esc_html__('Full Width?', 'coachable'),
	        'type' => 'Checkbox',
	        'section' => 'header_section',

	    )
	);


//Banner section
    $wp_customize->add_section(
    'banner_section',
	    array(
	        'title' => esc_html__( 'Banner Section','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[banner_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['banner_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[banner_title]',
	    array(
	        'label' => esc_html__('Banner Title', 'coachable'),
	        'priority' => 1,
	        'section' => 'banner_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[banner_title_font]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['banner_title_font'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[banner_title_font]',
	    array(
	        'label' => esc_html__('Main Title font Size', 'coachable'),
	        'priority' => 1,
	        'section' => 'banner_section',
	        'type' => 'number',
	    )
	);


	$wp_customize->add_setting('coachable_theme_options[banner_sub_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['banner_sub_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[banner_sub_title]',
	    array(
	        'label' => esc_html__('Banner Sub Title', 'coachable'),
	        'priority' => 1,
	        'section' => 'banner_section',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting('coachable_theme_options[banner_btn_text]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['banner_btn_text'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[banner_btn_text]',
	    array(
	        'label' => esc_html__('Banner Button Text', 'coachable'),
	        'priority' => 1,
	        'section' => 'banner_section',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting('coachable_theme_options[banner_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $coachable_options['banner_button_url'],
	        'sanitize_callback' => 'coachable_sanitize_url',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[banner_button_url]',
	    array(
	        'label' => esc_html__('Banner Button Link', 'coachable'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'coachable_theme_options[banner_button_url]',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[banner_image]',
	array(
	    'type' => 'option',
	    'sanitize_callback' => 'esc_url_raw',
	)
	);
	$wp_customize->add_control(
	new WP_Customize_Image_Control(
	    $wp_customize,
	    'coachable_theme_options[banner_image]',
	    array(
	        'label' => esc_html__('Add Background Image', 'coachable'),
	        'section' => 'banner_section',
	        'settings' => 'coachable_theme_options[banner_image]',
	    ))
	);





	$wp_customize->add_section(
	    'coachable_callout_option',
	    array(
	        'title' => esc_html__( 'Service Section','coachable' ),
	        'panel' => 'theme_options',
	        'capability' => 'edit_theme_options',
	    )
	);
	$wp_customize->add_setting('coachable_theme_options[callout_checkbox]',
	    array(
	        'type' => 'option',
	        'default'        => 0,
	        'default' => $coachable_options['callout_checkbox'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[callout_checkbox]',
	    array(
	        'label' => esc_html__('Show Service Section', 'coachable'),
	        'type' => 'Checkbox',
	        'priority' => 1,
	        'section' => 'coachable_callout_option',

	    )
	);




    $wp_customize->add_section(
    'callout1_section',
        array(
            'title' => esc_html__( 'Service 1','coachable' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('coachable_theme_options[callout1_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
    );
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'coachable_theme_options[callout1_image]',
        array(
            'label' => esc_html__('Add Image', 'coachable'),
            'section' => 'callout1_section',
            'settings' => 'coachable_theme_options[callout1_image]',
        ))
    );

    $wp_customize->add_setting('coachable_theme_options[callout1_title]',
        array(
            'capability' => 'edit_theme_options',
            'default' => $coachable_options['callout1_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'option',
        )
    );
    $wp_customize->add_control('coachable_theme_options[callout1_title]',
        array(
            'label' => esc_html__('Service Title', 'coachable'),
            'section' => 'callout1_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('coachable_theme_options[callout1_url]',
        array(
            'type' => 'option',
            'default' => $coachable_options['callout1_url'],
            'sanitize_callback' => 'coachable_sanitize_url',
        )
    );
    $wp_customize->add_control('coachable_theme_options[callout1_url]',
        array(
            'label' => esc_html__('Service link if needed', 'coachable'),
            'type' => 'text',
            'section' => 'callout1_section',
            'settings' => 'coachable_theme_options[callout1_url]',
        )
    );




    $wp_customize->add_section(
    'callout2_section',
        array(
            'title' => esc_html__( 'Service 2','coachable' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('coachable_theme_options[callout2_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
    );
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'coachable_theme_options[callout2_image]',
        array(
            'label' => esc_html__('Add Image', 'coachable'),
            'section' => 'callout2_section',
            'settings' => 'coachable_theme_options[callout2_image]',
        ))
    );

    $wp_customize->add_setting('coachable_theme_options[callout2_title]',
        array(
            'capability' => 'edit_theme_options',
            'default' => $coachable_options['callout2_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'option',
        )
    );
    $wp_customize->add_control('coachable_theme_options[callout2_title]',
        array(
            'label' => esc_html__('Service Title', 'coachable'),
            'section' => 'callout2_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('coachable_theme_options[callout2_url]',
        array(
            'type' => 'option',
            'default' => $coachable_options['callout2_url'],
            'sanitize_callback' => 'coachable_sanitize_url',
        )
    );
    $wp_customize->add_control('coachable_theme_options[callout2_url]',
        array(
            'label' => esc_html__('Service link if needed', 'coachable'),
            'type' => 'text',
            'section' => 'callout2_section',
            'settings' => 'coachable_theme_options[callout2_url]',
        )
    );


    $wp_customize->add_section(
    'callout3_section',
        array(
            'title' => esc_html__( 'Service 3','coachable' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('coachable_theme_options[callout3_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
    );
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'coachable_theme_options[callout3_image]',
        array(
            'label' => esc_html__('Add Image', 'coachable'),
            'section' => 'callout3_section',
            'settings' => 'coachable_theme_options[callout3_image]',
        ))
    );

    $wp_customize->add_setting('coachable_theme_options[callout3_title]',
        array(
            'capability' => 'edit_theme_options',
            'default' => $coachable_options['callout3_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'option',
        )
    );
    $wp_customize->add_control('coachable_theme_options[callout3_title]',
        array(
            'label' => esc_html__('Service Title', 'coachable'),
            'section' => 'callout3_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('coachable_theme_options[callout3_url]',
        array(
            'type' => 'option',
            'default' => $coachable_options['callout3_url'],
            'sanitize_callback' => 'coachable_sanitize_url',
        )
    );
    $wp_customize->add_control('coachable_theme_options[callout3_url]',
        array(
            'label' => esc_html__('Service link if needed', 'coachable'),
            'type' => 'text',
            'section' => 'callout3_section',
            'settings' => 'coachable_theme_options[callout3_url]',
        )
    );




    //About section
	$wp_customize->add_section(
    'about_section',
	    array(
	        'title' => esc_html__( 'About Section','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[about_sec_show]',
	    array(
	        'type' => 'option',
	        'default'        => true,
	        'default' => $coachable_options['about_sec_show'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[about_sec_show]',
	    array(
	        'label' => esc_html__('Show About Section', 'coachable'),
	        'type' => 'Checkbox',
	        'priority' => 1,
	        'section' => 'about_section',

	    )
	);


	$wp_customize->add_setting('coachable_theme_options[about_sec_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['about_sec_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[about_sec_title]',
	    array(
	        'label' => esc_html__('About Title', 'coachable'),
	        'priority' => 1,
	        'section' => 'about_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[about_sec_description]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['about_sec_description'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[about_sec_description]',
	    array(
	        'label' => esc_html__('About Description', 'coachable'),
	        'priority' => 1,
	        'section' => 'about_section',
	        'type' => 'textarea',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[about_btn_text]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['about_btn_text'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[about_btn_text]',
	    array(
	        'label' => esc_html__('About Button Text', 'coachable'),
	        'priority' => 1,
	        'section' => 'about_section',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting('coachable_theme_options[about_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $coachable_options['about_button_url'],
	        'sanitize_callback' => 'coachable_sanitize_url',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[about_button_url]',
	    array(
	        'label' => esc_html__('About Button Link', 'coachable'),
	        'type' => 'text',
	        'section' => 'about_section',
	        'settings' => 'coachable_theme_options[about_button_url]',
	    )
	);


	$wp_customize->add_setting('coachable_theme_options[about_front_image]',
	array(
	    'type' => 'option',
	    'sanitize_callback' => 'esc_url_raw',
	)
	);
	$wp_customize->add_control(
	new WP_Customize_Image_Control(
	    $wp_customize,
	    'coachable_theme_options[about_front_image]',
	    array(
	        'label' => esc_html__('Add About Image', 'coachable'),
	        'section' => 'about_section',
	        'settings' => 'coachable_theme_options[about_front_image]',
	    ))
	);




//Testimonial section

	$wp_customize->add_setting('coachable_theme_options[testimonial_checkbox]',
	    array(
	        'type' => 'option',
	        'default'        => 0,
	        'default' => $coachable_options['testimonial_checkbox'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[testimonial_checkbox]',
	    array(
	        'label' => esc_html__('Show Testimonial Section', 'coachable'),
	        'type' => 'Checkbox',
	        'priority' => 1,
	        'section' => 'testimonial_section',

	    )
	);

    $wp_customize->add_section(
    'testimonial_section',
	    array(
	        'title' => esc_html__( 'Testimonial Section','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[testimonial_section_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['testimonial_section_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[testimonial_section_title]',
	    array(
	        'label' => esc_html__('Section Title', 'coachable'),
	        'priority' => 1,
	        'section' => 'testimonial_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[testimonial_content]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['testimonial_content'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[testimonial_content]',
	    array(
	        'label' => esc_html__('Testimonial Content', 'coachable'),
	        'priority' => 1,
	        'section' => 'testimonial_section',
	        'type' => 'textarea',
	    )
	);


	$wp_customize->add_setting('coachable_theme_options[person_name]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['person_name'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[person_name]',
	    array(
	        'label' => esc_html__('Person Name', 'coachable'),
	        'priority' => 1,
	        'section' => 'testimonial_section',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting('coachable_theme_options[person_desg]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['person_desg'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[person_desg]',
	    array(
	        'label' => esc_html__('Designation', 'coachable'),
	        'priority' => 1,
	        'section' => 'testimonial_section',
	        'type' => 'text',
	    )
	);



    //Blog section
	$wp_customize->add_section(
    'blog_section',
	    array(
	        'title' => esc_html__( 'Recent Blog Section','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[blog_sec_show]',
	    array(
	        'type' => 'option',
	        'default'        => true,
	        'default' => $coachable_options['blog_sec_show'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[blog_sec_show]',
	    array(
	        'label' => esc_html__('Show Recent Blog Section', 'coachable'),
	        'type' => 'Checkbox',
	        'section' => 'blog_section',

	    )
	);

	$wp_customize->add_setting('coachable_theme_options[blog_sec_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['blog_sec_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[blog_sec_title]',
	    array(
	        'label' => esc_html__('Blog Section Title', 'coachable'),
	        'section' => 'blog_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[blog_post_no]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['blog_post_no'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[blog_post_no]',
	    array(
	        'label' => esc_html__('No Of Blog Posts to show?', 'coachable'),
	        'section' => 'blog_section',
	        'type' => 'text',
	    )
	);







    //CTA section
	$wp_customize->add_section(
    'cta_section',
	    array(
	        'title' => esc_html__( 'CTA Section','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[cta_sec_show]',
	    array(
	        'type' => 'option',
	        'default'        => true,
	        'default' => $coachable_options['cta_sec_show'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[cta_sec_show]',
	    array(
	        'label' => esc_html__('Show CTA Section', 'coachable'),
	        'type' => 'Checkbox',
	        'priority' => 1,
	        'section' => 'cta_section',

	    )
	);


	$wp_customize->add_setting('coachable_theme_options[cta_sec_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['cta_sec_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[cta_sec_title]',
	    array(
	        'label' => esc_html__('CTA Title', 'coachable'),
	        'priority' => 1,
	        'section' => 'cta_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[cta_description]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['cta_description'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[cta_description]',
	    array(
	        'label' => esc_html__('CTA Description', 'coachable'),
	        'priority' => 1,
	        'section' => 'cta_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[cta_btn_text]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $coachable_options['cta_btn_text'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[cta_btn_text]',
	    array(
	        'label' => esc_html__('CTA Button Text', 'coachable'),
	        'priority' => 1,
	        'section' => 'cta_section',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting('coachable_theme_options[cta_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $coachable_options['cta_button_url'],
	        'sanitize_callback' => 'coachable_sanitize_url',
	    )
	);
	$wp_customize->add_control('coachable_theme_options[cta_button_url]',
	    array(
	        'label' => esc_html__('CTA Button Link', 'coachable'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'coachable_theme_options[cta_button_url]',
	    )
	);


	$wp_customize->add_setting('coachable_theme_options[cta_image]',
	array(
	    'type' => 'option',
	    'sanitize_callback' => 'esc_url_raw',
	)
	);
	$wp_customize->add_control(
	new WP_Customize_Image_Control(
	    $wp_customize,
	    'coachable_theme_options[cta_image]',
	    array(
	        'label' => esc_html__('Add Background Image', 'coachable'),
	        'section' => 'cta_section',
	        'settings' => 'coachable_theme_options[cta_image]',
	    ))
	);



	$wp_customize->add_section(
    'footer_section',
	    array(
	        'title' => esc_html__( 'Footer Option','coachable' ),
	       	'description' => esc_html__( 'Copyright text can be changed in Premium Version','coachable' ),
	        'panel'=>'theme_options',
	        'capability'=>'edit_theme_options',
	    )
	);

	$wp_customize->add_setting('coachable_theme_options[show_widgets]',
	    array(
	        'type' => 'option',
	        'default'        => true,
	        'default' => $coachable_options['show_widgets'],
	        'sanitize_callback' => 'coachable_sanitize_checkbox',
	    )
	);

	$wp_customize->add_control('coachable_theme_options[show_widgets]',
	    array(
	        'label' => esc_html__('Show Widgets', 'coachable'),
	        'type' => 'Checkbox',
	        'priority' => 1,
	        'section' => 'footer_section',

	    )
	);


}
add_action( 'customize_register', 'coachable_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function coachable_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function coachable_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function coachable_customize_preview_js() {
	wp_enqueue_script( 'coachable-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'coachable_customize_preview_js' );
