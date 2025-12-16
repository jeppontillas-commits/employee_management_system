<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SystemSetting extends Model
{
    use HasFactory;

    protected $primaryKey = 'setting_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = 'system_settings';

    protected $fillable = [
        'setting_type',
        'setting_value',
        'modified_by',
        'modified_date',
    ];

    protected $casts = [
        'modified_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user who modified this setting
     */
    public function modifiedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'modified_by', 'user_id');
    }

    /**
     * Scope to get settings by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('setting_type', $type);
    }

    /**
     * Get a setting value by key
     */
    public static function getSetting($key, $default = null)
    {
        $setting = self::where('setting_type', $key)->first();
        return $setting ? $setting->setting_value : $default;
    }

    /**
     * Set a setting value by key
     */
    public static function setSetting($key, $value, $modifiedBy = null)
    {
        return self::updateOrCreate(
            ['setting_type' => $key],
            [
                'setting_value' => $value,
                'modified_by' => $modifiedBy,
                'modified_date' => now(),
            ]
        );
    }
}
