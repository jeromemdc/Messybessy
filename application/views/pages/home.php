<div id="slider" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php foreach ($sliders as $key => $slider): ?>
    <li data-target="#slider" data-slide-to="<?=$key?>" class="<?=$key == 0 ? 'active' : ''?>"></li>
    <?php endforeach; ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

	<?php foreach ($sliders as $key => $slider): ?>
    <div class="item <?=$key == 0 ? 'active' : ''?>">
      	<div class="slider-bg" style="background-image: url('<?=base_url().'uploads/img/'.$slider->logo?>');">
			<center>
				<a href="<?=$slider->link?>"><img src="<?=base_url().'uploads/img/'.$slider->image?>" class="img-responsive" alt="<?=$slider->image?>"></a>
			</center>
		</div>
    </div>
	<?php endforeach; ?>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#slider" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container-fluid intro">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?=$homeContent->intro?>
			</div>
		</div>
	</div>
</div>

<div id="body" class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<?=$homeContent->featured?>
		</div>
	</div>

	<div class="row">
		<ul class="prod-featured col-sm-12">
			<?php foreach($featuredProducts as $product): ?>
			<li class="col-sm-3">
				<center>
					<div class="prod-image">
						<a href="<?=base_url().'product/'.$product->slug?>">
							<img src="<?=base_url().'uploads/img/'.$product->image?>" alt="<?=$product->name?>" class="img-responsive">
						</a>
					</div>

					<div class="prod-info">
						<div class="prod-name"><?=$product->name?></div>
						<div class="prod-price">Php <?=number_format($product->price,2)?></div>
					</div>
				</center>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="row">
		<div class="col-sm-12 text-center">
			<?=$homeContent->our_products?>
		</div>
	</div>

	<div id="product-grid" class="row">
		<?php foreach ($this->data['categories'] as $key => $cat): ?> 
		<div class="col-sm-6">
			<div class="wrap" style="background-image: url(<?=base_url().'uploads/img/'.$cat->image?>);">
				<div class="box">
					<h3><?=$cat->cat_name?></h3>
					<p><?=$cat->description?></p>
					<a href="<?=base_url().'product-category/'.$cat->slug?>">View Products</a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

</div>