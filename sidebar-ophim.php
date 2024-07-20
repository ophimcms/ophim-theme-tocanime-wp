<div class="col-md-3 sidebar">
    <div class="sidebar-container cscroller">
<?php
    if ( is_active_sidebar('left-sidebar') ) {
        dynamic_sidebar( 'left-sidebar' );
    } else {
        _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
    } ?>
    </div>
</div>

