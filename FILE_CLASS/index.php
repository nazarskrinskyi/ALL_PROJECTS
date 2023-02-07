<?php

echo "<pre>";
/*$fOpen = fopen("../ARRAY_FILES/text.txt", 'r+');
if (!$fOpen) {
    exit('file is not found');
}
$explode = [];
while (($char = fgetcsv($fOpen))) {
    foreach ($char as $string){
        $new_str = preg_replace("#\s+#",',',$string);
        $explode[] = explode(',',$new_str);
        echo $new_str . "<br>";
    }
}
var_dump($explode);
fclose()*/
$string = file_get_contents("../ARRAY_FILES/text.txt");
$new_str = preg_replace("#\s+#",',',$string);
$explode[] = explode(',',$new_str);
echo $new_str . "<br>";
var_dump($explode);


