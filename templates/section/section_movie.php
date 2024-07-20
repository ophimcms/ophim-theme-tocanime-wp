<div>
    <div class="title border-bottom">
        <h2><?= $title; ?></h2>
        <?php if ($slug) : ?>
            <span class="title-more">
                <a href="<?= $slug; ?>" title="<?= $title; ?>">
                    Xem tất cả <i class="fa fa-fw fa-caret-right"></i>
                </a>
            </span>
        <?php endif; ?>
    </div>
    <div class="playlist-content">
        <div class="row">
            <?php $loop =0; while ($query->have_posts()) : $query->the_post(); $loop++;
            include THEMETEMPLADE.'/section/section_movie_item.php';
            endwhile; ?>
        </div>
    </div>
</div>
