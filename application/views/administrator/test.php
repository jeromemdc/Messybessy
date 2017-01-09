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
                    <div class="panel-body">

                        <?php if($this->session->flashdata('saved')): ?>
                            <div class="alert alert-success">
                                <button class="close" data-dismiss="alert"></button>
                                <span><?=$this->session->flashdata('saved')?></span>
                            </div>
                        <?php endif; ?>

                        <p><a href="add_slider?route=system" class="btn btn-primary m-r-5"><i class="fa fa-plus"></i> New Slider</a></p>

                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($results as $name => $row): ?>
                                        <?php $i = 0; ?>
                                        <?php foreach($row as $subject): ?>
                                            
                                                <tr>
                                                    <?php if ($i === 0): ?>
                                                        <td rowspan="8"><?php echo $name; ?></td>
                                                    <?php endif; ?>
                                                    
                                                    <td><?php echo '<pre>'.print_r($subject,1).'</pre>';  ?></td>
                                                    <td><?php echo $subject->title; ?></td>
               
                                                    <?php if ($i === 0): ?>
                                                        <td rowspan="8"><?php echo $row->title; ?></td>
                                                        <td rowspan="8"><?php echo $row->title; ?></td>
                                                    <?php endif; ?>
                                                </tr>
                                            
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                        
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
    </div>
<!-- end #content -->