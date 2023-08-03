<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Trait HasFactory là một tính năng mới trong Laravel 8, nó được sử dụng để tạo 
    //factory dữ liệu cho model. Factory dữ liệu giúp bạn tạo dữ liệu giả lập 
    //để sử dụng trong quá trình phát triển và kiểm thử.
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postal_code'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
