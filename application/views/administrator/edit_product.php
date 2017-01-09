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
    <form action="<?=base_url().'administrator/edit_product/'.$product->pid.'?route=catalog'?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" data-parsley-validate="true">
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
                            <label class="col-md-3 control-label">Featured Image</label>
                            <?php $this->load->view('administrator/media_btn', array('image_type' => 'image', 'current_image' => array('filename' => $product->image))); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Name <code>*</code></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="<?=$product->name?>" data-parsley-required="true"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Price <code>*</code></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" value="<?=$product->price?>" data-parsley-type="number" data-parsley-required="true" onkeypress="return onlyDotsAndNumbers(event)"/>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category <code>*</code></label>
                            <div class="col-md-6">
                                <?=form_dropdown('cat_id', $categories, $product->cat_id, 'class="form-control" data-parsley-required="true"');?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="" class="form-control" rows="8"><?=$product->description?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Model</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="model" value="<?=$product->model?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">SKU</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sku" value="<?=$product->sku?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Points</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="points" value="<?=$product->points?>" onkeypress="return onlyDotsAndNumbers(event)" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Quantity</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quantity" value="<?=$product->quantity?>" onkeypress="return onlyDotsAndNumbers(event)" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Featured</label>
                            <div class="col-md-6">
                                <select name="featured" id="" class="form-control">
                                    <option value="0" <?=($product->featured == 0 ? 'selected' : '')?>>No</option>
                                    <option value="1" <?=($product->featured == 1 ? 'selected' : '')?>>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6">
                                <select name="status" id="" class="form-control">
                                    <option value="1" <?=($product->featured == 1 ? 'selected' : '')?>>Enable</option>
                                    <option value="2" <?=($product->featured == 2 ? 'selected' : '')?>>Disable</option>
                                </select>
                            </div>
                        </div>

                    </div>    
                </div>
              
                <div class="tab-pane fade" id="default-tab-2">
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta Tag Title</label>
                            <div class="col-md-6">
                                <textarea name="meta_title" id="" class="form-control"><?=$meta->meta_title?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta Tag Description</label>
                            <div class="col-md-6">
                                <textarea name="meta_description" id="" class="form-control"><?=$meta->meta_description?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta Tag Keywords</label>
                            <div class="col-md-6">
                                <textarea name="meta_keywords" id="" class="form-control"><?=$meta->meta_keywords?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Tags <span class="btn btn-info btn-icon btn-circle btn-sm"><i class="fa fa-question" data-toggle="tooltip" title="" data-original-title="comma separated"></i></span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tags" value="<?=$meta->tags?>" />
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