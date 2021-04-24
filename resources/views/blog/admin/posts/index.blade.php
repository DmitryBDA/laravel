@extends('layouts.app')

@section('content')
   <div class="container">
{{--      @if(session('success'))--}}
{{--          <div class="row justify-content-center">--}}
{{--              <div class="col-md-2">--}}
{{--              </div>--}}
{{--          </div>--}}
{{--      @endif--}}
       <div class="row justify-content-center">
           <div class="col-md-12">

               @include('blog.admin.posts.includes.result_messages')

               <div class="row">
                   <div class="col-md-4">
                       <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                           <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a>
                       </nav>
                   </div>
                   <div class="col-md-8">
                       <form action="" method="get" style="padding: 0.5rem 1rem;">
                           <div class="row">
                               <div class="col-md-4">
                                   <div class="mb-8">
                                       <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
                                       <input name="date_field"  @if(isset($_GET['date_field'])) value="{{$_GET['date_field']}}" @endif  type="date" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <button type="submit" class="btn btn-primary">Поиск</button>
                               </div>
                           </div>
                       </form>
                       <div class="col-md-4">
                           <select name="sort" class="form-select form-select-sm product_sorting_btn" aria-label=".form-select-sm example">
                               <option value="" @if(isset($_GET['sort'])) @if($_GET['sort'] == "") selected @endif @endif>Не выбрано</option>
                               <option value="published_at|asc" @if(isset($_GET['sort'])) @if($_GET['sort'] == "published_at|asc") selected @endif @endif>Публикация(по возрастанию)</option>
                               <option value="published_at|desc" @if(isset($_GET['sort'])) @if($_GET['sort'] == "published_at|desc") selected @endif @endif>Публикация(по убыванию)</option>
                               <option value="id|asc" @if(isset($_GET['sort'])) @if($_GET['sort'] == "id|asc") selected @endif @endif>ид(по возрастанию)</option>
                               <option value="id|desc" @if(isset($_GET['sort'])) @if($_GET['sort'] == "id|desc") selected @endif @endif>ид(по убыванию)</option>

                           </select>
                       </div>
                   </div>
               </div>

               <div id="productList">

                   @include('ajax.posts-list')

               </div>

           </div>

       </div>


   </div>
@endsection
