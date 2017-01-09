<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li><a href="javascript:;">Tables</a></li>
		<li class="active"><?=$title?></li>
	</ol>

	<h1 class="page-header"><?=$title?> </h1>

    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-6">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Order Details</h4>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <span class="fa-stack fa text-primary"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-calendar fa-stack-1x fa-inverse"></i></span> 
                                    <?=$result->date?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fa-stack fa text-primary"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-credit-card fa-stack-1x fa-inverse"></i></span> 
                                    <?=$result->payment_method?>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <span class="fa-stack fa text-primary"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-truck fa-stack-1x fa-inverse"></i></span> 
                                    <?=$result->shipping_method?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Customer Details</h4>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <span class="fa-stack fa text-primary"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-user fa-stack-1x fa-inverse"></i></span> 
                                    <?=$result->fname.' '.$result->lname?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fa-stack fa text-primary"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span> 
                                    <?=$result->email?>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <span class="fa-stack fa text-primary"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span> 
                                    <?=$result->phone?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>        

    <div class="row">
       <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Order (#<?=$result->order_id?>)</h4>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                                
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="width-50">Payment Address</th>
                                    <th class="width-50">Shipping Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><p><?=$result->company?></p><p><?=$result->address1?></p><p><?=$result->address2?></p><p><?=$result->city?></p><p><?=$result->state?></p><p><?=$result->zipcode?></p><?=$result->country?><p></p></td>
                                    <td><p><?=$result->ship_company?></p><p><?=$result->ship_address1?></p><p><?=$result->ship_address2?></p><p><?=$result->ship_city?></p><p><?=$result->ship_state?></p><p><?=$result->ship_zipcode?></p><?=$result->ship_country?><p></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                                
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>SKU</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; foreach ($carts as $cart): ?>
                                    <?php
                                        $total += intval($cart->item_total_price);
                                    ?>
                                <tr>
                                    <td><?=$cart->item_name?></td>                                    
                                    <td><?=$cart->pid?></td>                                    
                                    <td class="text-right"><?=$cart->item_quantity?></td>                                    
                                    <td class="text-right">Php <?=number_format($cart->item_price,2)?></td>                                    
                                    <td class="text-right">Php <?=number_format($cart->item_total_price,2)?></td>                                    
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4" class="text-right">Sub-Total</td>
                                    <td class="text-right">Php <?=number_format($total,2)?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>