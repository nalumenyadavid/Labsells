<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'shoppingcart';
$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(isset($_POST['search'])){
$search = $_POST['search'];
$query = "SELECT * FROM products WHERE name = '$search'";
$result = mysqli_query($conn,$query) or die('1');
}
$results = mysqli_num_rows($result);
$product = mysqli_fetch_array($result);
$product_id = $product['id'];
$product_name = $product['name'];
$product_price = $product['price'];
$rrp = $product['rrp'];
$product_desc = $product['desc'];
$product_img = $product['img'];
$location = 'imgs/';
$product_url = $location.$product_img;
?>
<html>
        <head>
                <meta charset="utf-8">
                <title>LABCHEF</title>
                <link href="style1.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <header>
            <form method ="post" style="float:right;display:inline-block;line-height:52px;padding-right:14px;" action = "newsearch.php">
              <input  type="text" name="search" required/>
              <input  type="submit" name="submit" value="Search"/>
                </form>

            <div class="content-wrapper">
                <h1>labchef</h1>
                <ul id="menu">

                 <li><a href="index.php" class="drop">Home</a>
                     </li>
    <li><a href="index.php?page=contactus" class="drop">Contact Us</a>
                     </li>
    <li><a href="#" class="drop">CATEGORIES</a>
        <div class="dropdown_4columns">
            <div class="col_4">
            </div>
            <div class="col_1">
                <h3>MICROBIOLOGY</h3>
                <ul>
                    <li><a href="index.php?page=bacteriological_media">Bacteriological media</a></li>
                     <li><a href="index.php?page=M.B_biochemicals">Biochemicals</a></li>
                    <li><a href="index.php?page=M.B_reagents">Reagents</a></li>
                    <li><a href="index.php?page=M.B_equipment">Equipment</a></li>
                </ul>   
            </div>
            <div class="col_1">
                <h3>HEMATOLOGY</h3>
                <ul>
                    <li><a href="index.php?page=Hema_reagents">Reagents</a></li>
                    <li><a href="index.php?page=Hema_equipment">Equipment</a></li>
                    <li><a href="index.php?page=Hema_instruments">Instruments</a></li>
                </ul> 
            </div>
         <div class="col_1">
            <h3>EQUIPMENT</h3>
                <ul>
                    <li><a href="index.php?page=instruments">Instruments</a></li>
                    <li><a href="index.php?page=labcontainers_and_glassware">lab containers & glassware</a></li>
                    <li><a href="index.php?page=general_lab_equipment">General lab equipment</a></li>
                    <li><a href="index.php?page=storage_and_transportation">Storage & transportation</a></li>
                    <li><a href="index.php?page=filters_and_filtration">filters & filtration</a></li>
                    <li><a href="index.php?page=firstaid">Firstaid</a></li>
                </ul>   
            </div>
             <div class="col_1">
             <h3>CONSUMMABLES</h3>
                <ul>
                    <li><a href="index.php?page=general_lab_chemicals">Genaral lab chemicals</a></li>
                    <li><a href="index.php?page=lab_consummables">Lab consummables</a></li>
                    <li><a href="#">Agriculture</a></li>
                </ul>   
            </div>
            <div class="col_1">
                <h3>CLINICAL CHEMISTRY</h3>
                <ul>
                    <li><a href="index.php?page=chemistry_equipment">Equipment</a></li>
                    <li><a href="index.php?page=chemistry_reagents">Reagents</a></li>
                    <li><a href="index.php?page=spareparts_and_repair">Spareparts & repair</a></li>
                </ul>   
            </div>
             <div class="col_1">
                <h3>Misc</h3>
                <ul>
                    <li><a href="index.php?page=chemistry_equipment">Medical Instrumenst</a>
                    <li><a href="index.php?page=chemistry_reagents">Educational Instruments</a>
                    <li><a href="index.php?page=spareparts_and_repair">life science equipment</a>
                </ul>   
            </div>

            <div class="col_1">
                <h3>MOLECULAR BIOLOGY</h3>
                 <ul>
                    <li><a href="index.php?page=immunology">Immunology</a></li>
                    <li><a href="index.php?page=reagents_and_chemicals">Reagents & chemicals</a></li>
                </ul>   
            </div>
        </div>
    </li>
    <li class="menu_right"><a href="index.php?page=cart" class="drop">my cart</a>
    </li>
    <li class="menu_right"><a href="#" class="drop">ACCOUNTS</a>
        <div class="dropdown_1column align_right">
                <div class="col_1">
                    <ul class="simple">
                        <li><a href="index.php?page=login">Login</a></li>
                        <li><a href="index.php?page=signup">Signup</a></li>
                    </ul>   
                </div>
        </div>
    </li>
</ul>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span><?=$num_items_in_cart?></span>
                                        </a>
                </div>
             </div>
    </header>
<div class="product content-wrapper">
    <img src="imgs/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>

        <div class="description">
        <?=$product['desc']?>
        </div>
    </div>
</div>
        <footer>
                        <div class="content-wrapper">
                <p>© <?=date('Y')?>, LABCHEF </p>
                        </div>
        </footer>
    </body>
</html>
