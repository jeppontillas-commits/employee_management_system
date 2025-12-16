<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'report_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'reports';

    protected $fillable = [
        'report_type',
        'action_date',
        'update',
        'email',
        'status',
        'report_data',
    ];

    protected $casts = [
        'action_date' => 'datetime',
        'update' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Report status constants
     */
    public const STATUS_PENDING = 'pending';
    public const STATUS_GENERATED = 'generated';
    public const STATUS_SENT = 'sent';
    public const STATUS_FAILED = 'failed';

    /**
     * Get all possible statuses
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_GENERATED,
            self::STATUS_SENT,
            self::STATUS_FAILED,
        ];
    }

    /**
     * Scope to get reports by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to get reports by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('report_type', $type);
    }

    /**
     * Scope to get pending reports
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            self::STATUS_PENDING => 'warning',
            self::STATUS_GENERATED => 'info',
            self::STATUS_SENT => 'success',
            self::STATUS_FAILED => 'danger',
            default => 'secondary',
        };
    }
}
