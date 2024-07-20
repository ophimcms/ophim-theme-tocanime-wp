<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/plugins/flickity/flickity.min.css" />
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="video-detail">
                    <style>
                        .video-wrap {
                            position: relative
                        }

                        .video-preload {
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background-color: #202125;
                            z-index: 2;
                            padding: 20px;
                            border: 1px dotted rgba(210, 118, 99, .5)
                        }

                        .video-preload p {
                            font-size: 20px
                        }

                        .vid-servers {
                            background: #111;
                            border: 1px solid #d27663;
                            position: relative;
                            padding-left: 100px
                        }

                        .vid-servers>span {
                            vertical-align: middle;
                            display: flex;
                            align-items: center;
                            background-color: #d27663;
                            border-radius: 3px;
                            width: 100px;
                            position: absolute;
                            left: 0;
                            top: 0;
                            height: 100%
                        }

                        .vid-servers .btn {
                            font-size: 13px;
                            text-transform: uppercase;
                            background-color: #444;
                            color: #fff
                        }

                        .vid-servers .btn.active {
                            background-color: #d27663
                        }

                        .vid-servers>span b {
                            margin: 0 auto
                        }
                        #wrapper-video {
                            height: 625px !important;
                        }
                        @media only screen and (max-width: 500px) {
                            #wrapper-video {
                                height: 210px !important;
                            }
                        }
                        @media only screen and (min-width: 501px) and (max-width: 767px) {
                            #wrapper-video {
                                height: 286px !important;
                            }
                        }
                        @media only screen and (min-width: 768px) and (max-width: 991px) {
                            #wrapper-video {
                                height: 388px !important;
                            }
                        }
                        @media only screen and (min-width: 992px) and (max-width: 1199px) {
                            #wrapper-video {
                                height: 525px !important;
                            }
                        }
                    </style>
                    <div class="video-wrap">
                        <div id="wrapper-video">
                        </div>
                    </div>
                    <div class="vid-servers">
                        <span><b>Link dự phòng</b></span>
                        <button onclick="chooseStreamingServer(this)" data-type="m3u8"
                                data-id="<?= episodeName() ?>" data-link="<?= m3u8EpisodeUrl() ?>"
                                class="streaming-server mx-1 my-1 btn btn-effect">Link #1</button>
                        <button onclick="chooseStreamingServer(this)" data-type="embed"
                                data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>"
                                class="streaming-server mx-1 my-1 btn btn-effect">Link #2</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="playlists">
                <div>
                    <div class="box">
                        <div class="pl-carousel tani-carousel" id="pl-contain">
                            <div class="pl-carousel__item active" data-type="eps">
                                Danh sách tập phim
                            </div>
                        </div>
                        <div class="ss-container">
                            <div class="ss-item" data-type="eps">
                                <?php foreach (episodeList() as $key => $server) { ?>
                                <div id="me-newest" class="">
                                    <p class="box-header">
                                        <span>Danh sách tập <b><?= $server['server_name'] ?></b></span>
                                    </p>
                                    <div class="me-list scroller" style="max-height: 200px;">
                                        <?php foreach ($server['server_data'] as $list) {
                                            $current = '';
                                            if (slugify($list['name']) == episodeName()&& episodeSV() == $key) {
                                                $current = 'active';
                                            }
                                            echo '
                                            <a class="me-item ' . $current . '" href="' . hrefEpisode($list["name"],$key) . '"
                                              >
                                                ' . $list['name'] . '
                                            </a>
                                        ';
                                        } ?>


                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="ss-item scroller"></div>
                        </div>
                    </div>
                </div>
                <div class="movie-title title">
                    <div class="row">
                        <h1 class="col-sm-12">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <p class="movie-title__eps">Tập <?= episodeName() ?></p>
                        </h1>
                        <div class="col-sm-12">
                            <div id="movies-rating-star"></div>
                            (<?= op_get_rating() ?>
                            sao
                            /
                            <?= op_get_rating_count() ?> đánh giá)
                        </div>
                    </div>
                </div>
                <div class="box mt30">
                    <p class="box-header">
                        Thông tin phim
                    </p>
                    <div class="box-content">
                        <p><?php the_content();?></p>
                    </div>
                </div>
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
<?php add_action('wp_footer', function () {?>

    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>
    <?php op_jwpayer_js(); ?>

    <script>
        var episode_id = '<?= episodeName() ?>';
        const wrapper = document.getElementById('wrapper-video');
        const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

        function chooseStreamingServer(el) {
            const type = el.dataset.type;
            const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
            const id = el.dataset.id;

            episode_id = id;

            Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                server.classList.remove('active');
            })
            el.classList.add('active');
            renderPlayer(type, link, id);
        }

        function renderPlayer(type, link, id) {
            if (type == 'embed') {
                if (vastAds) {
                    wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                    const fake_player = jwplayer("fake_jwplayer");
                    const objSetupFake = {
                        key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                        aspectratio: "16:9",
                        width: "100%",
                        file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                        volume: 100,
                        mute: false,
                        autostart: true,
                        advertising: {
                            tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };
                    fake_player.setup(objSetupFake);
                    fake_player.on('complete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adSkipped', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adComplete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                } else {
                    if (wrapper) {
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    }
                }
                return;
            }

            if (type == 'm3u8' || type == 'mp4') {
                wrapper.innerHTML = `<div id="jwplayer"></div>`;
                const player = jwplayer("jwplayer");
                const objSetup = {
                    key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                    aspectratio: "16:9",
                    width: "100%",
                    image: "<?= op_get_poster_url() ?>",
                    file: link,
                    playbackRateControls: true,
                    playbackRates: [0.25, 0.75, 1, 1.25],
                    sharing: {
                        sites: [
                            "reddit",
                            "facebook",
                            "twitter",
                            "googleplus",
                            "email",
                            "linkedin",
                        ],
                    },
                    volume: 100,
                    mute: false,
                    autostart: true,
                    logo: {
                        file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                        link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                        position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                    },
                    advertising: {
                        tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua"
                    }
                };

                if (type == 'm3u8') {
                    const segments_in_queue = 50;

                    var engine_config = {
                        debug: !1,
                        segments: {
                            forwardSegmentCount: 50,
                        },
                        loader: {
                            cachedSegmentExpiration: 864e5,
                            cachedSegmentsCount: 1e3,
                            requiredSegmentsPriority: segments_in_queue,
                            httpDownloadMaxPriority: 9,
                            httpDownloadProbability: 0.06,
                            httpDownloadProbabilityInterval: 1e3,
                            httpDownloadProbabilitySkipIfNoPeers: !0,
                            p2pDownloadMaxPriority: 50,
                            httpFailedSegmentTimeout: 500,
                            simultaneousP2PDownloads: 20,
                            simultaneousHttpDownloads: 2,
                            // httpDownloadInitialTimeout: 12e4,
                            // httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpDownloadInitialTimeout: 0,
                            httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpUseRanges: !0,
                            maxBufferLength: 300,
                            // useP2P: false,
                        },
                    };
                    if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                        var engine = new p2pml.hlsjs.Engine(engine_config);
                        player.setup(objSetup);
                        jwplayer_hls_provider.attach();
                        p2pml.hlsjs.initJwPlayer(player, {
                            liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                            maxBufferLength: 300,
                            loader: engine.createLoaderClass(),
                        });
                    } else {
                        player.setup(objSetup);
                    }
                } else {
                    player.setup(objSetup);
                }


                const resumeData = 'OPCMS-PlayerPosition-' + id;
                player.on('ready', function() {
                    if (typeof(Storage) !== 'undefined') {
                        if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                            console.log("No cookie for position found");
                            var currentPosition = 0;
                        } else {
                            if (localStorage[resumeData] == "null") {
                                localStorage[resumeData] = 0;
                            } else {
                                var currentPosition = localStorage[resumeData];
                            }
                            console.log("Position cookie found: " + localStorage[resumeData]);
                        }
                        player.once('play', function() {
                            console.log('Checking position cookie!');
                            console.log(Math.abs(player.getDuration() - currentPosition));
                            if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                                5) {
                                player.seek(currentPosition);
                            }
                        });
                        window.onunload = function() {
                            localStorage[resumeData] = player.getPosition();
                        }
                    } else {
                        console.log('Your browser is too old!');
                    }
                });

                player.on('complete', function() {
                    <?php if(nextEpisodeUrl()){ ?>
                    window.location.href = "<?= nextEpisodeUrl() ?>";
                    <?php }?>
                    if (typeof(Storage) !== 'undefined') {
                        localStorage.removeItem(resumeData);
                    } else {
                        console.log('Your browser is too old!');
                    }
                })

                function formatSeconds(seconds) {
                    var date = new Date(1970, 0, 1);
                    date.setSeconds(seconds);
                    return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const episode = '<?= episodeName() ?>';
            let playing = document.querySelector(`[data-id="${episode}"]`);
            if (playing) {
                playing.click();
                return;
            }

            const servers = document.getElementsByClassName('streaming-server');
            if (servers[0]) {
                servers[0].click();
            }
        });
    </script>

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


    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/plugins/flickity/flickity.smart.min.js"></script>
<?php }) ?>
