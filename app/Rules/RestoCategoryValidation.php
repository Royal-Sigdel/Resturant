<?php

namespace App\Rules;

use App\Category;
use Illuminate\Contracts\Validation\Rule;

class RestoCategoryValidation implements Rule
{
    private $restoId;

    public function __construct($restoId)
    {
        $this->restoId = $restoId;
    }
    public function passes($attribute, $value)
    {
        $conditions = [
            'resto_id' => $this->restoId,
            'name' => $value,
        ];

        if (Category::where($conditions)->first()) {
            return true;
        }

        return false;
    }

    public function message()
    {
        return 'This category does not belong to this restaurant.';
    }
}
