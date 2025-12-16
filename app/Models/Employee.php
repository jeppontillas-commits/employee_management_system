<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'department',
        'job_role',
        'address',
        'contact_no',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that should be guarded
     */
    protected $guarded = [];

    /**
     * Status constants
     */
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_ON_LEAVE = 'on_leave';
    public const STATUS_TERMINATED = 'terminated';

    /**
     * Get the user associated with this employee
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Get all audit records for this employee
     */
    public function auditRecords(): HasMany
    {
        return $this->hasMany(AuditRecord::class, 'employee_id', 'employee_id');
    }

    /**
     * Get all profile history records for this employee
     */
    public function profileHistories(): HasMany
    {
        return $this->hasMany(EmployeeProfileHistory::class, 'employee_id', 'employee_id');
    }

    /**
     * Get deletion log for this employee
     */
    public function deletionLog(): HasMany
    {
        return $this->hasMany(DeletionLog::class, 'employee_id', 'employee_id');
    }

    /**
     * Scope to get only active employees
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Scope to get employees by department
     */
    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    /**
     * Check if employee is active
     */
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * Get employee's full information for display
     */
    public function getFullInfo(): string
    {
        return "{$this->name} ({$this->job_role})";
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            self::STATUS_ACTIVE => 'success',
            self::STATUS_INACTIVE => 'warning',
            self::STATUS_ON_LEAVE => 'info',
            self::STATUS_TERMINATED => 'danger',
            default => 'secondary',
        };
    }
}
