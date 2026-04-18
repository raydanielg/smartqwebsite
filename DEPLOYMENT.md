# SmartQ Deployment Guide

## Server Requirements
- PHP >= 8.0
- MySQL/MariaDB
- Apache with mod_rewrite enabled
- Composer (for local development)

## Deployment Steps

### 1. Upload Files
Upload all files to your server (e.g., via FTP or File Manager in cPanel).

### 2. Fix 404 Errors

**Option A: Change Document Root (Recommended)**
1. Login to cPanel
2. Go to "Domains" or "Addon Domains"
3. Click "Manage" next to your domain
4. Change "Document Root" from `/public_html` to `/public_html/public`
5. Save changes

**Option B: Use Root .htaccess (Alternative)**
If you cannot change document root, make sure these files exist in your root folder:
- `.htaccess` - Already created
- `index.php` - Already updated for shared hosting

### 3. Set Permissions
Set the following directory permissions to 755:
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### 4. Environment Configuration
1. Copy `.env.example` to `.env`
2. Edit `.env` with your database credentials:
```env
APP_URL=https://smartqlink.com
APP_ENV=production
APP_DEBUG=false

DB_HOST=localhost
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Run Migrations
```bash
php artisan migrate --seed
```

### 7. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## Common Issues

### 404 Not Found on /shop
- **Cause**: Domain pointing to root instead of /public
- **Solution**: Follow Option A or B in Step 2 above

### 500 Internal Server Error
- **Cause**: Wrong permissions or missing .env
- **Solution**: Check permissions (755 for storage) and .env file exists

### CSS/JS not loading
- **Cause**: APP_URL not set correctly
- **Solution**: Update APP_URL in .env to match your domain

## Support
For assistance, contact the development team.
