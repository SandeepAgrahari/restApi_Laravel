<?php

namespace App;

use App\Product;
use App\Scopes\SellerScope;
// use Illuminate\Database\Eloquent\Concerns\addGlobalScope;

class Seller extends User
{
	protected static function boot(){

		parent::boot();
		static::addGlobalScope(new SellerScope);
	}
    public function products(){
    	return $this->hasMany(Product::class);
    }
}
