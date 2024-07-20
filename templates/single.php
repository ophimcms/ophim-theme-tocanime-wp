<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/plugins/flickity/flickity.min.css" />

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="playlists">

                <div class="row mb20">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="movie-thumb">
                            <img class="mb20 lazy img img-fluid" title="<?php the_title(); ?>"
                                 alt="<?php the_title(); ?> - <?= op_get_original_title() ?>"
                                 data-original="<?= op_get_thumb_url() ?>">
                            <?php if(watchUrl()) :?>
                                <a class="btn btn-watch btn-primary" href="<?= watchUrl() ?>">Xem phim</a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <div class="movie-title-box">
                            <h1 class="movie-title title"><?php the_title(); ?></h1>
                            <span class="movie-info text-gray">
                    <label><?= op_get_original_title() ?> (<?= op_get_year() ?>)</label>
                    <div class="movie-rating">
                        <div id="movies-rating-star"></div>
                        (<?= op_get_rating() ?>
                        sao
                        /
                        <?= op_get_rating_count() ?> đánh giá)
                    </div>
                </span>
                        </div>
                        <div class="movie-des-box scroller">
                            <dl class="movie-des">
                                <dt>Trạng thái:</dt>
                                <dd class="text-danger"><?= op_get_episode() ?></dd>
                                <br>
                                <dt>Số tập :</dt>
                                <dd><?= op_get_total_episode() ?></dd>
                                <br>
                                <dt>Ngôn ngữ :</dt>
                                <dd><?= op_get_lang() ?> <?= op_get_quality() ?> </dd>
                                <br>
                                <dt>Độ dài :</dt>
                                <dd><?= op_get_runtime() ?></dd>
                                <br>
                                <dt>Thể loại :</dt>
                                <dd>
                                    <ul class="color-list">
                                        <?= op_get_genres(', ') ?>
                                    </ul>
                                </dd>
                                <br>
                                <dt>Quốc gia :</dt>
                                <dd>
                                    <ul class="color-list">
                                        <?= op_get_regions() ?>
                                    </ul>
                                </dd>
                                <br>
                                <dt>Diễn viên :</dt>
                                <dd>
                                    <ul class="color-list">
                                        <?= op_get_actors(10,', ') ?>
                                    </ul>
                                </dd>
                                <br>
                                <dt>Đạo diễn :</dt>
                                <dd>
                                    <ul class="color-list">
                                        <?= op_get_directors(10,', ') ?>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                        <?php if (op_get_showtime_movies()) { ?>
                        <div class="air-date mb-3">
                            <b>Lịch chiếu: </b><?= op_get_showtime_movies() ?>
                        </div>
                        <?php } ?>

                        <?php if (op_get_notify()) { ?>
                        <div class="air-date mb-3">
                            <b>Ghi chú: </b><?= op_get_notify() ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="box mt30">
                    <p class="box-header">
                        Nội dung phim
                    </p>
                    <div class="box-content">
                        <p><?=the_content();?></p>
                    </div>
                    <b>Tags: </b>
                    <?= op_get_tags(', ')?>
                </div>
                <?php if (op_get_trailer_url()) {
                    parse_str( parse_url( op_get_trailer_url(), PHP_URL_QUERY ), $my_array_of_vars );
                    $video_id = $my_array_of_vars['v'];

            ?>
                <div class="box mt30">
                    <p class="box-header">
                        Trailer
                    </p>
                    <div id="trailer">
                        <script>
                            $(window).load(function() {
                                $("#trailer").html('' + '<div style="max-width: 640px; margin: 0 auto;">' +
                                    '	<div style="position: relative;padding-bottom: 56.25%;height: 0;">' +
                                    '    	<iframe src="https://www.youtube.com/embed/<?= $video_id ?>" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"' +
                                    '    		frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
                                    '    </div>' + '</div>');
                            });
                        </script>
                    </div>
                </div>
                <?php     } ?>
                <div class="box mt30">
                    <h3 class="title box-header"> Bình luận </h3>
                    <div style="width: 100%; background-color: #fff">
                        <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div></div>

                </div>

                <div class="box" style="margin-bottom: 10px;">
                    <h2 class="box-header">Có thể bạn quan tâm</h2>
                    <div class="rcm-carousel tani-carousel">
                        <?php
                        $postType = 'ophim';
                        $taxonomyName = 'ophim_genres';
                        $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                        if ($taxonomy) {
                            $category_ids = array();
                            foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                            $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                            $my_query = new wp_query($args);
                            if ($my_query->have_posts()):
                                while ($my_query->have_posts()):$my_query->the_post(); ?>

                                    <div class="rcm-carousel-cell" style="width: 20%;padding: 0 5px;min-width: 150px;">
                                        <div class="card-item">
                                            <div class="card-item-img lazy r169 img"
                                                 data-original="<?= op_get_poster_url() ?>">
                                                <a class="card-item__img-href" title="<?php the_title(); ?>"
                                                   href="<?php the_permalink(); ?>">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                                <div class="card-item-overlay">
                                                    <div class="card-item-badget rtl"><?= op_get_episode() ?></div>
                                                </div>
                                            </div>
                                            <div class="card-item-content">
                                                <h3>
                                                    <a title="<?php the_title(); ?>"
                                                       href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <p class="elipsis">
                                                    <?= op_get_original_title() ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        }
                        ?>

                    </div>
                    <script>
                        $(function() {
                            var rcm = $(".rcm-carousel").smartflickity({
                                contain: true,
                                prevNextButtons: true,
                                groupCells: true,
                                autoPlay: 5000,
                                wrapAround: true,
                            });
                        });
                    </script>
                </div>

            </div>
            <?php get_sidebar('ophim'); ?>
        </div>

    </div>
</section>
<?php add_action('wp_footer', function (){?>

    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/plugins/flickity/flickity.smart.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.js"></script>
    <link href="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.css" rel="stylesheet" type="text/css" />
    <script>
        var rated = false;
        $('#movies-rating-star').raty({
            score: <?= op_get_rating() ?>,
        number: 10,
            numberMax: 10,
            hints: ['quá tệ', 'tệ', 'không hay', 'không hay lắm', 'bình thường', 'xem được', 'có vẻ hay', 'hay',
            'rất hay', 'siêu phẩm'
        ],
            starOff: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-off.png',
            starOn: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-on.png',
            starHalf: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-half.png',
            click: function(score, evt) {
            if (rated) return
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php')?>',
                    type: 'POST',
                    data:{
                        action: "ratemovie",
                        rating: score,
                        postid: '<?php echo get_the_ID(); ?>',
                    },
                }).done(function (data) {
                    rated = true;
                    $('#movies-rating-star').data('raty').readOnly(true);
                    alert(`Bạn đã đánh giá ${score} sao cho phim này!`);
                });


        }
        });
    </script>
<?php }) ?>


