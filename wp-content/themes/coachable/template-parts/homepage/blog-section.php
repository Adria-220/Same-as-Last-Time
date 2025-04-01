<?php
$coachable_options = coachable_theme_options();

$blog_sec_title = $coachable_options['blog_sec_title'];
$posts_count = $coachable_options['blog_post_no'];

?>
<div class="blog-section section-spacing">
    <div class="container">
        <div class="row">

                <div class="section-headings section-title">
                        <?php
                        if ($blog_sec_title)
                            echo '<h2>' . esc_html($blog_sec_title) . '</h2>';

                        ?>
                </div>

                    <?php 

        $loop = ($posts_count<=0)?30:$posts_count;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($loop),
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
            );

        $query = new \WP_Query($args);

         if ($query->have_posts()):
            ?>
            <div class="blog-element">
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            global $post;
                            $post_format = get_post_format($post->ID);
                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            $image = wp_get_attachment_image_src($post_thumbnail_id, 'coachable-blog-thumbnail-img');
                            $content = get_the_content();
  

                            if (!empty($image)) {
                                $image_style = "style='background-image:url(" . esc_url($image[0]) . ")'";
                            } else {
                                $image_style = '';
                            }

                            if($loop>=1) :
                                ?>
                                <article class="blog-post">
                                    <?php if (!empty($image)) { ?>
                                    <img src="<?php echo esc_url($image[0]); ?>" alt="" />
                                    <?php } ?>
                                    <div class="title">
                                        <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo the_title(); ?></a></h2>
                                    </div>
                                    <ul class="post-meta">
                                        <li class="post-cat">
                                                                <?php 
                                                                $categories = get_the_category();
                                                                if ( ! empty( $categories ) ) {
                                                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                                                }?>
                                                                </li>
                                              <li class="meta-date"><a href="<?php echo esc_url(coachable_archive_link($post)); ?>"><time class="entry-date published" datetime="<?php echo esc_url(coachable_archive_link($post)); ?>"><?php echo esc_html(the_time( get_option( 'date_format' ) )); ?></time></a>
                                              </li>
                                        </ul>
                                    </article>
                                <?php $loop--; endif; endwhile;
                        wp_reset_postdata(); ?>
                    </div>
        <?php endif;


                        ?>
                </div>
            </div>
</div>
