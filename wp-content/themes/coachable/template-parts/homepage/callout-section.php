<?php
$coachable_options = coachable_theme_options();



$callout1_image = $coachable_options['callout1_image'];
$callout1_title = $coachable_options['callout1_title'];
$callout1_url = $coachable_options['callout1_url'];

$callout2_image = $coachable_options['callout2_image'];
$callout2_title = $coachable_options['callout2_title'];
$callout2_url = $coachable_options['callout2_url'];

$callout3_image = $coachable_options['callout3_image'];
$callout3_title = $coachable_options['callout3_title'];
$callout3_url = $coachable_options['callout3_url'];

if(!empty($callout1_image)){
  $background_img1 = "style='background-image:url(".esc_url($callout1_image).")'";
}
else{
  $background_img1 = '';
}

if(!empty($callout2_image)){
  $background_img2 = "style='background-image:url(".esc_url($callout2_image).")'";
}
else{
  $background_img2 = '';
}

if(!empty($callout3_image)){
  $background_img3 = "style='background-image:url(".esc_url($callout3_image).")'";
}
else{
  $background_img3 = '';
}

?>
<div class="callout-section">
    <div class="container">

        <div class="row">
            
            <div class="callout-wrap"  <?php echo wp_kses_post($background_img1); ?>>
                <div class="callout-inner">
                    <?php if($callout1_url){?>
                    <?php if ($callout1_title): ?><h3><a href="<?php echo esc_url($callout1_url); ?>"><?php echo esc_html($callout1_title); ?></a></h3><?php endif; ?>
                <?php } else { ?>
                    <?php if ($callout1_title): ?><h3><?php echo esc_html($callout1_title); ?></h3><?php endif; ?>
                <?php } ?>
                </div>
            </div>

            <div class="callout-wrap" <?php echo wp_kses_post($background_img2); ?>>
                <div class="callout-inner">
                    <?php if($callout2_url){?>
                    <?php if ($callout2_title): ?><h3><a href="<?php echo esc_url($callout2_url); ?>"><?php echo esc_html($callout2_title); ?></a></h3><?php endif; ?>
                <?php } else { ?>
                    <?php if ($callout2_title): ?><h3><?php echo esc_html($callout2_title); ?></h3><?php endif; ?>
                <?php } ?>
                </div>
            </div>

            <div class="callout-wrap" <?php echo wp_kses_post($background_img3); ?>>
                <div class="callout-inner">
                    <?php if($callout3_url){?>
                    <?php if ($callout3_title): ?><h3><a href="<?php echo esc_url($callout3_url); ?>"><?php echo esc_html($callout3_title); ?></a></h3><?php endif; ?>
                <?php } else { ?>
                    <?php if ($callout3_title): ?><h3><?php echo esc_html($callout3_title); ?></h3><?php endif; ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
