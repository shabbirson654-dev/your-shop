# 🛒 E-Commerce Website

A complete **full-stack e-commerce web application** built with **PHP, MySQL, Bootstrap, JavaScript, jQuery, and AJAX**.

The system includes both a **customer/user side** and a **secure admin panel** for managing products, categories, orders, and inventory.

It also supports **Cash on Delivery (COD)** and **online payment through SafePay Sandbox**.

---

# 🚀 Features

## 👤 User Side

Customers can use the website to browse products, create accounts, place orders, and track their orders.

### 🔐 Authentication

* User signup
* User login
* User logout
* Session-based authentication
* Protected checkout
* User account information
* Login required before placing an order

### 🛍️ Product Browsing

Users can:

* View product categories
* Browse available products
* View product details
* Check product availability
* Select product quantity
* Add products to the order
* View detailed product information

### 🛒 Order / Checkout

The checkout system allows users to:

* Select products
* Select quantity
* Enter required order information
* Choose payment method
* Place Cash on Delivery orders
* Pay online through SafePay Sandbox
* View order status

---

# 💳 Payment System

The project supports two payment methods:

```text
Cash on Delivery
       OR
Online Payment
       ↓
SafePay Sandbox
```

---

## 💵 Cash on Delivery

When the user selects **Cash on Delivery**:

```text
Select Products
      ↓
Select Quantity
      ↓
Choose COD
      ↓
Place Order
      ↓
Order Saved as Pending
      ↓
Admin Handles Order
```

The order is stored in the database with a pending status.

The admin can later process and complete the order.

---

# 💳 Online Payment with SafePay

For online payment:

```text
Select Products
      ↓
Select Quantity
      ↓
Choose Online Payment
      ↓
SafePay Sandbox
      ↓
Payment Completed
      ↓
Payment Verified
      ↓
Order Created
      ↓
Order Pending
```

The website uses the **SafePay Sandbox** for testing online payments.

The payment and order information can be stored separately so that the system can distinguish between:

* Payment method
* Payment status
* Order status

### ⚠️ Important

SafePay Sandbox is intended for testing and development.

Before using a payment gateway in production, verify the payment on the server side and follow the payment provider's current integration and security requirements.

---

# 📦 Order Management

After placing an order, the customer can view their order information and status.

Example order flow:

```text
Order Placed
     ↓
Pending
     ↓
Admin Reviews Order
     ↓
Processing
     ↓
Completed
```

The admin can manage the order from the admin panel.

---

# 📊 Stock / Product Availability

The system checks product availability before allowing an order.

If the requested quantity is greater than the available product quantity, the order should not be placed.

Example:

```text
Available Quantity: 5
Requested Quantity: 3

Order Allowed ✅
```

If:

```text
Available Quantity: 5
Requested Quantity: 8

Order Not Allowed ❌
```

This helps prevent users from ordering products that are unavailable.

---

# 👨‍💼 Admin Panel

The project includes a dedicated admin side for managing the e-commerce system.

The administrator can manage:

* Categories
* Products
* Product quantities
* Product information
* Orders
* Pending orders
* Completed orders
* Inventory

---

# 📂 Category Management

Admin can:

* Add categories
* View categories
* Edit categories
* Delete categories

Example categories:

```text
Fruits
Vegetables
Other
```

Categories help organize products for customers.

---

# 📦 Product Management

Admin can add products with information such as:

* Product name
* Category
* Price
* Quantity
* Product image
* Product description
* Other product details

Admin can also:

* Edit products
* Delete products
* Update product quantity
* Manage product information

---

# 🧾 Admin Order Management

The admin can view customer orders from the admin panel.

Orders can be separated into statuses such as:

```text
Pending Orders
Completed Orders
```

The admin can:

* View order details
* Check ordered products
* Check quantities
* Check customer information
* Check payment information
* Process orders
* Mark orders as completed

---

# 🔄 Inventory Flow

Product inventory is connected with the order system.

A typical flow is:

```text
Admin Adds Product
       ↓
Product Quantity Available
       ↓
Customer Places Order
       ↓
Order Stored
       ↓
Admin Processes Order
       ↓
Order Completed
       ↓
Inventory Updated
```

When an order is completed, the application can update the product quantity according to the completed order.

---

# ⚡ AJAX & jQuery

The project uses **jQuery and AJAX** for dynamic functionality.

Benefits include:

