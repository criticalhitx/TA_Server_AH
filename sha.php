<?php
 $str="ABC";
 $str2="DEF";
 $strcon=$str.$str2;
 echo "$strcon"."<br>";
 $encrypted = hash('sha256', $str);
 echo "$encrypted<br>";

 $randNum = rand(1,99999999);
 $ID = strval($randNum);
 echo "$ID";
                
?> 