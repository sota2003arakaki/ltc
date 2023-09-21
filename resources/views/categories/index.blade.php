<!DOCTYPE html>
<html laang="{{ str_replace('_', "-", app()->getLocale()) }}"></html>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/posts/create' style="font-size: 20pt;">[create]</a>
        
        <div class='post'>
            @foreach($posts as $post)
            <div class='post'>
                <h1 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h1>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
            </div>
            @endforeach
        </div>
        <div class='pagenate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
                console.log("not into")
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    console.log("into")
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
