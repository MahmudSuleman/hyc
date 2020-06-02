<?php
include_once '../../private/init.php';
//require_admin_login();

$title = 'Make Admin';
include_once SHARED_PATH . '/header.php';
include_once SHARED_PATH . '/header_nav.php';

if(isset($_POST['add'])){
    $username = $_POST['username'];
   if( User::makeAdmin($username))
       redirect_to(url_for('admin/index.php'));
}
?>

    <div class="container">
        <div class="login">
            <h2 class="form-title">Make Admin</h2>
            <form action="" method="post">

               <div class="form-group">
                   <label for="username">Username</label>
                   <input class="form-control" type="text" required="" name="username"/>
               </div>

                <div class="form-group">
                    <button class="btn btn-outline-success btn-block" name="add" type="submit">Make Admin</button>
                </div>
            </form>
        </div>
    </div>

<?php
include_once SHARED_PATH . '/footer_nav.php';
include_once SHARED_PATH . '/footer.php';

?>