<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li><a href="javascript:;">Tables</a></li>
		<li class="active"><?=$title?></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header"><?=$title?> </h1>
	<!-- end page-header -->
	<form action="<?=base_url()?>administrator/delete_order?route=system" method="post">
	<!-- begin row -->
	<div class="row">
	    <!-- begin col-12 -->
	    <div class="col-md-12">
	        <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Data Table - Default</h4>
                </div>

                <div class="panel-body" >
                    <?php if($this->session->flashdata('saved')): ?>
                    <div class="alert alert-success fade in pull-left">
                        <strong>Success!</strong>
                        <?=$this->session->flashdata('saved')?>
                        <span class="close m-l-10" data-dismiss="alert">×</span>
                    </div>
                    <?php endif; ?>
                    <button class="btn btn-danger m-r-5 pull-right delete" title="delete"><i class="fa fa-trash"></i></button>
                    <a href="add_hero?route=system" class="btn btn-primary m-r-5 pull-right" title="add"><i class="fa fa-plus"></i></a>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Date Purchased</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($results): 
                                        foreach($results as $row):
                                ?>
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" name="delete[]" value="<?=$row->order_id?>"></td>
                                            <td><?=$row->order_id?></td>
                                            <td><?=$row->fname.' '.$row->lname?></td>
                                            <td><?=$row->order_status?></td>
                                            <td class="text-right">Php <?=number_format($row->total_price,2)?></td>
                                            <td><?=date('Y-m-d H:i:s',strtotime($row->date))?></td>
                                            <td class="text-right">
                                                <a class="btn btn-default btn-icon btn-circle" href="<?=base_url()?>administrator/view_order/<?=$row->order_id?>?route=sales"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-warning btn-icon btn-circle" href="<?=base_url()?>administrator/edit_order/<?=$row->order_id?>?route=sales"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr class="odd gradeX">
                                            <td></td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                        </tr>
                                    <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
    </form>
</div>
<!-- end #content -->