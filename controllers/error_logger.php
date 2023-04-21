<?php

$ERROR = "made";
$wError = fopen("../errorlog/user_errorlog/errorlog.txt", "a");
fwrite($wError,"\n
=======================================================
Date: ".date('Y-m-d H:i:s')."
Error: ".$ERROR." 
=======================================================
\n");
fclose($wError);
