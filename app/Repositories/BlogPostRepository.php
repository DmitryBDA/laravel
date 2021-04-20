<?php


namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     *Получить список статей для вывода пагинатором
     *
     * @param int|null $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null){

        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            //->with(['category', 'user'])
            ->with([
                'category' => function($query){
                    $query->select(['id', 'title']);
                },
                'user:id,name'
            ])
            ->paginate($perPage);

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}
