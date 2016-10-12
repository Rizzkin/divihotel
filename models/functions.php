<?php
class Core  {
    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $db = 'divihotel';
    protected $myconn;
    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;}
        return $this->myconn;
    }
    function close() {
        mysqli_close($myconn);
        echo 'Connection closed!';
    }
}
class User extends Core{
	
	public $userid;
	public $username;
	
    function login(){
    $con = new Core();
    $con->connect();
    $password = $_POST['password'];
    $username = strtolower($_POST['username']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $con->myconn->prepare('SELECT userid,password FROM users WHERE (username=?)');
    $stmt->bind_param("s", $username);
    $stmt->execute();  
    $stmt->bind_result($userid, $password_hash);
    $stmt->fetch();

    
    if (password_verify($password, $password_hash)) {
        $_SESSION['logged'] = 1;
        $_SESSION['userid'] = $userid;
        $_SESSION['login_message'] = "Welcome: $username ";
        $_SESSION['username'] = $username;
        header('Location: ?page=index');
        $stmt->close();
    }else {
        echo '<div class="alert alert-danger alert-dismissible registererrors" role="alert" style="width: 350px; margin-top: -20px; margin: 5px 5px 5px 5px;">Wrong username or password!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button></div>';
        }
    }
    
    public function checkAdmin(){
    	$con = new Core();
    	$con->connect();
    	$username = strtolower($_SESSION['username']);
    	$stmt = $con->myconn->prepare('SELECT user_level FROM users WHERE (username=?)');
    	$stmt->bind_param("s", $username);
    	$stmt->execute();
    	$stmt->bind_result($user_level);
    	$stmt->fetch();
    	
    	if($user_level != 2){
    		header('Location: ?page=index');
    	}
    	
    }
    
    public function adminNav(){
    	$con = new Core();
        $con->connect();
        $username = strtolower($_SESSION['username']);
    	$stmt = $con->myconn->prepare('SELECT user_level FROM users WHERE (username=?)');
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($user_level);
        $stmt->fetch();
        
        if($user_level == 2) {
        	echo '<li><a href="?page=control">Admin Panel</a></li>'; 
        	echo '<li><a href="?page=controlreservation">Reservation Panel</a></li>';
        } 
        else {
        	return false;
        }
    }
    
    public function getallBookings()
    {
	    $con = new Core();
	    $con->connect();
    	$resList = array();
    
    	$result = $con->myconn->query('SELECT * FROM reserveren');
    
    	while ($resModel = $result->fetch_assoc()) {
    		$resList[] = $resModel;
    	}
    	return $resList;
    }
    
    public function delete($id){
	    $con = new Core();
	    $con->connect();
    	$result = $con->myconn->query('DELETE FROM `divihotel`.`hotelkamers` WHERE `hotelkamers`.`id` ='. $id);
    	$page = $_SERVER['PHP_SELF'];
    	$this->answer = "<p class='alert-danger' id='succestext'>This villa has been deleted.</p>";
    }
    public function deleteBooking($id){
    	$con = new Core();
    	$con->connect();
    	$result = $con->myconn->query('DELETE FROM `divihotel`.`reserveren` WHERE `reserveren`.`id` ='. $id);
    	$page = $_SERVER['PHP_SELF'];
    	$this->answer = "<p class='alert-danger' id='succestext'>This reservation has been deleted.</p>";
    }
    
    function Register($username, $email, $password,$naam,$adres,$postcode,$plaats,$tel,$rek) {
        $con = new Core();
        $con->connect();
        $username = trim(strtolower($username));
        $username = str_replace(' ', '', $username);
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (username, password, email, naam, adres, postcode, plaats, tel,rekeningnummer, user_level)
                              VALUES (?,?,?,?,?,?,?,?,?,1)';
        if ($stmt = $con->myconn->prepare($sql))
        {
            $stmt->bind_param('sssssssss', $username, $password_hash, $email, $naam, $adres, $postcode, $plaats, $tel,$rek);
            $stmt->execute();
        }
        else{
            die("errormessage: " . $con->myconn->error);
        }
    }
    
    public function logged_in() {
    	return(isset($_SESSION['logged'])) ? true : false;
    }
    
    public function protect_page() {
    	if ($this->logged_in() === false) {
    		header('Location: ?page=protected');
    		exit();
    	}
    }

    
    function validateRegister(array $userDetails)
    {
        $con = new Core();
        $con->connect();
        $errmsg_arr = array();
        foreach($userDetails as $key => $value) {
            if (empty($value)) {
                $errmsg_arr[] = ucwords($key) . " field is required";
            }
        }
    
        if (!empty($userDetails['reg'])) {
            if (!empty($userDetails['email']) && !filter_var($userDetails['email'], FILTER_VALIDATE_EMAIL)) {
                $errmsg_arr[] = "the provided email is not a valid email address";
            }
            if(!empty($userDetails['postcode']) && !preg_match('#^[0-9]{4}\s{0,1}[a-zA-Z]{2}$#', $userDetails['postcode']))
            {
                $errmsg_arr[] = "the provided postcode is not a correct postcode";
            }
            if (!empty($userDetails['tel']) && !preg_match('#^0[1-9][0-9]{0,2}-?[1-9][0-9]{5,7}$#', $userDetails['tel'])){
                $errmsg_arr[] = "the provided telephone number is not a correct telephone number.";
            }
            if (!empty($userDetails['password']) && !preg_match('#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $userDetails['password'])){
                $errmsg_arr[] = "passwords must be minimal 8 letters long including 1 number, 1 uppercase character and 1 lowercase character.";
            }
            if ($userDetails['password'] != $userDetails['confirm_password']){
                $errmsg_arr[] = "passwords must match";
            }
    
            $sqlu = "SELECT username FROM users WHERE username = ?";
    
            if($stmt = $con->myconn->prepare($sqlu)){
                $stmt->bind_param('s', $_POST['username']);
                $stmt->execute();
    
            }
            if($stmt->fetch() > 0){
                $errmsg_arr[] = "Username already exists!";
                $stmt->close();
            }
    
            $sqle = "SELECT email FROM users WHERE email = ?";
            if($stmt = $con->myconn->prepare($sqle)){
                $stmt->bind_param('s', $_POST['email']);
                $stmt->execute();
            }
            if($stmt->fetch() > 0){
                $errmsg_arr[] = "Email already exists!";
                $stmt->close();
            }
    
            $sqle = "SELECT tel FROM users WHERE tel = ?";
            if($stmt = $con->myconn->prepare($sqle)){
                $stmt->bind_param('s', $_POST['tel']);
                $stmt->execute();
            }
            if($stmt->fetch() > 0){
                $errmsg_arr[] = "Telephone number already exists!";
                $stmt->close();
            }
    
        }
    
    
        return $errmsg_arr;
    }
    

    function validateUpdate(array $userDetails)
    {
        $con = new Core();
        $con->connect();
        $errmsg_arr = array();
        foreach($userDetails as $key => $value) {
            if (empty($value)) {
                $errmsg_arr[] = ucwords($key) . " field is required";
            }
        }
        
        $sqlu = "SELECT username FROM users WHERE username = ? AND userid != ?";
         if($stmt = $con->myconn->prepare($sqlu)){
         $stmt->bind_param('si', $_POST['username'], $_SESSION['userid']);
         $stmt->execute();
         }
         if($stmt->fetch() > 0){
         $errmsg_arr[] = "Username already exists!";
         $stmt->close();
         }
          $sqle = "SELECT email FROM users WHERE email = ? AND userid != ?";
          if($stmt = $con->myconn->prepare($sqle)){
          $stmt->bind_param('si', $_POST['email'], $_SESSION['userid']);
          $stmt->execute();
         }
          if($stmt->fetch() > 0){
          $errmsg_arr[] = "Email already exists!";
          $stmt->close();
          }
                                   
        if (!empty($userDetails['edit'])) {
            if (!empty($userDetails['email']) && !filter_var($userDetails['email'], FILTER_VALIDATE_EMAIL)) {
                $errmsg_arr[] = "the provided email is not a valid email address";
            }
        }
        return $errmsg_arr;
    }
    
    function encrypt($sData){
        $id=(double)$sData*562524.24;
        return base64_encode($id);
    }
    
    function decrypt($sData){
        $url_id=base64_decode($sData);
        $id=(double)$url_id/562524.24;
        return $id;
    }
    
    function showProfiles(){
        $con = new Core();
        $con->connect();
        $param = $_SESSION['userid'];
        $sql = 'SELECT * FROM users WHERE userid = ?';
        $stmt = $con->myconn->prepare($sql);
        $stmt->bind_param("i", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    function showProfile(){
        $con = new Core();
        $con->connect();
        $param = $this->decrypt($_GET['id']);
        $sql = 'SELECT * FROM users WHERE userid=?';
        $stmt = $con->myconn->prepare($sql);
        $stmt->bind_param("i", $param);
        $stmt->close();
        if(!($stmt = $con->myconn->prepare($sql))) {
            echo "Prepare failed: (" . $con->myconn->errno . ") " . $con->myconn->error;
        }
        if(!($stmt->bind_param("i", $param))) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if(!($stmt->execute())) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if(!($result = $stmt->get_result())) {
            echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        return $result;
    }
    
    function updateProfile($username,$email,$naam,$adres,$postcode,$plaats,$tel,$rek,$id){
        $con = new Core();
        $con->connect();
        $sql = 'UPDATE users SET username = ?, email = ?, naam = ?, adres = ?,postcode = ?,plaats = ?,tel = ?, rekeningnummer = ? where userid = ?';
        if ($stmt = $con->myconn->prepare($sql))
        {
            $stmt->bind_param('ssssssssi',$username,$email, $naam,$adres,$postcode,$plaats,$tel,$rek,$id);
            $stmt->execute();
            $stmt->close();
        }
        else{
            die("errormessage: " . $con->myconn->error);
        }
    
    }
}

Class Date extends Core{

    
    function reserveer($personen, $userid, $resvan, $restot, $naam, $house, $achternaam, $postcode, $adres){
        $con = new Core();
        $con->connect();
        $sql = 'INSERT INTO reserveren (personen,userid,resvan,restot,naam,house,achternaam,postcode,adres) VALUES (?,?,?,?,?,?,?,?,?)';

        if ($stmt = $con->myconn->prepare($sql))
        {
            $stmt->bind_param('sisssssss', $personen, $userid, $resvan, $restot, $naam, $house, $achternaam, $postcode, $adres);
            $stmt->execute();
            $stmt->close();
        }
        else{
            die("errormessage: " . $con->myconn->error);
        }
    }

    function check($resvan, $restot, $house){
        $con = new Core();
        $con->connect();
        $errmsg = array();
        $sqlres = 'SELECT * FROM reserveren  WHERE (? <= restot AND ? >= resvan ) AND house=?';
         
        if($stmt = $con->myconn->prepare($sqlres)){
            $stmt->bind_param('sss', $resvan, $restot, $house);
            $stmt->execute();
            $stmt->store_result();
        }
        if ($stmt->fetch()){
            $errmsg[] = '<div class="alert alert-danger alert-dismissible registererrors" style="width: 350px;">Sorry is already reserved by someone else.<button type="button" class="close" data-dismiss="alert"></button></div>';
            return $errmsg;
        }


    }
}