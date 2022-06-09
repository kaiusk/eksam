<?php
get_header();
?>
    <div class="wrap">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <div class="item">
                    <div class="employee">

                        <div class="image">
                            <?php echo get_the_post_thumbnail(); ?>
                        </div>
                        <h2><?php the_title(); ?></h2>
                        <div class="job"><?php echo get_post_meta(get_the_ID(), 'amet', true); ?></div>
                        <?php the_content(); ?>
                        <div class="contact"><a
                                    href="<?php echo get_post_meta(get_the_ID(), 'kontakt', true); ?>"><?php echo get_post_meta(get_the_ID(), 'kontakt', true); ?></a>
                        </div>
                    </div>
                </div>
            <?php }
        }
        ?>
    </div>
<?php
get_footer();