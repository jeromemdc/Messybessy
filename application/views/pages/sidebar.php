<div id="sidebar" class="col-sm-3 col-sm-push-9">
	<div class="row">
		<div class="col-sm-12">
			<div class="sidebar-cat-title">
				Categories
			</div>
			<div class="sidebar-cat-body">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php foreach ($this->data['categories'] as $cat): ?> 
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a href="<?=base_url().'product-category/'.$cat->slug?>"><?=$cat->cat_name?> (<?=$cat->count?>)</a>
							</h4>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 hidden-xs" id="group-ads">
		<?php foreach ($this->data['ads'] as $ads): ?> 
			<div class="control-ads">
				<span class="remove-photo glyphicon glyphicon-remove" aria-hidden="true" id="<?=$ads->id?>"></span>
				<a href="<?=base_url().'ads/'.$ads->id?>" target="_BLANK">
					<img src="<?=base_url().'uploads/img/'.$ads->image?>" class="img-responsive" alt="<?=$ads->image?>" >
				</a>
			</div>
		<?php endforeach; ?>
		</div>
	</div>

</div>