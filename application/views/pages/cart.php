<div id="body" class="container-fluid inner">

    <div class="header row">
        <div id="about" class="pattern">

        </div>

        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a></li>
                            <li>Cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="body-content row">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <?php if($cart): ?>
                 <form action="<?=base_url()?>cart" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity/Update</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php foreach ($cart as $product): ?>
                            <tr>
                                <td><img width="60" src="<?=base_url().'uploads/img/'.$product['image']?>" alt="<?=$product['name']?>" class="img-responsive"></td>
                                <td><?=$product['name']?><br><?=$product['attribute']?></td>
                                <td>
                                    <input type="number" name="qty[]" value="<?=$product['qty']?>" class="form-control"/>
                                    <input type="hidden" name="rowid[]" value="<?=$product['rowid']?>"/>
                                </td>
                                <td>Php <?=number_format($product['price'],2)?></td>
                                <td>Php <?=number_format($product['subtotal'],2)?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" style="text-align:right">Total Price:   </td>
                                <td>Php <?=$this->cart->format_number($this->cart->total())?></td>
                            </tr>

                        </tbody>
                    </table>

                    <a href="<?=base_url()?>product-category/bath-body" class="btn">Continue Shopping</a>
                    <input type="submit" name="update" class="btn btn-primary" value="Update Cart">
                    <a href="<?=base_url()?>checkout" class="btn">Checkout</a>
                    </form>
                    <?php else: ?>
                    <p>Your cart is currently empty.</p>
                    <a href="<?=base_url()?>product-category/bath-body" class="btn">Continue Shopping</a>
                    <?php endif; ?>    
                </div>
            </div>
        </div>
    </div>
</div>  