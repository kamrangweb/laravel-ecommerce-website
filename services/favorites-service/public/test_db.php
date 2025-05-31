<?php
header('Content-Type: application/json');

try {
    // Database connection parameters
    $host = '127.0.0.1';
    $port = '5432';
    $dbname = 'Products';
    $user = 'postgres';
    $password = 'Kqa123!';

    // Create connection
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM favourites");
    $stmt->execute();
    
    // Fetch all records
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return JSON response
    echo json_encode([
        'status' => 'success',
        'data' => $result
    ]);

} catch(PDOException $e) {
    // Return error response
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?> 