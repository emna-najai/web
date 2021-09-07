<?php
	include "../../core/config.php";
	include "../../core/components/components.php";
	include "../../core/categorieOps.php";
	include "../../core/produitOps.php";

	$catOps = new categorieOps();
	$cats = $catOps->getCategories();
	$proOps = new produitOps();
	$listP = $proOps->getProduits();
	$listP2 = $proOps->getProduits();
?>

<!DOCTYPE html>

<!-- Mirrored from htmlbeans.com/html/petshop/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 02:01:43 GMT -->
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
	<meta name="description" content="Petshop">
	<title>Petshop</title>
	<!-- include the site stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600%7CNunito:400,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/icon-fonts.css">
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- <style>
		.product-col:hover{
			margin: 0 !important;
		}
	</style> -->
</head>
<body>
	<div id="wrapper">
		<?php components::header(); ?>
		<main id="main">
			<section class="hero-sec bg-full" style="background-image:url(images/img33.jpg);">
				<div class="caption">
					<h1 class="heading text-center">Shop</h1>
				</div>
			</section>
			<section class="shop-sec style1 container">
				<div class="row">
					<div class="col-xs-12">
						<article id="content">
							<div class="product-block" style="display: flex; flex-wrap: wrap;">
								<?php 
									if(isset($_GET['id'])){	
										foreach($listP2 as $lp2){ 
											if($lp2['idCategorie'] == $_GET['id']){
								?>
								<div class="product-col">
									<div class="img-holder">
										<img src="../prodimgs/<?php echo $lp2['imgProduit']; ?>" alt="food-img" class="img-responsive" style="height: 205px; width: 205px">
										<div class="over-holder">
											<ul class="list-unstyled text-center share-list">
												<li><a href="shop-detail.php?id=<?php echo $lp2['idProduit']; ?>"><i class="fa fa-search" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="descrip">
										<h3 class="heading2"><?php echo $lp2['libProduit']; ?></h3> 
										<span class="price"><?php echo $lp2['prixProduit']." tnd"; ?></span>		
									</div>
									<div class="text-center">
										<a href="shop-detail.html" class="btn-primary lg-round text-uppercase"><i class="icon-cart"></i>add to cart</a>
									</div>
								</div>
								<?php } } } else { foreach($listP2 as $lp2){?>
									<div class="product-col">
										<div class="img-holder">
											<img src="../prodimgs/<?php echo $lp2['imgProduit']; ?>" alt="food-img" class="img-responsive" style="height: 205px; width: 205px">
											<div class="over-holder">
												<ul class="list-unstyled text-center share-list">
													<li><a href="shop-detail.php?id=<?php echo $lp2['idProduit']; ?>"><i class="fa fa-search" aria-hidden="true"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="descrip">
											<h3 class="heading2"><?php echo $lp2['libProduit']; ?></h3> 
											<span class="price"><?php echo $lp2['prixProduit']." tnd"; ?></span>		
										</div>
										<div class="text-center">
											<a href="shop-detail.html" class="btn-primary lg-round text-uppercase"><i class="icon-cart"></i>add to cart</a>
										</div>
									</div>
								<?php } } ?>
							</div>
						</article>
						<aside id="sidebar">
							<section class="widget">
								<h3>Categories</h3>
								<ul class="list-unstyled category-list">
									<?php foreach($cats as $cat){ ?>
									<li><a href="shop.php?id=<?php echo $cat['idCategorie']; ?>"><span class="icon fa fa-angle-right"></span><?php echo $cat['nomCategorie']; ?>[<?php $number = $catOps->getNoP($cat['idCategorie']);
                                foreach($number as $num)
                                    echo $num[0];  ?>]</a></li>
									<?php } ?>	
								</ul>
							</section>
							<section class="widget">
								<h3>Featured Products</h3>
								<ul class="list-unstyled feature-list">
									<?php 
										foreach($listP as $L){
											if($L['featured']){	
									?>
									<li>
										<div class="img-holder">
											<a href="shop-detail.php?id=<?php echo $L['idProduit']; ?>"><img class="img-responsive" src="../prodimgs/<?php echo $L['imgProduit']; ?>" alt="image"></a>
										</div>
										<div class="txt-holder">
											<h3><a href="shop-detail.php?id=<?php echo $L['idProduit']; ?>"><?php echo $L['libProduit']; ?></a></h3>
											<span class="price"><?php echo $L['prixProduit']; ?> tnd</span>
										</div>
									</li>
									<?php
										}
									} 
									?>
								</ul>
							</section>
						</aside>
					</div>
				</div>
			</section>
		</main>
		<?php components::footer(); ?>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/jquery.main.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/petshop/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 02:01:49 GMT -->
</html>