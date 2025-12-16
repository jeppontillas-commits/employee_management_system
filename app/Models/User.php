<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_name',
        'contact_no',
        'email',
        'address',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Status constants
     */
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    /**
     * Get all employees associated with this user
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'user_id', 'user_id');
    }

    /**
     * Get all system settings modified by this user
     */
    public function systemSettings(): HasMany
    {
        return $this->hasMany(SystemSetting::class, 'modified_by', 'user_id');
    }

    /**
     * Get all deletion logs validated by this user
     */
    public function deletionLogs(): HasMany
    {
        return $this->hasMany(DeletionLog::class, 'validated_by', 'user_id');
    }

    /**
     * Scope to get only active users
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Check if user is active
     */
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * Get user's full display name
     */
    public function getDisplayName(): string
    {
        return $this->user_name ?? $this->email;
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClass(): string
    {
        return $this->status === self::STATUS_ACTIVE ? 'success' : 'danger';
    }
}
