<?php
    include("dbconn.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online Jersey</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header2">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="logo.png" width="150px">
                </div>
                <nav class="navbar2">
                    <ul id="MenuItems">
                        <li><a href="">Home</a></li>
                        <li><a href="/products/">Products</a></li>
                        <li><a href="">About</a></li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="cart.png" width="30px" height="30px"></a>
                <img src="menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>
    
    <!------ table ------->
    
    
    
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="payment-container">
                    <h2>THANK YOU!</h2>
                    <hr id="thankyou">
                    <p> transfer to the account below and submit your receipt</p>
                    <br>
                     <?php
                    $postage = 10.00;
                    $sql = "SELECT j.jersey_name, j.jersey_price, d.quantity,o.orders_id,SUM(d.quantity) AS 'quantityTotal', SUM(d.quantity* j.jersey_price) AS 'Total' FROM order_details d JOIN jersey j ON j.jersey_id = d.jersey_id JOIN orders o ON o.orders_id = d.orders_id WHERE o.orders_id = (SELECT MAX(orders_id) FROM order_details);"; 
         
                    $qry=mysqli_query($dbconn,$sql);
                    $row = mysqli_num_rows($qry);
                    
                    if($row > 0)
                        {   
                            $counter = 1;
                            while($d = mysqli_fetch_assoc($qry))
                        {
                ?>
               
                
                   
                    <p>Total Payment : RM <?php echo number_format($d['Total'] + $postage,2);?></p>
                
              
                    <br>
                    <p>Online Jersey Store (CIMB) </p>
                    <p><b>7626667691</b></p>
                    <br>
                     
                    <form method="post" action="pproof.php" enctype="multipart/form-data">  
                    <label for="proof"></label>
                    <input type=hidden value="<?php echo $d['orders_id'];?>" name="orders_id">
                    <input class="img" type="file" id="proof" accept="image/jpeg" name="proof">                    
                    <input class="submit" type="submit" value="Proceed" name="submit">
                    </form> 
                    <?php
                    $counter++; 
                        } 
                        } 
                ?>

                    </div>
                </div>
            </div>
        </div>
    
    
    <!------ Footer ------->
    
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our Apps</h3>
                    <p>Download App for Android and ios Mobile Phone</p>
                    <div class="app-logo">
                        <img src="app-store.png">
                        <img src="play-store.png"> 
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="logo.png">
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
    
     <!------ javascript toggle menu ------->
    
    <script>
        
        var MenuItems = document.getElementById("MenuItems");
        
        MenuItems.style.maxHeight = "0px";
        
        function menutoggle()
        {
            if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
            else
                {
                    MenuItems.style.maxHeight = "0px";
                }
        }
        
    </script>
</body>
</html>