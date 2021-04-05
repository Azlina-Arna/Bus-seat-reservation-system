<!DOCTYPE html>
<html>
    <head>
        <title>Booked History</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About Us</title>
        <link rel="stylesheet" href="CSS.css">

    </head>
    <body>
        <div class="about_page">
           <h1>History</h1>
           <p>Our Booked Seat Information</p>
        </div>

        <nav>
            <ul>
                <?php echo '<li><a href="index.php"><strong>Home</strong></a></li>;' ?>
                <?php echo '<li><a href="about.php"><strong>About</strong></a></li>;' ?>
                <?php echo '<li><a href="history.php"><strong>Booking History</strong></a></li>;' ?>
            </ul>
        </nav>
        <br><br><br>

        <?php
            $show = mysqli_connect("localhost","root",'');
            if(!$show){
                die('Could not connect:' .mysqli_error());
            }

            mysqli_select_db($show, "reservation");
            $result = mysqli_query($show,"SELECT * FROM reserve");

            echo '<table id="his_tab">
                 <tr>
                    <th>Name</td>
                    <th>Email</td>
                    <th>IC/Passport</td>
                    <th>Phone No.</td>
                    <th>Booked seat</td>
                 </tr>';
            
            while ($row=mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['fname']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['icnumber']."</td>";
                echo "<td>".$row['phonenumber']."</td>";
                echo "<td>".$row['seat']."</td>";
            }

            echo "</table>";
            mysqli_close($show);
        ?>
    </body>

</html>

