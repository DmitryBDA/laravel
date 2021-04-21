<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *Class BlogCategory
 *
 * @package App\Models
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
 */

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    const ROOT_ID = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];

    /**
     *Получить родительскую категорию
     *
     * @return BlogCategory
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     *Пример аксесуара (Accessor)
     *
     *@return string
     */
    public function getParentTitleAttribute()
    {

        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');

        return $title;
    }

    /**
     *Является ли текущий объект корнем
     *
     * @return bool
     */
    private function isRoot()
    {
        return $this->id === BlogCategory::ROOT_ID;
    }


}
