<div  class="card">

    <div  class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Автор</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Дата публикации</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paginator as $post)
                <tr @if(!$post->is_published) style="background-color: #ccc; " @endif>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>
                        <a href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>

</div>

@if($paginator->total() > $paginator->count())
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ $paginator->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endif
