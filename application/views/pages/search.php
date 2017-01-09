<div id="body" class="messyman container-fluid inner">
	<div class="header row">
		<div id="about" class="pattern">

		</div>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
							<li><a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a></li>
							
						</ol>
					</div>
				</div>
			</div>
		</div>

		
	</div>

	<div class="intro row">
			<center>
				
				<p class="col-sm-12">Search Results for "<?=$search?>"</p>
			</center>	
	
	</div>
	<div id="products" class="body-content row">

		<div class="container">
		
			<div class="row">

				<?php $this->load->view('pages/sidebar'); ?>

				<div class="col-sm-9 col-sm-pull-3">
					<div class="sorting">

						<!--div class="col-sm-3">
							<select class="form-control">
								<option>Product Type</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div-->
						<div class="col-sm-3">
							<select class="form-control" onChange="window.location.href=this.value">
								<option value="<?=base_url().'search/'.$this->uri->segment(2).'/name-asc'?>" <?=($this->uri->segment(3) == 'name-asc' ? 'selected' : '')?>>Sort by name</option>
								<option value="<?=base_url().'search/'.$this->uri->segment(2).'/date-desc'?>" <?=($this->uri->segment(3) == 'date-desc' ? 'selected' : '')?>>Sort by newness</option>
								<option value="<?=base_url().'search/'.$this->uri->segment(2).'/price-asc'?>" <?=($this->uri->segment(3) == 'price-asc' ? 'selected' : '')?>>Sort by price: low to high</option>
								<option value="<?=base_url().'search/'.$this->uri->segment(2).'/price-desc'?>" <?=($this->uri->segment(3) == 'price-desc' ? 'selected' : '')?>>Sort by price: high to low</option> 
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
										<img src="<?=base_url().'uploads/original/'.$product->prod_image?>" alt="<?=$product->name?>" class="img-responsive">
									</a>
								</div>

								<div class="prod-info">
									<div class="prod-name"><?=$product->name?></div>
									<div class="prod-price">Php <?=$product->price?></div>
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

			</div>
		</div>
	</div>
</div>