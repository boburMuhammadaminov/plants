<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Image::class, 'gallery_id');
    }

    public function getStatus()
    {
        if ($this->is_active) {
            return '<button class="btn btn-sm btn-success mt-2" type="submit" title="* Click to deactivate item">Faol</button>';
        } else {
            return '<button class="btn btn-sm btn-danger mt-2" type="submit" title="* Click to activate item">Faol emas</button>';
        }
    }

    public function getImage( $style = 'width:100px')
    {
        if (count($this->images) > 0) {
            return '<img class="img-thumbnail m-1" src="' . asset($this->images[0]['image']) . '" style="' . $style . '">';
        }else{
            return "Rasm yo'q";
        }
    }
}
