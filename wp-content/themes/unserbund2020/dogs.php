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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&appId=362931457130685&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php function motherfucker($id) {

$father=get_field('father',$id);
$mother=get_field('mother',$id);
if ($father) {
	$arr['father_name']=$father->post_title; 
	$arr['father_id']=$father->ID;} else {$arr['father_name']="НЕТ ИНФОРМАЦИИ";$arr['father_id']=-1; }
if ($mother) {
$arr['mother_name']=$mother->post_title; 
$arr['mother_id']=$mother->ID;} else {$arr['mother_name']="НЕТ ИНФОРМАЦИИ";$arr['mother_id']=-1; }
return $arr;
}

?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">
		<div class="node">
<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); 
			$j=2;$flag=true;
			$pedd[0][0]=motherfucker(get_the_ID());
			for($i=1;$i<5;$i++){
			$k=0;$gen=0;
			while ($k<$j){
			if ($flag) {$nowWork=$pedd[$i-1][$gen]['father_id'];} else {$nowWork=$pedd[$i-1][$gen]['mother_id'];$gen++;}
			$pedd[$i][$k]=motherfucker($nowWork);
			$flag=!$flag;
			$k++;
			};		
			$j=$j*2;
			}
			//echo '<pre>';
			//print_r($pedd);
			//echo '</pre>';
			?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
	<h1 class="avansome">Ротвейлер <?php the_title() ?>
	<div class="fb-like pull-right" data-href="<?php echo get_page_link(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
	</h1>
	
		<div class="col-md-3 wow fadeInLeft text-center">	
			<div class="dogThumbnail">
			<?php the_post_thumbnail('dog-show');?>
		</div>
	</div>
		<div class="col-md-5 wow fadeInTop">	
		<ul class="mainInform">
		<?php
	$father=get_field('father');
    $mother=get_field('mother');
	$results=get_field('show_reults');
	$description=get_field('full_description');
	$revision=get_field('description');
	$video=get_field('video');
	echo '<li>Отец: <i>'.$father->post_title.'</i></li>';
	echo '<li>Мать: <i>'.$mother->post_title.'</i></li>';
	echo '<li>Дата Рождения: <i>'.date("d/m/y",strtotime(get_field('birthday'))).'</i></li>';	
	echo '<li>Пол: <i>'.get_field('sex').'</i></li>';
	echo '<li>Страна: <i>'.get_field('goverment').'</i></li>';
	echo '<li>HD: <i>'.get_field('hd').'</i></li>';
	echo '<li>ED: <i>'.get_field('ed').'</i></li>';
 ?>
 </ul>
 <?php 
echo '<small class="desc">';
echo $description;
echo '</small>';

?>
 
 </div>	<div class="col-md-4 wow fadeInRight">
 <?php if (get_field('for_sale'))  { echo '<a href="#colophon" class="btn btn-success">Вы можете купить эту собаку!</a><br><br>';}
	else {
	echo '<b> Потомки для продажи: </b><br>';
	$args = array(
	'numberposts' => -1,
	'post_type' => 'dogs',
	'meta_key' => 'for_sale',
	'meta_value' => '1');
	$mydogs = get_posts( $args ) ;	
	if ($mydogs) {foreach ($mydogs as $tempdog) {
			$j=2;$flag_tmp=true;
			$pedd_tmp[0][0]=motherfucker($tempdog->ID);
			if ($pedd_tmp[0][0]['father_id']==get_the_ID() || $pedd_tmp[$i][$k]['mother_id']==get_the_ID()) {$i=9;$k=$j;echo '<a href="'.$tempdog->guid.'" class="btn btn-success btn-xs">'.$tempdog->post_title.'</a><br>';} else {
			for($i=1;$i<5;$i++){
			$k=0;$gen=0;
			while ($k<$j){
			if ($flag) {$nowWork=$pedd_tmp[$i-1][$gen]['father_id'];} else {$nowWork=$pedd_tmp[$i-1][$gen]['mother_id'];$gen++;}
			$pedd_tmp[$i][$k]=motherfucker($nowWork);
			if ($pedd_tmp[$i][$k]['father_id']==get_the_ID() || $pedd_tmp[$i][$k]['mother_id']==get_the_ID()) {$i=9;$k=$j;echo '<a href="'.$tempdog->guid.'" class="btn btn-success btn-xs">'.$tempdog->post_title.'</a><br>';}
			$flag=!$flag;
			$k++;
			};		
			$j=$j*2;
			}}
	}
	}
	}
 ?>
