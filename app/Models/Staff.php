<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getStatusBadge()
    {
        if ($this->is_active) {
            return '<button class="btn btn-sm btn-success mt-2" type="submit" title="* Click to deactivate item">Faol</button>';
        } else {
            return '<button class="btn btn-sm btn-danger mt-2" type="submit" title="* Click to activate item">Faol emas</button>';
        }
    }

    public function getStaffImage( $style = 'width:100px')
    {
        return '<img class="img-thumbnail m-1" src="' . asset($this->image) . '" style="' . $style . '">';
    }

    public function category(){
        return $this->belongsTo(StaffCategory::class, 'staffCategory_id');
    }
}
