

<?php
if ( is_active_sidebar('widget-footer') ) {
    dynamic_sidebar( 'widget-footer' );
} else {
    _e('This is widget footer. Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
</body>

<script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/main.js"></script>
<script>
    $(window).load(function() {
        WebFont.load({
            google: {
                families: ['Montserrat&subset=vietnamese']
            },
            custom: {
                families: ['FontAwesome'],
                urls: ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css']
            }
        });
    });
</script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/plugins/lazyload_v2/intersection-observer.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/plugins/lazyload_v2/lazyload.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>

<?php wp_footer(); ?>
</html>