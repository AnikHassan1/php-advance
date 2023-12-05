<?php
$date=date("m");
echo $date."<br>";
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y*m*d") . "<br>";

echo "the time is".date("h");

?>
<!-- &copy; 2010-<?php echo date("y");?> Tip - Automatic Copyright Year. -->
<?php
// date_default_timezone_set("Bangladesh/Dhaka");
echo "The time is " . date("h:i:sa")."<br>";

$mktime=mktime(19,35,54,12,6,2013);
echo "time is".date("y-m-d h:i:sa",$mktime)."<br>";

echo date('m-d-y')."<br>";
echo date('l')."<br>";
echo date('h:i:sa')."<br>";

$time =time();
echo date("h:i:s a",$time+60);
?>