
<?php 
require_once('header.php');
require_once("connect.php");
?>
<div class="sidebar-right">
    <div class="heading-title-text">
         <h1> User sent message</h1>
        </div>

      <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="content-from-div">
              <form action="" method="POST">
              <label>Select Date:</label>
                <input type="date" name="date" class="form-control form-control-lg mb-3" required>
              <label>Text-Message:</label>
               <textarea name="msg" class="form-control mb-3" required></textarea>
               <input type="submit" class="sumit" name="subbtn" value="Send Message">
              </form>
        </div>
      </div>
      <div class="col-lg-3"></div>
    </div>

          

 <?php

$jsonsmsdata="";

if(isset($_POST['subbtn'])){
$msg = $_POST['msg'];
$date =$_POST['date'];

$sqlquery = "SELECT * FROM `emergency_tbl` WHERE  date ='$date' AND confirm='1'";

if ($result = mysqli_query($con, $sqlquery)) {
/* fetch associative array */
while ($row = mysqli_fetch_assoc($result)) {
$id=$row["ptn_id"];
$name = $row["ptn_name"];
$number =$row["ptn_mobile"];
$results =$row["results"];


$message = rawurlencode("Hi $name,
Moblie No : $number,
$msg
");

$genjsons = '{"to":"'.$number.'","message":"'.$message.'"}';
$jsonsmsdata = "$genjsons,$jsonsmsdata";
$jsonsmsdata = rtrim($jsonsmsdata, ',');
}

}
echo"<span style='color:green;font-size:25px; text-align:center;'>Message sent Successfully !!</span>";
}
$smsdata = '['.$jsonsmsdata.']';

$token = "f65f2ff9bbab6aa0f7661aec7f865be4";
$smsdata = $smsdata;

$url = "http://api.greenweb.com.bd/api2.php";


$data= array(
'smsdata'=>"$smsdata",
'token'=>"$token"
); // Add parameters in key value
$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch);

//Result
echo" ";

//Error Display
echo curl_error($ch);
?>

</div>

<?php 
require_once('footer.php');
?>
