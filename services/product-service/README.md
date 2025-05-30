# Product Service

A standalone microservice for handling product-related operations using static JSON data.

## Setup

1. Install dependencies:
```bash
composer install
```

## Running the Service

You can start the service in several ways:

### Option 1: Using Shell Script (Linux/Mac)
```bash
./start-service.sh
```

### Option 2: Using Batch File (Windows)
```batch
start-service.bat
```

### Option 3: Using PHP Script (All Platforms)
```bash
php start-service.php
```

### Option 4: Manual Start
```bash
cd services/product-service
php -S localhost:8001 -t public
```

The service will be available at http://localhost:8001

## API Endpoints

1. Get all products:
```
GET http://localhost:8001/api/products
```

2. Get featured products:
```
GET http://localhost:8001/api/products/featured
```

3. Get product by ID:
```
GET http://localhost:8001/api/products/{id}
```

## Sample Product Data

The service currently uses static JSON data with the following structure:
```json
{
    "id": 1,
    "name": "Product Name",
    "description": "Product Description",
    "price": 99.99,
    "image_url": "https://example.com/image.jpg",
    "category": "Category Name",
    "stock": 10,
    "is_featured": true
}
```

## Integration with Main Application

The main Laravel application should communicate with this service using HTTP requests. Example:

```php
use Illuminate\Support\Facades\Http;

// Get all products
$response = Http::get('http://localhost:8001/api/products');
$products = $response->json();

// Get featured products
$response = Http::get('http://localhost:8001/api/products/featured');
$featuredProducts = $response->json();

// Get specific product
$response = Http::get('http://localhost:8001/api/products/1');
$product = $response->json();
```

## Error Handling

The service returns appropriate HTTP status codes:
- 200: Success
- 404: Not Found
- 405: Method Not Allowed
- 500: Internal Server Error

All responses are in JSON format. 