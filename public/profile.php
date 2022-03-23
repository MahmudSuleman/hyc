<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/15/2020
 * Time: 8:56 AM
 */

require_once '../private/init.php';
$title = 'User Profile';

require_once '../private/includes/header.php';
require_once '../private/includes/header_nav.php';
try {
    if (isset($_POST['update']))
    {
        $arg = [];
        $arg['firstname'] = $_POST['firstname'];
        $arg['lastname'] = $_POST['lastname'];
        $arg['email'] = $_POST['email'];
        $arg['phone'] = $_POST['phone'];
//        $arg['address'] = $_POST['address'];


        $user = new User($arg);
        $user->updateUser();

        echo "<script>confirm('Profile detail updated...');</script>";

    }
    $user = User::findUser($_SESSION['username']);
//    var_dump($user);


} catch (Exception $e) {
    echo $e->getMessage();
}
?>

    <div class="container">
        <div class="login">
            <h2 class="form-title">Update Profile</h2>
            <form action="profile.php" method="post">
                <div class="form-group">
                    <label for="firstname">FirstName</label>
                    <input required type="text" class="form-control" id="firstname" name="firstname" value="<?= $user['firstname']?>">
                </div>

                <div class="form-group">
                    <label for="lastname">lastname</label>
                    <input required type="text" class="form-control" id="lastname" name="lastname" value="<?= $user['lastname']?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input required type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone']?>">
                </div>

<!--                <div class="form-group">-->
<!--                    <label  for="address">Address(City, Area, Street name, landmark)</label>-->
<!--                    <input class="form-control" name="address" value="--><?//= $user['address']?><!--">-->
<!--                </div>-->

                <div class="form-group">
                    <button class="btn btn-outline-success btn-block" name="update" type="submit">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

<?php
require_once '../private/includes/footer_nav.php';
require_once '../private/includes/footer.php';
