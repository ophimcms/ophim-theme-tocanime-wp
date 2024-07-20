<?php
get_header();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="playlists">
                <h1 class="title border-bottom">
                    Tìm kiếm : <?php echo "$s"; ?>
                </h1>
                <div>
                    <div class="row">

                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post(); ?>
                                <?php include THEMETEMPLADE . '/section/section_movie_item.php' ?>

                            <?php } wp_reset_postdata(); }else { ?>
                            <div class="col-sm-12">
                                <h4 class="alert alert-info" role="alert">
                                    Không có dữ liệu cho mục này...
                                </h4>
                            </div>
                        <?php } ?>
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
