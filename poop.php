<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="poop.css"/>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'/>
<link href='https://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'/>
<title>Untitled 1</title>
</head>

<body>
<div class="content">
<img alt="poop" style="float:left; margin:20px;" src="poop.png" height="185" width="130"/>

<div>
<center><h1 style=" font-size:80px;">The Poop Archives</h1></center>
<center><h1 style=" font-size:40px;">Finding the perfect poopertunity</h1></center>
</div>

<?php 

		//pull DB info from config file
		$ini = parse_ini_file('config.ini');
		$servername = $ini['server_name'];	
		$dbname = $ini['db_name'];
		$username = $ini['db_user'];	
		$password = $ini['db_password'];
		
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if(!$conn){
			die("Connection failed".mysqli_connect_error());
		}
		
		$sql = "SELECT * FROM building;";
		$result = mysqli_query($conn, $sql);

		
		while ($row = mysqli_fetch_assoc($result)) {
			$subsql = "Select * from BATHROOM where location in (select ID from building where name ='" . $row[name] . "');";
			$result2 = mysqli_query($conn, $subsql);
			echo '<button class="accordion">' . $row['name'] . '</button>';
			echo '<div class = "panel">';
			while ($row2 = mysqli_fetch_assoc($result2)) {
				$subsq2 = 'Select floor(avg(Rating)) as score from Ratings where Bathroom_ID in(select BATHROOM.ID from BATHROOM where name = "'. $row2['name'] . '");';
				$result3 = mysqli_query($conn, $subsq2);
				$subsq3 = 'Select Rating as score from Ratings where Bathroom_ID in(select BATHROOM.ID from BATHROOM where name = "'. $row2['name'] . '");';
				$result4 = mysqli_query($conn, $subsq3);
				if(mysqli_num_rows($result4) === 0) {
					echo '<button class="accordion">' . $row2['name'] . ' Rating:  no ratings  </button>';
				}else{
					$row3 = mysqli_fetch_assoc($result3);
					switch ($row3['score']){
						case -3:
							$tag = 'poop-3.png';
							break;
						case -2:
							$tag = 'poop-2.png';
							break;
						case -1:
							$tag = 'poop-1.png';
							break;
						case 0:
							$tag = 'poop.png';
							break;
						case 1:
							$tag = 'poop1.png';
							break;
						case 2:
							$tag = 'poop2.png';
							break;
						case 3:
							$tag = 'poop3.png';
							break;
						default:
							$tag = 'poop1.png';
						}
					echo '<button class="accordion">' 
					.$row2['name'] . "   Rating: "
					. '<img alt="poop" margin:20px;" src=' 
					. $tag . ' height="36" width="26"/> </button>';
					
				}
			}
			echo '</div>';
			
		}

?>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>
</div>
</body>

</html>
