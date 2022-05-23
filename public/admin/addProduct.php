<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/16/2020
 * Time: 8:41 AM
 */

require_once '../../private/init.php';
//require_admin_login();
$title = "Add product";
require_once SHARED_PATH . '/header.php';
require_once SHARED_PATH . '/header_nav.php';

//get product categories
global $db;
$allCategories = $db->select('categories', [])->results() ?? [];


if (isset($_POST['add'])) {
    Sessions::clear_errors();
    Sessions::set_old_inputs($_POST);

    $arg = [];
    $product_id = rand(111111111, 999999999);
    $name = Validation::clean($_POST['name']);
    $price = Validation::clean($_POST['price']);
    $description = Validation::clean($_POST['description']);
    $category_id = Validation::clean($_POST['category_id']);
    $quantity = Validation::clean($_POST['quantity']);
    $file = $_FILES['pic'];
//    do validation

    if (!Validation::required($category_id)) {
        Sessions::set_errors('category','category field is required');
    }

    if (!Validation::required($name)) {
        Sessions::set_errors('name','Name field is required');
    }

    if (!Validation::required($price)) {
        Sessions::set_errors('price','Price field is required');
    }else if(!Validation::is_numeric($price)){
        Sessions::set_errors('price', 'Price field must be a number');
    }else if(!Validation::is_greater_than($price, 0)){
        Sessions::set_errors('price', 'Price field must be greater than 0');
    }

    if (!Validation::required($description)) {
        Sessions::set_errors('description','Description field is required');
    }

    if (!Validation::required($quantity)) {
        Sessions::set_errors('quantity','Quantity field is required');
    }



    $array = explode('.', $file['name']);
    $file_extension = end($array);
    $file_size = $file['size'];
    $file_tmp_name = $file['tmp_name'];
    $file_new_name = uniqid() .'.'. $file_extension;
    $file_location = 'img/'. $file_new_name;
    $file_error = $file['error'];

//    dd($file_error==4);

//    start validation
    if($file_error != 0){
        Sessions::set_errors('pic', 'Please select a file');
    }else if($file_size > 2097152){
        Sessions::set_errors('pic', 'File may not be greater than 2mb');
    }else if(!in_array($file_extension, ['png', 'jpg', 'jpeg'])){
        Sessions::set_errors('pic', 'File must be of type png, jpg or jpeg');
    }


    if(Sessions::get_errors()){
//        pretty_print(Sessions::get_errors());

        redirect_to(url_for('admin/addProduct.php'));
    }else{
        move_uploaded_file($file_tmp_name, '../'. $file_location);
        $arg['image'] = $file_location;
        $arg['price'] = $price;
        $arg['description'] = $description;
        $arg['quantity'] = $quantity;
        $arg['category_id'] = $category_id;
        $arg['name'] = $name;
        $arg['product_id'] = $product_id;


        $product = new Product($arg);
        if ($product->addProduct()){
            Sessions::clear_old_inputs();
            redirect_to(url_for('admin/addProduct.php'));
        }
    }


}


?>

<div class="container">
    <div class="login">
        <h2 class="form-title">Add New Product</h2>
        <form action="addProduct.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= Sessions::get_old_input('name') ?? '' ?>"/>
                <?= error_message('name') ?>
            </div>

            <div class="form-group">
                <label for="price">Product Price(GHC)</label>
                <input class="form-control" type="number" name="price" id="price" value="<?= Sessions::get_old_input('price') ?? '' ?>"/>
                <?= error_message('price')?>

            </div>

            <div class="form-group">
                <label for="category">Product Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="">Please choose category</option>
                    <?php if ($allCategories): ?>
                        <?php foreach ($allCategories as $category): ?>

                            <option <?= Sessions::get_old_input('category_id') == $category['id'] ? 'selected' : ''  ?> value="<?= $category['id']; ?>"><?= $category['category'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <?= error_message('category')?>

            </div>


            <div class="form-group">
                <label for="description">Product Description</label>
                <input class="form-control" id="description" type="text" name="description" value="<?= Sessions::get_old_input('description') ?? '' ?>"/>
                <?= error_message('description')?>

            </div>

            <div class="form-group">
                <label for="pic">Product Image</label>
                <input class="form-control" id="pic" type="file" name="pic" />
                <?= error_message('pic')?>

            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input class="form-control" id="quantity" type="number" name="quantity" value="<?= Sessions::get_old_input('quantity') ?? '' ?>"/>
                <?= error_message('quantity')?>

            </div>

            <div class="form-group">
                <button class="btn btn-outline-success btn-block" name="add" type="submit">Add Product</button>
            </div>
        </form>
    </div>
</div>
<script src="../../node_modules/popper.js/dist/popper.min.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php //Sessions::clear_errors();  ?>
<?php //Sessions::clear_old_inputs();  ?>
</body>

</html>
