<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Shirt - RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!--------------Navbar--------------->
<div class="container">
    <?php include('layouts/navbar.php'); ?>
</div>
       
       
<!--------------single-product--------------->
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="images/gallery-1.jpg" width="100%" id="ProductImg">
            <div class="small-img-row">
               <div class="small-img-col">
                   <img src="images/gallery-1.jpg" class="small-img" width="100%">
               </div>
               <div class="small-img-col">
                   <img src="images/gallery-2.jpg" class="small-img" width="100%">
               </div>
               <div class="small-img-col">
                   <img src="images/gallery-3.jpg" class="small-img" width="100%">
               </div>
               <div class="small-img-col">
                   <img src="images/gallery-4.jpg" class="small-img" width="100%">
               </div>
    
            </div>
            
        </div>
        <div class="col-2">
            <p>Home / Jersey</p>
            <h1>Liverpool Training Kit</h1>
            <h4>RM50.00</h4>
            
            <select>
               <option>Select Size</option>
               <
               <option>XL</option>
               <option>L</option>
               <option>M</option>
               <option>S</option>
           </select>
            
			 <select>
               <option>Select Category</option>
               
               <option>FANS ISSUE</option>
               <option>PLAYER ISSUE</option>
           
           </select>
            <input type="number" value="1">
            <a href="cart.php" class="btn">Add To Cart</a>
            
            <h3>PRODUCT DETAILS <i class="fa fa-indent"></i></h3>
            <br>
            <p>Give your summer wardrobe a style upgrade with the HRX Men's Active T-shirt. Team it with a pair of shorts for your morning workout or a denims for an evening out with the guys.</p>
        </div>
    </div>
</div>
<!----------------- title -------------->
<div class="small-container">
   <div class="row row-2">
       <h2>Related Products</h2>
       <p>View More</p>
   </div>
    
</div>
    
<!-------------- Our Products -------------->
<div class="small-container">
         
             <div class="row">
               <div class="col-4">
                   <img src="images/product-9.jpg">
                   <h4>PSG Third Kit</h4>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-o"></i>
                   </div>
                   <p>RM35.00</p> 
               </div> 
               <div class="col-4">
                   <img src="images/product-10.jpg">
                   <h4>Man City Home Kit</h4>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-half-o"></i>
                   </div>
                   <p>RM50.00</p>
               </div> 
               <div class="col-4">
                   <img src="images/product-11.jpg">
                   <h4>Real Madrid Away Kit</h4>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-half-o"></i>
                   </div>
                   <p>RM55.00</p>
               </div> 
                <div class="col-4">
                   <img src="images/product-12.jpg">
                   <h4>Juventus Away Kit</h4>
                   <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-o"></i>
                   </div>
                   <p>RM75.00</p>
               </div> 
           </div>
           
       </div>
  
     
   
<!----------Footer---------------> 

<?php include('layouts/footer.php'); ?>


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
    
//-------------Produc Gallery------------
    
    var ProductImg = document.getElementById("ProductImg");
    
    var SmallImg = document.getElementsByClassName("small-img");
       
 
        SmallImg[0].onclick = function()
        {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function()
        {
            ProductImg.src = SmallImg[1].src;
        
        }
        SmallImg[2].onclick = function()
        {
            ProductImg.src = SmallImg[2].src;
        
        }
        SmallImg[3].onclick = function()
        {
            ProductImg.src = SmallImg[3].src;
        
        }

  //-------------End Produc Gallery------------  
    
    
    
    
</script>



</body>
</html>

