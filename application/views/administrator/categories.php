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
		<form action="<?=base_url()?>administrator/delete_category?route=catalog" method="post">
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
                        <a href="add_category?route=catalog" class="btn btn-primary m-r-5 pull-right" title="add"><i class="fa fa-plus"></i></a>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all"></th>
                                        <th>Category Name</th>
                                        <th>Featured Image</th>
                                        <th>Logo</th>
                                        <td class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($results): $i = 0;
                                            foreach($results as $key => $row): $i++; 
                                    ?>
                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" name="delete[]" value="<?=$row->cat_id?>"></td>
                                                <td><?=$row->cat_name?></td>
                                                <td class="text-center">
                                                    <a href="<?=base_url()?>uploads/img/<?=$row->image?>" data-lightbox="gallery-group-1">                                                    
                                                        <img src="<?=base_url()?>uploads/img/<?=$row->image?>" width="100" alt="" class="">
                                                    </a>    
                                                </td>
                                                <td class="text-center">
                                                    <?php if($row->logo): ?>
                                                    <a href="<?=base_url()?>uploads/img/<?=$row->logo?>" data-lightbox="gallery-group-1">                                                    
                                                        <img src="<?=base_url()?>uploads/img/<?=$row->logo?>" width="100" alt="" class="">
                                                    </a>    
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-right">
                                                    <a class="btn btn-warning btn-icon btn-circle" href="<?=base_url()?>administrator/edit_category/<?=$row->cat_id?>?route=catalog"><i class="fa fa-pencil"></i></a>
                                                    <!-- <a class="btn btn-danger btn-icon btn-circle delete" href="<?=base_url()?>administrator/delete_category/<?=$row->cat_id?>"><i class="fa fa-times"></i></a> -->
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