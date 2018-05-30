 <?php
class Connector{
    
 public function connect($servername,$username,$password){

    $conn = mysqli_connect($servername,$username,$password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Great, Connected successfully";
    return $conn;
 }

public function chooseDB($dbName, $conn){

    $success=$conn->select_db($dbName);
    if(!$success){
        die("Connection to $dbName failed!");

    }
}

 public function queryDB($sql, $conn){
    
	$stmt = $conn->stmt_init();
	$stmt->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	$retVal = "[";
	$i = 0;
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){	
			$retVal = $retVal.json_encode($row["name"]);	
			if($i != ($result->num_rows) -1)	
			{$retVal = $retVal.",";}
			$i = $i +1;
		}
		$retVal = $retVal."]";
		echo $retVal;
		//echo json_encode($result->fetch_assoc());
			
	}else {
   echo "0 results";}

 }

 public function close($conn){
    $conn->close();
 }
}
?> 