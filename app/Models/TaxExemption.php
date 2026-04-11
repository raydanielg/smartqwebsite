<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxExemption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_name',
        'tax_id_number',
        'business_type',
        'business_address',
        'city',
        'country',
        'zip_code',
        'phone',
        'email',
        'tax_exemption_certificate',
        'certificate_number',
        'certificate_expiry',
        'status',
        'notes',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'certificate_expiry' => 'date',
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
