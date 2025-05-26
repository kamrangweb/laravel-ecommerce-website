<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Display PHP version and extension directory
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Extension Directory: " . ini_get('extension_dir') . "\n";
echo "Full Extension Path: " . realpath(ini_get('extension_dir')) . "\n\n";

// Check specific DLL file paths
$pdo_pgsql_path = "C:\\MAMP\\bin\\php\\php8.3.1\\ext\\php_pdo_pgsql.dll";
$pgsql_path = "C:\\MAMP\\bin\\php\\php8.3.1\\ext\\php_pgsql.dll";
$libcrypto_path = "C:\\MAMP\\bin\\php\\php8.3.1\\ext\\libcrypto-3-x64.dll";
$libssl_path = "C:\\MAMP\\bin\\php\\php8.3.1\\ext\\libssl-3-x64.dll";
$libpq_path = "C:\\MAMP\\bin\\php\\php8.3.1\\ext\\libpq.dll";

echo "Checking specific DLL files:\n";
echo "php_pdo_pgsql.dll exists: " . (file_exists($pdo_pgsql_path) ? 'Yes' : 'No') . "\n";
echo "php_pgsql.dll exists: " . (file_exists($pgsql_path) ? 'Yes' : 'No') . "\n";
echo "libcrypto-3-x64.dll exists: " . (file_exists($libcrypto_path) ? 'Yes' : 'No') . "\n";
echo "libssl-3-x64.dll exists: " . (file_exists($libssl_path) ? 'Yes' : 'No') . "\n";
echo "libpq.dll exists: " . (file_exists($libpq_path) ? 'Yes' : 'No') . "\n\n";

// List all loaded extensions
echo "Loaded Extensions:\n";
$loaded_extensions = get_loaded_extensions();
sort($loaded_extensions);
foreach ($loaded_extensions as $ext) {
    echo "- " . $ext . "\n";
}

echo "\nChecking PostgreSQL Extensions:\n";
echo "PDO_PGSQL loaded: " . (extension_loaded('pdo_pgsql') ? 'Yes' : 'No') . "\n";
echo "PGSQL loaded: " . (extension_loaded('pgsql') ? 'Yes' : 'No') . "\n\n";

echo "Testing PostgreSQL Connections\n";
echo "=============================\n\n";

// Test Main Database Connection
try {
    $main_dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=forge';
    echo "Testing Main Database Connection:\n";
    echo "DSN: " . $main_dsn . "\n";
    $main_pdo = new PDO($main_dsn, 'postgres', 'Kqa123!');
    echo "Main Database Connection: Successful\n";
    
    // Get PostgreSQL version
    $version = $main_pdo->query('SELECT version()')->fetchColumn();
    echo "PostgreSQL Version: " . $version . "\n\n";
} catch (PDOException $e) {
    echo "Main Database Connection Error: " . $e->getMessage() . "\n\n";
}

// Test Products Database Connection
try {
    $products_dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=Products';
    echo "Testing Products Database Connection:\n";
    echo "DSN: " . $products_dsn . "\n";
    $products_pdo = new PDO($products_dsn, 'postgres', 'Kqa123!');
    echo "Products Database Connection: Successful\n";
    
    // Test query to list tables
    $stmt = $products_pdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
    echo "\nAvailable tables in Products database:\n";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- " . $row['table_name'] . "\n";
    }
} catch (PDOException $e) {
    echo "Products Database Connection Error: " . $e->getMessage() . "\n";
}
?> 