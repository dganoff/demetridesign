<footer>
	<div class="page-wrap footer-content">
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : ?>  
        <?php endif; ?>

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
                }
			});
        });
    </script>
 
<!-- Fittext setup: -->  
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.fittext.js"></script>      
	<script>
		$(window).load(function() {
			
			//animations:
			$(".screens-imgs").fitText(1, {maxFontSize: '52px'});
			$(".connect-imgs").fitText(1, {maxFontSize: '46px'});
			$(".engage-imgs").fitText(1, {maxFontSize: '46px'});
			$(".anim h1").fitText(0.5, {maxFontSize: '52px'});
			$(".anim h2").fitText(1.5, {minFontSize: '14px', maxFontSize: '24px'});
			$(".anim p").fitText(1, {minFontSize: '12px', maxFontSize: '18px'});				
			
			$("#main article hgroup h1").fitText(1.2, {maxFontSize: '36px'});
			$("#main article hgroup h2").fitText(2, {maxFontSize: '20px'});
			$("#sidebar article p").fitText(1.25, {maxFontSize: '16px'});
		});
	</script>

<?php wp_footer(); ?>
</body>
</html>