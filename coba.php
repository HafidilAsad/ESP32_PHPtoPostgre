<?php
  if(isset($_GET["temperature"])) {
   $temperature = $_GET["temperature"]; // get temperature value from HTTP GET

   $host = "localhost";
   $port = "5432";
   $dbname = "database_ESP32";
   $user = "esp32";
   $password = "microcontrollerslab@123";

   // Create PostgreSQL connection from PHP to PostgreSQL server
   $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
   // Check connection
   if (!$connection) {
      die("PostgreSQL connection failed: " . pg_last_error());
   }

   $sql = "INSERT INTO temp_table (temp_value) VALUES ($temperature)";

   $result = pg_query($connection, $sql);
   if ($result) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . pg_last_error($connection);
   }

   pg_close($connection);
} else {
   echo "temperature is not set in the HTTP request";
}

?>