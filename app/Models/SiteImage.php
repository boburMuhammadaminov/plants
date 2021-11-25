<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getImage( $style = 'width:100px')
    {
        return '<img class="img-thumbnail m-1" src="' . asset($this->image) . '" style="' . $style . '">';
    }
}
