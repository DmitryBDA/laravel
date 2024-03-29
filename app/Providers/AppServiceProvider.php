<?php

namespace App\Providers;

use App\Repositories\BlogCategoryRepository;
use Illuminate\Support\Facades\View;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogPostObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(BlogCategoryRepository $blogCategoryRepository)
    {
        Paginator::useBootstrap();

        BlogPost::observe(BlogPostObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);

        //Переменная $categoryList будет доступна во всех шаблонах
        $categoryList = $blogCategoryRepository->getForComboBox();
        View::share(['categoryList' => $categoryList]);
    }
}
