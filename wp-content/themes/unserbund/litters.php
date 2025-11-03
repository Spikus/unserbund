<?php
/**
Template Name: Litters Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">
			
		
		<div class="col-md-8" >
		<div class="node">
		<?php 
		$args = array(
	'numberposts' => -1,
	'post_type' => 'litters',
);	
		$mydogs = get_posts( $args ) ;	
		foreach ($mydogs as $post){
		setup_postdata($post);
		 if ( has_post_thumbnail()) {
   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');}
		echo '<article class="wow fadeInLeft rotNew"> 
				<div class="col-md-5 col-sm-5">	<a href="' . $large_image_url[0] . '"  class="noHover" data-link="#" rel="lightbox" title="'.get_the_title().'">
 <figure class="newThumb">
	';
 the_post_thumbnail('dog-thumb');
echo '<span class="shader glyphicon glyphicon-zoom-in"></span></figure></a></div><div class="col-md-7 col-sm-7"><h3>';	
 the_title();

 echo '</h3>';
  echo " Дата Рождения:".date("d/m/y",strtotime(get_field('litters_birthday')));
 $father=get_field('father');
 $mother=get_field('mother');
echo '<h4><a href="'.$father->guid.'" class="noHover red">'.$father->post_title.'</a> x <a href="'.$mother->guid.'" class="noHover red">'.$mother->post_title.'</a></h4>';
 echo '
 <b> Собаки : </b>
 <ul>';
 $dogs=get_field('dogs');

 if ($dogs) {
 foreach ($dogs as $object) {
 echo '<li class="dogLink"><a href="'.$object['the_dog']->guid.'" class="noHover">'.$object['the_dog']->post_title.'</a></li>';}}
 //echo cogitator($dogs,'.','post_title');
 echo '</ul></div></article>';
		
		}
		?>
		<small>Раздел помет является не полным и находится на наполнении</small>
		</div>

				<?php while ( have_posts() ) : the_post(); ?>
 	            <div class="node">
                    <header class="entry-header">
                            <h1 class="avansome"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
            </div>
        <?php endwhile; ?>
        
		<div class="node">
		<h2 class="avansome">Комментарии</h2>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&appId=362931457130685&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>		
		<div class="fb-comments" data-href="<?php echo get_page_link(); ?>" data-numposts="10" data-width="100%" data-colorscheme="light"></div>
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
<h2 class="avansome">Мы на Facebook</h2><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/unserbund/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/unserbund/"><a href="https://www.facebook.com/unserbund/">Vadim Komarov Kennel Unserbund</a></blockquote></div></div>
</div>
</div>	
</div>
</div>
<?php get_footer(); ?>