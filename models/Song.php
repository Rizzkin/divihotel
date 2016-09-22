<?php
class Basic  {
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
class Song extends Basic
{
	// Haal een enkel nummer op
	
	public $answer = '';
	
	public function getOne($id)
	{
		$con = new Basic();
		$con->connect();
		$this->table = 'vakantiehuizen';
		$result = $con->myconn->query('SELECT * FROM ' . $this->table . ' WHERE id =' . $id);

		$songInfo = $result->fetch_assoc();

		return $songInfo;
	}
	
	public function getFac()
	{
	   $con = new Basic();
    	$con->connect();
        $data = $con->myconn->query('SELECT * FROM faciliteiten');
        while ($item = $data->fetch_assoc())
        {
            $list[] = $item;
        }
        return $list;
	}

	// Haal alle nummers uit de tabel op
	public function getAll()
	{
		$con = new Basic();
		$con->connect();
		// maak een lege list aan
		$songList = array();

		// maak deze regel af: voer een query uit  // JOIN genre ON genre.id = songs.genre_id
		$result = $con->myconn->query('SELECT house, id, imageurl FROM vakantiehuizen');

		// haal het resultaat op en plaats alle rijen in een array
		while ($songModel = $result->fetch_assoc()) {
			$songList[] = $songModel;
		}

		// maak af: geef alle rijen terug
		return $songList;
	}

	public function delete($id){
	$con = new Basic();
	$con->connect();
	$result = $con->myconn->query('DELETE FROM `pot`.`vakantiehuizen` WHERE `vakantiehuizen`.`id` ='. $id);
    $page = $_SERVER['PHP_SELF'];
    $this->answer = "<p class='alert-danger' id='succestext'>This villa has been deleted.</p>";
	}

	public function Add(){
		$con = new Basic();
		$con->connect();
		//check
		if(isset($_POST['submit'])){
            //variables
            $details = [];
            
            try{
                foreach($_POST as $detail){
                    if(isset($detail) && strlen($detail) > 0){
                        array_push($details, $detail);
                    }else{
                        throw new Exception(isset($detail) ? "Ik kan geen " .  array_search($detail, $_POST) . " vinden"  : "Er is iets niet gevonden");
                        break;
                    }
                }
            }catch(Exception $e){
                $this->answer = '<p class=\'alert-danger\' id=\'succestext\'>'. $e->getMessage() . '</p>' ;
                return;
            }
            //insert the data to the database
            $con->myconn->query("INSERT INTO `vakantiehuizen` (`house`, `description`, `imageurl`) VALUES ('$details[3]','$details[2]','$details[1]')");
-
            $this->answer = "<p class='alert-success' id='succestext'>The song has been added</p>";

        }
	}

    public function getGenre(){
    	$con = new Basic();
    	$con->connect();
        $data = $con->myconn->query('SELECT * FROM land');
        while ($item = $data->fetch_assoc())
        {
            $list[] = $item;
        }
        return $list;
    }
    public function addGenre()
    {
    	$con = new Basic();
    	$con->connect();
        if(isset($_POST['addGenre'])) {

            //waardes
            $landname = $_POST['land'];
            $landcolor = $_POST['color'];
            echo $color;

//            query
            $result = $con->myconn->query("INSERT INTO `land`(`land_name`, `land_color`) VALUES ('$landname','$landcolor')");

//            succes
            $this->answer = "<p class='alert-success' id='succestext'>This land has been added</p>";
        }
    }

    public function sortGenre($id){
    	$con = new Basic();
    	$con->connect();
        echo $id;
        $data = $con->myconn->query('SELECT * , vakantiehuizen.id AS house_id FROM vakantiehuizen, land WHERE land_id = '. $id .' GROUP BY vakantiehuizen.id');
        while ($item = $data->fetch_assoc())
        {
            $items[] = $item;
        }
        return $items;
    }
}
?>



















