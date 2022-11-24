<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model  implements HasMedia

{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['name', 'qty', 'price', 'description', 'image', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
