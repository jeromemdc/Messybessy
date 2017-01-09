<div id="body" class="messyman container-fluid inner">

	<div class="header row">
		<div id="about" class="pattern">

		</div>
		<?php if($products): ?>
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
							<li><a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a></li>
							<li><a href="<?=base_url().'product-category/'.$products[0]->slug?>"><?=$products[0]->cat_name?></a></li>
							<li><?=$products[0]->name?></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>

	<div id="products" class="body-content row">

		<div class="container">
		
			<div class="row">

				<?php $this->load->view('pages/sidebar'); ?>

				<?php if($products): ?>

				<div class="col-sm-9 col-sm-pull-3">
					
					<div class="prod row">
						<div class="prod-image col-sm-4">
							<img src="<?=base_url().'uploads/img/'.$products[0]->prod_image?>" alt="<?=$products[0]->name?>" class="img-responsive feat-image" >

							<ul class="other-imgs">
								<li>
									<a class="fancybox" href="<?=base_url().'uploads/img/'.$products[0]->prod_image?>" data-fancybox-group="gallery">
										<img src="<?=base_url().'uploads/img/'.$products[0]->prod_image?>" rel="<?=$products[0]->prod_image?>" class="img-responsive select-thumb">
									</a>	
								</li>
								<?php foreach ($images as $key => $image): ?>
								<li>
									<a class="fancybox" href="<?=base_url().'uploads/img/'.$image->image?>" data-fancybox-group="gallery">
										<img src="<?=base_url().'uploads/img/'.$image->image?>" rel="<?=$image->image?>" class="img-responsive select-thumb">
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="prod-info col-sm-8">
							<div class="prod-name">
								<h3><?=$products[0]->name?></h3>
							</div>
							<div class="prod-price">
								<?=$price?>
							</div>
							<div class="prod-desc">
								<p><?=nl2br($products[0]->prod_desc)?></p>
							</div>

							<?php if(@$products[1]): ?>
							<div class="prod-attribute">
								<select name="" id="select-option" class="form-control">
									<option value="">Choose an option</option>
									<?php foreach ($products as $product): ?>
									<option value="<?=$product->prod_var_id?>"><?=$product->var_attribute?></option>
									<?php endforeach; ?>
								</select>
								<p class="attr-price"></p>
							</div>
							<?php endif; ?>
							
							<form method="post" action="<?=base_url()?>buy">
								<input class="price" name="price_id" type="hidden">
								<input class="prod" name="prod_id" value="<?=$products[0]->pid?>" type="hidden">
								<input type="number" name="quantity" value="1" class="qty form-control" min="0" /><br>
								<input id="submit" type="submit" value="Buy" class="btn submit-btn">
							</form>

						</div>
					</div>

					<div class="clearfix"></div>

					<!--div class="post-prod">
						
						<ul class="nav nav-tabs" role="tablist">
							<<li role="presentation" class="active"><a href="#reviews" aria-controls="home" role="tab" data-toggle="tab">Reviews</a></li>
							<li role="presentation"><a href="#write-review" aria-controls="profile" role="tab" data-toggle="tab">Write a review</a></li>
							<li role="presentation" class="active"><a href="#availability" aria-controls="messages" role="tab" data-toggle="tab">Availability</a></li>
							
						</ul>

						
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane" id="reviews">
								<ul class="reviews">
									<li>
										<div class="subject">Very good!</div>
										<div class="prod-rating">
											<ul class="rating">
												<li class="star active"></li>
												<li class="star active"></li>
												<li class="star active"></li>
												<li class="star"></li>
												<li class="star"></li>
											</ul>
										</div>
										<div class="review-text">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
										</div>
										<div class="author">
											<p>Juan dela Cruz, June 30, 2016</p>
										</div>
									</li>
									<li>
										<div class="subject">Very good!</div>
										<div class="prod-rating">
											<ul class="rating">
												<li class="star active"></li>
												<li class="star active"></li>
												<li class="star active"></li>
												<li class="star"></li>
												<li class="star"></li>
											</ul>
										</div>
										<div class="review-text">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
										</div>
										<div class="author">
											<p>Juan dela Cruz, June 30, 2016</p>
										</div>
									</li>
								</ul>
							</div>

							<div role="tabpanel" class="tab-pane" id="write-review">
								<textarea class="form-control" rows="3" placeholder="Type your review here"></textarea>
								<a href="#!" class="btn btn-primary btn-lg pull-right">Submit review</a>
								<div class="clearfix"></div>
							</div>>

							<div role="tabpanel" class="tab-pane active" id="availability">
								<ul>
									<?php 
										if(!empty($availability)): 
											foreach ($availability as $availability): ?>
											<li><?=$availability?></li>
											<?php endforeach; 
										else: ?>
									<li>No results found</li>
									<?php endif; ?>
								</ul>	
							</div>
						</div>
					</div--> 

					<div class="clearfix"></div>
					

					<div class="sorting">

						<div class="col-sm-12">
							<p class="graybar-text">Similar Items</p>
						</div>
						<div class="clearfix"></div>

					</div>

					<ul class="product-list prod-inner">
						<div class="row">
							
							<?php foreach ($similarProducts as $product): ?>
							<li class="col-sm-4">
								<center>
									<div class="prod-image">
										<a href="<?=base_url().'product/'.$product->slug?>">
											<img src="<?=base_url().'uploads/img/'.$product->image?>" alt="<?=$product->name?>" class="img-responsive">
										</a>
									</div>

									<div class="prod-info">
										<div class="prod-name"><a href="<?=base_url().'product/'.$product->slug?>"><?=$product->name?></a></div>
										<div class="prod-price"><?=get_variation($product->pid)?></div>
									</div>
								</center>
							</li>
							<?php endforeach; ?>
						</div>
					</ul>

				</div>

			<?php else: ?>

				<div class="col-sm-9 col-sm-pull-3">
					No Product Found
				</div>

			<?php endif; ?>	

			</div>
		</div>
	</div>
</div>