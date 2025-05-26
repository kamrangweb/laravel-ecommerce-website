-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    discount_price DECIMAL(10,2),
    image_url VARCHAR(255),
    stock_quantity INTEGER DEFAULT 0,
    category_id INTEGER,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create categories table
CREATE TABLE IF NOT EXISTS categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create product_categories table for many-to-many relationship
CREATE TABLE IF NOT EXISTS product_categories (
    product_id INTEGER REFERENCES products(id),
    category_id INTEGER REFERENCES categories(id),
    PRIMARY KEY (product_id, category_id)
);

-- Create product_images table for multiple images per product
CREATE TABLE IF NOT EXISTS product_images (
    id SERIAL PRIMARY KEY,
    product_id INTEGER REFERENCES products(id),
    image_url VARCHAR(255) NOT NULL,
    is_primary BOOLEAN DEFAULT false,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add some sample data
INSERT INTO categories (name, description) VALUES
('Electronics', 'Electronic devices and accessories'),
('Clothing', 'Fashion and apparel items'),
('Books', 'Books and publications');

-- Add sample products
INSERT INTO products (name, description, price, discount_price, image_url, stock_quantity, category_id) VALUES
('Smartphone X', 'Latest model smartphone with advanced features', 999.99, 899.99, 'smartphone-x.jpg', 50, 1),
('Laptop Pro', 'High-performance laptop for professionals', 1499.99, NULL, 'laptop-pro.jpg', 30, 1),
('Designer T-Shirt', 'Premium cotton t-shirt with unique design', 29.99, 24.99, 'tshirt.jpg', 100, 2),
('Programming Book', 'Complete guide to modern programming', 49.99, 39.99, 'programming-book.jpg', 75, 3); 