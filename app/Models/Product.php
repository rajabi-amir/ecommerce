<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;
    
    protected $guarded=[];
    protected $table="products";

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
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