* Reduced page reloads
* Faster user interactions
* Dynamic data processing
* Smooth UI experience
* Asynchronous requests

AJAX is used in parts of the application where dynamic updates are required.

---

# 📱 Responsive Design

The website is designed to work across different screen sizes:

* Desktop
* Laptop
* Tablet
* Mobile

The interface uses **Bootstrap** for responsive layouts and components.

---

# 🛠️ Technologies Used

## Frontend

* HTML5
* CSS3
* Bootstrap
* JavaScript
* jQuery
* AJAX
* Bootstrap Icons

## Backend

* PHP
* MySQL

## Payment

* SafePay Sandbox

## Server

* Apache
* XAMPP
* Laragon

---

# 🗄️ Database

The application uses **MySQL** to store information such as:

* Users
* Categories
* Products
* Product quantities
* Orders
* Order details
* Payment information
* Order status

The database connects with the PHP backend to perform CRUD operations and manage the e-commerce workflow.

---

# 🔐 Authentication Flow

The user authentication system works approximately like this:

```text
New User
   ↓
Signup
   ↓
Account Created
   ↓
Login
   ↓
Session Created
   ↓
Browse Products
   ↓
Checkout
```

The checkout process requires the user to be authenticated.

---

# 🛒 Complete Customer Order Flow

```text
Customer
   ↓
Signup / Login
   ↓
Browse Categories
   ↓
Select Product
   ↓
View Product Details
   ↓
Select Quantity
   ↓
Checkout
   ↓
Select Payment Method
   ↓
 ┌───────────────────┐
 │                   │
COD               Online
 │                   │
 ↓                   ↓
Order Saved       SafePay
as Pending        Sandbox
 │                   │
 └─────────┬─────────┘
           ↓
      Order Pending
           ↓
       Admin Panel
           ↓
      Process Order
           ↓
       Complete Order
```

---

# 👨‍💼 Complete Admin Flow

```text
Admin Login
     ↓
Admin Dashboard
     ↓
Manage Categories
     ↓
Manage Products
     ↓
Manage Product Quantity
     ↓
View Customer Orders
     ↓
View Pending Orders
     ↓
Process Orders
     ↓
Mark Orders Completed
```

---

# 💻 How to Run with XAMPP

## 1. Install XAMPP

Install XAMPP and open the XAMPP Control Panel.

Start:

```text
Apache
MySQL
```

---

## 2. Add the Project

Copy the e-commerce project into:

```text
C:\xampp\htdocs\
```

For example:

```text
C:\xampp\htdocs\shop
```

---

## 3. Create the Database

Open:

```text
http://localhost/phpmyadmin
```

Create a database for the project.

For example:

```text
shop
```

Import the project's SQL database file into the database.

---

## 4. Configure Database Connection

Open the project's database connection file.

For a default XAMPP setup:

```php
$db = new mysqli("localhost", "root", "", "shop");

if ($db->connect_error) {
    die("Connection failed");
}
```

If your MySQL username, password, or database name is different, update the values.

---

## 5. Configure SafePay Sandbox

Add your SafePay Sandbox configuration according to the payment integration used by the project.

Keep private credentials and API keys outside publicly accessible source code.

Do not upload production API keys or secret credentials to GitHub.

---

## 6. Run the Website

Open:

```text
http://localhost/shop
```

The customer side should now be available.

Open the appropriate admin URL used by your project to access the administrator panel.

---

# 🦁 How to Run with Laragon

## 1. Install Laragon

Install Laragon and start:

```text
Apache
MySQL
```

---

## 2. Add the Project

Copy the project into:

```text
C:\laragon\www\
```

For example:

```text
C:\laragon\www\shop
```

---

## 3. Create the Database

Open your Laragon database management tool or phpMyAdmin.

Create:

```text
shop
```

Import the project's SQL database file.

---

## 4. Configure Database Connection

For a default local setup:

```php
$db = new mysqli("localhost", "root", "", "shop");

if ($db->connect_error) {
    die("Connection failed");
}
```

Update the username, password, and database name if your configuration is different.

---

## 5. Configure SafePay

Configure the SafePay Sandbox credentials and settings required by the project.

Keep API keys and other private credentials secure.

---

## 6. Run the Website

Open:

```text
http://localhost/shop
```

Depending on your Laragon configuration, you may also be able to use:

```text
http://shop.test
```

