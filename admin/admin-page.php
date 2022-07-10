<?php
    include("dbconn.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
       <div class="header2">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="logo.png" width="150px">
            </div>
            <nav>
                <ul>
                    <li><a href="">Orders</a></li>
                    <li><a href="ship.php">Shipping</a></li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
    
    <!--------------- cart item details -------------->
    
    <div class="small-container admin-page">
        <h1> Customers Order</h1>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Payment</th>
                <th>Processed</th>
            </tr>
             <?php
                $postage = 10;
                $sql = "SELECT u.user_id, u.user_name, u.user_address, u.user_email, u.user_contact, o.orders_id FROM `orders` o JOIN `user` c ON u.user_id =o.user_id WHERE o.status=0"; 
    

                $qry=mysqli_query($dbconn,$sql);
                //$row=mysqli_num_rows($qry);
                
            if(!$qry) {//to check if query result IS NOT OK
                
                die ("Invalid query! \t".mysqli_error($dbconn));
            } else {
             
                while($d = mysqli_fetch_array($qry, MSQLI_BOTH)) {          
                ?>
                <tr>
                    <td>
                        <p>Name : <?php echo $d['user_name'];?></p>
                        <p>Address : <?php echo $d['user_address'];?></p>
                        <p>Phone No : <?php echo $d['user_contact'];?></p>
                    </td>
                    <td>
                    <?php
                        $orders_id = $d['orders_id'];
                        $postage = 10;
                        $sql1 = "SELECT j.jersey_name, j.jersey_price, o.orders_id , d.quantity FROM `order_details` d JOIN `jersey` j ON j.jersey_id = d.jersey_id JOIN `orders` o ON o.orders_id = d.orders_id WHERE o.orders_id = $orders_id AND o.status=0"; 
    

                        $qry1=mysqli_query($conn,$sql1);
                        $row1=mysqli_num_rows($qry1);
                
            
                        if($row > 0)
                        {   
                            while($d1 = mysqli_fetch_array($qry1))
                        {          
                    ?>
                    
                        <div class="order-info">
                            <div>
                                <p><?php echo $d1['jersey_name'];?> (x<?php echo $d1['quantity'];?>) <?php echo $d1['jersey_size'];?></p>
                            </div>
                        </div>    
                    
                     <?php
                
                        } //close while 
                        } //close if row
                    ?>
                    </td>
                    <?php
                    $orders_id1 = $d['orders_id'];
                    $postage = 10;
                    $sql2 = "SELECT j.jersey_name, j.jersey_price, d.quantity, SUM(d.quantity*j.jersey_price) AS 'Total'  FROM `order_detail` d JOIN `jersey` j ON j.jersey_id = d.jersey_id WHERE d.orders_id = $orders_id1"; 
    

                    $qry2=mysqli_query($conn,$sql2);
                    $row2=mysqli_num_rows($qry2);
                
                    if($row > 0)
                        {   
                            while($d2 = mysqli_fetch_assoc($qry2))
                        {          
                    ?>    
                    <td>
                        <p>RM<?php echo number_format($d2['Total']+ $postage,2);?></p>
                        <a target="_blank" href="jdisplaying.php?orders_id=<?php echo $d['orders_id'];?>">Payment Proof</a>
                    </td>
                    <td>
                        <input type="checkbox" id="processed"  onclick="window.location.href='jstatus.php?orders_id=<?php echo $d['orderID'];?>'" name="status" >
                    </td>
                </tr>
                <?php
                
                    } //close while 
                    } //close if row
                ?>
                <?php
                
                } //close while 
            } 
            ?>
        </table>
    </div>
    
    
    <!------ Footer ------->
    
    
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our Apps</h3>
                    <p>Download App for Android and ios Mobile Phone</p>
                    <div class="app-logo">
                        <img src="Images/app-store.png">
                        <img src="Images/play-store.png"> 
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="Images/logo.png">
                </div>
                <div class="footer-col-3">
                    <h3> Follow Us</h3>
                    <ul>
                        <li>Instagram</li>
                        <li>Twitter</li>
                        <li>Facebook</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2021 - Ethereal Beauty &#8482;</p>
        </div>
    </div>
    
</body>
</html>