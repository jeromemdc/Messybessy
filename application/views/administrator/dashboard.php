<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Dashboard</h1>
		<!-- end page-header -->
		
		<!-- begin row -->
		<div class="row">
			<!-- begin col-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="widget widget-stats bg-green">
					<div class="stats-icon"><i class="fa fa-shopping-cart"></i></div>
					<div class="stats-info">
						<h4>TOTAL ORDERS</h4>
						<p>0</p>	
					</div>
					<div class="stats-link">
						<a href="<?=base_url()?>administrator/entries">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					</div>
				</div>
			</div>
			<!-- end col-3 -->

			<!-- begin col-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="widget widget-stats bg-purple">
					<div class="stats-icon"><i class="fa fa-credit-card"></i></div>
					<div class="stats-info">
						<h4>TOTAL SALES</h4>
						<p>0</p>	
					</div>
					<div class="stats-link">
						<a href="#">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					</div>
				</div>
			</div>
			<!-- end col-3 -->

			<!-- begin col-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="widget widget-stats bg-blue">
					<div class="stats-icon"><i class="fa fa-user"></i></div>
					<div class="stats-info">
						<h4>TOTAL CUSTOMERS</h4>
						<p>0</p>	
					</div>
					<div class="stats-link">
						<a href="#">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					</div>
				</div>
			</div>
			<!-- end col-3 -->

			<!-- begin col-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="widget widget-stats bg-red">
					<div class="stats-icon"><i class="fa fa-th"></i></div>
					<div class="stats-info">
						<h4>TOTAL PRODUCTS</h4>
						<p><?=$products?></p>	
					</div>
					<div class="stats-link">
						<a href="<?=base_url()?>administrator/products?route=catalog">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					</div>
				</div>
			</div>
			<!-- end col-3 -->
		</div>
	</div>
<!-- end #content -->