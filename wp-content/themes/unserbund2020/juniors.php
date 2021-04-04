<?php
/**
Template Name: Junior Page
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content container" role="main">


        <div class="col-md-8">
            <div class="node">
                <h1 class="avansome">Юниоры Ротвейлеры (Возможна продажа - Дорого)</h1>
                <?php
        $args = array(
			'numberposts' => -1,
			'post_type' => 'dog',
			'meta_key' => 'in_kennel',
			'meta_value' => '1');
        $mydogs = get_posts($args) ;

        foreach ($mydogs as $post) {
            setup_postdata($post);
            if ($post->Category=='junior') { ?>
                <div class="row dogrow">
                    <div class="col-md-4 wow fadeInLeft text-center">
                        <div class="dogThumbnail">
                            <?php the_post_thumbnail('dog-show');?>
                        </div>

                    </div>
                    <div class="col-md-8 wow fadeInTop">
                        <h3><a href="<?php echo get_permalink()?>" class="noHover Nick"><?php echo get_the_title()?></a>
                        </h3>
                        <?php the_excerpt() ?>
                    </div>
                </div><?php
        }
        }
        ?>
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