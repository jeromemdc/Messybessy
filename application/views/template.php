<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/x-icon" href="<?=base_url()?>includes/img/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=0.9, user-scalable=no">
<meta name="description" content="<?=@$meta['description']?>">
<meta name="keywords" content="<?=@$meta['keywords']?>">

<title>Messy Bessy<?=@$meta['title'] ? ' | '.@$meta['title'] : ''?></title>
<?php $og_image = ($page == 'productdetail' ? 'uploads/original/'.@$products[0]->prod_image : 'includes/img/shareimage.png')?>

<meta property="og:type" content="website" />
<meta property="og:url" content="<?=current_url()?>" />
<meta property="og:site_name" content="Messy Bessy" />
<meta property="og:title" content="Messy Bessy<?=@$meta['title'] ? ' | '.@$meta['title'] : ''?>" />
<meta property="og:description" content="<?=@$meta['description']?>" />
<meta property="og:image" content="<?=base_url().$og_image?>" />

<!-- Bootstrap -->
<link href="<?=base_url()?>includes/css/bootstrap.min.css" rel="stylesheet">

<!-- CSS -->
<link href="<?=base_url()?>includes/css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>includes/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>includes/css/style.css" rel="stylesheet" type="text/css" />

<!-- JS -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>includes/js/bootstrap.min.js"></script>

<script type="text/javascript" >
	var base_url = "<?=base_url()?>";
</script>

</head>

<body>
	
<div id="main" class="container-fluid">

	<div id="header" class="row">
		<div class="col-sm-4">
		</div>

		<div class="logo col-sm-4">
			<center><a href="<?=base_url()?>"><h1 class="hidden">Welcome to Messy Bessy</h1><img src="<?=base_url()?>includes/img/logo.png" alt="Messy Bessy" class="img-responsive"></a></center>
		</div>

		<div class="col-sm-4">
			<div id="account" class="row">
				<div class="col-sm-12 text-right mb-green">
					
					<?php if($this->session->userdata('users')){ ?>
        				Welcome <?=$this->data['name']?> | 	
        			<?php }else{ ?>
						<a href="<?=base_url()?>register">Register</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
						<a href="<?=base_url()?>login">Login</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
        			<?php } ?>
					<a href="<?=base_url()?>cart"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Cart</a>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<form class="form" action="<?=base_url()?>search" method="post">
						<div class="form-group">
							<label class="sr-only" for="Search">Search</label>
							<input class="header-search pull-right form-control" name="search" placeholder="Search">
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>

<div id="nav" class="container-fluid">

	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="row mobile-container">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="collapse navbar-collapse" id="main-nav">
				      	<ul class="nav nav-pills nav-justified">
				      		<li role="presentation" class="<?=($this->uri->segment(1) == '' ? 'active' : '')?>"><a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a></li>
							<li role="presentation" class="<?=($this->uri->segment(2) == '' ? '' : '')?>"><a href="<?=base_url().'about-us'?>">About Us</a></li>
							<?php foreach ($this->data['categories'] as $cat): ?> 
							<li role="presentation" class="<?=($this->uri->segment(3) == $cat->slug ? 'active' : '')?>"><a href="<?=base_url().'product-category/'.$cat->slug?>"><?=$cat->cat_name?></a></li>
							<?php endforeach; ?>
							<li role="presentation" class="<?=($this->uri->segment(7) == '' ? '' : '')?>"><a href="<?=base_url().'contact-us'?>">Contact Us</a></li>
						</ul>
				    </div><!-- /.navbar-collapse -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('pages/'.$page); ?>

<div id="pre-footer" class="container-fluid">
	<div class="container">
		<div class="row">

			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-4">
						<center>
							<img src="<?=base_url()?>includes/img/logo-icon.png" alt="Messy Bessy" title="Messy Bessy">
						</center>
					</div>
					<div class="col-sm-8">
						<h4><?=$this->data['firstPage']->title?></h4>
						<p><?=word_limiter(strip_tags($this->data['firstPage']->description),50)?></p>
						<a href="<?=base_url().'about-us'?>">Learn More</a>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-4">
						<center>
							<img src="<?=base_url().'uploads/img/'.$this->data['latestBlog']->image?>" alt="<?=$this->data['latestBlog']->title?>" title="<?=$this->data['latestBlog']->title?>">
						</center>
					</div>
					<div class="col-sm-8">
						<h4><?=$this->data['latestBlog']->title?></h4>
						<p><?=word_limiter(strip_tags($this->data['latestBlog']->content),50)?></p>
						<p class="blog-info">Published: <?=date('F d, Y',strtotime($this->data['latestBlog']->date))?> by <?=$this->data['latestBlog']->author?></p>
						<a href="<?=base_url().'blog/'.$this->data['latestBlog']->slug?>">Continue reading</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="footer" class="container-fluid">
	<div class="container">
		<div class="row">

			<div class="col-sm-2">
				<img src="<?=base_url()?>includes/img/logo-footer.png" alt="Messy Bessy" title="Messy Bessy">
			</div>

			<div class="col-sm-4">
			</div>

			<div class="col-sm-2 col-xs-6">
				<h4>Our Story</h4>
				<ul class="footer-nav-group">
					<li><a href="<?=base_url()?>about-us">About Us</a></li>
					<li><a href="<?=base_url()?>our-story">Our Story</a></li>
					<li><a href="<?=base_url()?>our-social-innovation">Our Social Innovation</a></li>
					<li><a href="<?=base_url()?>our-heroes">Our Heroes</a></li>
					<li><a href="<?=base_url()?>blog">Blog</a></li>
				</ul>
			</div>
			<div class="col-sm-2 col-xs-6">
				<h4>Our Products</h4>
				<ul class="footer-nav-group">
					<?php foreach ($this->data['categories'] as $cat): ?> 
					<li><a href="<?=base_url().'product-category/'.$cat->slug?>"><?=$cat->cat_name?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<!--div class="col-sm-2">
				<h4>Be a Messy Mover</h4>
				<ul class="footer-nav-group">
					<li><a href="#!">House Foundation</a></li>
					<li><a href="#!">Rewards</a></li>
					<li><a href="#!">Community Board</a></li>
				</ul>
			</div-->
			<div class="col-sm-2 col-xs-6">
				<h4>Contact</h4>
				<ul class="footer-nav-group">
					<li><a href="<?=base_url()?>contact-us">Contact Us</a></li>
					<li>+63 2 123-4567</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<p class="col-sm-12">2016 Messy Bessy, LLC. All Rights Reserved</p>
		</div>
	</div>
</div>

<script src="https://use.typekit.net/fad1oyv.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script type="text/javascript" src="<?=base_url()?>includes/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?=base_url()?>includes/js/main.js"></script>
<script type="text/javascript" src="<?=base_url()?>includes/js/jquery.star-rating-svg.js"></script>

</body>
</html>
