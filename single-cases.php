<?php	$template = get_simple_fields_template_hook(get_the_ID()); ?>
<?php get_header(); ?>
<div id="main-content">
	<div id="content" class="container_16">
		<div class="grid_11">					
			<div class="grid_11 alpha omega">
				<h1>Case: <?php the_title();?></h1>
			</div>
			<?php
				$case_fields = simple_fields_get_post_group_values(get_the_ID(),"Detalhes do Case", true, 1);
				$case_image = $case_fields["Imagem (206px by 154px)"][0];
				$case_image_media = wp_get_attachment_image_src($case_image, "full");
				$case_quote = $case_fields["Depoimento"][0];
				$case_author = $case_fields["Autor do depoimento"][0];
			?>
			<div class="grid_10 push_1 alpha omega">							
				<ul class="featured-cases">
					<li class="quote grid_10 alpha omega">
						<div class="grid_3 alpha">
							<img src="<?php echo $case_image_media[0]; ?>" alt="Case <?php the_title();?>" width=160 height=120 />
						</div>
						<div class="grid_7 omega">
							<span class="quote-char left-quote">&ldquo;</span>
							<span class="quote-char right-quote">&rdquo;</span>
							<p><?php echo $case_quote; ?><span class="author"><?php echo $case_author; ?></span><p/>
						</div>
					</li>
				</ul>
				<?php
					$case_texts_fields = simple_fields_get_post_group_values(get_the_ID(),"Lista de Textos Simples", true, 1);
					$case_texts_titles = $case_texts_fields["Título"];
					$case_texts_content = $case_texts_fields["Texto"];
					$total_case_texts = count($case_texts_titles);
				?>
				<?php for($i = 0; $i < $total_case_texts; $i++){?>
				<h3><?php echo $case_texts_titles[$i]; ?></h3>
				<p><?php echo $case_texts_content[$i]; ?></p>	
				<?php } ?>
			</div>						
		</div>
		<div id="sidebar" class="grid_4 push_1">
			<?php
				$quem_somos_ID = get_page_by_title("Quem Somos")->ID;
				$quem_somos_URL = get_permalink($quem_somos_ID);
			?>	
			<a href="<?php echo $quem_somos_URL; ?>" class="blue-btn grid_4 alpha omega">Veja outros cases</a>
		</div>
	</div><div class="clear"></div>
</div><!-- END #main-content -->
<?php get_footer(); ?>