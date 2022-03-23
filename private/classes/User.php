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
        $this->userName = $args['username'] ?? '';
        $this->firstName = $args['firstname'] ?? '';
        $this->lastName = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->phone = $args['phone'] ?? '';
//        $this->address = $args['address'] ?? '';
        $this->type = $args['type'] ?? 2;
    }



    public function create()
    {
        global $db;
        $db->select('users', [], ['username' => $this->userName]);
        if(empty($db->aResults))
        {
//            if the current user is not in the database, create them..
            $data = [
                'username' => $this->userName,
                'firstname' => $this->firstName,
                'lastname' => $this->lastName,
                'email' => $this->email,
                'phone' => $this->phone,
                'password'=> $this->password,

                'user_type_id' => $this->type
            ];
            return $db->insert('users', $data);
        }else{
            global $errors;
            array_push($errors, "failed to create user, username already exist");
        }
    }

    public static function findUser($userName)
    {
        global $db;
        return $db->pdoQuery('select * from users where username = ?', [$userName])->result();
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
        if(!empty($user) && password_verify($password, $user['password']))
        {
            // set session variable and log user in
            $_SESSION['username'] = $userName;
            $_SESSION['usertype'] = $user['user_type_id'];
            return true;
        }else{
            global $errors;
            array_push($errors, "Incorrect username and password combination...");
        }


    }

    public function updateUser()
    {
        global $db;
        $data = [
            'firstname' => $this->firstName,
            'lastname' => $this->lastName,
            'email' =>$this->email,
            'phone' => $this->phone,
//            'address'=>$this->address,
        ];

        $result = $db->update('users', $data, ['username'=>$_SESSION['username']]) ? true : false;
        return $result;

    }


    public static function usertype(){
        global $db;
        $db->select('users', ['user_type_id'], ['username' => $_SESSION['username']] );
        $result = $db->aResults[0];
        return $result['user_type_id'];

    }

    public static function makeAdmin($username){
        global $db;
        return $db->update('users', ['type'=>'admin'], ['username'=>$username]);
    }





}
