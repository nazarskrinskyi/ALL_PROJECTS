<?php

/**DATE TIME*/
$date = new DateTime('yesterday', new DateTimeZone('Europe/Kyiv'));
echo $date->format('d-m-Y h:i:s') . "<br>";

#$date_2 = new DateTime('now',timezone: new DateTimeZone('Europe/Kyiv'));
#$date_2->setDate('2004', '08', '29');
#$date_2->setTime('5', '10', '22');
#echo $date_2->add(new DateInterval('P2M'))->format('d-m-Y h:i:s') . "<br>";
$date_2 = (clone $date)->add(new DateInterval('P2M1D'));
var_dump($date->diff($date_2)->format('%d-%m-%y'));

/**Interval*/
$interval = new DateInterval('P2M3D');
$date->add($interval);
$date->sub($interval);
echo $date->format('d-m-Y h:i:s')   . "<br>";
echo $date->format('d-m-Y h:i:s')   . "----" .
     $date_2->format('d-m-Y h:i:s') . "<br>";

/**DATE PERIOD*/
$period = new DatePeriod($date, new DateInterval('P2D'), $date_2->modify('+3 day'));
foreach ($period as $date_) {
    echo $date_->format('d-m') . "<br>";
}


