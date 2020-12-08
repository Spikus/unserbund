<?php
/**
Template Name: Home Page
 */

get_header();
?>
<div id="primary" class="content-area">
    <div id="content" class="site-content container" role="main">
        <div class="col-md-12">
            <div class="node">
                <h2 class="avansome">Выберите своего ротвейлера</h2>
                <?php  $new_query = new WP_Query(); $new_query->query('post_type=post&showposts=15'.'&paged='.$paged) ?>
                <?php  while ($new_query->have_posts()) : 
                    $new_query->the_post() ?>
                <article class="rotNew">
                    <h3 class="rotNew_title">
                    <?php the_title(); ?>
                    </h3>
                    <div class="col-md-3">
                        <figure class="newThumb">
                             <?php the_post_thumbnail('medium'); ?>
                         </figure>
                    </div>
                    <div class="col-md-9">
                        <ul class="nav nav-tabs nav-justified" id="mediaTabs">
                            <li class="active"><a href="#info<?php the_ID(); ?>" data-toggle="tab">Информация</a></li>
                            <li><a href="#pedigree<?php the_ID(); ?>" data-toggle="tab">Родословная</a></li>
                            <li><a href="#photos<?php the_ID(); ?>" data-toggle="tab">Фото</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active info" id="info<?php the_ID(); ?>">
                                <?php the_content() ?>
                            </div>
                            <div class="tab-pane pedigree" id="pedigree<?php the_ID(); ?>">
                                <?php echo get_field('first') ?>
                            </div>
                            <div class="tab-pane photos" id="photos<?php the_ID(); ?>">
                                <?php $var_gallery = get_field('album') ?>
                                <?php foreach($var_gallery as $img): ?>
                                    <a rel="lightbox[roadtrip]" href="<?php echo $img["sizes"]["large"] ?>" rel="lightbox" data-link="#" >
                                        <img class="img-thumbnail" src="<?php echo $img["sizes"]["thumbnail"] ?>" alt="ротвейлер <?php get_the_title() ?>">
                                    </a>      			
                                <?php endforeach; ?>
                            </div>
                    </div>
                </article>
                <?php endwhile; ?>
                <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-12">

                    <header class="entry-header">
                        <h1 class="avansome"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </div>
                <?php endwhile; ?>
            </div>
        </div><!-- #content -->
    </div>
</div>

<?php get_footer(); ?>