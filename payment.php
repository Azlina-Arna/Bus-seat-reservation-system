<?php
    if(isset($_POST['submit'])){
        $ic = $_POST['ic'];
        $name = $_POST['fname'];
        $num = $_POST['numnum'];
        $month=$_POST['exxmont'];
        $year=$_POST['exxyear'];
        $cvv=$_POST['CVV'];

        $con = mysqli_connect("localhost","root",'');
        if(!$con){
            die('Could not connect:' .mysqli_error());
        }
        
        $db = mysqli_select_db($con, "reserve");

        $seats = mysqli_query($con, "SELECT 'seat' FROM 'reserve' WHERE icnumber ='$ic'");
        switch ($seats){
            case "1A": case "2A": case "3A": case "4A": case "5A": case "6A": case "7A": case "8A": case "9A": case "10A":
            case "1B": case "2B": case "3B": case "4B": case "5B": case "6B": case "7B": case "8B": case "9B":case "10B":
                $msg = "<div><p><b>Total is RM 15.</b></p></div>";
                break;
            case "1C": case "2C": case "3C": case "4C": case "5C": case "6C": case "7C": case "8C": case "9C": case "10C":   
                $msg = "<div><p><b>Total is RM 20</b></p></div>";
                break;
            default:
                $msg = "<div><p><b><h2>Not in the price list</b></p></div>";
        }
        
        $status = "INSERT INTO reserve (Payment) VALUES ('TRUE')";
        $con ->close();

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
             <?php echo '<li><a href="index.php"><strong>Home</strong></a></li>' ?>
             <?php echo '<li><a href="about.php"><strong>About</strong></a></li>' ?>
            <?php echo '<li><a href="history.php"><strong>Booking History</strong></a></li>' ?>
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
          <h3>Payment Form</h3>

          <label for="ic">IC/Passport</label>
          <input type="text" id="ic" name="ic" placeholder="Your IC/Passport">

          <label for="name">Name on Card</label>
          <input type="text" id="fname" name="fname" placeholder="Your name..">

          <label for="number">Credit card number</label>
          <input type="text" id="num" name="numnum" placeholder="1111-2222-3333-4444">

          <label for="expire">Exp Month</label>
          <input type="text" id="exmont" name="exxmont" placeholder="September">

          <label for="exYear">Exp Year</label>
          <input type="text" id="exyear" name="exxyear" placeholder="2013">
          
          <label for="cvv">CVV</label>
          <input type="text" id="Cvv" name="CVV" placeholder="352">
          <input type="submit", name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</body>
</html>