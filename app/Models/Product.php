<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;
    
    protected $guarded=[];
    protected $table="products";
    protected $appends = ['quantity_check', 'sale_check', 'price_check' , 'pro_check'];
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

  public function getProCheckAttribute()
    {
        return $this->category()->where('name', 'موبایل')->first() ?? false;
    }
    
    public function getPriceCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->orderBy('price')->first() ?? false;
    }

    public function getSaleCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->where('sale_price', '!=', null)->where('date_on_sale_from', '<', Carbon::now())->where('date_on_sale_to', '>', Carbon::now())->orderBy('sale_price')->first() ?? false;
    }

    public function getQuantityCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->first() ?? 0;
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function brand(){
        
        return $this->belongsTo(Brand::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function attributes (){
        
        return $this->hasMany(ProductAttribute::class);
    }

    public function variations (){
        
        return $this->hasMany(ProductVariation::class);
    }

     public function images(){

        return $this->hasMany(ProductImage::class);

     }
}