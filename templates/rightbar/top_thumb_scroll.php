<div class="sidebar-widget">
    <div class="title border-bottom-dash">
        <h2><?= $title; ?></h2>
    </div>
    <div class="sidebar-widget-content scroller" data-sheight="500">
        <?php $loop =0; while ($query->have_posts()) : $query->the_post(); $loop++;  ?>
            <div class="card-v-item clearfix">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="card-item-left">
                        <div class="card-item-img lazy img r43"
                            data-original="<?= op_get_thumb_url() ?>">
                            <div class="card-item-overlay"></div>
                        </div>
                    </div>
                    <div class="card-item-right">
                        <div class="card-item-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?= op_get_original_title() ?></p>
                            <p class="card-item-highlight"><?= op_get_episode() ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php   endwhile; ?>
    </div>
</div>
