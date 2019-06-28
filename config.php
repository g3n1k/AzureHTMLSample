<?php
   $host = "g3n1kdb.database.windows.net";
   $user = "g3n1k";
   $pass = "123654aaA.";
   $db = "azuredb";

   try {
       $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   } catch(Exception $e) {
       echo "Failed: " . $e;
   }
?>