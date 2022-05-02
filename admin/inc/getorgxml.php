<?php 
$xml = simplexml_load_file("http://ns2.ph.mahidol.ac.th/karupan/orgxml.php"); 
 
#echo $xml->getName() . "<br />"; 
 
foreach($xml->organization as $child) {
	$name=$child->name; 
  echo $name."<br/>"; 
} 
?> 