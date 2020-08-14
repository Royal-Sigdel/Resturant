<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
class MenuService
{
        
}
