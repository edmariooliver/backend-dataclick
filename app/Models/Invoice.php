<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ["due_date", "id_signature", "status"];

    public const STATUS_INVOICE_PENDING = 1;
    public const STATUS_INVOICE_PAID = 2;
    public const STATUS_INVOICE_DUE = 3;
}
