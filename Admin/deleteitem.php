<?php
include("config.php");
	$stmt = $DB_con->prepare('SELECT * FROM items');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
		}}
			


?>

<?php
 
  $id =$_GET['item_id'];
  
  $query = "DELETE FROM items WHERE item_id=".$id;
  //echo $query;
  
  $r = mysqli_query($DB_con, $query);
  
  if($r){
	  echo "Product Delected";
  }else{
	  echo "Something went wrong!";
  }

?>



