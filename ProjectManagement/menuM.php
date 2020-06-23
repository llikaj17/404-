<?php
include ('includes/managerheader.php');
session_start();
if( $_SESSION['level']='OWNER'|| $_SESSION['level']='MANAGER'){

?>
<br><br><br>
 <br><br><br>   
<br><br><br><br> <div>
     <br>
     <span class="border" style="color: black">Welcome to Employee Dashboard, <?=$_SESSION['user']?></span><br><br><br>

 </div>
            
        
<?php
include_once 'config.php';
$conn=mysqli_connect(DB_HOST,USER,PASS,DB);
$result=mysqli_query($conn,"select * from MenuItems where type='Beverage';");
if(mysqli_num_rows($result)>0){
	echo "<table border='1'>
	<tr><th>Dish Name</th>
  <th> Price</th>
  <th>Type</th>
  <th>Ingrident</th>
  <th>Actions</th>
  </tr>";
	while($row=mysqli_fetch_assoc($result)){
        $house=$row['menu_item_id'];
        
		echo "<tr>
        <td>{$row['dish_name']}</td>
        <td>{$row['dish_price']}</td>
        <td>{$row['type']}</td>
		<td>{$row['ing_name']}</td>
        
        <td>
        <a href='edit1.php?id={$row['menu_item_id']}'>Edit</a>
        <a href='delete1.php?id={$row['menu_item_id']}'>Delete</a>

        </td>
        <tr>
        </table> 
        <br><br>";
         
 
  } ?>
  <div class="butoni">
  <form action="add1.php" method="POST">
          <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($row['menu_item_id']); ?>">
          <button type="submit" class="btn btn-danger" name="add_btn"> ADD</button>
        </form>
  </div>

 <?php 
              
 
    } else { ?> <div class="caption">
  <span class="border">There are no items in the menu yet</span><br><br><br>
         </div><br><br>  
    <?php
}
  }else{
    header("Location:index.php");
}?> 
            