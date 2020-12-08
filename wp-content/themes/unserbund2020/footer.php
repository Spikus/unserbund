<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

</div><!-- #main -->
<footer id="colophon" class="site-footer black" role="contentinfo">
    <div class="container">
        <div class="col-md-6">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-red.png" width="350px">
            <h3 class="red"> Племзавод ротвейлеров UNSERBUND</h3>
			<span class="glyphicon glyphicon-earphone red"></span> 
			Телефон (Украина): <a href="tell:+380504785508">+380504785508</a> <br> 
			<span class="glyphicon glyphicon-earphone red"></span> 
			WhatsUp (Украина): <a href="https://api.whatsapp.com/send?phone=380504785508">+380504785508</a><br> 
			<span class="glyphicon glyphicon-earphone red"></span> Viber (Украина): <a href="viber://chat/?number=+380504785508">+380504785508</a> <br> 
			<span class="glyphicon glyphicon-earphone red"></span> Телефон ( Россия ): +79788133638 <br> <br> 
			<span class="glyphicon glyphicon-envelope red"></span> E-mail: vadim@unserbund.com
        </div>
        <div class="col-md-6">
            <h3 class="red"> Написать нам</h3>
            <?php echo do_shortcode('[contact-form-7 id="4" title="Contact form 1"]'); ?>
        </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6 text-left">
            При использовании материалов сайта, ссылка на наш сайт обязательна © 2016
        </div>
        <div class="col-md-6 text-right">
            Племзавод FCI No391/06 "UNSERBUND"
        </div>
    </div>
</div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>