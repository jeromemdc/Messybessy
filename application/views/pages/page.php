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
							<li>About Us</li>
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

		<div class="subnav">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<center>
							<div class="" id="sub-nav">
						      	<ul class="nav nav-pills nav-justified">
									<li role="presentation" class="<?=($this->uri->segment(1) == 'our_story' ? 'active' : '')?>"><a href="<?=base_url()?>our-story">Our Story</a></li>
									<li role="presentation" class="<?=($this->uri->segment(1) == 'our-social-innovation' ? 'active' : '')?>"><a href="<?=base_url()?>our-social-innovation">Our Social Innovation</a></li>
									<li role="presentation" class="<?=($this->uri->segment(1) == 'our-heroes' ? 'active' : '')?>"><a href="<?=base_url()?>our-heroes">Our Scholars</a></li>
								</ul>
						      
						    </div><!-- /.navbar-collapse -->
						</center>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php if($this->uri->segment(1) == 'our-heroes'): ?>
		<div id="about" class="body-content row">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<section class="image-grid">

							<?php foreach ($heroes as $key => $hero): ?>
							<div class="image__cell is-collapsed">
								<div class="image--basic">
									<img class="basic__img" src="<?=base_url().'uploads/img/'.$hero->image?>" alt="<?=$hero->name?>" >
									<div class="arrow--up"></div>
								</div>
								<div class="image--expand">
									<!--a href="#close-jump-1" class="expand__close"></a-->
									<div class="image--content">
										<div class="hero-info">
											<h4><?=$hero->name?></h4>
											<p><?=$hero->age?> years old</p>
											<p><?=$hero->title?></p>
										</div>
										<?=$hero->content?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>


						</section>


					</div>

				</div>
			</div>

		</div>
	<?php else:
			echo $result->content;
		endif;
	?>

</div>	