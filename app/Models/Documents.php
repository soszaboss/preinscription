<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
        protected $primaryKey = 'id';
   protected $fillable = [
        'passport_pdf_or_img',
        'last_diploma',
        'two_last_bulletin'
   ];
}
