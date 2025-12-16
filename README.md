# Employee Management System

A comprehensive Laravel-based Employee Management System with advanced features for tracking employees, audit records, profile changes, and system management.

## 🎯 Features

### Core Features
- ✅ **Employee Management**: Create, read, update, delete employee records
- ✅ **User Management**: Manage system users and their access levels
- ✅ **Audit Records**: Track all employee-related actions with validation status
- ✅ **Profile History**: Automatic tracking of all profile changes with before/after values
- ✅ **Deletion Logs**: Log and verify employee deletions
- ✅ **Reports**: Generate and manage various system reports
- ✅ **System Settings**: Configure application settings dynamically

### Advanced Features
- 🔍 **Search & Filter**: Find employees by name, email, department, or status
- 📊 **Dashboard**: Real-time system overview with key metrics
- 📝 **Activity Tracking**: Monitor recent profile changes and audit activities
- 🔔 **Status Management**: Track employee status (Active, Inactive, On Leave, Terminated)
- 📈 **Report Management**: Pending, generated, sent, and failed report tracking
- 🛡️ **Data Validation**: Comprehensive input validation with error messages

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Database**: MariaDB/MySQL
- **Frontend**: Bootstrap 5.3, Blade Templating
- **ORM**: Eloquent
- **PHP**: 8.2+

## 📋 Database Schema

### Tables
1. **users** - System users
2. **employees** - Employee records
3. **audit_records** - Action audit trails
4. **employee_profile_histories** - Profile change history
5. **deletion_logs** - Employee deletion records
6. **reports** - System reports
7. **system_settings** - Configuration settings
8. **sessions** - Laravel session storage

## 🚀 Installation & Setup

### Prerequisites
- XAMPP (PHP, Apache, MariaDB)
- Composer
- Node.js (optional, for frontend assets)

### Steps

1. **Navigate to project directory**
   ```bash
   cd c:\xampp\htdocs\employee_management_system
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Create .env file** (if not exists)
   ```bash
   copy .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations and seed database**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Start development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   ```
   http://localhost:8000
   ```

## 📁 Project Structure

```
employee_management_system/
├── app/
│   ├── Http/Controllers/        # 7 Controllers (Users, Employees, Audit, Reports, etc.)
│   ├── Models/                  # 7 Models with relationships & scopes
│   ├── Observers/               # EmployeeObserver for auto profile tracking
│   └── Providers/               # AppServiceProvider
├── database/
│   ├── migrations/              # 8 Database migrations
│   └── seeders/                 # 7 Seeders with realistic data
├── resources/
│   ├── views/
│   │   ├── layouts/             # Main layout with flash messages
│   │   ├── dashboard.blade.php  # Dashboard with metrics
│   │   └── [resources]/         # Views for all 7 resources
│   ├── css/                     # Stylesheet
│   └── js/                      # JavaScript files
├── routes/
│   └── web.php                  # All routes (7 resources + custom routes)
└── ...
```

## 🎮 Usage Guide

### Dashboard
- View real-time metrics
- Monitor pending deletions and unvalidated audits
- See recent profile changes and audit activities

### Employee Management
- **Create**: Add new employees with department and role
- **Search/Filter**: Find employees by name, email, or status
- **View Profile**: See complete employee information including:
  - Basic details
  - Associated user
  - Audit records
  - Profile history
- **Edit**: Update employee information (automatically tracked in profile history)
- **Delete**: Remove employees (logged in deletion logs)

### Audit Records
- View all employee actions
- Filter by employee
- Track validation status
- See detailed action descriptions

### Profile History
- Automatic tracking of all profile changes
- Before/after comparison of changed fields
- Employee-specific history view
- Change summaries and dates

### Reports
- Create and manage reports
- Filter by status (Pending, Generated, Sent, Failed)
- Track report types and recipients

### System Settings
- Configure application settings
- Track modifications by user
- View setting history

### Deletion Logs
- Log all employee deletions
- Verify deletion dependencies
- Track validation status
- See who validated the deletion

