<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    // $email=$_POST['email'];
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district=mysqli_real_escape_string($connection, $_POST['district']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);
  

 



    $query="insert into food_donations(email,food,type,category,phoneno,location,address,name,quantity) values('$emailid','$foodname','$meal','$category','$phoneno','$district','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:delivery.html");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body style="    background-color: #191970;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
        <p class="logo">Feed The <b style="color:##191970; ">Need</b></p>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
      
      
        <div class="radio">
        <label for="meal" >Meal type :</label> 
        <br><br>

        <input type="radio" name="meal" id="veg" value="veg" required/>
        <label for="veg" style="padding-right: 40px;">Veg</label>
        <input type="radio" name="meal" id="Non-veg" value="Non-veg" >
        <label for="Non-veg">Non-veg</label>
    
        </div>
        <br>
        <div class="input">
        <label for="food">Select the Category:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
            <label for="raw-food">
              <img src="img/raw-food.png" alt="raw-food" >
            </label>
            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food"checked>
            <label for="cooked-food">
              <img src="img/cooked-food.png" alt="cooked-food" >
            </label>
            <input type="radio" id="packed-food" name="image-choice" value="packed-food">
            <label for="packed-food">
              <img src="img/packed-food.png" alt="packed-food" >
            </label>
          </div>
          <br>
        <!-- <input type="text" id="food" name="food"> -->
        </div>
        <div class="input">
        <label for="quantity">Quantity:(number of person /kg)</label>
        <input type="text" id="quantity" name="quantity" required/>
        </div>
       <b><p style="text-align: center;">Contact Details</p></b>
        <div class="input">
          <!-- <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
          </div> -->
      <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"value="<?php echo"". $_SESSION['name'] ;?>" required/>
      </div>
      <div>
        <label for="phoneno" >PhoneNo:</label>
      <input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}" required />
        
      </div>
      </div>
        <div class="input">
        <label for="location"></label>
        <label for="district">District:</label>
<select id="district" name="district" style="padding:10px;">
 <option value="Bagalkot">Bagalkot</option>
                          <option value="Ballari (Bellary)">Ballari (Bellary)</option>
                          <option value="Belagavi (Belgaum)">Belagavi (Belgaum)</option>
                          <option value="Bengaluru Urban">Bengaluru Urban</option>
                          <option value="Bengaluru Rural">Bengaluru Rural</option>
                          <option value="Bidar">Bidar</option>
                          <option value="Chamarajanagar">Chamarajanagar</option>
                          <option value="Chikballapur">Chikballapur</option>
                          <option value="Chikkamagaluru (Chikmagalur)">Chikkamagaluru (Chikmagalur)</option>
                          <option value="Chitradurga">Chitradurga</option>
                          <option value="Dakshina Kannada">Dakshina Kannada</option>
                          <option value="Davanagere">Davanagere</option>
                          <option value="Dharwad">Dharwad</option>
                          <option value="Gadag">Gadag</option>
                          <option value="Hassan">Hassan</option>
                          <option value="Haveri">Haveri</option>
                          <option value="Kalaburagi (Gulbarga)">Kalaburagi (Gulbarga)</option>
                          <option value="Kodagu (Coorg)">Kodagu (Coorg)</option>
                          <option value="Kolar">Kolar</option>
                          <option value="Koppal">Koppal</option>
                          <option value="Mandya">Mandya</option>
                          <option value="Mysuru (Mysore)">Mysuru (Mysore)</option>
                          <option value="Raichur">Raichur</option>
                          <option value="Ramanagara">Ramanagara</option>
                          <option value="Shivamogga (Shimoga)">Shivamogga (Shimoga)</option>
                          <option value="Tumakuru (Tumkur)">Tumakuru (Tumkur)</option>
                          <option value="Udupi">Udupi</option>
                          <option value="Uttara Kannada (Karwar)">Uttara Kannada (Karwar)</option>
                          <option value="Vijayapura (Bijapur)">Vijayapura (Bijapur)</option>
                          <option value="Yadgir">Yadgir</option>
</select> 

        <label for="address" style="padding-left: 10px;">Address:</label>
        <input type="text" id="address" name="address" required/><br>
        
      
       
       
        </div>
        <div class="btn">
            <button type="submit" name="submit"> submit</button>
     
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>