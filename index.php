<?php
session_start();
// Change the variables below to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'shoppingcart';
// Try and connect using the info above.
try {
	$pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to database!');
}
// Get the amount of items in the shopping cart, this will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
// Add pages we only need for our shopping cart system, for example addtocart will include the addtocart.php file.
$pages = array('cart','contactus', 'home','login','signup', 'product','immunology','reagents_and_chemicals','firstaid','M.B_reagents','M.B_equipment','M.B_biochemicals', 'products','bacteriological_media','Hema_reagents','Hema_equipment','Hema_instruments','instruments','labcontainers_and_glassware','general_lab_equipment','storage_and_transportation','filters_and_filtration','general_lab_chemicals','lab_consummables','chemistry_equipments','chemistry_reagents','spareparts_and_repair','newsearch','placeorder');
// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page']) && in_array($_GET['page'], $pages) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LABCHEF</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <form method ="post" style="float:right;display:inline-block;line-height:52px;padding-right:14px;" action = "newsearch.php" >
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
                    <li><a href="index.php?page=chemistry_equipments">Equipment</a></li>
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
        <main>
        <?php include $page . '.php'; ?>
        </main>
        <footer>
			<div class="content-wrapper">
            	<p>© <?=date('Y')?>, LABCHEF </p>
			</div>
        </footer>
    </body>
</html>
