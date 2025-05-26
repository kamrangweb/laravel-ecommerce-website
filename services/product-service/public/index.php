<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

use ProductService\Controllers\ProductController;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

try {
    $controller = new ProductController();

    // Simple routing
    if ($method === 'GET') {
        if (preg_match('/^\/api\/products\/featured$/', $uri)) {
            $data = $controller->getFeaturedProducts();
            echo json_encode($data);
        } elseif (preg_match('/^\/api\/products$/', $uri)) {
            $data = $controller->getAllProducts();
            echo json_encode($data);
        } elseif (preg_match('/^\/api\/products\/(\d+)$/', $uri, $matches)) {
            $data = $controller->getProduct($matches[1]);
            if (isset($data['error'])) {
                http_response_code(404);
            }
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Not Found']);
        }
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal Server Error',
        'message' => $e->getMessage(),
        'trace' => $e->getTraceAsString()
    ]);
} 