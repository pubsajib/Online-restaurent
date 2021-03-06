<?php require_once "view/base/admin/header.php"; ?>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- fixed alert pop -->
<div class="productAddAlert success div-alert-success hide">
    <p>
        <span><i class="fa fa-bell-o" aria-hidden="true"></i></span>
        <span class="alert-success-pop">Successfully added to cart</span>
    </p>
</div>

<div class="productAddAlert danger div-alert-danger hide">
    <p>
        <span><i class="fa fa-bell-o" aria-hidden="true"></i></span>
        <span class="alert-danger-pop">Successfully added to cart</span>
    </p>
</div>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="common-parent">
                <?php //echo '<pre>'; print_r($data['allProducts']); echo '<pre>'; exit(); ?>
                    <!--warning-->
                    <div class="alert alert-success alert-dismissible" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!--warning end-->

                    <div id="dynamicAddFormContainer">
                        <div class="dynamicAddForm">
                            <div class="panel panel-default dynamicContentPanel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h4>Add Product</h4> 
                                        </div>

                                        <!--div class="col-sm-4">
                                            <div class="checkbox pull-left">
                                                <label>
                                                  <input type="checkbox" class="singleItemCheck"> Single Product
                                                </label>
                                            </div>
                                        </div-->

                                        <div class="col-sm-6">
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <form id="create_product" action="" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="name" type="text" class="form-control" id="" placeholder="Product Name">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <textarea name="description" placeholder="Product Description" class="form-control" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="row addType">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group select-type margin-top-15">
                                                            <!--label>Type</label-->
                                                            <select name="variations[]" class="selectpicker" multiple data-selected-text-format="count > 3" title="select types" style="width: 100%">
                                                                <?php if ($variations){
                                                                    foreach ($variations as $variation) {
                                                                        echo '<option value="'. $variation->variation_id .'">'. $variation->variation_name .'</option>';
                                                                    }
                                                                } ?>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                                
                                                <div class="row margin-top-10 offer-table offerHiddenWrapperContainer">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-xs-12">
                                                                <h4 class="pull-left margin-right-15">Offer</h4>
                                                                <input name="isOfferEnable" value="1" id="toggle-offer" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                                            </div>
                                                        </div>

                                                        <div class="table-responsive mw-350">
                                                            <table class="table table-hover table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="col-xs-1"> </th>
                                                                        <th class="col-xs-8"><p class="m-b-5">Product <input style="float: right; width: 110px; padding: 0px 12px;" name="offersQuantity" value="1" type="number" placeholder="Quantity"></p></th>
                                                                        <!--th class="col-xs-3"><p class="m-b-5"></p></th-->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    if ( $data['allProducts'] ) :
                                                                        foreach ($data['allProducts'] as $product) : ?>
                                                                            <tr id="offered-product-<?= $product->product_id ?>">
                                                                                <td class="col-xs-1">
                                                                                    <div class="checkbox no-margin offerHiddenWrapper">
                                                                                        <label>
                                                                                            <input name="offers[]" value="<?php echo $product->product_id; ?>" class="offer-status changeHidden" type="checkbox" disabled>
                                                                                            <input class="offerHiddenValue" type="hidden" name="offersChecked[]">
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="col-xs-8"><p> <?php echo $product->name; ?> </p></td>
                                                                                <!--td class="col-xs-3">
                                                                                    <input name="offersQuantity[]" type="number" value="1" class="form-control pOfferQtn" placeholder="Product Qunatity" min="1">
                                                                                </td-->
                                                                            </tr>
                                                                        <?php endforeach;
                                                                    endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <input name="price" type="text" class="form-control" id="" placeholder="Product Price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <select name="category_id" class="form-control w100">
                                                                <option value="">Select A Category</option>
                                                                <?php foreach ($categories as $category) { ?>
                                                                <option value="<?= $category->category_id?>"><?= $category->category_name?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="display_order" type="number" class="form-control" id="display_order" placeholder="Display Order">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-2 col-xs-12">
                                                        <image class="" src="http://lorempixel.com/38/38/">
                                                    </div>
                                                    <div class="col-sm-10 col-xs-12">

                                                        <!--<input name="image_name" type="file" >-->
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" readonly>
                                                            <label class="input-group-btn">
                                                                    <span class="btn btn-primary">
                                                                        Browse&hellip; <input name="image_name" type="file" style="display: none;">
                                                                    </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row margin-top-10 is_extra">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <h4 class="pull-left margin-right-15">Is extra</h4>
                                                        <input name="isExtra" value="True" id="toggle-isExtra" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                                    </div>
                                                </div>

                                                <div class="row margin-top-20 extra-table" id="extra-table">
                                                    <div class="col-sm-12 col-xs-12">

                                                        <div class="row">
                                                            <div class="col-sm-12 col-xs-12">
                                                                <h4 class="pull-left margin-right-15">Extra</h4>
                                                                <input name="isExtraEnable" value="1" id="toggle-extra" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                                            </div>
                                                        </div>

                                                        <div class="table-responsive mw-350">
                                                            <table class="table table-hover table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="col-xs-1">
                                                                            
                                                                        </th>
                                                                        <th class="col-xs-11"><p class="m-b-5">Product</p></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if ( $data['allProducts'] ) :
                                                                        foreach ($data['allProducts'] as $product) :
                                                                        if ( $product->is_extra == "True" ) : ?>
                                                                            <tr>
                                                                                <td class="col-xs-1">
                                                                                    <div class="checkbox no-margin">
                                                                                        <label>
                                                                                          <input name="extras[]" value="<?php echo $product->product_id; ?>" class="extra-status" type="checkbox" disabled>
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="col-xs-11"><p> <?php echo $product->name; ?> </p></td>
                                                                            </tr>
                                                                        <?php endif;
                                                                    endforeach;
                                                                    endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-xs-12 bundleChangeHiddenWrapperContainer">
                                                <div class="row margin-top-25">
                                                    <div class="col-sm-12 col-xs-12 bundle-table">
                                                        <h4 class="pull-left margin-right-15">Bundle</h4>
                                                        <input name="Bundle" value="1" id="toggle-bundle" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">

                                                        <div class="table-responsive mw-300 clearfix offer-table" style="clear: both">
                                                            <table class="table table-hover table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="col-xs-1">
                                                                            
                                                                        </th>
                                                                        <th class="col-xs-5"><p class="m-b-5">Product</p></th>
                                                                        <th class="col-xs-3"><p class="m-b-5">Number of each step</p></th>
                                                                        <th class="col-xs-3"><p class="m-b-5">Order of step</p></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if ( $data['allProducts'] ) :
                                                                        foreach ($data['allProducts'] as $product) : ?>
                                                                            <tr id="bundle-product-<?= $product->product_id ?>">
                                                                                <td class="col-xs-1">
                                                                                    <div class="checkbox no-margin bundleChangeHiddenWrapper">
                                                                                        <label>
                                                                                            <input name="bundles[]" value="<?php echo $product->product_id; ?>" class="bundle-status bundleChangeHidden" type="checkbox" disabled>
                                                                                            <input class="bundleHiddenValue" type="hidden" name="bundlesChecked[]">
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="col-xs-5"><p> <?php echo $product->name; ?> </p></td>
                                                                                <td class="col-xs-3">
                                                                                    <input name="bundleNumberOfEachStep[]" type="number" value="1" class="form-control pOfferQtn" placeholder="Product Qunatity" min="1">
                                                                                </td>
                                                                                <td class="col-xs-3">
                                                                                    <input name="bundleOrderOfStep[]" type="number" value="1" class="form-control pOfferQtn" placeholder="Product Qunatity" min="1">
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach;
                                                                    endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-xs-12">
                                                <button class="btn btn-success pull-right  margin-top-10 btn_create_product">submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive margin-top-40">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th class="text-center">Image</th>
                                <th>Category Name</th>
                                <th>Display order</th>
                                <th class="text-center">Offer</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody id="product_list">
                            <?php //echo "<pre>"; print_r($products); echo "</pre>"; ?>
                            <?php $counter = 1;?>
                            <?php if(!empty($products)) foreach ($products as $product) {?>
                            <tr>
                                <td><?= $counter ?></td>
                                <td><?= $product->name ?></td>
                                <td width="30%">
                                    <div class="pDescription-parent">
                                        <p class="pDescription">
                                            <?php if (isset($product->description) && $product->description != '') {?>
                                            <?= $product->description ?>
                                            <?php } else {?>
                                                N/A
                                            <?php }?>
                                            </p>
                                        <div class="expandBtn">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <!--<image class="pImage" src="http://lorempixel.com/40/40/">-->
                                    <?php if(isset($product->image_name) && $product->image_name != '') {?>
                                    <img class="pImage" src="<?= BASE_URL.'/assets/img/products/'.$product->image_name ?>">
                                    <?php } else {?>
                                        N/A
                                    <?php } ?>
                                </td>

                                <td><?= $product->category_name ?></td>
                                <td><?= $product->product_display_order ?></td>

                                <td class="text-center" width="15%">
                                    <div class="action-icon pull-left margin-left-15">
                                        <a class="btn btn-success call_offer_modal" href="javascript:;" title="Offer Setting" id="prod_<?= $product->product_id ?>" data-product_id="<?= $product->product_id ?>" data-offer_id="<?= ($product->offer != null) ? $product->offer->offer_id : null; ?>" data-offer_price="<?= ($product->offer != null) ? $product->offer->offer_price : null; ?>" data-offer_description="<?= ($product->offer != null) ? $product->offer->offer_description : null; ?>">
                                            <i class="fa fa-gift" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    
                                    <div class="material-switch discount-material-switch pull-left margin-top-15" title="Active/Inactive Offer" <?php if($product->offer_price=='' || $product->offer_price==0 ){echo "style=display:none";}?>>
                                        <input class="switch-check-offer" id="offer_status_<?= $product->product_id ?>" name="offer_is_active" type="checkbox" value="" data-offer_id="<?= ($product->offer != null) ? $product->offer->offer_id : null; ?>" <?= ($product->offer != null && $product->offer->offer_active == 'Active') ? 'checked' : ''; ?>/>
                                        <label for="offer_status_<?= $product->product_id ?>" class="label-default"></label>
                                    </div>
                                    
                                </td>
                                <td class="text-center" width="20%">

                                    <span class="action-icon">
                                        <a class="btn btn-primary" id="editProduct" href="javascript:;" title="Edit" onclick="editProduct(<?= $product->product_id?>)" >
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </span>

                                    <span class="action-icon">
                                        <a class="btn btn-danger" id="delProduct" href="javascript:;" title="Delete" onclick="deleteProduct(<?= $product->product_id?>)">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                        </a>
                                    </span>

                                    <span class="action-icon pull-left">
                                        <div class="material-switch discount-material-switch" title="Active/Inactive Product">
                                            <input class="switch-check-product" id="product_status_<?= $product->product_id ?>" name="" type="checkbox" data-product_id="<?=$product->product_id?>" <?= ($product->product_is_active == 'True') ? 'checked' : ''; ?>/>
                                            <label for="product_status_<?= $product->product_id ?>" class="label-default"></label>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <?php $counter++;?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!--    /*product edit modal*/-->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
            </div>

            <!--warning-->
            <div class="alert modal-alert-success alert-success alert-dismissible common-center-alert" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="alert modal-alert-danger alert-danger alert-dismissible common-center-alert" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <!--warning end-->

            <div class="modal-body">
                <form id="form_edit_product" action="">
                    <input type="hidden" name="product_id" value="">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input name="name" type="text" class="form-control" id="" placeholder="Product Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <label>Product Description</label>
                                    <textarea name="description" placeholder="Product Description" class="form-control margin-bottom-20" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input name="price" type="text" class="form-control" id="" placeholder="Product Price">
                                    </div>
                                    <div class="form-group">
                                        <label>Display Order</label>
                                        <input name="display_order" type="number" class="form-control" id="" placeholder="Display Order">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <!-- <div class="form-group">
                                            <input name="quantity" type="text" class="form-control" id="" placeholder="Product Quantity">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select name="category_id" class="form-control w100">
                                                <option value="">Select A Category</option>
                                                <?php foreach ($categories as $category) {?>
                                                    <option value="<?= $category->category_id?>"><?= $category->category_name?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row is_extra_popup"> <br>
                                        <div class="col-sm-12 col-xs-12 popUpRadioBtn">
                                            <h4 class="pull-left margin-right-15">Is extra</h4>
                                            <input type="hidden" name="isExtra" id="popUpRadioBtnHiddenInput" value="">
                                            <input value="True" id="toggle-isExtra-popup" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <label>Product Image</label>
                                    <div class="input-group margin-bottom-20">
                                        <input name="image" type="text" class="form-control" readonly>
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                Browse&hellip; <input name="image_name" type="file" style="display: none;">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="row addType">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group select-type sub-m-t-15">
                                                <!--label>Type</label-->
                                                <select name="variations[]" class="form-control w100 selectpicker variationsPOPUP" multiple data-selected-text-format="count > 3" title="select types" style="width: 100%">
                                                    <?php if ($variations){
                                                        foreach ($variations as $variation) {
                                                            echo '<option value="'. $variation->variation_id .'">'. $variation->variation_name .'</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <div class="row margin-top-15 offer-table offerHiddenWrapperContainerPopup">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12 popUpRadioBtn">
                                                    <h4 class="pull-left margin-right-15">Offer</h4>
                                                    <input name="isOfferEnable" value="1" id="toggle-offer-popup" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                                </div>
                                            </div>

                                            <div class="table-responsive mw-350">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-xs-1"> </th>
                                                            <th class="col-xs-8"><p class="m-b-5">Product <input style="float: right; width: 110px; padding: 0px 12px;" name="offersQuantity" id="offersQuantityPopup" value="1" type="number" placeholder="Quantity"></p></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        if ( $data['allProducts'] ) :
                                                            foreach ($data['allProducts'] as $product) : ?>
                                                                <tr id="offered-product-<?= $product->product_id ?>">
                                                                    <td class="col-xs-1">
                                                                        <div class="checkbox no-margin offerHiddenWrapper">
                                                                            <label>
                                                                                <input name="offers[]" value="<?php echo $product->product_id; ?>" class="offer-status changeHidden" type="checkbox" disabled>
                                                                                <input class="offerHiddenValue" type="hidden" name="offersChecked[]">
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-xs-8"><p> <?php echo $product->name; ?> </p></td>
                                                                    <!--td class="col-xs-3">
                                                                        <input name="offersQuantity[]" type="number" value="1" class="form-control pOfferQtn" placeholder="Product Qunatity" min="1">
                                                                    </td-->
                                                                </tr>
                                                            <?php endforeach;
                                                        endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>    
                                        </div>
                                    </div> <br><br>
                                    <div class="row margin-top-20 extra-table" id="extra-table-popup">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12 popUpRadioBtn">
                                                    <h4 class="pull-left margin-right-15">Extra</h4>
                                                    <input name="isExtraEnable" value="1" id="toggle-extra-popup" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                                </div>
                                            </div>
                                            <div class="table-responsive mw-300">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-xs-1"> </th>
                                                            <th class="col-xs-11"><p class="m-b-5">Product</p></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php if ( $data['allProducts'] ) :
                                                            foreach ($data['allProducts'] as $product) : 
                                                                if ( $product->is_extra == "True" ) : ?>
                                                                <tr id="extra-product-<?= $product->product_id ?>">
                                                                    <td class="col-xs-1">
                                                                        <div class="checkbox no-margin">
                                                                            <label>
                                                                              <input name="extras[]" value="<?php echo $product->product_id; ?>" class="extra-status" type="checkbox" disabled>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-xs-11"><p> <?php echo $product->name; ?> </p></td>
                                                                </tr>
                                                            <?php endif; endforeach;
                                                        endif; ?>
                                                    </tbody>
                                                </table>
                                            </div> <br><br>
                                        </div>
                                    </div>
                                    <div class="row bundle-table bundleChangeHiddenWrapperContainerPopup">
                                        <div class="col-sm-12 col-xs-12 popUpRadioBtn">
                                            <h4 class="pull-left margin-right-15">Bundle</h4>
                                            <input name="Bundle" value="1" id="toggle-bundle-popup" class="pull-left" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="table-responsive mw-300 clearfix" style="clear: both">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-xs-1">
                                                                
                                                            </th>
                                                            <th class="col-xs-5"><p class="m-b-5">Product</p></th>
                                                            <th class="col-xs-3"><p class="m-b-5">Number of each step</p></th>
                                                            <th class="col-xs-3"><p class="m-b-5">Order of step</p></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ( $data['allProducts'] ) :
                                                            foreach ($data['allProducts'] as $product) : ?>
                                                                <tr id="bundle-product-<?= $product->product_id ?>">
                                                                    <td class="col-xs-1">
                                                                        <div class="checkbox no-margin bundleChangeHiddenWrapper">
                                                                            <label>
                                                                                <input name="bundles[]" value="<?php echo $product->product_id; ?>" class="bundle-status bundleChangeHidden" type="checkbox" disabled>
                                                                                <input class="bundleHiddenValue" type="hidden" name="bundlesChecked[]">
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-xs-5"><p> <?php echo $product->name; ?> </p></td>
                                                                    <td class="col-xs-3">
                                                                        <input name="bundleNumberOfEachStep[]" type="number" value="1" class="form-control pNOES" placeholder="Product Qunatity" min="1">
                                                                    </td>
                                                                    <td class="col-xs-3">
                                                                        <input name="bundleOrderOfStep[]" type="number" value="1" class="form-control pOOS" placeholder="Product Qunatity" min="1">
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach;
                                                        endif; ?>
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn_edit_product goToTop">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!--    /*Offer modal*/-->
<!-- Modal -->
<div class="modal fade offerModal" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Offer</h4>
            </div>

            <!--warning-->
            <div class="alert modal-alert-success alert-success alert-dismissible common-center-alert" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="alert modal-alert-danger alert-danger alert-dismissible common-center-alert" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <!--warning end-->

            <div class="modal-body">
                <form id="form_offerModal" action="">
                    <input type="hidden" name="offer_id" value="">
                    <input type="hidden" name="product_id" value="">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input name="offer_price" type="text" class="form-control" id="" placeholder="Offer Price">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <textarea name="offer_description" placeholder="Offer Description" class="form-control margin-bottom-20" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn_save_offer" onclick="saveOffer()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Enable/disable offer
    $(function() {
        $(document).on( 'change', '.changeHidden', function(event) {
            if($(this).is(':checked')){
                $(this).parents('.offerHiddenWrapper').find('.offerHiddenValue').val($(this).val());
            } else {
                $(this).parents('.offerHiddenWrapper').find('.offerHiddenValue').val(0);
            }
        });

        $(document).on( 'change', '.bundleChangeHidden', function(event) {
            if($(this).is(':checked')){
                $(this).parents('.bundleChangeHiddenWrapper').find('.bundleHiddenValue').val($(this).val());
            } else {
                $(this).parents('.bundleChangeHiddenWrapper').find('.bundleHiddenValue').val(0);
            }
        });
    });

    $(function() {
        // Enable/disable extra
        $('#toggle-offer').change(function() {
            if($(this).is(':checked')){
                $(this).parents('.offer-table').find('.offer-status').removeAttr('disabled');
                $('.bundleChangeHiddenWrapperContainer').addClass('hidden');
                $('.bundleChangeHiddenWrapperContainer input').prop('disabled', true);
                $('.is_extra').removeClass('hidden');
                $('#extra-table').removeClass('hidden');
                $('#extra-table input').prop('disabled', false);
            }
            else{
                $(this).parents('.offer-table').find('.offer-status').prop('checked',false).attr('disabled','disabled');
                $(this).parents('.offer-table').find('input[type="text"]').val(0);
                $(this).parents('.offer-table').find('input[type="number"]').val(1);
                $('.bundleChangeHiddenWrapperContainer').removeClass('hidden');
                $('.bundleChangeHiddenWrapperContainer input').prop('disabled', false);
            }
        });
        $('#toggle-offer-popup').change(function() {
            if($(this).is(':checked')){
                $(this).parents('.offer-table').find('.offer-status').removeAttr('disabled');
                $('.bundleChangeHiddenWrapperContainerPopup').addClass('hidden');
                $('.bundleChangeHiddenWrapperContainerPopup input').prop('disabled', true);
                $('.is_extra_popup').removeClass('hidden');
                $('#extra-table-popup').removeClass('hidden');
                $('#extra-table-popup input').prop('disabled', false);
            }
            else{
                $(this).parents('.offer-table').find('.offer-status').prop('checked',false).attr('disabled','disabled');
                $(this).parents('.offer-table').find('input[type="text"]').val(0);
                $(this).parents('.offer-table').find('input[type="number"]').val(1);
                $('.bundleChangeHiddenWrapperContainerPopup').removeClass('hidden');
                $('.bundleChangeHiddenWrapperContainerPopup input').prop('disabled', true);
            }
        });
        
        //Enable/disable extra
        $('#toggle-extra, #toggle-extra-popup').change(function() {
            if($(this).is(':checked')){
                $(this).parents('.extra-table').find('.extra-status').removeAttr('disabled');
            }
            else{
                $(this).parents('.extra-table').find('.extra-status').prop('checked',false).attr('disabled','disabled');
            }
        });

        //Enable/disable bundle
        $('#toggle-bundle').change(function() {
            if($(this).is(':checked')){
                $(this).parents('.bundle-table').find('.bundle-status').removeAttr('disabled');
                $('.offerHiddenWrapperContainer').addClass('hidden');
                $('.offerHiddenWrapperContainer input').prop('disabled', true);
                $('.is_extra').addClass('hidden');
                $('#extra-table').addClass('hidden');
                $('#extra-table input').prop('disabled', true);
            }
            else{
                $(this).parents('.bundle-table').find('.bundle-status').prop('checked',false).attr('disabled','disabled')
                $(this).parents('.bundle-table').find('input[type="text"]').val(0);
                $(this).parents('.bundle-table').find('input[type="number"]').val(1);
                $('.offerHiddenWrapperContainer').removeClass('hidden');
                $('.offerHiddenWrapperContainer input').prop('disabled', false);
                $('.is_extra').removeClass('hidden');
                $('#extra-table').removeClass('hidden');
                $('#extra-table input').prop('disabled', false);
            }
        });
        $('#toggle-bundle-popup').change(function() {
            if($(this).is(':checked')){
                $(this).parents('.bundle-table').find('.bundle-status').removeAttr('disabled');
                $('.offerHiddenWrapperContainerPopup').addClass('hidden');
                $('.offerHiddenWrapperContainerPopup input').prop('disabled', true);
                $('.is_extra_popup').addClass('hidden');
                $('#extra-table-popup').addClass('hidden');
                $('#extra-table-popup input').prop('disabled', true);
            }
            else{
                $(this).parents('.bundle-table').find('.bundle-status').prop('checked',false).attr('disabled','disabled')
                $(this).parents('.bundle-table').find('input[type="text"]').val(0);
                $(this).parents('.bundle-table').find('input[type="number"]').val(1);
                $('.offerHiddenWrapperContainerPopup').removeClass('hidden');
                $('.offerHiddenWrapperContainerPopup input').prop('disabled', false);
                $('.is_extra_popup').removeClass('hidden');
                $('#extra-table-popup').removeClass('hidden');
                $('#extra-table-popup input').prop('disabled', false);
            }
        });
        $('#toggle-isExtra-popup').change(function() {
            if($(this).is(':checked')){
                $('#popUpRadioBtnHiddenInput').val('True');
            }
            else{
                $('#popUpRadioBtnHiddenInput').val('False');
            }
        });
    });

    // Dynamically add panel
    $(document).on("click",".addProductBtn",function(){
        var dynamic_content='<div class="row">';
            dynamic_content+='<div class="col-sm-6 col-xs-12">'
            dynamic_content+='<div class="form-group">';
            dynamic_content+='<div class="form-group">';
            dynamic_content+='<select class="form-control productType">';
            dynamic_content+='<option>Select Product Type</option>';
            dynamic_content+='<option>Product Type 02</option>';
            dynamic_content+='<option>Product Type 03</option>';
            dynamic_content+='<option>Product Type 04</option>';
            dynamic_content+='<select>';
            dynamic_content+='</div>';
            dynamic_content+='</div>';
            dynamic_content+='</div>';

            dynamic_content+='<div class="col-sm-6 col-xs-12">';
            dynamic_content+='<div class="form-group">';
            dynamic_content+='<div class="form-group">';
            dynamic_content+='<input name="price" type="text" class="form-control" id="" placeholder="Product Price">';
            dynamic_content+='</div>';
            dynamic_content+='</div>';
            dynamic_content+='</div>';
            dynamic_content+='</div>';


        $(".dynamicPanels").append(dynamic_content);
    });

    /*$(document).on("click",".deleteProductBtn",function(){
        
        var contentLength=$(".dynamicContentPanel").length;

        if(contentLength>1){
          $(this).parents(".dynamicContentPanel").remove();  
        }
    });*/

    // Checking single item

    /*$(document).on("change",".singleItemCheck",function(){
       $(this).parents(".dynamicContentPanel").find(".productType").prop("disabled", $(this).is(':checked'));
    });*/

    // Dynamically add panel End

    $(function () {
        $('.btn_create_product').click(function (ev) {
            ev.preventDefault();
            var validate = '';
            var name = $('#create_product input[name="name"]').val();
            //var image = $('#create_product input[name="image_name"]').val();
            var category_id = $('#create_product select[name="category_id"]').val();
            var quantity = $('#create_product input[name="quantity"]').val();
            var price = $('#create_product input[name="price"]').val();
            // var display_order = $('#create_product input[name="display_order"]').val();
            if (name == '') {
                validate += 'Name is required';
            }
            if (category_id == '') {
                validate += '<br>Category is required';
            }
            /*if (quantity == '') {
                validate += '<br>Quantity is required';
            }
            if (!$.isNumeric(quantity) && quantity != '') {
                validate = validate+'<br>Quantity should be a number';
            } else if (quantity <= 0  && quantity != '') {
                validate = validate+'<br>Quantity should be a positive number';
            }*/
            if (price == '') {
                validate += '<br>Price is required';
            }
            if (!$.isNumeric(price) && price != '') {
                validate = validate+'<br>Price should be a number';
            } else if (price <= 0  && price != '') {
                validate = validate+'<br>Price should be a positive number';
            }

            // if (display_order == '') { validate += '<br>Display order is required'; }
            // if (!$.isNumeric(display_order) && display_order != '') {
            //     validate = validate+'<br>Display order should be a number';
            // } else if (display_order <= 0  && display_order != '') {
            //     validate = validate+'<br>Display order should be a positive number';
            // }

            /*if (image == '') {
                validate += '<br>Image is required';
            }*/

            if (validate != '') {
                $("html,body").animate({ scrollTop: 0 }, 600);
                $('.alert-success').hide();
                $('.alert-danger').show();
                $('.alert-danger').html(validate);
                setTimeout(function () {
                    $('.alert-danger').hide();
                }, 3000);
                return;
            }

            var form = $(this).parents('form:first');
            var formData = new FormData( form[0]);
            // alert(formData);
            $.ajax({
                url: "<?php echo BASE_URL?>/admin/create-product",
                type: "post",
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    // alert(data);
                    console.log(data);
                    if (data.status == 200) {
                        /*var input = form+" :input";
                        input.val('');*/
                        // $('#create_product :input').val('');
                        form.trigger('reset');
                        //$( form+" :textarea" ).val('');
                        //$( form+":textarea" ).val('');
                        $("html,body").animate({ scrollTop: 0 }, 600);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success').html(data.message);

                        //$("#product_list").html(data.desktopView);
                        setProductList(data.products);

                        setTimeout(function () {
                            $('.alert-success').hide();
                            location.reload();
                        }, 3000);
                    } else {
                        $("html,body").animate({ scrollTop: 0 }, 600);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('.alert-danger').html(data.message);
                        setTimeout(function () {
                            $('.alert-danger').hide();
                        }, 3000);
                    }
                    //$('.list_container').html(data);
                },
                error: function (e) {
                    // alert('error');
                }
            });
        });

        $('.btn_edit_product').click(function (ev) {
            ev.preventDefault();
            var validate = '';
            var name = $('#form_edit_product input[name="name"]').val();
            // var image = $('#form_edit_product input[name="image_name"]').val();
            var category_id = $('#form_edit_product select[name="category_id"]').val();
            var quantity = $('#form_edit_product input[name="quantity"]').val();
            var price = $('#form_edit_product input[name="price"]').val();
            var display_order = $('#form_edit_product input[name="display_order"]').val();
            if (name == '') { validate += 'Name is required'; }
            if (category_id == '') { validate += '<br>Category is required'; }
            /*if (quantity == '') {
                validate += '<br>Quantity is required';
            }
            if (!$.isNumeric(quantity) && quantity != '') {
                validate = validate+'<br>Quantity should be a number';
            } else if (quantity <= 0  && quantity != '') {
                validate = validate+'<br>Quantity should be a positive number';
            }*/

            if (price == '') { validate += '<br>Price is required'; }
            if (!$.isNumeric(price) && price != '') {
                validate = validate+'<br>Price should be a number';
            } else if (price <= 0  && price != '') {
                validate = validate+'<br>Price should be a positive number';
            }

            // if (display_order == '') { validate += '<br>Display order is required'; }
            // if (!$.isNumeric(display_order) && display_order != '') {
            //     validate = validate+'<br>Display order should be a number';
            // } else if (display_order <= 0  && display_order != '') {
            //     validate = validate+'<br>Display order should be a positive number';
            // }

            /*if (image == '') {
                validate += '<br>Image is required';
            }*/

            if (validate != '') {
                $('.modal-alert-success').hide();
                $('.modal-alert-danger').show();
                $('.modal-alert-danger').html(validate);
                setTimeout(function () {
                    $('.modal-alert-danger').hide();
                    location.reload();
                }, 3000);
                return;
            }



            //var form = $(this).parents('form:first');
            var formData = new FormData( $('#form_edit_product')[0]);
            $.ajax({
                url: "<?php echo BASE_URL?>/admin/create-product",
                type: "post",
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == 200) {

                        $('.modal-alert-danger').hide();
                        $('.modal-alert-success').show();
                        $('.modal-alert-success').html(data.message);

                        //$("#product_list").html(data.desktopView);
                        setProductList(data.products);

                        setTimeout(function () {
                            $('.modal-alert-success').hide();
                            $('#editModal').modal('hide');
                            location.reload();
                        }, 3000);
                    } else {
                        $('.modal-alert-success').hide();
                        $('.modal-alert-danger').show();
                        $('.modal-alert-danger').html(data.message);
                        setTimeout(function () {
                            $('.modal-alert-danger').hide();
                        }, 3000);
                    }
                    //$('.list_container').html(data);
                }
            });
        });

        $(document).on('click', '.call_offer_modal', function () {
            var productId = $(this).attr('data-product_id');
            var offerId = $(this).attr('data-offer_id');
            var offerPrice = $(this).attr('data-offer_price');
            var offerDescription = $(this).attr('data-offer_description');
            /*console.log(productId);
            console.log(offerId);
            console.log(offerPrice);
            console.log(offerDescription);*/

            $('#form_offerModal input[name="offer_id"]').val(offerId);
            $('#form_offerModal input[name="product_id"]').val(productId);
            $('#form_offerModal input[name="offer_price"]').val(offerPrice);
            $('#form_offerModal textarea[name="offer_description"]').val(offerDescription);

            $('#offerModal').modal('show');
        });

        var offerNumber = "<?=(!empty($offers))?count($offers):0?>";
        $(document).on('click', '.switch-check-offer', function () {
            console.log('clicked');
            //console.log($(this).is(':checked'));return;

            var btn = $(this);
            var isActive =  $(this).is(':checked');
            var offerId = $(this).attr('data-offer_id');
            //console.log(offerNumber);//return;
            if (offerNumber >= 3 && isActive) {
                $(this).prop('checked', false);
                $('.div-alert-success').addClass('hide');
                $('.div-alert-danger').removeClass('hide');
                $('.alert-danger-pop').text('You have reached maximum offer limit. Please inactive any offer first.');
                setTimeout(function () {
                    $('.div-alert-danger').addClass('hide');
                }, 3000);
                return;
                /*$('.alert-success').hide();
                 $('.alert-danger').show();
                 $('.alert-danger').html('You have reached maximum offer limit. Please inactive any offer first.');
                 setTimeout(function () {
                 $('.alert-danger').hide();
                 }, 3000);*/
            }
            //console.log(isActive);console.log(offerId);return;
            $.ajax({
                url: "<?php echo BASE_URL?>/admin/activate-offer",
                type: "post",
                data: {offer_id: offerId, is_active: isActive},
                dataType: 'json',
                success: function (data) {
                    console.log(data);

                    if (data.status == 200) {
                        //setProductList(data.products);
                        offerNumber = data.offerNumber;
                        //productAddAlert
                        $('.div-alert-danger').addClass('hide');
                        $('.div-alert-success').removeClass('hide');
                        $('.alert-success-pop').text(data.message);
                        setTimeout(function () {
                            $('.div-alert-success').addClass('hide');
                        }, 3000);
                        /*$('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success').html(data.message);
                        setTimeout(function () {
                            $('.alert-success').hide();
                        }, 3000);*/
                    } else {
                        btn.prop('checked', false);
                        $('.div-alert-success').addClass('hide');
                        $('.div-alert-danger').removeClass('hide');
                        $('.alert-danger-pop').text(data.message);
                        setTimeout(function () {
                            $('.div-alert-danger').addClass('hide');
                        }, 3000);
                        /*$('.alert-success').hide();
                        $('.alert-danger').show();
                        $('.alert-danger').html(data.message);
                        setTimeout(function () {
                            $('.alert-danger').hide();
                        }, 3000);*/
                    }
                }
            });
        });

        $(document).on('click', '.switch-check-product', function () {
            console.log('clicked');
            //console.log($(this).is(':checked'));
            var isActive =  $(this).is(':checked');
            var productId = $(this).attr('data-product_id');
            //console.log(isActive);console.log(offerId);return;
            $.ajax({
                url: "<?php echo BASE_URL?>/admin/activate-product",
                type: "post",
                data: {product_id: productId, is_active: isActive},
                dataType: 'json',
                success: function (data) {
                    console.log(data);

                    if (data.status == 200) {
                        //setProductList(data.products);
                        if (data.deactivateOffer == true) {
                            $('#offer_status_'+productId).prop('checked', false);
                        }

                        $('.div-alert-danger').addClass('hide');
                        $('.div-alert-success').removeClass('hide');
                        $('.alert-success-pop').text(data.message);
                        setTimeout(function () {
                            location.reload();
                            $('.div-alert-success').addClass('hide');
                        }, 100);

                        /*$('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success').html(data.message);
                        //setProductList(data.products);
                        setTimeout(function () {
                            $('.alert-success').hide();
                        }, 3000);*/
                    } else {
                        $('.div-alert-success').addClass('hide');
                        $('.div-alert-danger').removeClass('hide');
                        $('.alert-danger-pop').text(data.message);
                        setTimeout(function () {
                            $('.div-alert-danger').addClass('hide');
                        }, 3000);
                        /*$('.alert-success').hide();
                        $('.alert-danger').show();
                        $('.alert-danger').html(data.message);
                        setTimeout(function () {
                            $('.alert-danger').hide();
                        }, 3000);*/
                    }
                }
            });
        });
    });

    function saveOffer() {
        var price = $('#form_offerModal input[name="offer_price"]').val();
        var validate = '';
        if (price == '') {
            validate += 'Price is required';
        }
        if (!$.isNumeric(price) && price != '') {
            validate = validate+'Price should be a number';
        } else if (price <= 0  && price != '') {
            validate = validate+'Price should be a positive number';
        }

        if (validate != '') {
            $('.modal-alert-success').hide();
            $('.modal-alert-danger').show();
            $('.modal-alert-danger').html(validate);
            setTimeout(function () {
                $('.modal-alert-danger').hide();
            }, 3000);
            return;
        }

        var formData = new FormData( $('#form_offerModal')[0]);
        $.ajax({
            url: "<?php echo BASE_URL?>/admin/create-product-offer",
            type: "post",
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data.data.product_id);
                if (data.status == 200) {

                    $('.modal-alert-danger').hide();
                    $('.modal-alert-success').show();
                    $('.modal-alert-success').html(data.message);

                    $('#prod_'+data.data.product_id).attr('data-offer_id', data.data.offer_id);
                    $('#prod_'+data.data.product_id).attr('data-offer_price', data.data.offer_price);
                    $('#prod_'+data.data.product_id).attr('data-offer_description', data.data.offer_description);

                    $('#offer_status_'+data.data.product_id).attr('data-offer_id', data.data.offer_id);
                    //$("a").find("[data-product_id='" + data.data.product_id + "']").data('offer_id', data.data.offer_id);
                    //$("#product_list").html(data.desktopView);
                    //setProductList(data.products);

                    setTimeout(function () {
                        $('.modal-alert-success').hide();
                        $('#offerModal').modal('hide');
                        window.location.href="<?php echo BASE_URL?>/admin/products";
                    }, 2000);
                } else {
                    $('.modal-alert-success').hide();
                    $('.modal-alert-danger').show();
                    $('.modal-alert-danger').html(data.message);
                    setTimeout(function () {
                        $('.modal-alert-danger').hide();
                    }, 3000);
                }
                //$('.list_container').html(data);
            }
        });
    }

    $('.variationsPOPUP').selectpicker();
    function editProduct(productId) {
        //console.log(productId);return;
        $.ajax({
            url: "<?php echo BASE_URL?>/admin/product-details",
            type: "get",
            data: {product_id: productId},
            dataType: 'json',
            success: function (data) {
                // console.log(data);

                if (data.status == 200) {
                    $('#editModal').modal('show');
                    //$('#form_edit_product).find("input[type=text], textarea").val("");
                    $('#form_edit_product input[name="image_name"]').val("");
                    $('#form_edit_product input[name="image"]').val("");

                    $('#form_edit_product input[name="product_id"]').val(data.product.product_id);
                    $('#form_edit_product input[name="name"]').val(data.product.name);
                    $('#form_edit_product textarea[name="description"]').val(data.product.description);
                    $('#form_edit_product select[name="category_id"]').val(data.product.category_id);
                    $('#form_edit_product input[name="quantity"]').val(data.product.quantity);
                    $('#form_edit_product input[name="price"]').val(data.product.price);
                    $('#form_edit_product input[name="display_order"]').val(data.product.display_order);

                    // Disable all toggle Button
                    $('#toggle-isExtra-popup').attr('checked', 'false');
                    $('#toggle-isExtra-popup').parent('.toggle').addClass('off');
                    $('#popUpRadioBtnHiddenInput').val('');

                    if ( data.product.is_extra == 'True' ) {
                        $('#toggle-isExtra-popup').attr('checked', 'true');
                        $('#toggle-isExtra-popup').parent('.toggle').removeClass('off');
                        $('#popUpRadioBtnHiddenInput').val('True');
                    }

                    if ( data.product.bundles.length > 0 ) {
                    	// Disable all offer inputs
                    	$('.offerHiddenWrapperContainerPopup table input[type="checkbox"]').prop('disabled', true);
                    } else {
                    	// Disable all bandle inputs
                    	$('.bundleChangeHiddenWrapperContainerPopup table input[type="checkbox"]').prop('disabled', true);
                    }

                    // Offers
                    if ( data.product.offers.length > 0) {
                        toggleRadioAndCheckbox('offer');
                        $('.bundleChangeHiddenWrapperContainer').addClass('hidden');

                        // Enter values
                        var max_qty = 0;
                        for(var i=0; i<data.product.offers.length; i++){
                            if(data.product.offers[i].quantity > max_qty){
                                max_qty = data.product.offers[i].quantity;
                            }
                            var offerProductID = data.product.offers[i].offered_product_id;
                            var offerProductQuantity = data.product.offers[i].quantity;
                            var offerProductSelector = '#offered-product-'+offerProductID;

                            $(offerProductSelector +' .changeHidden').attr('checked', true);
                            $(offerProductSelector +' .offerHiddenValue').val(offerProductID);
                            $(offerProductSelector +' .pOfferQtn').val(offerProductQuantity);
                           
                        }
                        $('#offersQuantityPopup').val(max_qty);
                    }

                    // Extras
                    if ( data.product.extras.length > 0) {
                        toggleRadioAndCheckbox('extra');

                        // Enter values
                        // alert(data.product.extras.length);
                        for(var i=0; i<data.product.extras.length; i++){
                            var extraProductID = data.product.extras[i].product_id;
                            // alert(extraProductID);
                            if ( data.product.extras[i].sub_product_id != '' ) { 
                                extraProductID += '_'+data.product.extras[i].sub_product_id; 
                            }
                            // console.log(data.product.extras);
                            var extraProductSelector = '#extra-product-'+extraProductID;
                            $(extraProductSelector +' .extra-status').attr('checked', true);
                        }
                    }

                    // Bundles
                    if ( data.product.bundles.length > 0) {
                        toggleRadioAndCheckbox('bundle');
                        $('.offerHiddenWrapperContainer').addClass('hidden');
                        $('.offerHiddenWrapperContainerPopup').addClass('hidden');

                        // Enter values
                        for(var i=0; i<data.product.bundles.length; i++){
                            var bundleProductID = data.product.bundles[i].bundle_product_id;
                            var bundleProductSelector = '#bundle-product-'+bundleProductID;
                            var bundleProductNOES = data.product.bundles[i].number_of_each_step;
                            var bundleProductOOS = data.product.bundles[i].order_of_step;

                            $(bundleProductSelector +' .bundle-status').attr('checked', true);
                            $(bundleProductSelector +' .bundleHiddenValue').val(bundleProductID);
                            $(bundleProductSelector +' .pNOES').val(bundleProductNOES);
                            $(bundleProductSelector +' .pOOS').val(bundleProductOOS);
                        }
                    }

                    $('.variationsPOPUP option').each(function (index) {
                        $('.variationsPOPUP').selectpicker('val', data.product.variations);
                    });
                } else {
                }
            }
        });
    }

    function deleteProduct(productId) {
        swal({
                title: "",
                text: "Are you sure you want to delete the product?",
                //type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: "<?= BASE_URL ?>/admin/product-delete",
                        data: {product_id: productId},
                        type: 'POST',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data.message);

                            if (data.status == 200) {
                                setProductList(data.products);
                                $('.alert-danger').hide();
                                $('.alert-success').show();
                                $('.alert-success').html(data.message);
                                setTimeout(function () {
                                    $('.alert-success').hide();
                                    
                                    location.reload();
                                }, 3000);
                                $("html,body").animate({ scrollTop: 0 }, 600);

                            } else {
                                $('.alert-success').hide();
                                $('.alert-danger').show();
                                $('.alert-danger').html(data.message);
                                setTimeout(function () {
                                    $('.alert-danger').hide();
                                }, 3000);
                            }
                        }
                    });
                }
                /*else {
                 swal("Cancelled", "Your have canceled)", "error");
                 $('.confirm').trigger('click');
                 }*/
            }
        );
    }

    function setProductList(products) {
        var html = '';
        var counter = 1;
        var img = '<?= BASE_URL.'/assets/img/products/__image__' ?>';

        $.each(products, function (key, product) {
            var offer_id = '';
            var offer_price = '';
            var offer_description = '';
            var offer_active = '';
            if (product.offer != null) {
                offer_id = product.offer.offer_id;
                offer_price = product.offer.offer_price;
                offer_description = product.offer.offer_description;
                offer_active = product.offer.offer_active;
                if (offer_active == 'Active') {
                    offer_active = 'checked';
                }

            }
            html += '<tr>';
            html += '<td>'+counter+'</td>';
            html += '<td>'+product.name+'</td>';
            html += '<td width="30%">';
            html += '<div class="pDescription-parent">';
            var product_description = 'N/A';
            if (product.description != null && product.description.length > 0) {
                product_description = product.description;
            }
            html += '<p class="pDescription">'+product_description+'</p>';
            html += '<div class="expandBtn">';
            html += '<i class="fa fa-plus-circle" aria-hidden="true"></i>';
            html += '</div>';
            html += '</div>';
            html += '</td>';
            var product_image = 'N/A';
            if (product.image_name != null && product.image_name.length > 0) {
                product_image = product.image_name;
            }
            html += '<td> <img class="pImage" src="'+img.replace('__image__', product_image)+'"> </td>';
            html += '<td>'+product.category_name+'</td>';
            html += '<td>'+product.product_display_order+'</td>';
            html += '<td class="text-center" width="15%">';
            html += '<div class="action-icon pull-left margin-left-15">';
            html += '<a class="btn btn-success call_offer_modal" href="javascript:;" title="Offer Setting" id="prod_'+product.product_id+'" data-product_id="'+product.product_id+'" data-offer_id="'+offer_id+'" data-offer_price="'+offer_price+'" data-offer_description="'+offer_description+'">';
            html += '<i class="fa fa-gift" aria-hidden="true"></i>';
            html += '</a>';
            html += '</div>';
            html += '<div class="material-switch discount-material-switch pull-left margin-top-15" title="Active/Inactive Offer">';
            html += '<input class="switch-check-offer" id="offer_status_'+product.product_id+'" name="offer_is_active" type="checkbox" value="" data-offer_id="'+offer_id+'" '+offer_active+'/>';
            html += '<label for="offer_status_'+product.product_id+'" class="label-default"></label>';
            html += '</div>';
            html += '</td>';

            html += '<td class="text-center" width="20%">';
            html += '<span class="action-icon">';
            html += '<a class="btn btn-danger" id="editProduct" href="javascript:;" title="Edit" onclick="editProduct('+product.product_id+')">';
            html += '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
            html += '</a>';
            html += '</span>';
            html += '<span class="action-icon">';
            html += '<a class="btn btn-primary" id="delProduct" href="javascript:;" title="Edit" onclick="deleteProduct('+product.product_id+')">';
            html += '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
            html += '</a>';
            html += '</span>';

            var prodIsActive = '';
            if (product.product_is_active == 'True') {
                prodIsActive = 'checked';
            }
            html += '<span class="action-icon pull-left">';
            html += '<div class="material-switch discount-material-switch" title="Active/Inactive Product">';
            html += '<input class="switch-check-product" id="product_status_'+product.product_id+'" name="" type="checkbox" data-product_id="'+product.product_id+'" '+prodIsActive+'/>';
            html += '<label for="product_status_'+product.product_id+'" class="label-default"></label>';
            html += '</div>';
            html += '</span>';

            /*html += '<span class="action-icon">';
            html += '<a class="btn btn-success" id="discountPorduct" title="discount" href="javascript:;">';
            html += '<i class="fa fa-handshake-o" aria-hidden="true"></i>';
            html += '</a>';
            html += '</span>';*/
            html += '</td>';
            html += '</tr>';

            counter++;
        });
        $("#product_list").html(html);
    }
    function toggleRadioAndCheckbox(type) {
        $('#toggle-'+ type +'-popup').attr('checked', 'true');
        $('#toggle-'+ type +'-popup').parent('.toggle').removeClass('off');
        $('#toggle-'+ type +'-popup').parents('.'+ type +'-table').find('.'+ type +'-status').removeAttr('disabled');
    }

    $('.goToTop').click(function(){
        $("#editModal").animate({ scrollTop: 0 }, 600);
        return false;
     });
</script>

<?php require_once "view/base/admin/footer.php"?>