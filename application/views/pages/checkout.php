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
                            <li>Checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="body-content row">
        <div class="container">
            <div class="form row">
                <h4>Checkout Details</h4>

                <?php if($cart) :?>
                <form class="form-horizontal" method="post" action="<?=base_url()?>checkout">
                <div class="col-sm-6">
                    <div class="form-group <?=(form_error('fname') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">FirstName</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" value="<?=(set_value('fname') ? set_value('fname') : $user['fname'])?>">
                            <div class="help-block"><?=form_error('fname')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('lname') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">LastName</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname" value="<?=(set_value('lname') ? set_value('lname') : $user['lname'])?>">
                            <div class="help-block"><?=form_error('lname')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('email') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?=(set_value('email') ? set_value('email') : $user['email'])?>">
                            <div class="help-block"><?=form_error('email')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('company') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company" value="<?=(set_value('company') ? set_value('company') : $user['company'])?>">
                            <div class="help-block"><?=form_error('company')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('phone') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="<?=(set_value('phone') ? set_value('phone') : $user['phone'])?>">
                            <div class="help-block"><?=form_error('phone')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('address1') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Address1</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address1" value="<?=(set_value('address1') ? set_value('address1') : $user['address1'])?>">
                            <div class="help-block"><?=form_error('address1')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('address2') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Address2</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address2" value="<?=(set_value('address2') ? set_value('address2') : $user['address2'])?>">
                            <div class="help-block"><?=form_error('address2')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('city') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" value="<?=(set_value('city') ? set_value('city') : $user['city'])?>">
                            <div class="help-block"><?=form_error('city')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('state') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="state" value="<?=(set_value('state') ? set_value('state') : $user['state'])?>">
                            <div class="help-block"><?=form_error('state')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('zipcode') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">ZipCode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="zipcode" value="<?=(set_value('zipcode') ? set_value('zipcode') : $user['zipcode'])?>">
                            <div class="help-block"><?=form_error('zipcode')?></div>
                        </div>
                    </div>

                    <?php if(!$this->session->userdata('signed_in')): ?>

                    <div class="form-group">
                        <label class="col-sm-12"><input type="checkbox" name="check-account" id="check-account" value="1"> Create an account?</label>
                    </div>

                    <div id="create-account" style="display:none">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" value="<?=set_value('password')?>">
                                <div class="help-block"><?=form_error('password')?></div>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <div class="form-group">
                        <label class="col-sm-12">Ship to a different Address? <input type="checkbox" name="diff-account" id="diff-account" value="1"></label>
                    </div>
                    

                    <div id="shipping" style="display:none">
                        <div class="form-group <?=(form_error('ship_fname') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">FirstName</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_fname" value="<?=set_value('ship_fname')?>">
                                <div class="help-block"><?=form_error('ship_fname')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_lname') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">LastName</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_lname" value="<?=set_value('ship_lname')?>">
                                <div class="help-block"><?=form_error('ship_lname')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_email') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="ship_email" value="<?=set_value('ship_email')?>">
                                <div class="help-block"><?=form_error('ship_email')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_company') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">Company</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_company" value="<?=set_value('ship_company')?>">
                                <div class="help-block"><?=form_error('ship_company')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_phone') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_phone" value="<?=set_value('ship_phone')?>">
                                <div class="help-block"><?=form_error('ship_phone')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_address1') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">Address1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_address1" value="<?=set_value('ship_address1')?>">
                                <div class="help-block"><?=form_error('ship_address1')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_address2') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">Address2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_address2" value="<?=set_value('ship_address2')?>">
                                <div class="help-block"><?=form_error('ship_address2')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_city') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_city" value="<?=set_value('ship_city')?>">
                                <div class="help-block"><?=form_error('ship_city')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_state') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">State</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_state" value="<?=set_value('ship_state')?>">
                                <div class="help-block"><?=form_error('ship_state')?></div>
                            </div>
                        </div>
                        <div class="form-group <?=(form_error('ship_zipcode') ? 'has-error' : '')?>">
                            <label class="col-sm-2 control-label">ZipCode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ship_zipcode" value="<?=set_value('ship_zipcode')?>">
                                <div class="help-block"><?=form_error('ship_zipcode')?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-8">PRODUCT</label>
                        <div class="col-sm-4 text-right">TOTAL</div>
                    </div>
                    <div class="form-group">
                        <hr class="col-sm-12">
                    </div>
                    <?php foreach ($cart as $product): ?>
                    <div class="form-group">
                        <label class="col-sm-8"><?=$product['name']?><br><?=$product['attribute']?></label>
                        <div class="col-sm-4 text-right">Php <?=number_format($product['subtotal'],2)?></div>
                    </div>
                    <?php endforeach; ?>
                    <div class="form-group">
                        <hr class="col-sm-12">
                    </div>
                    <div class="form-group">
                        <label class="col-sm-8">SUBTOTAL</label>
                        <div class="col-sm-4 text-right">Php <?=$this->cart->format_number($this->cart->total())?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12"><input id="submit" type="submit" value="Continue" class="btn submit-btn"></label>
                    </div>
                </div>
                </form>

                <?php else: ?>
                        Your shopping cart is empty!
                <?php endif; ?>    
            </div>
        </div>
    </div>
</div>  