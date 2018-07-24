<?php 
	
	set_time_limit(0);
	$brandResourse = fopen("brands.csv","r");
	$hCsv 		   = fopen("heinemann.csv","r");
	$brands = [];
	$hns = [];
	$con = mysqli_connect("localhost", "root","","hienemanndata");
	if(mysqli_connect_errno()){
		echo "Failed to connect :" . mysql_connect_errno();
	}



	while (! feof($brandResourse)) 
	{
		$brand = fgetcsv($brandResourse);
		//$query =  mysqli_query($con ,"INSERT INTO `product` (`price_2`) VALUES (\"$brand[0]\")");
		$brands[] = $brand;
		// array_push($productNameArray, $productName);
	}

	while (! feof($hCsv)){
		$hns[] = fgetcsv($hCsv);
	}
 	echo "<pre>";
	
	foreach($brands As $brand){
		foreach($hns As $hn){
			if(stripos($hn[2], $brand[1]) !== false){
				//echo "<br><br>";
				//print_r($hn[2]);echo "<-->";
				//print_r($brand[1]);
				//echo "<br>--";
				//$query = "INSERT INTO product (`name`,`brand`,`airport`,`city`,`description`,`category`,`price_1`,`currency_1`,`url`,`images`,`primary_image`,`productURL`) VALUES (\"$hn[2]\", \"$brand[0]\", 10, 6, \"$hn[5]\", \"$hn[6]\", \"$hn[3]\", \"$hn[4]\", \"$hn[1]\", \"$hn[7]\", \"$hn[8]\", \"$hn[9]\")";
				//$flag  = $con->query($query);
					//echo "<br>--->s".$flag;
				


				$url = "$hn[7]";
				
				$img = 'productimages/'.$hn[2].'.jpg';
				file_put_contents($img, file_get_contents($url));

			}
		}
	}

?>