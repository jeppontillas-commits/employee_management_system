<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeletionLog extends Model
{
    use HasFactory;

    protected $primaryKey = 'deletion_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'deletion_logs';

    protected $fillable = [
        'employee_id',
        'dependency',
        'verified',
        'validated_by',
        'timestamp',
    ];

    protected $casts = [
        'verified' => 'boolean',
        'timestamp' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the employee associated with this deletion log
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    /**
     * Get the user who validated this deletion
     */
    public function validatedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'validated_by', 'user_id');
    }

    /**
     * Scope to get verified deletion logs
     */
    public function scopeVerified($query)
    {
        return $query->where('verified', true);
    }

    /**
     * Scope to get unverified deletion logs
     */
    public function scopeUnverified($query)
    {
        return $query->where('verified', false);
    }

    /**
     * Check if deletion is verified
     */
    public function isVerified(): bool
    {
        return $this->verified === true;
    }

    /**
     * Get verification status display
     */
    public function getVerificationStatus(): string
    {
        return $this->verified ? 'Verified' : 'Pending Verification';
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClass(): string
    {
        return $this->verified ? 'success' : 'warning';
    }
}
