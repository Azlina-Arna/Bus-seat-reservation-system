<?php
$mysqli = new mysqli('localhost', 'root', '', 'reservation');
$stmt= $mysqli->prepare("select * from reserve where seat=?");
$stmt-> bind_param('s', $seat);
$reserve= array();
if($stmt->execute()){
$result= $stmt->get_result();
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $reserve [] = $row['seat'];
    }
$stmt->close();
}
}

$seats= [
    ['window'=> '1A', 'double'=> '1B',  'Single'=> '1C'],
    ['window'=> '2A', 'double'=> '2B',  'Single'=> '2C'],
    ['window'=> '3A', 'double'=> '3B',  'Single'=> '3C'],
    ['window'=> '4A', 'double'=> '4B',  'Single'=> '4C'],
    ['window'=> '5A', 'double'=> '5B',  'Single'=> '5C'],
    ['window'=> '6A', 'double'=> '6B',  'Single'=> '6C'],
    ['window'=> '7A', 'double'=> '7B',  'Single'=> '7C'],
    ['window'=> '8A', 'double'=> '8B',  'Single'=> '8C'],
    ['window'=> '9A', 'double'=> '9B',  'Single'=> '9C'],
    ['window'=> '10A', 'double'=> '10B',  'Single'=> '10C']
];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>bus seat reservation</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    
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
<div class= "seat" >
    <h2>Choose your Seat for reservation</h2> 
    <table class= "center">
        <tr>
            <th>Window seat</th>
            <th>Double seat</th>
            <th>Single seat</th>
        </tr>

        <?php
        foreach ($seats as $s){?>

        <tr>
            <td><?php echo $s['window'];?> 
           <?php if(in_array($seat, $reserve)){ ?>
                <a href='index.php' class= "btn">Booked</a>
            <?php } else{ ?>
            <a href='booking.php?seat=<?php echo $s['window'];?>' class= "btn">Reserve</a> 
            <?php } ?> 
        </td>
            <td><?php echo $s['double'];?>
            <a href='booking.php?seat=<?php echo $s['double'];?>' class= "btn">Reserve</a> </td>
            <td><?php echo $s['Single'];?>
            <a href='booking.php?seat=<?php echo $s['Single'];?>' class= "btn">Reserve</a> </td>
        </tr>

       <?php } ?>
    </table>
</div>
</body>
</html>
