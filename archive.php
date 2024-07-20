<?php
get_header();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="playlists">
                <h1 class="title border-bottom">
                    <?= single_tag_title(); ?>
                </h1>
                <div>
                    <div class="row">

                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post(); ?>
                                <div class="TpRwCont" style="margin-bottom: 20px">
                                    <div class="col-md-12 blogShort">

                                        <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                                 alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                                        <br>
                                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                        <article>
                                            <p>
                                                <?php the_excerpt(); ?>
                                            </p></article>
                                        <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                                    </div>

                                </div>
                            <?php }
                            wp_reset_postdata();
                        } ?>
                    </div>
                </div>
                <?php ophim_pagination(); ?>
            </div>
            <?php get_sidebar('ophim'); ?>
        </div>

    </div>
</section>

<?php
get_footer();
?>

