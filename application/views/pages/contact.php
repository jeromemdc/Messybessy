<div id="body" class="container-fluid inner">

	<div class="header row">
		<div id="about" class="pattern">

		</div>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
							<li><a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a></li>
							<li>Contact Us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<?php if($result->image || $result->sub_title || $result->description): ?>
		<div class="intro">
			<div class="container">
				<div class="row">
					<center>
						<?php if($result->image): ?><img src="<?=base_url().'uploads/img/'.$result->image?>" alt="<?=$result->title?>" class="pagetitleimg"><?php endif; ?>
						<?php if($result->sub_title): ?><h4><?=$result->sub_title?></h4><?php endif; ?>
						<?php if($result->description): ?><p class="col-sm-12"><?=$result->description?></p>
						<div class="clearfix"></div><br> <?php endif; ?>
					</center>
				</div>
			</div>
		</div>
		<?php endif; ?>
		



	</div>

	<div id="contact" class="body-content row">
		<div class="container">
			<?php if($success == 1): ?>
			<div class="form-group">
	            <div class="col-sm-12">
	                <div class="alert alert-success" role="alert">
	                  <strong>Thank you!</strong> Your message has been sent and we will get back to you soonest.
	                </div>  
	            </div>
	        </div>
			<?php endif; ?>
			
			<div class="form row">
				<h4>Write to us</h4>

				<div class="col-sm-6">
					<form class="form-horizontal" method="post" action="<?=current_url()?>">
						<div class="form-group <?=(form_error('name') ? 'has-error' : '')?>">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?=set_value('name')?>">
								<div class="help-block"><?=form_error('name')?></div>
							</div>
						</div>
						<div class="form-group <?=(form_error('email') ? 'has-error' : '')?>">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?=set_value('email')?>">
								<div class="help-block"><?=form_error('email')?></div>
							</div>
						</div>
						<div class="form-group <?=(form_error('contact') ? 'has-error' : '')?>">
							<label class="col-sm-2 control-label">Contact No.</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="number" name="contact" placeholder="Contact No." value="<?=set_value('contact')?>">
								<div class="help-block"><?=form_error('contact')?></div>
							</div>
						</div>
						<div class="form-group <?=(form_error('message') ? 'has-error' : '')?>">
							<label class="col-sm-2 control-label">Message</label>
							<div class="col-sm-10">
								<textarea row="4" class="form-control" id="message" name="message" placeholder="Message"><?=set_value('message')?></textarea>
								<div class="help-block"><?=form_error('message')?></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input id="submit" type="submit" value="Submit" class="btn submit-btn">
							</div>
						</div> 
						
					</form>
				</div>

				<div class="col-sm-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.8067030233574!2d121.01163471483977!3d14.553043689832792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c907e5174509%3A0xb11432a8e75787cf!2sMessy+Bessy+-+Main+Office!5e0!3m2!1sen!2s!4v1470725165047" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>

			</div>

			<div class="row">
				<h4>Visit our stores</h4>

				<ul class="store-list">
					<?php foreach ($stores as $store): ?>
					<li class="col-sm-4">
						<h3><?=$store->name?></h3>
						<p><?=$store->address?></p>
					</li>
					<?php endforeach; ?>
					
					<div class="clearfix"></div><br><br>
				</ul>

			</div>

			<div class="row">
				<h4>Our Partner Retailers</h4>

				<ul class="partner-list">
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/beautybar.jpg" class="img-responsive" alt="Beauty Bar">
						</center>
					</li>
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/echostore.jpg" class="img-responsive" alt="Echo Store">
						</center>
					</li>
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/makeroom.jpg" class="img-responsive" alt="Make Room & More">
						</center>
					</li>
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/rob-flowers.jpg" class="img-responsive" alt="Robinsons Flower Shop">
						</center>
					</li>
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/rob-supermarket.jpg" class="img-responsive" alt="Robinsons Supermarket">
						</center>
					</li>
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/rustans-supermarket.jpg" class="img-responsive" alt="Rustans Supermarket">
						</center>
					</li>
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/shopwise.jpg" class="img-responsive" alt="Shopwise">
						</center>
					</li>
					<li class="col-xs-6 col-sm-3">
						<center>
						<img src="<?=base_url()?>/includes/img/partners/sm-hypermarket.jpg" class="img-responsive" alt="SM Hypermarket">
						</center>
					</li>
				</ul>

			</div>

		</div>

	</div>

</div>	
