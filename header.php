<?php 
	//include("dev.php"); // comment this line to hide the "development" header
?>
<!doctype html>
<html lang="pt" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<?php 
		if (is_home()) {
			$title = get_bloginfo ('description');
		} elseif (is_single() || is_page()) {
			$title = get_the_title ();
		} else {
			$title = "Not Found";
		}
		?>
		<?php if (is_home()) { ?>
		<title><?php bloginfo('name'); ?> - <?php echo $title;?></title>
		<?php } else {?>
		<title><?php echo $title;?> - <?php bloginfo('name'); ?></title>
		<?php } ?>
		
		<?php 
		if (is_home()) {
			$page = get_page_by_title('Quem somos');
			$pageID = $page->ID;
					
			$simpleFields = simple_fields_get_post_group_values($pageID,"SEO - Homepage", true, 1);	
		} elseif (is_single() || is_page()){
			$simpleFields = simple_fields_get_post_group_values(get_the_ID(),"SEO", true, 1);		
		} else {
			$hideMeta = 1;
		}
		?>
		<?php if($hideMeta != 1) {
			$metaDescription = $simpleFields["Meta Description"][0];
			$metaKeywords = $simpleFields["Meta Keywords"][0];	
		?>		
		<meta name="description" content ="<?php echo $metaDescription;?>"/>
		<meta name="keywords" content ="<?php echo $metaKeywords;?>"/>
		<?php } ?>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico">
		<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon.png">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/960.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/style.css?v=2">
	
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Serif&subset=latin">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Amaranth&subset=latin">

		<script src="<?php bloginfo('stylesheet_directory');?>/js/libs/modernizr-1.7.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body class="bg-white-lines">
		<div id="container">
			<header>
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
				<div id="content" class="strip bg-blue-stripes ">
					<div class="container_16">
						<div class="grid_7 push_3">				
							<h1 id="logo">
								<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><span class="visuallyhidden"><?php bloginfo('name'); ?> - <?php bloginfo('description');?></span></a>
							</h1>
							<ul id="nav-header">
								<?php	if (is_page()){$curentPageID = get_the_ID();}?>
								<li><a class="<?php if (is_home()) echo 'current ';?>  first" href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>
								<li><a <?php if ($curentPageID == $quemSomosID) echo 'class="current"';?> href="<?php echo $quemSomosPermalink; ?>" title="Quem Somos">Quem Somos</a></li>
								<li><a class="<?php if ($curentPageID == $comoTrabalhamosID) echo 'current ';?> last" href="<?php echo $comoTrabalhamosPermalink; ?>" title="Como Trabalhamos">Como Trabalhamos</a></li>
								<!--<li><a class="last" href="<?php echo $blogURL;?>" title="Blog">Blog</a></li>-->
							</ul>
						</div>
						<div class="grid_4 push_5">				
							<ul id="contact-header">
								<li class="mail"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
								<li class="phone"><?php echo $phone;?></li>
							</ul>
							<p id="address-header"><?php echo $address;?></p>
						</div>
						<div id="adwords-certificate">
							<a href="<?php echo $adWords;?>" title="Clique aqui e verifique nossa parceira com o Google Adwords">
								<p class="visuallyhidden">Clique aqui e verifique nossa parceira com Google Adwords</p>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="container_16">
					<div id="hibrido-header">
						<p><span class="left-margin">Um serviço</span><br /><a id="logo" href="<?php echo $websiteURL;?>" title="Conheça a hibrido.cc"><span class="visuallyhidden">hibrido.cc Comunicação e Cultura</span></a></p>
					</div>
				</div>
				<div class="clear"></div>		
			</header>
			<div id="main" role="main" class="after-header">