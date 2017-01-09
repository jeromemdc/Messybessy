<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Form Stuff</a></li>
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
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Form Elements</h4>
                </div>
                <div class="panel-body">

					<?=form_open_multipart('administrator/add_slider?route=system','class=form-horizontal data-parsley-validate=true' );?>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Featured Image <code>*</code></label>
                            <?php $this->load->view('administrator/media_btn', array('image_type' => 'image')); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Background Image <code>*</code></label>
                            <?php $this->load->view('administrator/media_btn', array('image_type' => 'logo')); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Title </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="<?=set_value('title')?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="link" value="<?=set_value('link')?>" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-sm btn-success" >Submit Button</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
</div>