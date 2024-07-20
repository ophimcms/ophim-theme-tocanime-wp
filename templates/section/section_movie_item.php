<div class="col-lg-3 col-md-4 col-6">
    <div class="card-item">
        <div class="card-item-img lazy r43 img"
            data-original="<?= op_get_thumb_url() ?>">
            <a class="card-item__img-href" title="<?php the_title(); ?>"
                href="<?php the_permalink(); ?>">
                <i class="fa fa-play"></i>
            </a>
            <div class="card-item-overlay">
                <div class="card-item-badget rtl">
                    <?= op_get_episode() ?>
                </div>
            </div>
        </div>
        <div class="card-item-content">
            <h3>
                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
            </h3>
            <p class="elipsis">
                <?= op_get_original_title() ?>
            </p>
        </div>
    </div>
</div>
