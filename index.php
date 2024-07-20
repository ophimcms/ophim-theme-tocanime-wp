<?php
get_header();
?>
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/plugins/flickity/flickity.min.css" />
<?php if ( is_active_sidebar('widget-slider-poster') ) {
    dynamic_sidebar( 'widget-slider-poster' );
} else {
    _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="playlists">
                <?php if ( is_active_sidebar('widget-area') ) {
                    dynamic_sidebar( 'widget-area' );
                } else {
                    _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
                }
                ?>
            </div>
            <?php get_sidebar('ophim'); ?>
        </div>

    </div>
</section>
<?php
add_action('wp_footer', function (){?>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/plugins/flickity/flickity.smart.min.js"></script>
    <script>
        $(function () {
            var banner = $(".bn-carousel").smartflickity({
                contain: true,
                prevNextButtons: true,
                groupCells: true,
                autoPlay: 3500,
                wrapAround: true,
            });
        });
    </script>
<?php }) ?>

<?php
get_footer();
?>
