<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
       <div class="container">
          <div class="navbar">
              <div class="logo">
                  <a href="index.php"><img src="logo.png" width="125px"></a>
              </div>
              <nav>
               <ul id="MenuItems">
                   <li><a href="index.php">Home</a></li>
                   <li><a href="products.php">Products</a></li>
                   <li><a href="account.php">Account</a></li>
               </ul>
              </nav>
              <a href="payment.php"><img src="cart.png" width="30px" height="30px"></a>
              <img src="menu.png" onclick="menutoggle()" class="menu-icon">
          </div>
          
       </div>
       
       
<!--------------Cart Items details--------------->
/*
<div class="small-container cart-page">
   
   <table>
       <tr>
           <th>Product</th>
           <th>Quantity</th>
           <th>Subtotal</th>
       </tr>

            
        </table> 
    </div>  */
    <div class="total-price">
        <a href="payment.php" class="btn">Proceed to checkout &#8594;</a>
    </div>
    
</div>

<!----------Footer---------------> 

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col1">
               <h3>Download Our App</h3>
                <p>Download App for Android and ios mobile phone.</p>
                <div class="app-logo">
                    <img src="play-store.png">
                    <img src="app-store.png">
                </div>
            </div>
            <div class="footer-col2">
               <img src="logo-white.png">
                <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.</p>
            </div>
            <div class="footer-col3">
               <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col4">
               <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter<li>
                    <li>Instagram</li>
                    <li>YouTube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright"><a href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1">Copyright 2020 - Easy Tutorials</a></p>
    </div>
    
</div>



<!-------------js for toggle menu-------------->

<script>
    
    var MenuItems = document.getElementById("MenuItems");
    
    MenuItems.style.maxHeight = "0px";
    
    function menutoggle()
    {
        if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }else
            {
                MenuItems.style.maxHeight = "0px"
            } 
    }
    
    
</script>



</body>
</html>