<?php
	$titules=get_field('dog_title');
 if ($titules) {
  echo 'Титулы<ul class="dogTituls">';
 foreach ($titules as $object) {echo '<li>'.$object.'</li>';}
 echo '</ul>';}
 ?>
 </div>
	</header><!-- .entry-header -->
<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified" id="mediaTabs">
  <li class="active"><a href="#pedigree" data-toggle="tab">Родословная</a></li>
  <li><a href="#photo" data-toggle="tab">Фото</a></li>
  <?php if($results) echo '<li><a href="#shows" data-toggle="tab">Выставки</a></li>';
		if($revision) echo '<li><a href="#revies" data-toggle="tab">Описания</a></li>';
		if($video!="" && $video!="empty") echo '<li><a href="#video" data-toggle="tab">Видео</a></li>'; ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane" id="photo">
  <?php 
  $var_gallery = get_field('album');
  foreach($var_gallery as $img){
					    echo '<a rel="lightbox[roadtrip]" href="'.$img["sizes"]["large"].'" rel="lightbox" data-link="#" title="'.get_the_title().'" ><img class="img-thumbnail" src="'.$img["sizes"]["medium"].'" alt="ротвейлер '.get_the_title().'"></a>';
					}				
  ?>
  </div>
  <div class="tab-pane  active" id="pedigree">
  <?php $pro=1;	
        for($cnt=0;$cnt<4;$cnt++){
		
		echo '<div class="pedr column">';
		for($knt=0;$knt<$pro;$knt++) {
		
			$height=250/($pro);
			$width=50/($pro);
	
		if	($cnt==0) {
			$thumb_id_f = get_permalink($pedd[$cnt][$knt]['father_id']);
			$thumb_id_m =  get_permalink($pedd[$cnt][$knt]['mother_id']);
				echo '<div class="pednode male" style="height:'.$height.'px;width:'.$width.'%"><span class="wrper"><a href="'.$thumb_id_f.'" class="pedbut male btn btn-warning btn-xs">'.$pedd[$cnt][$knt]['father_name'].'</a> </span></div>';
				echo '<div  class="pednode" style="height:'.$height.'px;width:'.$width.'%"><span class="wrper"><a href="'.$thumb_id_m.'" class="pedbut btn btn-warning btn-xs" >'.$pedd[$cnt][$knt]['mother_name'].' </a></span></div>';
			} else {
				echo '<div class="pednode male" style="height:'.$height.'px;width:'.$width.'%"><span class="wrper"> <span data-link="'.$pedd[$cnt][$knt]['father_id'].'" class="js-red pedbut male btn btn-warning btn-xs">'.$pedd[$cnt][$knt]['father_name'].'</span> </span></div>';
				echo '<div  class="pednode" style="height:'.$height.'px;width:'.$width.'%"><span class="wrper"><span data-link="'.$pedd[$cnt][$knt]['mother_id'].'" class="js-red pedbut btn btn-warning btn-xs" >'.$pedd[$cnt][$knt]['mother_name'].' </span></span></div>';

			}
		}

		echo '</div>';
			$pro=$pro*2;  
		} 
		
		 
			 
			 ?>
  
  </div>
  <?php if($results){  
  echo '<div class="tab-pane" id="shows">';
  echo '<table class="table table-striped">';
  echo '<thead><th class="hidden-xs">Дата</th><th>Выставка</th><th class="hidden-xs">Класс</th><th>Оценка</th><th>Судья</th></thead>';
  foreach($results as $res){
  echo '<tr><td class="hidden-xs">'.$res['show_date'].'</td><td>'.$res['show'].'</td><td class="hidden-xs">'.$res['show_class'].'</td><td>'.$res['result'].'</td><td>'.$res['judge'].'</td></tr>';
  }
  echo '</table>';
  echo '</div>';  } 
  if($revision){  
  echo '<div class="tab-pane" id="revies">';
 foreach ($revision as $rev) {
 echo '<p class="desc">';
echo $rev['desc_text'];
echo '</p>';
$judge=$rev['judge_desc'];
 
 echo '<div class="judge text-right">'.$judge->post_title.'</div>';
 }
  echo '</div>';  }
 if($video!="" && $video!="empty"){    
  echo '<div class="tab-pane" id="video">';
  echo '<iframe width="100%" height="500" src="'.$video.'" frameborder="0" allowfullscreen></iframe>';
  echo '</div>';}
  ?>
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
        <h4 class="modal-title" id="myModalLabel"> Нашли ошибку? Укажите её и мы не медленно исправим.</h4>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode('[contact-form-7 id="4029" title="Форма Ошибки"]'); ?>
      </div>
    </div>
  </div>
</div>	

<?php get_footer(); ?>