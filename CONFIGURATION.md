# Configuration & Deployment Guide

## 🔧 Environment Configuration

### .env File Setup

The application uses the following environment variables:

```env
# Application
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database Configuration
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management_system
DB_USERNAME=root
DB_PASSWORD=

# Session Configuration
SESSION_DRIVER=database
```

### Database Setup

1. **Create Database**
   ```sql
   CREATE DATABASE employee_management_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

2. **Run Migrations**
   ```bash
   php artisan migrate
   ```

3. **Seed Database** (with test data)
   ```bash
   php artisan db:seed
   ```

4. **Fresh Setup** (reset and seed)
   ```bash
   php artisan migrate:fresh --seed
   ```

## 🚀 Deployment Checklist

### Pre-Deployment
- [ ] Set `APP_ENV=production` in .env
- [ ] Set `APP_DEBUG=false` in .env
- [ ] Run `php artisan key:generate` if needed
- [ ] Update database credentials
- [ ] Clear all caches: `php artisan cache:clear`

### Production Deployment
```bash
# Install production dependencies
composer install --optimize-autoloader --no-dev

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate --force

# Optimize application
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Post-Deployment
- [ ] Verify database connection
- [ ] Test all CRUD operations
- [ ] Verify file permissions
- [ ] Check error logs
- [ ] Monitor performance

## 📝 Configuration Options

### Application Configuration (`config/app.php`)

```php
'timezone' => 'UTC', // Change to your timezone
'locale' => 'en',
'fallback_locale' => 'en',
```

### Database Configuration (`config/database.php`)

```php
'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', 3306),
    'database' => env('DB_DATABASE', 'employee_management_system'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
],
```

### Session Configuration (`config/session.php`)

```php
'driver' => env('SESSION_DRIVER', 'database'),
'lifetime' => env('SESSION_LIFETIME', 120), // in minutes
'expire_on_close' => false,
```

## 🔐 Security Configuration

### CORS Headers (if needed)
Update `config/cors.php`:
```php
'allowed_origins' => ['http://localhost:3000'],
```

### API Rate Limiting
Use middleware in routes:
```php
Route::middleware('throttle:60,1')->group(function () {
    // Routes here
});
```

### HTTPS Enforcement (Production)
Add to `AppServiceProvider.php`:
```php
if($this->app->environment('production')) {
    URL::forceScheme('https');
}
```

## 📊 Monitoring & Logging

### Log Files Location
```
storage/logs/laravel.log
```

### Configure Logging (`config/logging.php`)
```php
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['single', 'slack'],
    ],
    'single' => [
        'driver' => 'single',
        'path' => storage_path('logs/laravel.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],
],
```

### View Logs
```bash
# Real-time log streaming
php artisan pail

# View recent logs
tail -f storage/logs/laravel.log
```

## 🗄️ Database Maintenance

### Backup Database
```bash
# Using mysqldump
mysqldump -u root employee_management_system > backup.sql
```

### Restore Database
```bash
# Using mysql
mysql -u root employee_management_system < backup.sql
```

### Database Optimization
```bash
# Run migrations fresh (development only)
php artisan migrate:fresh --seed

# Optimize tables
php artisan db:seed --class=OptimizeSeeder
```

## 🔄 Development Commands

### Cache Management
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Recache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Database Management
```bash
# Create new migration
php artisan make:migration create_table_name

# Create seeder
php artisan make:seeder TableSeeder

# Reset database
php artisan migrate:reset
php artisan migrate:refresh
```

### Code Generation
```bash
# Create model
php artisan make:model ModelName

# Create controller
php artisan make:controller ControllerName

# Create migration
php artisan make:migration table_name
```

## 🛠️ Troubleshooting

### Database Connection Error
```bash
# Check database credentials in .env
# Ensure MariaDB/MySQL is running
# Test connection: php artisan tinker
```

### Permission Issues
```bash
# Set correct permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Cache Issues
```bash
# Clear all caches
php artisan cache:clear
php artisan view:clear
```

### Autoloader Issues
```bash
# Regenerate autoloader
composer dump-autoload
composer install
```

## 📈 Performance Optimization

### Enable Query Caching
```bash
php artisan optimize
```

### Use Eager Loading
```php
// Good
$employees = Employee::with('user', 'auditRecords')->get();

// Bad - causes N+1 query problem
$employees = Employee::all();
$employees->map(fn($e) => $e->user);
```

### Implement Pagination
```php
// Instead of
$employees = Employee::all();

// Use
$employees = Employee::paginate(15);
```

## 🐛 Debug Mode

### Enable Debug Mode (Development Only)
```env
APP_DEBUG=true
```

### Use Tinker for Testing
```bash
php artisan tinker

# Test queries
>>> $employees = \App\Models\Employee::all();
>>> $user = \App\Models\User::find(1);
>>> $user->employees;
```

## 📞 Getting Help

1. Check the README.md for feature documentation
2. Review model classes for available methods
3. Check controller logic for implementation examples
4. Examine view templates for UI patterns
5. Refer to Laravel documentation: https://laravel.com/docs

## ✅ Configuration Verification

Run this to verify configuration:

```bash
php artisan about
```

This will display:
- Application name, version, and environment
- PHP version and extensions
- Database information
- Cache driver information
- Session driver information
- Mail configuration
- Queue information

---

**Last Updated**: December 13, 2025
**Version**: 1.0.0
