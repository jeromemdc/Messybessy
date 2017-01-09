<div id="body" class="messyman container-fluid inner">
	<div class="header row">
		<div id="about" class="pattern">

		</div>
		<?php if($category): ?>
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
							<li><a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a></li>
							<li><?=@$category->cat_name?></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php $uri3 = $this->uri->segment(3); if(empty($uri3)): ?>
		<div class="intro">
			<center>
				<?php if(@$category->logo): ?><img src="<?=base_url().'uploads/img/'.@$category->logo?>" alt="<?=@$category->cat_name?>" class="pagetitleimg"><div class="clearfix"></div><?php endif; ?>
				<p class="col-sm-12"><?=@$category->description?></p>
				<div class="clearfix"></div>
			</center>
		</div>
		<?php endif; ?>
	</div>

	<div id="products" class="body-content row">

		<div class="container">
		
			<div class="row">

				<?php $this->load->view('pages/sidebar'); ?>

				<?php if($category): ?>

				<div class="col-sm-9 col-sm-pull-3">
					<div class="sorting">

						<div class="col-sm-3">
							<select class="form-control" onChange="window.location.href=this.value">
								<option value="<?=base_url().'product-category/'.$category->slug.'/name-asc'?>" <?=($this->uri->segment(3) == 'name-asc' ? 'selected' : '')?>>Sort by name</option>
								<option value="<?=base_url().'product-category/'.$category->slug.'/date-desc'?>" <?=($this->uri->segment(3) == 'date-desc' ? 'selected' : '')?>>Sort by recent</option>
								<option value="<?=base_url().'product-category/'.$category->slug.'/price-asc'?>" <?=($this->uri->segment(3) == 'price-asc' ? 'selected' : '')?>>Sort by price: low to high</option>
								<option value="<?=base_url().'product-category/'.$category->slug.'/price-desc'?>" <?=($this->uri->segment(3) == 'price-desc' ? 'selected' : '')?>>Sort by price: high to low</option> 
							</select>
						</div>
						<div class="col-sm-3">
							
						</div>
						<div class="col-sm-6">
							<div class="col-sm-7 col-xs-7">
								Page 
								<select class="form-control page-field" onChange="window.location.href=this.value">
									<?php for ($i=1; $i <= $maxSelect; $i++): $value = ($i-1)*$per_page ?>
									<option value="<?=$base_url.'/'.$value?>" <?=($currentPage == $i ? 'selected' : '')?>><?=$i?></option>
									<?php endfor; ?>
								</select>

								of <?=$maxSelect?>
							</div>
							<div class="col-sm-5 col-xs-5">
								<?=$pagination?>
							</div>
						</div>
						<div class="clearfix"></div>

					</div>

					<div class="clearfix"></div>

					<ul class="product-list">
						<div class="row">

						<?php if($products) :?>

						<?php foreach ($products as $product): ?>
						<li class="col-sm-4">
							<center>
								<div class="prod-image">
									<a href="<?=base_url().'product/'.$product->prod_slug?>">
										<img src="<?=base_url().'uploads/img/'.$product->prod_image?>" alt="<?=$product->name?>" class="img-responsive">
									</a>
								</div>

								<div class="prod-info">
									<div class="prod-name"><a href="<?=base_url().'product/'.$product->prod_slug?>"><?=$product->name?></a></div>
									<div class="prod-price"><?=get_variation($product->pid)?></div>
								</div>
							</center>
						</li>
						<?php endforeach; ?>

						<?php else: ?>
							<li class="col-sm-12"><center><p>No Result Found</p></center></li>
						<?php endif; ?>
							
						</div>
					</ul>

					<div class="clearfix"></div>

					<div class="sorting">

						<div class="col-sm-3">

						</div>
						<div class="col-sm-3">

						</div>
						<div class="col-sm-6">
							<div class="col-sm-7 col-xs-7">
								Page 
								<select class="form-control page-field" onChange="window.location.href=this.value">
									<?php for ($i=1; $i <= $maxSelect; $i++): $value = ($i-1)*$per_page ?>
									<option value="<?=$base_url.'/'.$value?>" <?=($currentPage == $i ? 'selected' : '')?>><?=$i?></option>
									<?php endfor; ?>
								</select>

								of <?=$maxSelect?>
							</div>
							<div class="col-sm-5 col-xs-5">
								<?=$pagination?>
							</div>
						</div>
						<div class="clearfix"></div>

					</div>

				</div>

				<?php else: ?>
					<div class="col-sm-9 col-sm-pull-3">
					No Category Found
					</div>
				<?php endif; ?>	

			</div>
		</div>
	</div>
</div>