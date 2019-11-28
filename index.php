<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>ZADANIE 02</title>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	
</head>

<body>

<?php 

  $ch = curl_init();
	
	$url = 'https://app.lotto.pl/wyniki/?type=dl';
	
	curl_setopt($ch, CURLOPT_URL,$url);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$results = curl_exec($ch);
	
	curl_close($ch);
	
  $lines = explode("\n",$results);
 ?> 				   


<table width='600' border='2' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100'><?php echo $lines[1]?></td>
    <td width='100'><?php echo $lines[2]?></td>
    <td width='100'><?php echo $lines[3]?></td>
    <td width='100'><?php echo $lines[4]?></td>
    <td width='100'><?php echo $lines[5]?></td>
    <td width='100'><?php echo $lines[6]?></td>
    </tr>
   </table>
<br />
<?php
  $sum=$lines[1]+$lines[2]+$lines[3]+$lines[4]+$lines[5]+$lines[6];
  $average=$sum/6;
  echo "Suma wylosowanych liczb wynosi: $sum."; echo " Srednia wylosowanych liczb wynosi: $average";
?>
<br /><br />
 <?php
   echo "Wylosowane nowe liczby to: ";
   
   function generate_collection($quantity)
   {	 

	    $how_much=1; 

	    $zbior_liczb=array(); 
	     
	    

   while($how_much<$quantity)
	       {

	        $how_much++;

	        $set_of_numbers[]=$how_much;

	       }

	    return $set_of_numbers; 

   }

		function random_unique($collection,$how_many)
			{
			$random_numbers=array(); 

	    

	       for($i=1;$i<$how_many;$i++)
			   {

	        $random_index = array_rand($collection,1); 

	        $random_numbers[]=$collection[$random_index]; 

	        unset($collection[$random_index]); 

			    }

	    return $random_numbers; 

			    }
	

$collection = generate_collection(49); 
$random = random_unique($collection,7); 
	    

?>			 
	    
<table width='600' border='2' cellspacing='0' cellpadding='0'>
 <tr>
 <td width='100'><?php print_r($random[0])?></td>
 <td width='100'><?php print_r($random[1])?></td>
 <td width='100'><?php print_r($random[2])?></td>
 <td width='100'><?php print_r($random[3])?></td>
 <td width='100'><?php print_r($random[4])?></td>
 <td width='100'><?php print_r($random[5])?></td>
 </tr>
 </table>
	 
</body>
</html>

