
<?php
get_header();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="playlists">
                <div>
                    <div class="row">

                        <?php
                        while ( have_posts() ) : the_post();
                            ?>

                            <div class="group-film">
                                <h2><?php the_title(); ?>
                                </h2>
                                <div class="">
                                    <?php  the_content(); ?>
                                </div>

                            </div>


                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <?php get_sidebar('ophim'); ?>
        </div>

    </div>
</section>

<?php
get_footer();
?>
