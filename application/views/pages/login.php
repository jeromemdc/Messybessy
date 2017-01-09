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
	
			<div class="form row">
				<h4>Login</h4>

				<div class="col-sm-12">
					<form class="form-horizontal" method="post" action="<?=current_url()?>">

						<div class="form-group <?=(form_error('email') ? 'has-error' : '')?>">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?=set_value('email')?>">
								<div class="help-block"><?=form_error('email')?></div>
							</div>
						</div>
						<div class="form-group <?=(form_error('password') ? 'has-error' : '')?>">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?=set_value('password')?>">
								<div class="help-block"><?=form_error('password')?></div>
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

			</div>

		</div>

	</div>

</div>	
