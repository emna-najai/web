<?php

	include "../../core/config.php";
	include "../../core/produitOps.php";
	include "../../core/components/components.php";

	$P = new produitOps();
	$liste = $P->getProduits();

?>

<!DOCTYPE html>
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the price table -->
	<meta name="Petshop" content="yes">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the price table style -->
	<meta name="Petshop" content="black">
	<!-- set the description -->
	<meta name="description" content="Petshop HTML5 Template">
	<title>Petshop HTML5 Template</title>
	<!-- include the site stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600%7CNunito:400,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/icon-fonts.css">
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php components::header(); ?>
		<main id="main">
			<section class="main-slider">
				<div class="slide bg-full text-center overlay" style="background-image:url(images/img01.jpg);">
					<div class="caption">
						<h1>We will take care of <br class="hidden-xs">your pets</h1>
					</div>
				</div>
			</section>
			<section class="shop-sec container">
				<center>
					<div class="caption">
						<h1>Some of our featured products</h1>
					</div>
				</center>
				<div class="row">
					<div class="col-xs-12">
						<div class="product-block">
							<?php
								foreach($liste as $row){
									if($row['featured']){
									if(!$row['qntProduit'])
										echo '<div class="product-col sold-item">';
									else
										echo '<div class="product-col">';
							?>
							<div class="img-holder">
								<?php 
									if(!$row['qntProduit'])
										echo '<strong class="text-uppercase">sold out!</strong>';
								?>
								<img src="../prodimgs/<?php echo $row['imgProduit']; ?>" alt="food-img" class="img-responsive" style="height: 205px; width: 205px">
								<span class="sale-item">PROMO</span>
								<div class="over-holder">
								</div>
							</div>
							<div class="descrip">
								<h3 class="heading2"><?php echo $row['libProduit']; ?></h3> 
								<span class="price"><?php echo $row['prixProduit']; ?> tnd</span>		
							</div>
								<div class="text-center">
									<a href="cart.html" class="btn-primary lg-round text-uppercase">Ajouter au <i class="icon-cart"></i></a>
								</div>
							</div>
							<?php 
								}
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<section class="feature-sec bg-full overlay" style="background-image:url(images/img16.jpg); ">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<div class="feature-col">
								<span class="icon round"><i class="icon-bookmark"></i></span>
								<h3 class="heading2">Quality &amp; Caring</h3>
								<p>It is a long established fact that a reader <br class="hidden-xs"> distracted by the readable content</p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="feature-col">
								<span class="icon round"><i class="icon-shield"></i></span>
								<h3 class="heading2">Insured &amp; Checked</h3>
								<p>It is a long established fact that a reader <br class="hidden-xs"> distracted by the readable content </p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="feature-col">
								<span class="icon round"><i class="icon-home"></i></span>
								<h3 class="heading2">Free Home Consulting</h3>
								<p>It is a long established fact that a reader <br class="hidden-xs"> distracted by the readable content </p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	<?php components::footer(); ?>
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/jquery.main.js"></script>
</body>
</html>