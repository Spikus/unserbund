<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();
?>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&appId=362931457130685&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div id="primary" class="content-area">
    <div id="content" class="site-content container" role="main">
        <div class="node">
            <?php /* The loop */ ?>
			<?php while (have_posts()) : the_post();?>
			<?php $results = get_field('results') ?>
			<?php $video = get_field('video') ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-header clearfix">
                    <h1 class="avansome">Ротвейлер <?php the_title() ?>
						<div class="fb-like pull-right" 
								data-href="<?php echo get_page_link(); ?>" 
								data-layout="button"
								data-action="like" 
								data-show-faces="false" 
								data-share="false" />
                    </h1>
                    <div class="col-md-3 text-center">
                        <div class="dogThumbnail">
                            <?php the_post_thumbnail('dog-show');?>
                        </div>
                    </div>
                    <div class="col-md-9">
						<?php the_content() ?>
                    </div>
				</div><!-- .entry-header -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" id="mediaTabs">
                    <li class="active"><a href="#pedigree" data-toggle="tab">Родословная</a></li>
                    <li><a href="#photo" data-toggle="tab">Фото</a></li>
                    <?php if ($results): ?>
					<li><a href="#shows" data-toggle="tab">Выставки</a></li>
					<?php endif; ?>
					<?php if ($video): ?>
						<li><a href="#video" data-toggle="tab">Видео</a></li>
					<?php endif; ?>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane" id="photo">
                        <?php $var_gallery = get_field('album'); ?>
						<?php foreach ($var_gallery as $img): ?>
							<a rel="lightbox[roadtrip]" href="<?php echo $img["sizes"]["large"] ?>" rel="lightbox" data-link="#" title="<?php the_title() ?>" >
								<img class="img-thumbnail" src="<?php echo $img["sizes"]["medium"] ?>" alt="ротвейлер <?php the_title() ?>">
							</a>
  						<?php endforeach; ?>
                    </div>
                    <div class="tab-pane  active" id="pedigree">
						<div class="pedigree">
							<?php echo get_field('pedigree') ?>
						</div>
                    </div>
					<?php if ($results): ?>
						<div class="tab-pane" id="shows">
							<?php echo $results ?>
						</div>
					<?php endif; ?>
					<?php if ($video): ?>
						<div class="tab-pane" id="video">
							<?php echo $video ?>
						</div>
					<?php endif; ?>
                </div>


            </article><!-- #post -->

            <?php endwhile; ?>
        </div>
    </div>
</div><!-- #primary -->
<!-- Button trigger modal -->
<button id="errorBut" class="btn btn-warning btn-lg hidden-xs" data-toggle="modal" data-target="#myModal">
    Нашли ошибку?
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Закрыть</span></button>
                <h4 class="modal-title" id="myModalLabel"> Нашли ошибку? Укажите её и мы не медленно исправим.</h4>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="4029" title="Форма Ошибки"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>