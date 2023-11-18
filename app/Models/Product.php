<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;




class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'brandId',
        'ramSizeId',
        'internalMemoryId',
        'images',
        'brand',
        'ram',
        'openratingSystems',
        'operatingSystemId',

//        'internalMemory'
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brandId','id');
    }
    public function ram()
    {
        return $this->belongsTo(RamSize::class,'ramSizeId','id');
    }
    public function internalMemory()
    {
        return $this->belongsTo(InternalMemory::class,'internalMemoryId','id');
    }
    public function images()
    {
        return $this->hasMany(Images::class, 'productId');
    }
    public function imagesP(): HasMany
    {
        return $this->hasMany(Images::class, 'product_id', 'id');
    }
}
