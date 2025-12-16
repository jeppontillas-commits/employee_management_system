<?php

if (!function_exists('statusBadgeClass')) {
    /**
     * Get badge class for employee status
     */
    function statusBadgeClass($status)
    {
        return match($status) {
            'active' => 'success',
            'inactive' => 'warning',
            'on_leave' => 'info',
            'terminated' => 'danger',
            default => 'secondary',
        };
    }
}

if (!function_exists('reportStatusBadgeClass')) {
    /**
     * Get badge class for report status
     */
    function reportStatusBadgeClass($status)
    {
        return match($status) {
            'pending' => 'warning',
            'generated' => 'info',
            'sent' => 'success',
            'failed' => 'danger',
            default => 'secondary',
        };
    }
}

if (!function_exists('verificationBadgeClass')) {
    /**
     * Get badge class for verification status
     */
    function verificationBadgeClass($verified)
    {
        return $verified ? 'success' : 'warning';
    }
}

if (!function_exists('getStatusText')) {
    /**
     * Get human-readable status text
     */
    function getStatusText($status)
    {
        return match($status) {
            'active' => 'Active',
            'inactive' => 'Inactive',
            'on_leave' => 'On Leave',
            'terminated' => 'Terminated',
            'pending' => 'Pending',
            'generated' => 'Generated',
            'sent' => 'Sent',
            'failed' => 'Failed',
            default => ucfirst(str_replace('_', ' ', $status)),
        };
    }
}

if (!function_exists('formatDateTime')) {
    /**
     * Format datetime for display
     */
    function formatDateTime($date, $format = 'M d, Y H:i')
    {
        if (!$date) {
            return 'N/A';
        }
        return $date instanceof \DateTime ? $date->format($format) : \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('formatDate')) {
    /**
     * Format date for display
     */
    function formatDate($date, $format = 'M d, Y')
    {
        if (!$date) {
            return 'N/A';
        }
        return $date instanceof \DateTime ? $date->format($format) : \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('truncate')) {
    /**
     * Truncate text
     */
    function truncate($text, $length = 50)
    {
        return strlen($text) > $length ? substr($text, 0, $length) . '...' : $text;
    }
}
