<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class menu extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image','price',
    ];
    protected $with = ['category'];

     //protected $guarded = [];

     public function category()
     {
        return $this->belongsTo(Category::class);
     }

}
