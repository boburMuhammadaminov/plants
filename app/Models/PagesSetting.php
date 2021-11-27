<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PagesCategory;

class PagesSetting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getStatus()
    {
        if ($this->is_active) {
            return '<button class="btn btn-sm btn-success mt-2" type="submit" title="* Click to deactivate item">Faol</button>';
        } else {
            return '<button class="btn btn-sm btn-danger mt-2" type="submit" title="* Click to activate item">Faol emas</button>';
        }
    }

    public function category(){
        return $this->belongsTo(PagesCategory::class, 'pagesCategory_id');
    }
}
