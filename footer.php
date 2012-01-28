<footer>
	<div class="page-wrap footer-content">
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : ?>  
        <?php endif; ?>

        <div class="disclaimer">
	        <p align="center">
		        This site was created with CSS3 and HTML5 on the WordPress platform. It is best viewed on one of these modern browsers: <a href="https://www.google.com/chrome/?hl=en&brand=chmo" target="_blank">Chrome</a>, <a href="http://www.mozilla.org/en-US/firefox/new/" target="_blank">Firefox</a>
	        </p>

	        <p align="center">
	        	Demetri Ganoff &ndash; Web Designer &amp; Front-end Developer in Orlando, FL. &copy; DemetriDesign.com 2012
	        </p>
        </div>

    </div><!-- .footer-content -->
</footer>

<!-- scripts: -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 
<!-- Flex Slider: -->
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.flexslider-min.js"></script>
    <!-- Hook up the FlexSlider -->
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
				animation: "slide",
				controlsContainer: ".flex-container",
				animationDuration: 600,
                before: function(slider) {
                    //animations:
                    $(".screens-imgs").fitText(1, {maxFontSize: '52px'});
                    $(".connect-imgs").fitText(1, {maxFontSize: '46px'});
                    $(".engage-imgs").fitText(1, {maxFontSize: '46px'});
					$(".anim h1").fitText(0.5, {maxFontSize: '52px'});
					$(".anim h2").fitText(1.5, {minFontSize: '14px', maxFontSize: '24px'});
					$(".anim p").fitText(1, {minFontSize: '12px', maxFontSize: '18px'});
                }
			});
        });
    </script>
 
<!-- Fittext setup: -->  
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.fittext.js"></script>      
	<script>
		$(document).ready(function () {
			
			//animations:
			$(".screens-imgs").fitText(1, {maxFontSize: '52px'});
			$(".connect-imgs").fitText(1, {maxFontSize: '46px'});
			$(".engage-imgs").fitText(1, {maxFontSize: '46px'});
			$(".anim h1").fitText(0.5, {maxFontSize: '52px'});
			$(".anim h2").fitText(1.5, {minFontSize: '14px', maxFontSize: '24px'});
			$(".anim p").fitText(1, {minFontSize: '12px', maxFontSize: '18px'});				
			
			$("#main article hgroup h1").fitText(1.5, {minFontSize: '22px', maxFontSize: '36px'});
			$("#main article hgroup h2").fitText(2.5, {minFontSize: '14px', maxFontSize: '16px'});
			$("#sidebar article p").fitText(1.25, {maxFontSize: '16px'});
		});
	</script>

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-28553110-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

<?php wp_footer(); ?>
</body>
</html>