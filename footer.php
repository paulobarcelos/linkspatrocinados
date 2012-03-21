		</div><!-- END #main -->
		<footer>
			<?php
				$quemSomosID = get_page_by_title('Quem Somos')->ID;
				$quemSomosPermalink = get_permalink($quemSomosID);
				$comoTrabalhamosID = get_page_by_title('Como Trabalhamos')->ID;
				$comoTrabalhamosPermalink = get_permalink($comoTrabalhamosID);
															
				$contatoFields = simple_fields_get_post_group_values(get_page_by_title('Quem somos')->ID,"Contato", true, 1);
				$websiteURL = $contatoFields["Website"][0];
				$blogURL = $contatoFields["Blog"][0];
				$phone = $contatoFields["Telefone"][0];
				$address = $contatoFields["Endereço"][0];
				$email = $contatoFields["Email"][0];
				$adWords = $contatoFields["Certificado AdWords"][0];
			?>
			<div id="content" class="strip bg-black-stripes">
				<div class="container_16">
					<div class="grid_4">				
						<h1 id="logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><span class="visuallyhidden"><?php bloginfo('name'); ?> - <?php bloginfo('description');?></span></a></h1>
					</div>
					<div class="grid_8">				
						<ul id="nav-footer">
							<li><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>
							<li><a href="<?php echo $quemSomosPermalink; ?>" title="Quem Somos">Quem Somos</a></li>
							<li><a href="<?php echo $comoTrabalhamosPermalink; ?>" title="Como Trabalhamos">Como Trabalhamos</a></li>
							<!--<li><a href="<?php echo $blogURL;?>" title="Blog">Blog</a></li>-->
						</ul>
					</div>
					<div class="grid_4">				
						<ul id="contact-footer">
							<li class="mail"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
							<li class="phone"><?php echo $phone;?></li>
						</ul>
						<p id="address-footer"><?php echo $address;?></p>
					</div>
					<div class="clear"></div>
					<div id="hibrido-footer">
						<p><span class="left-block">Um serviço</span> <a id="logo" href="<?php echo $websiteURL;?>" title="Links Patrocinados"><span class="visuallyhidden">hibrido.cc Comunicação e Cultura</span></a> <span class="right-block">©2011</span></p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</footer>
	</div><!-- END #container -->
	<script src="<?php bloginfo('stylesheet_directory');?>/js/plugins.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php bloginfo('stylesheet_directory');?>/js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<?php if (is_home()) { ?>
	<script src="<?php bloginfo('stylesheet_directory');?>/js/jquery.jshowoff.min.js"></script>
	<script>
    $(document).ready(function(){
		$('ul.case-list').jshowoff({
    		controls: false,
    		links:false,
    		speed: 4000
    	});
    	$('div.headline-list').jshowoff({
    		controls: false,
    		speed: 6000
    	});
    });
	</script>
	<?php } else {?>
		<script>
   		$(document).ready(function(){
   			$('#price-table').addClass('hidden');
   			$('#show-table').click(function(){
   				$(this).remove();
   				$('#price-table').removeClass('hidden');  
   				  			
    		});
    	});
		</script>
	<?php }?>
	<script>
		var _gaq=[['_setAccount','UA-23341085-1'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'http://www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	<?php wp_footer(); ?>
	</body>
</html>