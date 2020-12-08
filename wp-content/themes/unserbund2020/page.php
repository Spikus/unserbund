<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content container" role="main">


        <div class="col-md-8">
            <div class="node">


                <?php /* The loop */ ?>
                <?php while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php if (has_post_thumbnail() && ! post_password_required()) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php endif; ?>

                        <h1 class="avansome"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->


                    <?php endwhile; ?>

            </div>
        </div><!-- #content -->
        <div class="col-md-4">
            <div class="node wow fadeInRight">
                <h2 class="avansome">Материалы</h2>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist" id="mediaTabs">
                    <li class="active"><a href="#photo" role="tab" data-toggle="tab">Фото</a></li>
                    <li><a href="#video" role="tab" data-toggle="tab">Видео</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="photo"><?php  side_photos(); ?></div>
                    <div class="tab-pane fade" id="video"><?php side_video() ?></div>
                </div>
            </div>
            <div style="margin-top:30px;"></div>
            <div class="node wow fadeInRight">
                <h2 class="avansome">Мы на Facebook</h2>
                <div id="fb-root"></div>
                <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-page" data-href="https://www.facebook.com/unserbund/" data-tabs="timeline"
                    data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                    data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/unserbund/"><a
                                href="https://www.facebook.com/unserbund/">Vadim Komarov Kennel Unserbund</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>