---

# 🧪 Testing the Website

For a complete test, follow this process.

### User Testing

1. Create a new account.
2. Log in.
3. Browse product categories.
4. Select a product.
5. Open product details.
6. Select quantity.
7. Go to checkout.
8. Select Cash on Delivery.
9. Place the order.
10. Check the order from the admin panel.

### Online Payment Testing

1. Log in as a user.
2. Select a product.
3. Select quantity.
4. Go to checkout.
5. Select online payment.
6. Continue to SafePay Sandbox.
7. Complete the test payment.
8. Return to the website.
9. Verify that the order/payment state is handled correctly.
10. Check the order from the admin panel.

### Admin Testing

1. Login to the admin panel.
2. Add a category.
3. Add a product.
4. Set product quantity.
5. Edit the product.
6. View customer orders.
7. Open a pending order.
8. Process the order.
9. Mark the order as completed.
10. Verify inventory/order status.

---

# 🔒 Security

This project is designed as a portfolio/learning application. Before deploying it publicly, additional security hardening is recommended.

Important security areas include:

* Password hashing with `password_hash()`
* Password verification with `password_verify()`
* Prepared SQL statements
* Input validation
* Output escaping
* Session security
* CSRF protection
* Server-side authorization
* Admin authentication
* Secure file/image uploads
* Product quantity validation
* Server-side price validation
* Server-side payment verification
* Protection against direct URL access
* HTTPS in production

### Payment Security

Never trust payment information sent only from the browser.

For online payments, the server should verify the payment with the payment provider before treating an order as successfully paid.

Never store:

* Card numbers
* CVV
* Payment passwords
* API secret keys
* Private payment credentials

in plain text.

---

# ⚠️ Important for Production

This project uses a **SafePay Sandbox** for testing.

Before accepting real customer payments:

* Replace sandbox configuration with the provider's production configuration.
* Implement server-side payment verification.
* Protect API credentials.
* Use HTTPS.
* Validate order totals on the server.
* Prevent price manipulation.
* Prevent quantity manipulation.
* Verify payment status before confirming paid orders.
* Add proper error handling and transaction handling.

---

# 🔮 Future Improvements

Possible future improvements include:

* Product search
* Product reviews
* Product ratings
* Wishlist
* Shopping cart
* Discount coupons
* Product variations
* Order cancellation
* Order tracking
* Email order notifications
* Admin dashboard analytics
* Customer profile
* Multiple payment gateways
* Automatic inventory management
* Invoice generation
* PDF invoices
* Advanced product filtering
* Sales reports
* Revenue charts
* REST API
* Laravel migration
* Improved security

---

# 🎯 Project Purpose

This project was developed as a **full-stack e-commerce portfolio project** to demonstrate practical experience with:

* PHP
* MySQL
* HTML
* CSS
* Bootstrap
* JavaScript
* jQuery
* AJAX
* Authentication
* Sessions
* Cookies
* CRUD operations
* Product management
* Category management
* Order management
* Inventory management
* Payment integration
* SafePay Sandbox
* Responsive web development

---

# 💡 What This Project Demonstrates

The project demonstrates a complete e-commerce workflow rather than only a static shopping website.

It includes both sides of the application:

### Customer

```text
Signup
↓
Login
↓
Browse Products
↓
Select Product
↓
Select Quantity
↓
Checkout
↓
Choose Payment
↓
Place Order
↓
View Order
```

### Administrator

```text
Admin Login
↓
Manage Categories
↓
Manage Products
↓
Manage Quantity
↓
View Orders
↓
Process Orders
↓
Complete Orders
```

---

# 📌 Project Status

**Status: Completed ✅**

This project is a functional **PHP/MySQL e-commerce web application** with customer authentication, product and category management, order management, inventory handling, Cash on Delivery, and SafePay Sandbox payment integration.

It was developed as a portfolio project to demonstrate practical **full-stack web development skills**.

---

# 👨‍💻 Developer

**Shabbir Ahmad**

**Full-Stack Web Developer**

### Technologies

```text
HTML5
CSS3
Bootstrap
JavaScript
jQuery
AJAX
PHP
MySQL
SafePay Sandbox
```

---

## ⭐ Portfolio Project

This project demonstrates the ability to build a complete web application with both **frontend and backend functionality**, database integration, authentication, AJAX-based interactions, order processing, inventory management, and payment integration.
