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
				<?php
						$page_lista_servicos_titulo_fields = simple_fields_get_post_group_values(get_the_ID(),"Lista de Serviços: Título", true, 1);
						$page_lista_servicos_titulo_titulo = $page_lista_servicos_titulo_fields["Título"][0];
					?>
				<h2><?php echo $page_lista_servicos_titulo_titulo; ?></h2>
			</div>
			<div class="grid_10 push_1 alpha omega">							
				<ul class="bullet-list">
					<?php
						$page_lista_servicos_fields = simple_fields_get_post_group_values(get_the_ID(),"Lista de Serviços: Itens", true, 1);
						$page_lista_servicos_itens = $page_lista_servicos_fields["Item"];
						$total_page_lista_servicos = count($page_lista_servicos_itens);
					?>
					<?php for($i = 0; $i < $total_page_lista_servicos; $i++){?>
						<li><span class="bullet"></span><?php echo $page_lista_servicos_itens[$i]; ?></li>
					<?php } ?>							
				</ul>		
			</div>			
			<?php
				$page_texts_fields = simple_fields_get_post_group_values(get_the_ID(),"Lista de Textos Simples", true, 1);
				$page_texts_titles = $page_texts_fields["Título"];
				$page_texts_content = $page_texts_fields["Texto"];
				$total_page_texts = count($page_texts_titles);
			?>
			<?php for($i = 0; $i < $total_page_texts; $i++){?>
			<div class="grid_11 alpha omega">
				<h2><?php echo $page_texts_titles[$i]; ?></h2>
			</div>
			<div class="grid_10 push_1 alpha omega">
				<p><?php echo $page_texts_content[$i]; ?></p>
			</div>	
			<?php } ?>
									
		</div>
		<div id="sidebar" class="grid_5">
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
			<a id="show-table" href="#" onClick="_gaq.push(['_trackEvent', 'Informacoes', 'Mostrar', 'Tabela de Preços']);">Ver tabela de preços</a>
			<table id="price-table" class="price-table-class grid_5 alpha omega">
				<thead>
					<?php
						$tabela_cabecalho_fields = simple_fields_get_post_group_values(get_the_ID(),"Tabela de Preços: Cabeçalho", true, 1);
						$tabela_cabecalho_col_esquerda = $tabela_cabecalho_fields["Coluna Esquerda"][0];
						$tabela_cabecalho_col_direita = $tabela_cabecalho_fields["Coluna Direita"][0];
					?>
					<tr>
						<td><?php echo $tabela_cabecalho_col_esquerda; ?></td>
						<td class="odd-col"><?php echo $tabela_cabecalho_col_direita; ?></td>
					</tr>
				</thead>
				<tbody>
					<?php
						$tabela_itens_fields = simple_fields_get_post_group_values(get_the_ID(),"Tabela de Preços: Itens", true, 1);
						$tabela_itens_col_esquerda = $tabela_itens_fields["Coluna Esquerda"];
						$tabela_itens_col_direita = $tabela_itens_fields["Coluna Direita"];
						$total_tabela_itens = count($tabela_itens_col_esquerda);
						
						$r_count=0;
					?>
					<?php for($i = 0; $i < $total_tabela_itens; $i++){?>
					<tr <?php if(($r_count%2)==1) {echo "class='odd-row'";} ?>>
						<td><?php echo $tabela_itens_col_esquerda[$i]; ?></td>
						<td class="odd-col"><?php echo $tabela_itens_col_direita[$i]; ?></td>
					</tr>
					<?php $r_count ++; ?>
					<?php } ?>
				</tbody>
			</table>
			<p class="contact-info">Entre em contato pelo <?php echo $phone;?>, envie um <a href="mailto:<?php echo $email;?>">email</a> ou nos faça uma visita.<br /><br /><?php echo $address;?></p>
		</div><!-- END #sidebar -->
	</div><div class="clear"></div>
</div><!-- END #main-content -->