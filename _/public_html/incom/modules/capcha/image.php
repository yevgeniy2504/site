<? 
session_start();
header("Content-type: image/jpeg");
$_SESSION['capcha']='';
$_tempHashArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "a", "A", "b", "B", "c", "C", "d", "D", "e", "E", "f", "F", "g", "G", "h", "H", "i", "j", "J", "k", "K", "L", "m", "M", "n", "N", "o", "p", "P", "q", "Q", "r", "R", "s", "S", "t", "T", "u", "U", "v", "V", "w", "W", "x", "X", "y", "Y", "z", "Z", "-");
for($i=1; $i<=6; $i++)
   {
   	  $_SESSION['capcha'].=$_tempHashArray[rand(0, count($_tempHashArray)-1)]; 
   }
$im = imagecreate(150, 40);
$white = imagecolorallocate ($im, rand(0, 255), rand(0, 255), rand(0, 255));
$black = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, rand(18, 23), rand(-4, 4), 10, 30, $black, "./arial.ttf", $_SESSION['capcha']);
imagejpeg($im);
?>