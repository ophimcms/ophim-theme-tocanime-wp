<style>
    .dropdown-menu {
        background-color: #2c2c2c;
    }
    @media only screen and (min-width: 576px) {
        .dropdown-menu {
            width: 600px;
        }
    }
    .dropdown-item {
        color: #fff;
    }
    ul.navbar-nav {
        font-size: 16px;
    }
</style>
<style>
    #result{
        margin-top: 20px;
        background-color: #333333;
        list-style-type: none;
        width: 400px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
    }
    .column {
        float: left;
        padding: 5px;
    }

    .left {
        text-align: center;
        width: 20%;
    }

    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }
    .rowsearch:hover {
        background-color: #1e1b1b;
    }
</style>
<header class="border-bottom">
    <nav class="navbar navbar-expand-md container navbar-dark">
        <a href="/" class="navbar-brand">
            <?php op_the_logo('max-width:50px') ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php
                $menu_items = wp_get_menu_array('primary-menu');
                foreach ($menu_items as $key => $item) : ?>
                    <?php if (empty($item['children'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?= $item['title'] ?> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <div class="row">
                        <?php foreach ($item['children'] as $k => $child): ?>
                                    <li class="col-6 col-lg-4"><a class="dropdown-item" href="<?= $child['url'] ?>"><?= $child['title'] ?></a></li>
                        <?php endforeach; ?>
                                </div>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="search-box">
            <form action="/" method="GET" class="top-search" autocomplete="off">
                <input type="text" id="search-nav" class="form-control" name="s" placeholder="Tìm kiếm phim..." onkeyup="fetch()"
                       value="<?php echo "$s"; ?>">
                <button type="submit" class="top-search__btn-search"><i class="fa fa-fw fa-search"></i></button>
            </form>
            <div class="" id="result"></div>
        </div>
    </nav>
</header>