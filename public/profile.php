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
        $arg['firstName'] = $_POST['firstName'];
        $arg['lastName'] = $_POST['lastName'];
        $arg['email'] = $_POST['email'];
        $arg['phone'] = $_POST['phone'];

        $town = $_POST['town'];
        $area = $_POST['area'];
        $street = $_POST['street'];
        $land = $_POST['landmark'];

        $arg['address'] = $town . ", ". $area. ", ". $street.', '. $land ;
        $addr = explode(', ', $arg['address']);


        $user = new User($arg);
        if($user->updateUser())
        {
            if($_SERVER['HTTP_REFERER'] != 'http://localhost:9000/public/confirmOrder.php')
            {
                redirect_to('confirmOrder.php');
            }else{
                header('location: profile.php');
            }
        }
    }
    $user = User::findUser($_SESSION['userName']);
    $addr = explode(',',$user['address']);

} catch (Exception $e) {
    echo $e->getMessage();
}
?>

    <div class="container">
        <div class="login">
            <h2 class="form-title">Update Profile</h2>
            <form action="profile.php" method="post">
                <div class="form-group">
                    <input required type="text" class="form-control" id="firstName" name="firstName" value="<?= $user['firstName']?>">
                    <label for="firstName">FirstName</label>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control" id="lastName" name="lastName" value="<?= $user['lastName']?>">
                    <label for="lastName">lastName</label>
                </div>

                <div class="form-group">
                    <input required type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>">
                    <label for="email">Email</label>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone']?>">
                    <label for="phone">Phone</label>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control" id="town" name="town" value="<?= $addr[0] = trim($addr[0]) ?? '';?>">
                    <label for="town">Town</label>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control" id="area" name="area" value="<?= $addr[1] = trim($addr[1]) ?? ''; ?>">
                    <label for="area">Area</label>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control" id="street_name" name="street" value="<?= $addr[2] = trim($addr[2]) ?? '';?>">
                    <label for="street_name">Street name</label>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control" id="landmark" name="landmark" value="<?= $addr[3] = trim($addr[3]) ?? '';?>">
                    <label for="landmark">Landmark</label>
                </div>


                <div class="form-group">
                    <button class="btn btn-outline-success btn-block" name="update" type="submit">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

<?php
require_once '../private/includes/footer_nav.php';
require_once '../private/includes/footer.php';