<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\EmployeeProfileHistory;

class EmployeeObserver
{
    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        // Get the original/dirty attributes (what changed)
        $changes = $employee->getChanges();
        
        // Only track specific profile-related fields
        $trackedFields = ['name', 'email', 'contact_no', 'department', 'job_role', 'address', 'status'];
        $profileChanges = array_intersect_key($changes, array_flip($trackedFields));

        // If there are actual profile changes, create a history record
        if (!empty($profileChanges)) {
            // Get the original values
            $original = $employee->getOriginal();
            
            // Prepare history data with before/after values
            $historyData = [];
            foreach ($trackedFields as $field) {
                if (isset($profileChanges[$field])) {
                    $historyData[$field] = [
                        'old' => $original[$field] ?? null,
                        'new' => $profileChanges[$field],
                    ];
                }
            }

            // Create the profile history record
            EmployeeProfileHistory::create([
                'employee_id' => $employee->employee_id,
                'name' => $employee->name,
                'email' => $employee->email,
                'contact_no' => $employee->contact_no,
                'history_data' => json_encode($historyData),
                'changed_date' => now(),
            ]);
        }
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        //
    }
}
