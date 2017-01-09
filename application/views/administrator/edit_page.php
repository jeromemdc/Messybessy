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

    <?php if($this->session->flashdata('saved')): ?>
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert"></button>
            <span><?=$this->session->flashdata('saved')?></span>
        </div>
    <?php endif; ?>                        

    <!-- begin row -->
    <?=form_open_multipart(current_url().'?route=system','class=form-horizontal data-parsley-validate=true' );?>
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
                            <label class="col-md-3 control-label">Image</label>
                            <?php
                                $image = array('image_type' => 'image');
                                if($result->image){
                                    $current_image  = array('current_image' => array('filename' => $result->image));
                                    $image = array_merge($image,$current_image);
                                }                               
                            ?>
                            <?php $this->load->view('administrator/media_btn', $image); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="<?=$result->title?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Sub Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sub_title" value="<?=$result->sub_title?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea name="description" class="form-control"><?=$result->description?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Content</label>
                            <div class="col-md-6">
                                <textarea name="content" class="form-control ckeditor"><?=$result->content?></textarea>
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