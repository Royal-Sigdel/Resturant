<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product_Group;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'description', 'image','price','resto_Id'
    ];
    */

    protected $guarded = [];

     public function category()
     {
        return $this->belongsTo(Product_Group::class);
     }
}
