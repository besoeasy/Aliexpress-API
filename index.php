<?php
include('dom.php');

$url = $_GET[“url”];
$html = file_get_html($url);

//not using json encode for safety and object creation


$links = array();
foreach($html->find('h1[class="product-name"]') as $a) {
 $links[] = $a->plaintext;
}
 
 
 $title = $links[0] ;
 ///////////
 
 $var1 = array();
foreach($html->find('a[id*="sku-1"]') as $a) {
 $var1[] = $a->title;
}
 
 
 ////////////
 
  
 $var2 = array();
foreach($html->find('a[id*="sku-2"]') as $a) {
 $var2[] = $a->innertext;
}
 
 
 ////////////
 

 
 ////////////
 
 
 $shipd = array();
foreach($html->find('li[class="packaging-item"]') as $a) {
 $shipd[] = $a->innertext;
}
 


$links = array();
foreach($html->find('span[id="j-sku-price"]') as $a) {
 $links[] = $a->innertext;
}
 
$price = $links[0];

$length = count($var1);

for ($i = 0; $i < $length-1; $i++) {
 $xvar1 =  $xvar1 . $var1[$i] . "|" ;
}
$xvar1 =  $xvar1 . $var1[$i] ;

/////////

$url = explode("?",$url); 
$url = $url['0']; 


echo  " { url :" . $url . "}<br>";
echo  " { title :" . $title . "}<br>";
echo  " { price :" . $price. "}<br>";
 foreach($html->find('span[class="percent-num"]') as $a) {
echo  " { Rating :" .  $a->plaintext . "}<br>";
}

 foreach($html->find('span[class="order-num"]') as $a) {
echo  " { Orders:" .  $a->plaintext . "}<br>";
}




echo  " { variation 1 :" . $xvar1 . "}<br>";


$length = count($var2);
for ($i = 0; $i < $length-1; $i++) {
 $xvar2 =  $xvar2. $var2[$i] . "|" ;
}
$xvar2 =  $xvar2 . $var2[$i] ;

echo  " { variation 2 :" . $xvar2 . "}<br>";



$length = count($shipd);
for ($i = 0; $i < $length; $i++) {
echo  " {" .  $shipd[$i] . "}<br>" ;
}


foreach($html->find('li[class="property-item"]') as $a) {
echo  " {" .  $a->plaintext . "}<br>";
}
 
 
 echo "<br><br>{ variation Pictures  : <br>" ;
 
$length = count($var1);
for ($i = 0; $i < $length; $i++) {

$temp = 'img[title="' . $var1[$i] .'"]' ;
foreach($html->find($temp) as $a) {
echo  " { $var1[$i] : " .  $a->bigpic . "}<br>";
} 
}


echo " } " ;




?>
