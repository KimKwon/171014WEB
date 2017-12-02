<?php
$date = new DateTime();
$date->setTimezone(new DateTimezone("asia/seoul"));
echo $date->format('H:i:s');
 ?>
