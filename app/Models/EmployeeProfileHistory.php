<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeProfileHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'employee_profile_histories';

    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'contact_no',
        'history_data',
        'changed_date',
    ];

    protected $casts = [
        'changed_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the employee associated with this profile history
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    /**
     * Scope to get history by employee
     */
    public function scopeByEmployee($query, $employeeId)
    {
        return $query->where('employee_id', $employeeId)->orderBy('changed_date', 'desc');
    }

    /**
     * Scope to get recent history
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('changed_date', '>=', now()->subDays($days))->orderBy('changed_date', 'desc');
    }

    /**
     * Get parsed history data
     */
    public function getParsedHistoryData(): array
    {
        if (is_string($this->history_data)) {
            return json_decode($this->history_data, true) ?? [];
        }
        return $this->history_data ?? [];
    }

    /**
     * Get number of fields changed
     */
    public function getChangesCount(): int
    {
        return count($this->getParsedHistoryData());
    }

    /**
     * Get a human-readable summary of changes
     */
    public function getChangeSummary(): string
    {
        $changes = $this->getParsedHistoryData();
        if (empty($changes)) {
            return 'No specific changes tracked';
        }
        
        $fields = array_keys($changes);
        return 'Changes in: ' . implode(', ', array_map(fn($f) => ucfirst(str_replace('_', ' ', $f)), $fields));
    }
}
