<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About Us</title>
        <link rel="stylesheet" href="CSS.css">
    </head>

    <body>
       <div class="about_page">
           <h1>About Us</h1>
           <p>We are from Kulliyah of Information and Communication Technology</p>
           <p>INFO 3305 Web Application Development Section 2</p>
       </div>

       <nav>
            <ul>
                <?php echo '<li><a href="index.php"><strong>Home</strong></a></li>;' ?>
                <?php echo '<li><a href="about.php"><strong>About</strong></a></li>;' ?>
                <?php echo '<li><a href="history.php"><strong>Booking History</strong></a></li>;' ?>
            </ul>
        </nav>

       <h2 style="text-align:center">Meet Our Team<span>!</span></h2>
       <div class="row">
           <div class="column">
               <div class="member">
                   <img src="azlina.jpeg" alt="Azlina" style="width: 100%;">
                   <div class="con_name">
                       <h2>Azlina Arna Nur</h2>
                       <p class="position">Team Leader</p>
                       <p>1630558</p>
                   </div>
               </div>
           </div>

           <div class="column">
                <div class="member">
                    <img src="sheilla.png" alt="Sheilla" style="width: 100%">
                    <div class="con_name">
                        <h2>Sheilla Chairiandita</h2>
                        <p class="position">Member</p>
                        <p>1810502</p>
                    </div>
                </div>
            </div>


            <div class="column">
                <div class="member">
                    <img src="rahman.jpeg" alt="rahman" style="width: 100%">
                    <div class="con_name">
                        <h2>Rahman Md Mijanur</h2>
                        <p class="position">Member</p>
                        <p>1631849</p>
                    </div>
                </div>
            </div>

        </div>

      
       <div class="container">
        <div style="text-align:center">
          <h1>How to Contact Us?</h1>
        </div>
        <div class="row">
          <div class="column2">
            <h2>Opening Hours:</h2>
            <table id="open">
                <th>Monday-Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
                <tr>
                    <td><p>9:00am - 17:00pm</p></td>
                    <td><p>9:00am - 13:00pm</p>
                        <p> 14.30pm - 17:00pm</p></td>
                    <td><p>9:00am - 13:00pm</p></td>
                    <td><p>Holiday</p></td>
                </tr>
            </table>

            <h2>Home Address:</h2>
            <p>Kulliyah of Information and Communication Technology, International Islamic University Malaysia, 53100, Selangor, Malaysia</p>
          </div>

          <?php
            if(!empty($_POST["submit"])){
                $fname=$_POST["firstname"];
                $lname=$_POST["lastname"];
                $content=$_POST["message"];
    
                echo '<script>alert("Your Message has been sent successfully")</script>';
            }
          ?>

          <div class="column2">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="post">
              <label for="fname">First Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Your name.." pattern=[A-Z\sa-z]{3,20} required>
              <label for="lname">Last Name</label>
              <input type="text" id="lname" name="lastname" placeholder="Your last name.." pattern=[A-Z\sa-z]{3,20} required>
              <label for="subject">Subject</label>
              <textarea id="subject" name="message" placeholder="Write something.." style="height:170px" required></textarea>
              <input type="submit" name="submit" value="Submit">
            </form>
          </div>


        </div>
      </div>
      

    </body>
</html> 
