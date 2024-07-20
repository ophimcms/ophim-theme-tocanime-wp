<div class="sidebar-widget">
    <div class="title border-bottom-dash">
        <h2><?php echo $title; ?></h2>
    </div>
    <div class="sidebar-widget-content">
        <div class="tab-content">
            <div id="sbb-weekly">
<?php $loop =0; while ($query->have_posts()) : $query->the_post(); $loop++;  ?>
                    <div class="sbb-item">
                        <div class="sbb-item-number"><?= $loop ?></div>
                        <div class="sbb-item-thumb">
                            <div class="img lazy r43"
                                data-original="<?= op_get_thumb_url() ?>">
                            </div>
                        </div>
                        <div class="sbb-item-content">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <p><?= op_get_episode() ?></p>
                            </a>
                        </div>
                    </div>
                <?php   endwhile; ?>
            </div>
        </div>
    </div>
</div>
