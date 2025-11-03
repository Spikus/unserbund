<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content container" role="main">
        <?php /* The loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php $type=get_field('new_type');
					$location=get_field('place');
				?>
        <div class="col-md-8">
            <div class="node">
                <h2 class="avansome"><?php the_title() ?></h2>
                <?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail('large');?>
                </div>
                <?php endif; ?>
                <div class="col-md-12">
                    <?php the_content() ?>
                </div>

                <div class="row"></div>
                <?php if ($type=='show')  { $dogs=get_field('dogs_in_show');$add="Результаты Питомника ";} else { $dogs=get_field('dogs_in_new');}

if ($dogs){
echo '<div class="showResult clearfix"><h3>'.$add.'</h3>';
foreach($dogs AS $dog) {
$dogLnk=$dog['dog'];
if ($type=='show') {
echo '<h4>'.$dog['show_class'].'</h4>';}
$dog_gal=$dog['dog_photo'];
 foreach($dog_gal as $img){
echo '<a rel="lightbox[1]" href="'.$img["sizes"]["large"].'" rel="lightbox" data-link="'.$dogLnk->guid.'" title="'.$dogLnk->post_title.'" ><img class="img-thumbnail" src="'.$img["sizes"]["dog-show"].'" ></a>';
}

echo '<a href="'.$dogLnk->guid.'" class="noHover Nick">'.$dogLnk->post_title.'</a>';
 $father=get_field('father',$dogLnk->ID);
 $mother=get_field('mother',$dogLnk->ID);
 echo '<div class="adInfomr" >('.$father->post_title.' x '.$mother->post_title.')<br>'.date("d/m/y",strtotime(get_field('birthday',$dogLnk->ID))).'</div>';
 if ($type=='show') {
 $results=$dog['result'];
 foreach ($results as $mark){
 echo '<strong>'.$mark['Mark'].'</strong> ('.$mark['judge'].')<br>';

 }
}}
echo '</div>';
} 
$var_gallery=get_field('photos');
if ($var_gallery) {
 foreach($var_gallery as $img){
					    echo '<a rel="lightbox[roadtrip]" href="'.$img["sizes"]["large"].'" data-link="#" title="'.get_the_title().'" ><img class="img-thumbnail" src="'.$img["sizes"]["thumbnail"].'"></a>';
					}		}		
?>


            </div>
            <div class="node">
                <h2 class="avansome">Комментарии</h2>
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
                <div class="fb-comments" data-href="<?php echo get_page_link(); ?>" data-numposts="10" data-width="100%"
                    data-colorscheme="light"></div>
            </div>

        </div>
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
                <iframe
                    src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FRottweilerKennelUnserbund&amp;width&amp;height=400&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=362931457130685"
                    scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:400px"
                    allowTransparency="true"></iframe>
            </div>
        </div>
        <?php endwhile; ?>

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>