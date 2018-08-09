<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/timetable/class.database.php";
    include_once($path);
	
if(@$_SESSION['user_id']){	
	// if edit button is clicked on the dashboard it passes semester, course, branch in url and accordingly the correct tablesheet is loaded. 
	if (isset($_GET['view'])) {
		$semester = $_GET['semester'];
		$course_code = $_GET['coursecode'];
		$course_full_name = $_GET['coursefullname'];
		$year = $_GET['year'];
		$timetable_id = $_GET['id'];
		$user_id= $_SESSION['user_id'];
		
		$db_connection = new dbConnection();
		$link = $db_connection->connect(); 
				
		$query = $link->query("SELECT * FROM tablesheet WHERE timetable_id='$timetable_id' AND user_id='$user_id'");
		$query->setFetchMode(PDO::FETCH_ASSOC);  
		
		$i=0;
		$cell = array();
		$cellid = array();
		while($result = $query->fetch()){
		   $cell[$i] = $result['data'];
		   $cellid[$i] = $result['cell'];
		   $i++;
		}	
	}
		// Fetch timting from the database
		$query = $link->query("SELECT * FROM timing WHERE user_id='$user_id'");
		$query->setFetchMode(PDO::FETCH_ASSOC);  
		
		while($result = $query->fetch()){
		   $first = $result['first'];
		   $second= $result['second'];
		   $third= $result['third'];
		   $fourth= $result['fourth'];
		   $fifth= $result['fifth'];
		   $sixth= $result['sixth'];
		   $seventh= $result['seventh'];
		   $eight= $result['eight'];		   
		}

		// Fetch University Name
		$query = $link->query("SELECT * FROM users WHERE user_id='$user_id'");
		$query->setFetchMode(PDO::FETCH_ASSOC);  
		
		while($result = $query->fetch()){
		   $uname = $result['uname'];   
		}
}
else
{
	echo "You are not logged in. Please go back and log in again";
}	
		
   	
    

?>
<?php include_once 'header.php'; ?>
<body>

<div class="Table">
    <div class="Title">
	<p> </p>
        <p><?php echo $uname;?> Time Table</p>
		<p><?php if($_SESSION['name']) echo $course_full_name." ". $year; ?></p>
		<p>Semester - <?php if($_SESSION['name']) echo $semester; ?></P>
    </div>
    <div class="Heading">
        <div class="Cell">
            <p>Time/Day</p>
        </div>
        <div class="Cell">
            <p>  M o n d a y  </p>
        </div>
        <div class="Cell">
            <p>  T u e s d a y  </p>
        </div>
        <div class="Cell">
            <p>  W e d n e s d a y  </p>
        </div>
		<div class="Cell">
            <p>  T h u r s d a y  </p>
        </div>
        <div class="Cell">
            <p>  F  r  i  d  a  y  </p>
        </div>

    </div>
    <div class="Row">
        <div class="Cell">
            <p><span style="font-weight:600 ; margin-left:30%">8:00 A.M - 8:55 A.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 1){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 2){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 3){echo @$cell[$i];} } ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 4){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 5){echo @$cell[$i];}	} ?></p>
        </div>

    </div>
    <div class="Row">
        <div class="Cell">
            <p><span style="font-weight:600 ; margin-left:30%">9:00 A.M - 9:55 A.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 7){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 8){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 9){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 10){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 11){echo @$cell[$i];}	} ?></p>
        </div>

    </div>
    <div class="Row">
        <div class="Cell">
           <p><span style="font-weight:600 ; margin-left:30%">10:00 A.M - 10:55 A.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 13){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 14){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 15){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 16){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 17){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p><span style="font-weight:600 ; margin-left:30%">11:00 A.M - 11:55 A.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 19){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 20){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 21){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 22){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 23){echo @$cell[$i];}	} ?></p>
        </div>

    </div>
    <div class="Row">
        <div class="Cell">
            <p><span style="font-weight:600 ; margin-left:30%">1:00 P.M - 1:55 P.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 25){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 26){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 27){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 28){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 29){echo @$cell[$i];}	} ?></p>
        </div>

    </div>
    <div class="Row">
        <div class="Cell">
            <p><span style="font-weight:600 ; margin-left:30%">2:00 P.M - 2:55 P.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 31){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 32){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 33){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 34){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 35){echo @$cell[$i];}	} ?></p>
        </div>

    </div>
    <div class="Row">
        <div class="Cell">
           <p><span style="font-weight:600 ; margin-left:30%">3:00 P.M - 3:55 P.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 37){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 38){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 39){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 40){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 41){echo @$cell[$i];}	} ?></p>
        </div>

    </div>
    <div class="Row">
        <div class="Cell">
           <p><span style="font-weight:600 ; margin-left:30%">4:00 P.M - 4:55 P.M</span></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 43){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 44){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 45){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 46){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell">
            <p><?php for($i=0; $i<=47; $i++){if(@$cellid[$i] == 47){echo @$cell[$i];}	} ?></p>
        </div>

    </div>
</div>

<?php 
   // It loads the subject dynamically on the table sheet by selecting faculty, subject and subject name..
		   if(@$_SESSION['user_id'])
			{
			   $query = $link->query("
					SELECT faculty_name, subject_code, subject_name
					FROM course c JOIN faculty f ON c.faculty_id = f.faculty_id JOIN subject s ON s.subject_id = c.subject_id WHERE course_name =  '$course_code' AND semester ='$semester' AND c.user_id='$user_id'");
			   
			   $count = $query->rowCount();	
			   $query->setFetchMode(PDO::FETCH_ASSOC);				
				$i =0;				
				while($result = $query->fetch()){					
					if($i<$count){
						   echo 
								"<div class= 'Table'>".
								"<div class='Row'>".
									"<div>".$result['subject_code']."</div>".
									"<div class='sublist'>".$result['subject_name']." "."( ".$result['faculty_name']." )"."</div>".
								"</div></div>";																
					}
					$i++;
				}
			}

 ?>

<div id="success"></div>
<?php include_once 'footer.php'; ?>