## 🔑 Key Models & Features

### Employee Model
- Status constants: active, inactive, on_leave, terminated
- Scopes: active(), byDepartment()
- Helper methods: isActive(), getFullInfo(), getStatusBadgeClass()
- Relations: user, auditRecords, profileHistories, deletionLog

### AuditRecord Model
- Scopes: validated(), unvalidated(), byEmployee(), recent()
- Tracks employee actions with timestamps
- Support for validation status

### EmployeeProfileHistory Model
- Automatic change tracking via Observer
- Stores before/after values in JSON
- Scopes: byEmployee(), recent()
- Methods: getParsedHistoryData(), getChangesCount(), getChangeSummary()

### Report Model
- Status constants: pending, generated, sent, failed
- Scopes: byStatus(), byType(), pending()
- Badge classes for status display

### DeletionLog Model
- Scopes: verified(), unverified()
- Methods: isVerified(), getVerificationStatus(), getStatusBadgeClass()
- Relations: employee, validatedByUser

### SystemSetting Model
- Static methods: getSetting(), setSetting()
- Scope: byType()
- Configuration management

### User Model
- Status constants: active, inactive
- Helper methods: isActive(), getDisplayName(), getStatusBadgeClass()
- Relations: employees, systemSettings, deletionLogs

## 🔄 Profile History Tracking

The system automatically tracks all changes to employee profiles:

1. **Automatic Capture**: When an employee record is updated
2. **Change Details**: Captures which fields changed with old and new values
3. **Timestamp**: Records when the change occurred
4. **Display**: Shows changes in a clear before/after comparison table

**Tracked Fields**:
- Name
- Email
- Contact Number
- Department
- Job Role
- Address
- Status

## 📝 Validation Rules

### Employee
- Name: required, string, max 255
- Email: required, email, unique
- Department: required, string
- Job Role: required, string
- Status: required, in [active, inactive, on_leave, terminated]

### Audit Record
- Employee ID: required, exists in employees table
- Action Description: nullable, max 1000
- Action Date: required, datetime format

### Report
- Report Type: required, max 255
- Status: required, in [pending, generated, sent, failed]
- Email: nullable, valid email

## 🎨 UI Features

- **Responsive Design**: Works on desktop, tablet, and mobile
- **Bootstrap 5.3**: Modern UI framework
- **Font Awesome 6.4**: Icon library
- **Flash Messages**: Success, error, warning, and info notifications
- **Status Badges**: Color-coded status indicators
- **Pagination**: 15 items per page
- **Search & Filter**: Advanced filtering options
- **Breadcrumbs**: Easy navigation

## 🔒 Security Features

- Input validation on all forms
- CSRF protection with tokens
- SQL injection prevention via parameterized queries
- XSS protection through Blade templating
- Confirmation dialogs for delete operations

## 🐛 Error Handling

- Validation error display with user-friendly messages
- Session flash messages for operation feedback
- Database error logging
- 404 handling for missing records
- Graceful error display in views

## 📊 Database Seeders

The system includes comprehensive seeders with realistic data:

- **5 Users**: Admin, managers, HR staff, auditor
- **10 Employees**: Various departments and statuses
- **25+ Reports**: Different types and statuses
- **Multiple Audit Records**: Actions per employee
- **Profile Histories**: Change tracking examples
- **System Settings**: 18 configuration settings
- **Deletion Logs**: Sample deletion records

## 🚀 Performance Optimizations

- Eager loading with `with()` clauses
- Query scopes for common filters
- Pagination for large datasets
- Indexed database columns
- Efficient relationship loading

## 📞 Support

For issues or questions, refer to:
- Database migrations in `database/migrations/`
- Model documentation in `app/Models/`
- View templates in `resources/views/`
- Routes in `routes/web.php`

## 📄 License

This project is open source and available under the MIT License.

---

**Last Updated**: December 13, 2025
**Version**: 1.0.0
**Status**: Production Ready ✅
#   e m p l o y e e _ m a n a g e m e n t _ s y s t e m  
 