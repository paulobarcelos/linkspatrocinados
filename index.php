<?php get_header(); ?>
<div id="headlines">
	<div id="content" class="strip bg-blue-noise">
		<div class="container_16">
			<div class="grid_13 push_1">
				<div class="headline-list">
					<?php
						$headlines_fields = simple_fields_get_post_group_values(get_page_by_title('Quem somos')->ID,"Headlines", true, 1);
						$headlines_titles = $headlines_fields["Título"];
						$headlines_descriptions = $headlines_fields["Descrição"];
						$headlines_links = $headlines_fields["Link"];
						$total_headlines = count($headlines_titles);
					?>
					<?php for($i = 0; $i < $total_headlines; $i++){?>
					<div>
						<?php
							$headline_link_ID = get_page_by_title($headlines_links[$i])->ID;
							$headline_link_URL = get_permalink($headline_link_ID);
						?>
						<h2><?php echo $headlines_titles[$i]; ?></h2>
						<p><?php echo $headlines_descriptions[$i]; ?> <a href="<?php echo $headline_link_URL;?>" class="red-btn">Saiba Mais</a></p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div><div class="clear"></div>
	</div>
</div><!-- END #headlines -->		
<div id="topics">
	<div id="content" class="strip bg-red-noise">
		<div class="container_16">
			<?php
				$topics_fields = simple_fields_get_post_group_values(get_page_by_title('Quem somos')->ID,"Tópicos", true, 1);
				$topics_titles = $topics_fields["Título"];
				$topics_descriptions = $topics_fields["Descrição"];
				$topics_links = $topics_fields["Link"];
			?>
			<div class="grid_4 topic">
				<?php
					$topic_link_ID = get_page_by_title($topics_links[0])->ID;
					$topic_link_URL = get_permalink($topic_link_ID);
				?>
				<h3><?php echo $topics_titles[0]; ?></h3>
				<p><?php echo $topics_descriptions[0]; ?></p>
				<a href="<?php echo $topic_link_URL;?>" class="blue-btn">Saiba Mais</a>
			</div>
			<div class="grid_4 topic bg-dark">
				<?php
					$topic_link_ID = get_page_by_title($topics_links[1])->ID;
					$topic_link_URL = get_permalink($topic_link_ID);
				?>
				<h3><?php echo $topics_titles[1]; ?></h3>
				<p><?php echo $topics_descriptions[1]; ?></p>
				<a href="<?php echo $topic_link_URL;?>" class="blue-btn">Saiba Mais</a>
			</div>
			<div class="grid_4 topic">
				<?php
					$topic_link_ID = get_page_by_title($topics_links[2])->ID;
					$topic_link_URL = get_permalink($topic_link_ID);
				?>
				<h3><?php echo $topics_titles[2]; ?></h3>
				<p><?php echo $topics_descriptions[2]; ?></p>
				<a href="<?php echo $topic_link_URL;?>" class="blue-btn">Saiba Mais</a>
			</div>
			<div class="grid_4 topic bg-dark">
				<h3>Cases Recentes</h3>
				<ul class="case-list">
					<?php $loop = new WP_Query( array( 'post_type' => 'cases' ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
						$case_fields = simple_fields_get_post_group_values(get_the_ID(),"Detalhes do Case", true, 1);
						$case_image = $case_fields["Imagem (206px by 154px)"][0];
						$case_resumo = $case_fields["Resumo"][0];
						$case_featured = $case_fields["Destaque"][0];
					?>
					<?php if ($case_featured){ ?>
					<li>
						<?php	$case_image_media = wp_get_attachment_image_src($case_image, "full"); ?>
						<img src="<?php echo $case_image_media[0]; ?>" alt="Case <?php the_title();?>" width="206" height="154" />
						<p><?php echo $case_resumo; ?></p>
					</li>
					<?php } ?>
					<?php endwhile; ?>
				</ul>
				<?php
					$quem_somos_ID = get_page_by_title("Quem Somos")->ID;
					$quem_somos_URL = get_permalink($quem_somos_ID);
				?>	
				<a href="<?php echo $quem_somos_URL; ?>" class="blue-btn">Saiba Mais</a>
			</div>
		</div><div class="clear"></div>
	</div>
</div><!-- END #topics -->
<?php get_footer(); ?>