<?php the_post();?>
<div id="main-content">
	<div id="content" class="container_16">
		<div class="grid_11">					
			<div class="grid_11 alpha omega">
				<h1><?php the_title();?></h1>
			</div>
			<div class="grid_10 push_1 alpha omega">
				<?php the_content();?>
			</div>
						
			<div class="grid_11 alpha omega">
				<h2>Cases Recentes</h2>
			</div>
			<div class="grid_10 push_1 alpha omega">
				<?php $all_cases_are_featured = true; ?>							
				<ul class="featured-cases">
					<?php $loop = new WP_Query( array( 'post_type' => 'cases' ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
						$case_fields = simple_fields_get_post_group_values(get_the_ID(),"Detalhes do Case", true, 1);
						$case_image = $case_fields["Imagem (206px by 154px)"][0];
						$case_image_media = wp_get_attachment_image_src($case_image, "full");
						$case_quote = $case_fields["Depoimento"][0];
						$case_author = $case_fields["Autor do depoimento"][0];
						$case_featured = $case_fields["Destaque"][0];
					?>
					<?php if ($case_featured){ ?>
					<li class="quote grid_10 alpha omega">
						<a class="case-link" href="<?php the_permalink(); ?>" title="Case <?php the_title();?>">
							<div class="grid_3 alpha">
								<img src="<?php echo $case_image_media[0]; ?>" alt="Case <?php the_title();?>" width=160 height=120 />
							</div>
							<div class="grid_7 omega">
								<span class="quote-char left-quote">&ldquo;</span>
								<span class="quote-char right-quote">&rdquo;</span>
								<p><?php echo $case_quote; ?><span class="author"><?php echo $case_author; ?></span><p/>
							</div>
						</a>
					</li>					
					<?php } else {$all_cases_are_featured = false;}?>
					<?php endwhile; ?>					
				</ul>
				<?php if(!$all_cases_are_featured){	?>
				<h3>Veja também outros cases</h3>
				<ul class="other-cases">
					<?php
						$r_index = 0;
						$r_max = 4;
					?>
					<?php $loop = new WP_Query( array( 'post_type' => 'cases' ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
						$case_fields = simple_fields_get_post_group_values(get_the_ID(),"Detalhes do Case", true, 1);
						$case_image = $case_fields["Imagem (206px by 154px)"][0];
						$case_image_media = wp_get_attachment_image_src($case_image, "full");
						$case_featured = $case_fields["Destaque"][0];
					?>
					
					<?php if (!$case_featured){ ?>					
					<li class="grid_2 <?php if($r_index==0){echo 'alpha ';} elseif ($r_index==$r_max){echo 'omega ';} ?>">
						<a class="case-link" href="<?php the_permalink(); ?>" title="Case <?php the_title();?>">
							<img src="<?php echo $case_image_media[0]; ?>" alt="Case <?php the_title();?>" width=100 height=75 />
						</a>
					</li>
					<?php
						$r_index ++;
						if ($r_index == ($r_max+1)) {
							$r_index = 0;
						}
					?>				
					<?php }?>
					<?php endwhile; ?>
				</ul>
				<? }?>
			</div>						
		</div>
		<div id="sidebar" class="grid_4 push_1">
			<h3>Nossos Clientes</h3>
			<ul class="client-list">
				<?php
					$clients_fields = simple_fields_get_post_group_values(get_page_by_title('Quem somos')->ID,"Clientes", true, 1);
					$clients_logo = $clients_fields["Logo"];
					$clients_name = $clients_fields["Nome"];
					$total_clients = count($clients_logo);
				?>
				<?php for($i = 0; $i < $total_clients; $i++){?>
				<?php $clients_logo_media = wp_get_attachment_image_src($clients_logo[$i], "full"); ?>
				<li>
					<img src="<?php echo $clients_logo_media[0]; ?>" width="<?php echo $clients_logo_media[1]; ?>" height="<?php echo $clients_logo_media[2]; ?>" title="<?php echo $clients_name[$i]; ?> é cliente híbrido.cc" />
				</li>
				<?php } ?>
			</ul>
		</div><!-- END #sidebar -->
	</div><div class="clear"></div>
</div><!-- END #main-content -->