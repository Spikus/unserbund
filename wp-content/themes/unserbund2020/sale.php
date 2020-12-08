<?php
/**
Template Name: Sale Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">
	
		
		<div class="col-md-8" >
		<div class="node">
			<p style="padding-top: 30px; font-size: 18px;">
				Если вас интересует одна из наших собак, или вы хотите зарезервировать щенка обращайтесь по телефону: +38-050-4785508 
			</p>
		<?php 
		$args = array(
	'numberposts' => -1,
	'post_type' => 'dogs',
	'meta_key' => 'for_sale',
	'meta_value' => '1'
);	
		$dogs = get_posts( $args ) ;	
		if ($dogs){

echo '<div class="showResult clearfix">';
foreach($dogs AS $dog) {
$pol=get_field('sex',$dog->ID);
$img=get_field('ing_for_sale',$dog->ID);
echo '<a href="'.$dog->guid.'" class="noHover Nick"> <img class="img-thumbnail" src="'.$img["sizes"]["medium"].'" alt="ротвейлер '.get_the_title().'"><br>';
echo $dog->post_title.' ('.$pol.')</a>';
 $father=get_field('father',$dog->ID);
 $mother=get_field('mother',$dog->ID);
 echo '<div class="adInfomr" >('.$father->post_title.' x '.$mother->post_title.')<br>'.date("d/m/y",strtotime(get_field('birthday',$dog->ID))).'</div>';
}
echo '</div>';
}  else {
		echo '<h4 class="text-center"> Если вас интересует одна из наших собак, или вы хотите зарезервировать щенка обращайтесь по телефону +38-050-4785508 / If You are intrested for one of our dogs or would like to make a reservation for puppy feel free to contact us by phone +38-050-4785508 (cell phone)
		email: vadim@tor.mk.ua
</h4>';
	}
		
		
		?>
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