<?php

define('DB_SERVERNAME','localhost:3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','università');

$conn = new mysqli(
    DB_SERVERNAME,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME,
);

if ($conn && $conn->connect_error) {
    echo 'connessione fallita:'.$conn->connect_error;
    die();
}

$sql = 'SELECT * FROM students LIMIT 10';
$result = $conn->query( $sql );

if($result && $result->num_rows > 0) {

    echo "numero di righe ottenute {$result->num_rows}";

    while( $row = $result->fetch_assoc() ) {
        var_dump($row);
        echo "{$row['name']} {$row['surname']}<br>"
    }

} else if ($result) {

    echo "niente"

} else {

    echo "query error"

}

var_dump($result);

echo 'Benvenuto in facoltà!'