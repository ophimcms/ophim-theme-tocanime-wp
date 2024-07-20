<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<footer class="border-top">
                    <div class="footer container d-flex justify-content-between">
                    <div class="logo align-self-center">
                    <a href="#">
                    <img class="lazy" data-original="https://ophim9.cc/logo-ophim-5.png"><br>
                    <span>Nơi nuôi dưỡng <b>tâm hồn Anime</b></span>
                    </a>
                    </div>
                    </div>
                    </footer>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);