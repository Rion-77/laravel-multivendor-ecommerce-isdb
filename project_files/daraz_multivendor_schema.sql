-- ============================================================================
-- MULTIVENDOR E-COMMERCE DATABASE SCHEMA
-- Modeled conceptually on platforms like Daraz.com.bd (academic project)
-- Engine: MySQL 8.x / PostgreSQL compatible (minor syntax tweaks may be needed)
-- ============================================================================

-- ============================================================================
-- 1. USERS & ACCESS CONTROL
-- ============================================================================

CREATE TABLE roles (
    role_id         INT PRIMARY KEY AUTO_INCREMENT,
    role_name       VARCHAR(50) NOT NULL UNIQUE   -- customer, seller, admin, staff
);

CREATE TABLE users (
    user_id         BIGINT PRIMARY KEY AUTO_INCREMENT,
    role_id         INT NOT NULL,
    full_name       VARCHAR(150) NOT NULL,
    email           VARCHAR(150) NOT NULL UNIQUE,
    phone           VARCHAR(20)  UNIQUE,
    password_hash   VARCHAR(255) NOT NULL,
    profile_image   VARCHAR(255),
    status          ENUM('active','suspended','deleted') DEFAULT 'active',
    email_verified  BOOLEAN DEFAULT FALSE,
    phone_verified  BOOLEAN DEFAULT FALSE,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

CREATE TABLE addresses (
    address_id      BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id         BIGINT NOT NULL,
    label           VARCHAR(50),                 -- Home, Office
    recipient_name  VARCHAR(150),
    recipient_phone VARCHAR(20),
    address_line    VARCHAR(255) NOT NULL,
    city             VARCHAR(100) NOT NULL,
    district        VARCHAR(100),
    postal_code     VARCHAR(20),
    country         VARCHAR(100) DEFAULT 'Bangladesh',
    is_default      BOOLEAN DEFAULT FALSE,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- ============================================================================
-- 2. SELLERS / VENDORS
-- ============================================================================

CREATE TABLE sellers (
    seller_id           BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id             BIGINT NOT NULL UNIQUE,     -- seller account owner
    shop_name           VARCHAR(150) NOT NULL,
    shop_slug           VARCHAR(160) NOT NULL UNIQUE,
    shop_logo_url       VARCHAR(255),
    shop_banner_url     VARCHAR(255),
    description         TEXT,
    business_reg_no     VARCHAR(100),
    commission_rate     DECIMAL(5,2) DEFAULT 10.00,  -- platform commission %
    verification_status ENUM('pending','verified','rejected') DEFAULT 'pending',
    rating_avg          DECIMAL(3,2) DEFAULT 0.00,
    status              ENUM('active','suspended','closed') DEFAULT 'active',
    created_at          DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE seller_documents (
    document_id     BIGINT PRIMARY KEY AUTO_INCREMENT,
    seller_id       BIGINT NOT NULL,
    doc_type        VARCHAR(50),          -- NID, Trade License, TIN
    doc_url         VARCHAR(255) NOT NULL,
    verified        BOOLEAN DEFAULT FALSE,
    uploaded_at     DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE
);

CREATE TABLE warehouses (
    warehouse_id    BIGINT PRIMARY KEY AUTO_INCREMENT,
    seller_id       BIGINT NOT NULL,
    name            VARCHAR(150) NOT NULL,
    address_id      BIGINT,
    is_default      BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (address_id) REFERENCES addresses(address_id)
);

-- ============================================================================
-- 3. CATALOG: CATEGORIES, BRANDS, PRODUCTS, VARIANTS
-- ============================================================================

CREATE TABLE categories (
    category_id     BIGINT PRIMARY KEY AUTO_INCREMENT,
    parent_id       BIGINT NULL,             -- self-referencing for subcategories
    name            VARCHAR(150) NOT NULL,
    slug            VARCHAR(160) NOT NULL UNIQUE,
    icon_url        VARCHAR(255),
    display_order   INT DEFAULT 0,
    FOREIGN KEY (parent_id) REFERENCES categories(category_id)
);

CREATE TABLE brands (
    brand_id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    name            VARCHAR(150) NOT NULL UNIQUE,
    logo_url        VARCHAR(255)
);

CREATE TABLE products (
    product_id      BIGINT PRIMARY KEY AUTO_INCREMENT,
    seller_id       BIGINT NOT NULL,
    category_id     BIGINT NOT NULL,
    brand_id        BIGINT,
    name            VARCHAR(255) NOT NULL,
    slug            VARCHAR(280) NOT NULL UNIQUE,
    description     TEXT,
    base_price      DECIMAL(12,2) NOT NULL,
    status          ENUM('draft','pending_review','active','rejected','archived') DEFAULT 'draft',
    total_sold       INT DEFAULT 0,
    rating_avg      DECIMAL(3,2) DEFAULT 0.00,
    rating_count    INT DEFAULT 0,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id)
);

CREATE TABLE product_images (
    image_id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    product_id      BIGINT NOT NULL,
    image_url       VARCHAR(255) NOT NULL,
    is_primary      BOOLEAN DEFAULT FALSE,
    display_order   INT DEFAULT 0,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Attributes support variant combinations, e.g. Color = Red, Size = XL
CREATE TABLE attributes (
    attribute_id    BIGINT PRIMARY KEY AUTO_INCREMENT,
    name            VARCHAR(100) NOT NULL UNIQUE     -- Color, Size, Storage
);

CREATE TABLE attribute_values (
    attribute_value_id  BIGINT PRIMARY KEY AUTO_INCREMENT,
    attribute_id        BIGINT NOT NULL,
    value               VARCHAR(100) NOT NULL,       -- Red, XL, 128GB
    FOREIGN KEY (attribute_id) REFERENCES attributes(attribute_id) ON DELETE CASCADE
);

CREATE TABLE product_variants (
    variant_id      BIGINT PRIMARY KEY AUTO_INCREMENT,
    product_id      BIGINT NOT NULL,
    sku             VARCHAR(100) NOT NULL UNIQUE,
    price           DECIMAL(12,2) NOT NULL,
    discount_price  DECIMAL(12,2),
    weight_kg       DECIMAL(6,2),
    status          ENUM('active','inactive') DEFAULT 'active',
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

CREATE TABLE variant_attribute_values (
    variant_id          BIGINT NOT NULL,
    attribute_value_id  BIGINT NOT NULL,
    PRIMARY KEY (variant_id, attribute_value_id),
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE,
    FOREIGN KEY (attribute_value_id) REFERENCES attribute_values(attribute_value_id) ON DELETE CASCADE
);

CREATE TABLE inventory (
    inventory_id        BIGINT PRIMARY KEY AUTO_INCREMENT,
    variant_id          BIGINT NOT NULL,
    warehouse_id        BIGINT NOT NULL,
    quantity            INT NOT NULL DEFAULT 0,
    reserved_quantity   INT NOT NULL DEFAULT 0,      -- held for unpaid/pending orders
    updated_at          DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE (variant_id, warehouse_id),
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE,
    FOREIGN KEY (warehouse_id) REFERENCES warehouses(warehouse_id) ON DELETE CASCADE
);

-- ============================================================================
-- 4. CART & WISHLIST
-- ============================================================================

CREATE TABLE carts (
    cart_id         BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id         BIGINT NOT NULL UNIQUE,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE cart_items (
    cart_item_id    BIGINT PRIMARY KEY AUTO_INCREMENT,
    cart_id         BIGINT NOT NULL,
    variant_id      BIGINT NOT NULL,
    quantity        INT NOT NULL DEFAULT 1,
    added_at        DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (cart_id, variant_id),
    FOREIGN KEY (cart_id) REFERENCES carts(cart_id) ON DELETE CASCADE,
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE
);

CREATE TABLE wishlists (
    wishlist_id     BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id         BIGINT NOT NULL,
    product_id      BIGINT NOT NULL,
    added_at        DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (user_id, product_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- ============================================================================
-- 5. COUPONS & CAMPAIGNS
-- ============================================================================

CREATE TABLE coupons (
    coupon_id           BIGINT PRIMARY KEY AUTO_INCREMENT,
    code                VARCHAR(50) NOT NULL UNIQUE,
    discount_type       ENUM('flat','percentage') NOT NULL,
    discount_value      DECIMAL(12,2) NOT NULL,
    min_order_amount    DECIMAL(12,2) DEFAULT 0,
    max_discount_amount DECIMAL(12,2),
    usage_limit         INT,
    times_used          INT DEFAULT 0,
    valid_from          DATETIME,
    valid_to            DATETIME,
    status              ENUM('active','expired','disabled') DEFAULT 'active'
);

CREATE TABLE campaigns (                     -- e.g. flash sales, 11.11 sale
    campaign_id     BIGINT PRIMARY KEY AUTO_INCREMENT,
    name            VARCHAR(150) NOT NULL,
    start_date      DATETIME NOT NULL,
    end_date        DATETIME NOT NULL,
    banner_url      VARCHAR(255)
);

CREATE TABLE campaign_products (
    campaign_id     BIGINT NOT NULL,
    variant_id      BIGINT NOT NULL,
    discounted_price DECIMAL(12,2) NOT NULL,
    stock_limit     INT,
    PRIMARY KEY (campaign_id, variant_id),
    FOREIGN KEY (campaign_id) REFERENCES campaigns(campaign_id) ON DELETE CASCADE,
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE
);

-- ============================================================================
-- 6. ORDERS (an order can contain items from multiple sellers)
-- ============================================================================

CREATE TABLE orders (
    order_id            BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id             BIGINT NOT NULL,
    order_number        VARCHAR(50) NOT NULL UNIQUE,
    shipping_address_id BIGINT NOT NULL,
    subtotal_amount     DECIMAL(12,2) NOT NULL,
    shipping_fee        DECIMAL(12,2) DEFAULT 0,
    discount_amount     DECIMAL(12,2) DEFAULT 0,
    tax_amount          DECIMAL(12,2) DEFAULT 0,
    total_amount        DECIMAL(12,2) NOT NULL,
    coupon_id           BIGINT,
    order_status        ENUM('placed','confirmed','processing','shipped',
                              'delivered','cancelled','returned') DEFAULT 'placed',
    payment_status      ENUM('unpaid','paid','refunded','failed') DEFAULT 'unpaid',
    placed_at           DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (shipping_address_id) REFERENCES addresses(address_id),
    FOREIGN KEY (coupon_id) REFERENCES coupons(coupon_id)
);

-- Each order_item belongs to exactly one seller -> supports multivendor split
CREATE TABLE order_items (
    order_item_id   BIGINT PRIMARY KEY AUTO_INCREMENT,
    order_id        BIGINT NOT NULL,
    seller_id       BIGINT NOT NULL,
    variant_id      BIGINT NOT NULL,
    quantity        INT NOT NULL,
    unit_price      DECIMAL(12,2) NOT NULL,
    subtotal        DECIMAL(12,2) NOT NULL,
    item_status     ENUM('pending','confirmed','packed','shipped',
                          'delivered','cancelled','return_requested','returned') DEFAULT 'pending',
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id),
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id)
);

-- ============================================================================
-- 7. PAYMENTS
-- ============================================================================

CREATE TABLE payment_methods (
    payment_method_id   INT PRIMARY KEY AUTO_INCREMENT,
    name                VARCHAR(50) NOT NULL UNIQUE   -- bKash, Nagad, Card, COD
);

CREATE TABLE payments (
    payment_id          BIGINT PRIMARY KEY AUTO_INCREMENT,
    order_id            BIGINT NOT NULL,
    payment_method_id   INT NOT NULL,
    amount              DECIMAL(12,2) NOT NULL,
    transaction_id      VARCHAR(150),
    status              ENUM('pending','success','failed','refunded') DEFAULT 'pending',
    paid_at             DATETIME,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (payment_method_id) REFERENCES payment_methods(payment_method_id)
);

-- ============================================================================
-- 8. SHIPPING / LOGISTICS
-- ============================================================================

CREATE TABLE couriers (
    courier_id      INT PRIMARY KEY AUTO_INCREMENT,
    name            VARCHAR(100) NOT NULL,      -- Pathao, RedX, Daraz Express
    contact_info    VARCHAR(255)
);

CREATE TABLE shipments (
    shipment_id     BIGINT PRIMARY KEY AUTO_INCREMENT,
    order_item_id   BIGINT NOT NULL,
    courier_id      INT NOT NULL,
    tracking_number VARCHAR(100),
    status          ENUM('pending','picked_up','in_transit','delivered','failed') DEFAULT 'pending',
    shipped_at      DATETIME,
    delivered_at    DATETIME,
    FOREIGN KEY (order_item_id) REFERENCES order_items(order_item_id) ON DELETE CASCADE,
    FOREIGN KEY (courier_id) REFERENCES couriers(courier_id)
);

-- ============================================================================
-- 9. RETURNS / REFUNDS
-- ============================================================================

CREATE TABLE returns_refunds (
    return_id       BIGINT PRIMARY KEY AUTO_INCREMENT,
    order_item_id   BIGINT NOT NULL,
    reason          VARCHAR(255),
    description     TEXT,
    status          ENUM('requested','approved','rejected','refunded') DEFAULT 'requested',
    refund_amount   DECIMAL(12,2),
    requested_at    DATETIME DEFAULT CURRENT_TIMESTAMP,
    resolved_at     DATETIME,
    FOREIGN KEY (order_item_id) REFERENCES order_items(order_item_id) ON DELETE CASCADE
);

-- ============================================================================
-- 10. REVIEWS & RATINGS
-- ============================================================================

CREATE TABLE reviews (
    review_id       BIGINT PRIMARY KEY AUTO_INCREMENT,
    product_id      BIGINT NOT NULL,
    user_id         BIGINT NOT NULL,
    order_item_id   BIGINT NOT NULL,     -- only buyers who purchased can review
    rating          TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment         TEXT,
    image_url       VARCHAR(255),
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (order_item_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (order_item_id) REFERENCES order_items(order_item_id)
);

CREATE TABLE seller_ratings (
    seller_rating_id BIGINT PRIMARY KEY AUTO_INCREMENT,
    seller_id        BIGINT NOT NULL,
    user_id          BIGINT NOT NULL,
    order_id         BIGINT NOT NULL,
    rating           TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment          TEXT,
    created_at       DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
);

-- ============================================================================
-- 11. SELLER FINANCE: COMMISSIONS & PAYOUTS
-- ============================================================================

CREATE TABLE commissions (
    commission_id     BIGINT PRIMARY KEY AUTO_INCREMENT,
    order_item_id     BIGINT NOT NULL UNIQUE,
    seller_id         BIGINT NOT NULL,
    gross_amount      DECIMAL(12,2) NOT NULL,
    commission_rate   DECIMAL(5,2) NOT NULL,
    commission_amount DECIMAL(12,2) NOT NULL,
    net_payable       DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (order_item_id) REFERENCES order_items(order_item_id) ON DELETE CASCADE,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id)
);

CREATE TABLE seller_payouts (
    payout_id       BIGINT PRIMARY KEY AUTO_INCREMENT,
    seller_id       BIGINT NOT NULL,
    amount          DECIMAL(12,2) NOT NULL,
    period_start    DATE NOT NULL,
    period_end      DATE NOT NULL,
    status          ENUM('pending','processed','failed') DEFAULT 'pending',
    payout_date     DATETIME,
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id) ON DELETE CASCADE
);

-- ============================================================================
-- 12. NOTIFICATIONS
-- ============================================================================

CREATE TABLE notifications (
    notification_id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id         BIGINT NOT NULL,
    title           VARCHAR(150),
    message         TEXT,
    type            VARCHAR(50),          -- order_update, promo, system
    is_read         BOOLEAN DEFAULT FALSE,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- ============================================================================
-- INDEXES (recommended, beyond the implicit PK/FK/UNIQUE indexes above)
-- ============================================================================

CREATE INDEX idx_products_category   ON products(category_id);
CREATE INDEX idx_products_seller     ON products(seller_id);
CREATE INDEX idx_products_status     ON products(status);
CREATE INDEX idx_order_items_order   ON order_items(order_id);
CREATE INDEX idx_order_items_seller  ON order_items(seller_id);
CREATE INDEX idx_orders_user         ON orders(user_id);
CREATE INDEX idx_inventory_variant   ON inventory(variant_id);
CREATE INDEX idx_reviews_product     ON reviews(product_id);
