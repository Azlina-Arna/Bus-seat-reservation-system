<?php
$mysqli = new mysqli('localhost', 'root', '', 'reservation');
if(isset($_GET['seat'])){
    $seat = $_GET['seat'];
}


if(isset($_POST['submit'])){
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $icnumber = $_POST['icnumber'];
  $phonenumber=$_POST['phonenumber'];
  $stmt = $mysqli->prepare("select * from reserve where seat = ?");
    $stmt->bind_param('s', $seat);
    $reserve = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div>This seat has been already Booked.</div>";
        }else{
  $stmt= $mysqli->prepare("INSERT INTO reserve (fname, email, icnumber, phonenumber,seat) VALUES(?,?,?,?,?)");
  $stmt->bind_param('sssis', $fname, $email, $icnumber, $phonenumber, $seat);
  $stmt->execute();
  $msg = "<div>You Successfully reserved your seat</div>";
  $stmt->close();
  $mysqli->close();
}
    }

  }
    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>bus seat reservation</title>
    <link rel="stylesheet" type="text/css" href="booking.css">
    
</head>
<header>

    <div class="menu">
        <img src="main.jpg" style="width:100%" height="550px">

        <nav>
            <ul>
                <?php echo '<li><a href="index.php"><strong>Home</strong></a></li>;' ?>
                <?php echo '<li><a href="about.php"><strong>About</strong></a></li>;' ?>
                <?php echo '<li><a href="history.php"><strong>Booking History</strong></a></li>;' ?>
            </ul>
        </nav>
    </div>

</header>
<body>
<div class="box">
<div class="form">
<?php echo(isset($msg))?$msg:""; ?>
<div class="container">
  <form action=" " method="post" autocomplete="off">
    <h3>Reservation Form</h3>
    <h2>Reservation for seat number: <?php echo $seat ?> </h2>
    <label for="name">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name..">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email..">

    <label for="ic/passport">IC/Passport Number</label>
    <input type="text" id="icnumber" name="icnumber" placeholder="Your IC/passport number..">

    <label for="phone">Phone Number</label>
    <input type="text" id="phonenumber" name="phonenumber" placeholder="Your phone number..">

    <input type="submit", name="submit" value="Submit">
  </form>
</div>
</div>
</div>
</body>
</html>
            
