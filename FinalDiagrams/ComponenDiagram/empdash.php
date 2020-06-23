<?php
session_start();
if($_SESSION['level']=='MANAGER' || $_SESSION['level']='OWNER'){

?>
<html>
    <head>
        <style>
.bora{
background-image: url(back.jpg);
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
.caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: burlywood;
}
            .caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: burlywood;
}

.caption span.border {
  background-color: burlywood;
  color: #fff;
  padding: 12px;
  font-size: 25px;
  letter-spacing: 10px;
}
            .button {
  background-color: burlywood;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
            
        </style>
    </head>
<body>

    
        
 
  <span class="border">Welcome to Employee Dashboard, <?=$_SESSION['user']?></span><br><br><br>
            
        
          <a href="logout.php"> <button>Log Out</button></a> 
<?php
include_once 'config.php';
$conn=mysqli_connect(DB_HOST,USER,PASS,DB);
$result=mysqli_query($conn,"select * from Employees;");
if(mysqli_num_rows($result)>0){
	echo "<table border='1'>
	<tr><th>Name</th><th> Surname</th><th>Birthday</th><th>Email</th><th> Email</th><th>Photo</th><th>Hourly wage</th><th>Status</th><th>Code</th><th>Veprime</th><th>Veprime</th></tr>";
	while($row=mysqli_fetch_assoc($result)){
        $house=$row['emp_id'];
        
		echo "<tr>
        <td>{$row['emp_name']}</td>
        <td>{$row['emp_surname']}</td>
        <td>{$row['emp_birthday']}</td>
		<td>{$row['emp_email']}</td>
        <td><img src='{$row['emp_photo']}' width='100' height='100'></td>
        <td>{$row['emp_hourly_wage']}</td>
		<td>{$row['emp_status']}</td>
        <td>{$row['emp_code']}</td>
        <td><a href='editoje.php?id={$row['emp_id']}'>Edit</a></td>
        <tr><br><br>";
         
             
    
	}
   
 
    } else { ?> <div class="caption">
  <span class="border">There are no employees registered yet!</span><br><br><br>
         </div><br><br>  
    <?php
} }else{
    header("Location:index.php");
}?> 
            