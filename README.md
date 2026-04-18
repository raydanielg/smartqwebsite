<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

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

### 🛍️ **Shop Features**
- **Alibaba-Style Mega Menu** - Hierarchical categories with real images
- **Super Deals Carousel** - Auto-rotating deals with countdown timers
- **Advanced Product Search** - Multi-category filtering
- **Shopping Cart** - Session-based cart with AJAX updates
- **Checkout System** - Complete order management
- **Mobile Responsive** - Fully optimized for all devices

### 🔐 **Admin Panel**
- **Role-Based Access Control** - Superadmin, Admin, Seller, Manufacturer roles
- **Dashboard Analytics** - Sales charts and statistics
- **Product Management** - CRUD operations with image uploads
- **User Management** - Complete user administration
- **Order Management** - Track and manage all orders
- **Site Settings** - Dynamic configuration

### 🏢 **B2B Features**
- **Manufacturer Profiles** - Verified supplier listings
- **Tax Exemption System** - B2B tax management
- **Bulk Ordering** - Wholesale pricing support
- **RFQ (Request for Quote)** - Custom order requests
- **Order Protection** - Secure transaction system

### 👤 **User Features**
- **Multi-Role System** - Buyer, Seller, Manufacturer
- **Dashboard per Role** - Custom dashboards for each user type
- **Profile Management** - Complete user profiles
- **Order History** - Track all purchases
- **Wishlist** - Save favorite products

---

## 🚀 Quick Start

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL/MariaDB
- Node.js & NPM (for asset compilation)

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/yourusername/smartq.git
cd smartq

# 2. Install PHP dependencies
composer install

# 3. Install JavaScript dependencies
npm install

# 4. Create environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Configure database in .env file
DB_DATABASE=smartq
DB_USERNAME=root
DB_PASSWORD=your_password

# 7. Run migrations and seeders
php artisan migrate --seed

# 8. Compile assets
npm run dev

# 9. Start the development server
php artisan serve
```

### Access URLs
- **Landing Page**: `http://localhost:8000/`
- **Shop**: `http://localhost:8000/shop`
- **Admin Panel**: `http://localhost:8000/admin`
- **Login**: `http://localhost:8000/login`

---

## 👥 Default Accounts (After Seeding)

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
│   │   ├── AdminController.php
│   │   ├── ShopController.php
│   │   └── ...
│   ├── Models/               # Eloquent Models
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Category.php
│   │   └── ...
│   └── ...
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   └── views/              # Blade templates
│       ├── admin/          # Admin panel views
│       ├── shop/           # Shop views
│       └── ...
├── public/                 # Public assets
│   ├── images/             # Uploaded images
│   └── index.php          # Entry point
├── routes/
│   └── web.php            # Web routes
└── ...
```

---

## 🎨 Key Pages

### Landing Page
- Hero slider with promotional content
- Service showcase
- Featured categories
- Testimonials
- FAQ section
- Contact information

### Shop
- Product grid with filters
- Category mega menu
- Super deals section
- Product details
- Shopping cart
- Checkout process

### Admin Panel
- Dashboard with charts
- User management
- Product management
- Order management
- Settings configuration

---

## 🔧 Configuration

### Environment Variables
Key configurations in `.env`:

```env
APP_NAME=SmartQ
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartq
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
```

---

## 📦 Database Seeders

The following seeders populate your database with sample data:

- `RoleSeeder` - Default roles and permissions
- `CategoryMegaMenuSeeder` - Hierarchical categories
- `ProductRealImagesSeeder` - Products with real images
- `DatabaseSeeder` - All sample data

Run seeders:
```bash
php artisan db:seed
```

---

## 🛡️ Security Features

- **CSRF Protection** - All forms protected
- **Role-Based Middleware** - Route protection
- **Password Hashing** - Bcrypt encryption
- **SQL Injection Prevention** - Parameterized queries
- **XSS Protection** - Blade escaping

---

## 📱 Responsive Design

Fully responsive across all devices:
- **Desktop** - Full mega menu, grid layouts
- **Tablet** - Optimized grid, touch-friendly
- **Mobile** - Collapsible menu, stacked layouts

---

## 🚧 Future Enhancements

- [ ] Payment gateway integration (Stripe, PayPal)
- [ ] Real-time notifications
- [ ] Chat system between buyers and sellers
- [ ] API for mobile apps
- [ ] Multi-language support
- [ ] Advanced analytics dashboard

---

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

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