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
							<li><a href="<?=base_url()?>blog">Blog</a></li>
							<li><?=$blog->title?></li>	
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="products" class="body-content row">
		<div class="container">
			<div id="sidebar" class="col-sm-3 col-sm-push-9">
				<div class="row">
					<div class="col-sm-12">
						<div class="sidebar-cat-title">News Archive</div>
						
						<div class="sidebar-cat-body">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

								<?php 
									foreach($archives as $key =>  $archive): 
										$month = date('m', strtotime($archive->date));
										$month2 = date('m', strtotime($blog->date));
										$year = date('Y', strtotime($archive->date));
										$year2 = date('Y', strtotime($blog->date));

										if($month == $month2 && $year == $year2){
											$active = 'in';
										}else{
											$active = '';
										}
								?>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?=$key?>" aria-expanded="true" aria-controls="collapseOne">
												<?=date('F Y', strtotime($archive->date))?> (<?=$archive->total?>)
											</a>
										</h4>
									</div>

									<div id="<?=$key?>" class="panel-collapse collapse <?=$active?>" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
										<?php $children = $this->home_model->getChildArchive(date('m', strtotime($archive->date)),date('Y', strtotime($archive->date))); ?>
											<ul>
												<?php foreach ($children as $key => $child): ?>
												<li><a href="<?=base_url().'blog/'.$child->slug?>" class="<?=($child->slug == $this->uri->segment(2) ? 'active' : '')?>"><?=$child->title?></a></li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<?php foreach ($this->data['ads'] as $ads): ?> 
					<div class="col-sm-12 hidden-xs">
						<img src="<?=base_url().'uploads/img/'.$ads->image?>" class="img-responsive" alt="<?=$ads->image?>">
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="col-sm-9 col-sm-pull-3">
				<div class="prod row">
					<div class="prod-info col-sm-12">
						<div class="prod-name"><h3><?=$blog->title?></h3></div>
						<div class="author">
							<p><?=$blog->author.', '.date('F d, Y',strtotime($blog->date))?></p>
						</div>
						<br>
						<div class="prod-image">
							<img src="<?=base_url().'uploads/img/'.$blog->image?>" class="img-responsive">
						</div>
						<div class="prod-desc">
							<?=$blog->content?>
						</div>	
					</div>
				</div>
			</div>		
		</div>
	</div>

</div>