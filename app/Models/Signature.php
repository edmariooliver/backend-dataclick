<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    const STATUS_SIGNATURE_ACTIVE = 1;
    const STATUS_SIGNATURE_DEFAULTER = 2;
    const STATUS_SIGNATURE_INACTIVE= 3;

    public $fillable = ["id_user", "id_club", "status_signature", "created_at"];
}
