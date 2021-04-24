<?php


namespace App\filters;


class ProductFilter extends QueryFilter
{

    public function search_field($search_string = ''){
        return $this->builder
            ->where(function ($query) use ($search_string){
                $query->where('title', 'LIKE', '%'.$search_string.'%')
                    ->orWhere('content_raw', 'LIKE', '%'.$search_string.'%');
            });
    }

    public function date_field($date = null){
        return $this->builder
            ->when($date, function ($query) use($date){
                $query->where('published_at', 'LIKE', '%'.$date.'%');
            });
    }

    public function sort($sort = null){

        return $this->builder
            ->when($sort, function ($query) use($sort){
                $parametrsSearch = explode('|', $sort);

                $query->orderBy($parametrsSearch[0], $parametrsSearch[1]);
            });

    }


}
