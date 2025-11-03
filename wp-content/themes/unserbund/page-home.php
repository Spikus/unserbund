<?php
/**
Template Name: Home Page
 */
get_header();
?>
<div class="row">
    <?php echo do_shortcode('[transitionslider id="1"]'); ?>
</div>
<div id="primary" class="content-area">
    <div id="content" class="site-content container" role="main">
        <div class="row">
            <div class="col-md-8">
                <div class="node">
                    <h2 class="avansome">Новости Питомника</h2>
                    <?php $new_query = new WP_Query(); ?>
                    <?php $new_query->query('post_type=post&showposts=25'.'&paged='.$paged); ?>
                    <?php while ($new_query->have_posts()) : ?>
                        <?php $new_query->the_post();  ?>
                            <article class="rotNew">
                                <time class="dates_post">
                                    <strong>
                                        <?php echo the_date('d') ?>
                                    </strong>
                                    <span>
                                        <?php echo the_time('M'); ?>
                                    </span>
                                </time>
                                <div class="col-md-5 col-sm-5">
                                    <a href="<?php the_permalink() ?>" class="noHover">
                                        <figure class="newThumb">
                                            <?php the_post_thumbnail('medium'); ?>
                                            <span class="shader glyphicon glyphicon-zoom-in"></span>
                                        </figure>
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <h3>
                                        <a href="<?php the_permalink() ?>" class="noHover">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <small>
                                        <?php the_excerpt() ?>
                                    </small>
                                    <?php $dogs=get_field('dogs') ?>
                                    <?php if ($dogs): ?>
                                        <b> Ротвейлеры в новости</b>
                                        <ul>
                                            <?php foreach ($dogs as $object): ?>
                                            <li class="dogLink">
                                                <a href="<?php echo get_permalink($object['dog']->ID); ?>" class="noHover">
                                                    <?php echo $object['dog']->post_title ?>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </article>
                    <?php endwhile; ?>
                    <div id="ajaxAdd" class="clearfix"> </div>
                    <a id="pagination" href="./wp-content/themes/unserbund/ajax.php" data-page="1">Показать Ещё <span
                            class="glyphicon glyphicon-refresh"></span></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="node">
                    <h2 class="avansome">Материалы</h2>
                    <ul class="nav nav-tabs nav-justified" role="tablist" id="mediaTabs">
                        <li class="active">
                            <a href="#photo" role="tab" data-toggle="tab">Фото</a>
                        </li>
                        <li>
                            <a href="#video" role="tab" data-toggle="tab">Видео</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="photo"><?php  side_photos(); ?></div>
                        <div class="tab-pane fade" id="video"><?php side_video() ?></div>
                    </div>
                </div>

                <div class="node">
                    <h2 class="avansome">Мы на Facebook</h2>
                    <div id="fb-root"></div>
                    <div class="fb-page" data-href="https://www.facebook.com/unserbund/" data-tabs="timeline"
                        data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                        data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/unserbund/">
                                <a href="https://www.facebook.com/unserbund/">Vadim Komarov Kennel Unserbund</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #content -->
</div>
</div>

<?php get_footer(); ?>