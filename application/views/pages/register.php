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
                <h4>Register Details</h4>

                <form class="form-horizontal" method="post" action="<?=current_url()?>">
                <div class="col-sm-6">
                    <div class="form-group <?=(form_error('fname') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">FirstName</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" value="<?=set_value('fname')?>">
                            <div class="help-block"><?=form_error('fname')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('lname') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">LastName</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname" value="<?=set_value('lname')?>">
                            <div class="help-block"><?=form_error('lname')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('email') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?=set_value('email')?>">
                            <div class="help-block"><?=form_error('email')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('company') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company" value="<?=set_value('company')?>">
                            <div class="help-block"><?=form_error('company')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('phone') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="<?=set_value('phone')?>">
                            <div class="help-block"><?=form_error('phone')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('address1') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Address1</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address1" value="<?=set_value('address1')?>">
                            <div class="help-block"><?=form_error('address1')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('address2') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Address2</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address2" value="<?=set_value('address2')?>">
                            <div class="help-block"><?=form_error('address2')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('city') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" value="<?=set_value('city')?>">
                            <div class="help-block"><?=form_error('city')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('state') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="state" value="<?=set_value('state')?>">
                            <div class="help-block"><?=form_error('state')?></div>
                        </div>
                    </div>
                    <div class="form-group <?=(form_error('zipcode') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">ZipCode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="zipcode" value="<?=set_value('zipcode')?>">
                            <div class="help-block"><?=form_error('zipcode')?></div>
                        </div>
                    </div>

                    <div class="form-group <?=(form_error('password') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="<?=set_value('password')?>">
                            <div class="help-block"><?=form_error('password')?></div>
                        </div>
                    </div>

                    <div class="form-group <?=(form_error('cpassword') ? 'has-error' : '')?>">
                        <label class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="cpassword" value="<?=set_value('cpassword')?>">
                            <div class="help-block"><?=form_error('cpassword')?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <input id="submit" type="submit" value="Continue" class="btn submit-btn">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    
                </div>
                </form>

                  
            </div>
        </div>
    </div>
</div>  