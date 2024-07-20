<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/plugins/bootstrap4/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/style.css" />
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        #playlists>div:not(:first-child) {
            margin-top: 30px
        }

        #nf-billboard-nav .active {
            font-size: 1.2em;
            color: #fff
        }

        #nf-billboard-nav span {
            cursor: pointer
        }
    </style>
</head>
<body class="">
<?php include_once THEME_URL.'/templates/header.php' ?>
