<?php get_header(); ?>

<div class="container main">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="col-sm-8">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php if ( is_sticky() ) : ?>
                <div class="panel panel-bighub">
                    <div class="panel-heading" role="tab" id="list-<?php the_ID(); ?>">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapse-<?php the_ID(); ?>">
                            <h2><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> <?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                        </a>
                    </div>
                    <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list-<?php the_ID(); ?>">
                        <div class="panel-body">
                            <p><span class="glyphicon glyphicon-link" aria-hidden="true"></span> <a href="<?php the_permalink() ?>" rel="nofollow">阅读原文</a></p>
                            <p class="hidden"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
                            <p><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <?php the_category(' ') ?> <?php the_tags('',''); ?></p>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                <div class="panel panel-bighub">
                    <div class="panel-heading" role="tab" id="list-<?php the_ID(); ?>">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapse-<?php the_ID(); ?>">
                        <h2><?php the_title(); ?> <small><?php the_time('n月j日') ?></small></h2>
                        <p><?php the_excerpt(); ?></p>
                        </a>
                    </div>
                    <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list-<?php the_ID(); ?>">
                        <div class="panel-body">
                            <?php $url = get_post_meta($post->ID, '原文链接', true);
                            if ($url) {
                                echo '<p><span class="glyphicon glyphicon-link" aria-hidden="true"></span> <a href="'.$url.'" rel="nofollow" target="_blank">阅读原文</a></p>';
                            } ?>

                            <p class="hidden"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
                            <p><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <?php the_category(' ') ?> <?php the_tags('',''); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <nav class="text-center">
                <?php pagination($query_string); ?>
            </nav>
        </div>
        <!--左右-->
        <div class="col-sm-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>