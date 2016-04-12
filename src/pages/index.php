<!DOCTYPE html>
<html>
  <head>
    <title>GRAEME WETENHALL JDI TEST</title>

    <!--link font-->
    <link rel="stylesheet" href="/phalconcars/dist/assets/fonts/foundation-icons.css" />


  </head>
<body>

<?php
/**
* replace things with { } curly brackets with the appropriate information
* including the curly brackets! don't leave those in there...
**/
	//connect to the server
	mysql_connect("localhost", "phalconcars", "phalconcars")
     	or die ('cannot connect to database because ' . mysql_error());

	//select the database you're going to use
	mysql_select_db ("phalconcars")
     	or die ('cannot select this database because ' .  mysql_error());
?>

<?php 
function displaythreerandomcars() {

	//GENERATE RANDOM NUMBER 1-5
	$min=1;
	$max=6;
	$randomnumber = rand($min,$max);

	//LOOP COUNTER
	$loopcounter = 0; 

	//STORE RANDOM NUMBER TO GENERATE FIRST CAR LOADING
	$getcar = $randomnumber;	


	//GET WEBSITE URL TO ENSURE IMAGES LOAD WITH CORRECT URLS
	$actual_link = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);


	$id = 4;


    	while($loopcounter <= 2) {

		//IF LOADING CAR IS ABOVE 6 (only 6 cars in DB RESET TO 1) 
		if ($getcar >= 6) {
			$getcar = 1; 
		}

		//RUN QUERY
		$result = mysql_query("SELECT * FROM cars WHERE id='$getcar' ")
		or die (mysql_error());

		//GET RESULTS
		$row = mysql_fetch_array($result);

		//DISPLAY RESULTS
		//echo $row['id'] . " " . $row['make'] . " " . $row['model'] . " "  . $row['type'] . " "  . $row['colour'] . " "  . $row['seats'] . " "  . $row['image'];

			$imageurl =  $actual_link.''.$row['image'];

				echo '<div class="display_car" id="'.$getcar.' " >';

					echo '<img src="'.$imageurl.'" alt="car_image">';
					echo '<div class="car_info_wrap">';

						echo '<span class="car_heading">'.$row['make'].'</span>';
						echo '<span class="car_type">'.$row['model'].'</span>';
						
						echo '<div class="splitter"></div>';

						echo '	
							<ul class="car_info">
							    <li>'.$row['type'].'</li>
							    <li>'.$row['colour'].'</li>
							    <li>'.$row['seats'].' Seats</li>
							</ul>
						';
					echo '</div>';
				echo '</div>'; 

	    	$loopcounter++;
	    	$getcar++;
	} 

}	
?> 





	<section class="header">
		<div class="row">
			<div class="small-1 columns guest">
				<img src="/phalconcars/dist/assets/img/layout/guest.png" alt="">
			</div>
			<div class="small-2 columns login_info">
				<span class="name">Guest</span>
				<span class="status">Not logged in</span>
			</div>
			<div class="large-9 columns logo">
				<img src="/phalconcars/dist/assets/img/layout/logo.png" alt="">
			</div>
		</div> 
	</section>


	<section class="page">
		<div class="row">
			<div class="small-3 columns menu">
				<h4>NAVIGATION</h4>

				<ul class="main_menu">
					<li><a href="#"><i class="menu_icon fi-address-book"></i><span>Homepage</span></a></li>
					<li>
						<a href="#"><i class="menu_icon fi-address-book"></i><span>Products</span></a>
						<ul class="sub_menu">
							<li>
								<a href="">Example Sub item</a>
							</li>
						</ul>
					</li>
					<li><a href="#"><i class="menu_icon fi-address-book"></i><span>About us</span></a></li>
					<li><a href="#"><i class="menu_icon fi-address-book"></i><span>Blog</span></a></li>
					<li><a href="#"><i class="menu_icon fi-address-book"></i><span>Knowledgebase</span></a></li>
					<li><a href="#"><i class="menu_icon fi-address-book"></i><span>Support Forums</span></a></li>
				</ul>

				<h4>ACCOUNTS</h4>

				<ul class="main_menu">
					
					<li><a href="#"><i class="menu_icon fi-address-book"></i><span>Register</span></a></li>
					<li><a href="#"><i class="menu_icon fi-address-book"></i><span>Login</span></a></li>
				</ul>

				<h4>SEARCH</h4>
				<div class="search_wrapper">
					<div class="input_wrap">
						<div class="search_icon"></div>
						<input type="text" placeholder="search">
					</div>
					
				</div>
				
			</div>
			<div class="large-9 columns content">
				<div class="large-1 columns border left_b">
				</div>
				<div class="large-7 columns page_title">

					<div class="page_info_wrap">
						<span class="bread_crumbs">blog/all posts</span>
						<span class="main_title">Example Title</span>
						<span class="sub_heading">An example of a sub heading</span>					
					</div>

				</div>
				<div class="large-1 columns border right_b">
				</div>
				<div class="show_cars_wrap">
					<div class="show_cars_center">
						<div class="row">
							<?php 
								displaythreerandomcars();
							?> 
						</div>
					</div>
				</div>
			</div>
		</div> 
	</section>
	
</body>


</html>
