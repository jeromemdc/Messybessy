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
    <?php echo validation_errors('<div class="alert alert-danger fade in m-b-15">
                                <strong>Error!</strong> ',
                                '<span class="close" data-dismiss="alert">×</span>
                            </div>'); ?>

    <?php if($this->session->flashdata('saved')): ?>
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert"></button>
            <span><?=$this->session->flashdata('saved')?></span>
        </div>
    <?php endif; ?>                        

    <!-- begin row -->
    <form action="<?=base_url()?>administrator/home_page?route=system" method="post" accept-charset="utf-8" data-parsley-validate="true">
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#default-tab-1" data-toggle="tab" aria-expanded="false">Data</a></li>
                <li class=""><a href="#default-tab-2" data-toggle="tab" aria-expanded="true">SEO</a></li>
                <li class=""><button class="btn btn-success btn-icon m-t-5"><i class="fa fa-save"></i></button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="default-tab-1">
                    <div class="panel-body form-horizontal">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Introduction </label>
                            <div class="col-md-6">
                                <textarea name="intro" class="form-control ckeditor"><?=$result->intro?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Featured Products </label>
                            <div class="col-md-6">
                                <textarea name="featured" class="form-control ckeditor"><?=$result->featured?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Our Products </label>
                            <div class="col-md-6">
                                <textarea name="our_products" class="form-control ckeditor"><?=$result->our_products?></textarea>
                            </div>
                        </div>

                    </div>    
                </div>
                
                <div class="tab-pane fade" id="default-tab-2">
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta Tag Title</label>
                            <div class="col-md-6">
                                <textarea name="meta_title" id="" class="form-control"><?=$result->meta_title?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta Tag Description</label>
                            <div class="col-md-6">
                                <textarea name="meta_description" id="" class="form-control"><?=$result->meta_description?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta Tag Keywords</label>
                            <div class="col-md-6">
                                <textarea name="meta_keywords" id="" class="form-control"><?=$result->meta_keywords?></textarea>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
        <!-- end col-6 -->
       </form>
    </div>
</div>