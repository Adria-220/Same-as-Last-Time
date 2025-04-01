<?php

function coachable_sanitize_checkbox( $input ) {
    if ( true === $input ) {
        return 1;
     } else {
        return 0;
     }
}
function coachable_sanitize_url( $url ) {
  return esc_url_raw( $url );
}


if (!function_exists('coachable_get_categories_select')):
    function coachable_get_categories_select()
    {
        $coachable_categories = get_categories();
        $results = [];

        if (!empty($coachable_categories)):
            $results[''] = __('Select Category', 'coachable');
            foreach ($coachable_categories as $result) {
                $results[$result->slug] = $result->name;
            }
        endif;
        return $results;
    }
endif;

function coachable_sanitize_select($input, $setting)
{
    $input = sanitize_key($input);

    $choices = $setting->manager->get_control($setting->id)->choices;

    return array_key_exists($input, $choices) ? $input : $setting->default;
}
