<?php 

/**
 * users class definition
 * 
 */
class User
{

	public $userName;
	public $firstName;
	public $lastName;
	public $email;
	public $phone;
	public $address;
	public $type;
	private $password;




	public function getPassword()
	{
	    return $this->password;
	}

    public function userDey()
    {
        return false;
    }


	public function setPassword($password)
	{
	    $this->password = password_hash($password, PASSWORD_DEFAULT);
	}


    public function __construct($args = [])
    {
        $this->userName = $args['userName'] ?? '';
        $this->firstName = $args['firstName'] ?? '';
        $this->lastName = $args['lastName'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->address = $args['address'] ?? '';
        $this->type = $args['type'] ?? 'user';
    }



    public function create()
    {
        // check if user already exist
//        $x = self::findUser($this->userName);
        if(!empty($x))
        {
            echo 'user already exist, try one of these suggestions';
            // print_r(self::suggestUserName());
            echo '<ul>';
            foreach (self::suggestUserName() as $value) {
                echo "<li>$value</li>";
            }
            echo '<ul>';

        }
        else
        {
            $con = Db::connect();
            $sql = "INSERT INTO user(userName, firstName, lastName, email, phone, address, type,password)  VALUES(:userName, :firstName, :lastName, :email, :phone, :address, :type, :password)";
            $stm = $con->prepare($sql);

            $stm->bindParam(':userName', $this->userName);
            $stm->bindParam(':firstName', $this->firstName);
            $stm->bindParam(':lastName', $this->lastName);
            $stm->bindParam(':email', $this->email);
            $stm->bindParam(':phone', $this->phone);
            $stm->bindParam(':address', $this->address);
            $stm->bindParam(':type', $this->type);
            $stm->bindParam(':password', $this->password);
            return $stm->execute();

        }



    	
    }

    public static function findUser($userName)
    {
        global $db;
        return $db->pdoQuery('select * from user where userName = ?', [$userName])->result();


    }

    public function suggestUserName()
    {
    	$name[] = $this->firstName .'_'.rand(100, 999);
    	$name[] = $this->lastName .'_'.rand(100, 999);
    	$name[] = $this->firstName .''.rand(100, 999);
    	$name[] = $this->lastName .''.rand(100, 999);
    	$name[] = $this->firstName .'_'. $this->lastName . rand(10,99);
    	$name[] = $this->firstName .'.'.$this->lastName .rand(10,99);

    	return $name;
    }

    public static function signin($userName, $password)
    {

        $user = self::findUser($userName);
        if($user && password_verify($password, $user['password']))
        {
            // set session variable and log user in
            $_SESSION['userName'] = $userName;
            return true;
        }

    }

    public function updateUser()
    {
        global $db;
//        $con = Db::connect();
//        $sql = "UPDATE user SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone, address = :address WHERE userName = :userName";
//        $stmt = $con->prepare($sql);
        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' =>$this->email,
            'phone' => $this->phone,
            'address'=>$this->address,
        ];

        $result = $db->update('user', $data, ['userName'=>$_SESSION['userName']]) ? true : false;
//        $db->showQuery();
        return $result;

    }





}