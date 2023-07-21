<?php

namespace App\Helper;

use Illuminate\Support\Carbon;
use App\Models\Categories;

class Helper
{
    public static function createCategories()
    {
        $catogory = [
            [
                'catogory' => 'Birthday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'catogory' => 'Annuasary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'catogory' => 'Congratulations',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'catogory' => 'Wedding',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'catogory' => 'Christmas Cake',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Categories::insert($catogory);
    }
}
