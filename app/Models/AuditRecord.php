<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'audit_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'audit_records';

    protected $fillable = [
        'employee_id',
        'action_description',
        'action_date',
        'validated',
    ];

    protected $casts = [
        'action_date' => 'datetime',
        'validated' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the employee associated with this audit record
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    /**
     * Scope to get validated records
     */
    public function scopeValidated($query)
    {
        return $query->where('validated', true);
    }

    /**
     * Scope to get unvalidated records
     */
    public function scopeUnvalidated($query)
    {
        return $query->where('validated', false);
    }

    /**
     * Scope to get records by employee
     */
    public function scopeByEmployee($query, $employeeId)
    {
        return $query->where('employee_id', $employeeId);
    }

    /**
     * Scope to get recent records
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('action_date', '>=', now()->subDays($days));
    }

    /**
     * Check if record is validated
     */
    public function isValidated(): bool
    {
        return $this->validated === true;
    }
}
