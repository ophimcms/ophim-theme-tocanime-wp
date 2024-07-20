<div class="container">
    <div class="bn-carousel tani-carousel">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="bn-carousel-cell">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <div class="bn-carousel-img lazy carousel-img" data-original="<?= op_get_poster_url() ?>">
                </div>
                <div class="bn-carousel-content">
                    <p class="bn-carousel__subtext"><?= op_get_original_title() ?></p>
                    <h3>
                        <?php the_title(); ?> </h3>
                    <p class="bn-carousel__engtitle">
                    </p>
                    <div class="bn-carousel__latest">
                        <?= op_get_episode() ?> - <?= op_get_lang() ?> <?= op_get_quality() ?>
                    </div>
                </div>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</div>

