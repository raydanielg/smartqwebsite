<p align="center">
  <img src="public/images/logo.png" alt="SmartQ Logo" width="200">
</p>

<h1 align="center">SmartQ E-Commerce Platform</h1>

<p align="center">
  <strong>Alibaba-Style Multi-Vendor E-Commerce Platform with B2B & B2C Features</strong>
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-8.x-red.svg" alt="Laravel 8.x"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.0+-blue.svg" alt="PHP 8.0+"></a>
  <a href="#"><img src="https://img.shields.io/badge/Tailwind-CSS-38B2AC.svg" alt="Tailwind CSS"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License MIT"></a>
</p>

---

## ✨ Features

### 🛍️ Shop Features
- **Alibaba-Style Mega Menu** - Hierarchical categories with real images
- **Super Deals Carousel** - Auto-rotating deals with countdown timers
- **Advanced Product Search** - Multi-category filtering
- **Shopping Cart** - Session-based cart with AJAX updates
- **Checkout System** - Complete order management
- **Mobile Responsive** - Fully optimized for all devices

### 🔐 Admin Panel
- **Role-Based Access Control** - Superadmin, Admin, Seller, Manufacturer roles
- **Dashboard Analytics** - Sales charts and statistics
- **Product Management** - CRUD operations with image uploads
- **User Management** - Complete user administration
- **Order Management** - Track and manage all orders
- **Site Settings** - Dynamic configuration

### 🏢 B2B Features
- **Manufacturer Profiles** - Verified supplier listings
- **Tax Exemption System** - B2B tax management
- **Bulk Ordering** - Wholesale pricing support
- **Order Protection** - Secure transaction system

### 👤 User Features
- **Multi-Role System** - Buyer, Seller, Manufacturer
- **Dashboard per Role** - Custom dashboards for each user type
- **Profile Management** - Complete user profiles
- **Order History** - Track all purchases

---

## 🚀 Quick Start

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL/MariaDB
- Node.js & NPM

### Installation

```bash
# Clone repository
git clone https://github.com/yourusername/smartq.git
cd smartq

# Install dependencies
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Setup database (edit .env first)
php artisan migrate --seed

# Compile assets
npm run dev

# Start server
php artisan serve
```

### Access URLs
- **Landing**: `http://localhost:8000/`
- **Shop**: `http://localhost:8000/shop`
- **Admin**: `http://localhost:8000/admin`
- **Login**: `http://localhost:8000/login`

---

## 👥 Default Accounts

| Role | Email | Password |
|------|-------|----------|
| Super Admin | superadmin@smartq.com | password |
| Admin | admin@smartq.com | password |
| Seller | seller@smartq.com | password |
| Manufacturer | manufacturer@smartq.com | password |
| Buyer | buyer@smartq.com | password |

---

## 📁 Project Structure

```
smartq/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/               # Eloquent Models
│   └── ...
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   └── views/                # Blade templates
│       ├── admin/            # Admin panel views
│       ├── shop/             # Shop views
│       └── ...
├── public/                   # Public assets
├── routes/
│   └── web.php               # Web routes
└── ...
```

---

## 📦 Database Seeders

- `RoleSeeder` - Default roles and permissions
- `CategoryMegaMenuSeeder` - Hierarchical categories with 50+ subcategories
- `ProductRealImagesSeeder` - 38 products with real images
- `DatabaseSeeder` - All sample data

---

## 🛡️ Security

- CSRF Protection
- Role-Based Middleware
- Password Hashing (Bcrypt)
- SQL Injection Prevention
- XSS Protection

---

## 📱 Responsive Design

- **Desktop** - Full mega menu, grid layouts
- **Tablet** - Optimized grid, touch-friendly
- **Mobile** - Collapsible menu, stacked layouts

---

## 📄 License

MIT License - see [LICENSE](LICENSE) file.

---

## 👨‍💻 Developer

**SmartQ Team**
- Website: [www.smartq.co.tz](https://www.smartq.co.tz)
- Email: info@smartq.co.tz
- Location: Dar es Salaam, Tanzania

---

<p align="center">
  <strong>Made with ❤️ in Tanzania</strong>
</p>

<p align="center">
  <em>SmartQ - Your Ultimate B2B & B2C E-Commerce Solution</em>
</p>
