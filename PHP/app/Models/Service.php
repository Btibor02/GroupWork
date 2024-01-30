<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use \Sushi\Sushi, HasFactory;

    protected $rows = [
        [
            'group' => 'Featured',
            'name' => 'Quality Haircut',
            'desc' => 'A regular shape up with a tidy back and sides and scissors on top.',
            'time' => 30,
            'price' => 400,
        ],
        [
            'group' => 'Featured',
            'name' => 'Premium Haircut',
            'desc' => 'For medium-lenght and classic styles that require a bit more maintenance.',
            'time' => 45,
            'price' => 550,
        ],
        [
            'group' => 'Featured',
            'name' => 'Clippers Only',
            'desc' => 'Brisk, professional cut for when time is of the essence.',
            'time' => 15,
            'price' => 200,
        ],
        [
            'group' => 'Haircut',
            'name' => 'Longer Haircut',
            'desc' => 'For a complete restyle, or if you have longer, textured hair.',
            'time' => 60,
            'price' => 750,
        ],
        [
            'group' => 'Haircut',
            'name' => 'Skin Fade with Haircut',
            'desc' => 'Popular service for achieving the tightest skin fade.',
            'time' => 45,
            'price' => 550,
        ],
        [
            'group' => 'Beard',
            'name' => 'Quality Beard Trim',
            'desc' => 'One grade all over beard trim.',
            'time' => 15,
            'price' => 200,
        ],
        [
            'group' => 'Beard',
            'name' => 'Premium Beard Trim',
            'desc' => 'Trimming & Shaping for longer beards and moustaches.',
            'time' => 30,
            'price' => 350,
        ],
        [
            'group' => 'Wellbeing',
            'name' => 'Consultation',
            'desc' => '15 minutes with a barber to understand your needs and face shape.',
            'time' => 15,
            'price' => 150,
        ],
        [
            'group' => 'Wellbeing',
            'name' => 'Hot Towel',
            'desc' => '',
            'time' => 15,
            'price' => 150,
        ]
    ];


}
