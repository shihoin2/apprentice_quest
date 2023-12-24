@extends('conduit.layouts.master')
@section('content')



<div class="article-page">
    <div class="banner">
        <div class="container">
            <h1>{{ $conduit->title }}</h1>

            <div class="article-meta">
                <a href="/profile/eric-simons"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
                <div class="info">
                    <a href="/profile/eric-simons" class="author">{{ $conduit->name }}</a>
                    <span class="date">{{ $conduit->created_at->format('F j\t\h') }}</span>
                </div>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="ion-plus-round"></i>
                    &nbsp; Follow {{ $conduit->name }} <span class="counter">(10)</span>
                </button>
                &nbsp;&nbsp;
                <button class="btn btn-sm btn-outline-primary">
                    <i class="ion-heart"></i>
                    &nbsp; Favorite Post <span class="counter">(29)</span>
                </button>
                <button class="btn btn-sm btn-outline-secondary" onclick="location.href='{{ route('conduit.editor_id', ['id'=>$conduit->id]) }}' ">
                    <i class="ion-edit"></i> Edit Article
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="location.href='{{ route('conduit.destroy', ['id'=>$conduit->id]) }}' ">
                    <i class="ion-trash-a"></i> Delete Article
                </button>
            </div>
        </div>
    </div>

    <div class="container page">
        <div class="row article-content">
            <div class="col-md-12">
                <p>
                {{ $conduit->detail }}
                </p>
                <ul class="tag-list">
                    <li class="tag-default tag-pill tag-outline">{{ $conduit->tag }}</li>
                </ul>
            </div>
        </div>

        <hr />

        <div class="article-actions">
            <div class="article-meta">
                <a href="profile.html"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
                <div class="info">
                    <a href="" class="author">{{ $conduit->name }}</a>
                    <span class="date">{{ $conduit->created_at->format('F j\t\h') }}</span>
                </div>

                <button class="btn btn-sm btn-outline-secondary">
                    <i class="ion-plus-round"></i>
                    &nbsp; Follow {{ $conduit->name }}
                </button>
                &nbsp;
                <button class="btn btn-sm btn-outline-primary">
                    <i class="ion-heart"></i>
                    &nbsp; Favorite Article <span class="counter">(29)</span>
                </button>
                <button class="btn btn-sm btn-outline-secondary" onclick="location.href='{{ route('conduit.editor_id', ['id'=>$conduit->id]) }}' ">
                    <i class="ion-edit"></i> Edit Article
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="location.href='{{ route('conduit.destroy', ['id'=>$conduit->id]) }}' ">
                    <i class="ion-trash-a"></i> Delete Article
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8 offset-md-2">
                <form class="card comment-form" method="POST" action="{{ route('conduit.comment', ['id'=>$conduit->id]) }}">
                    @csrf
                    <div class="card-block">
                        <textarea class="form-control" name="comment" placeholder="Write a comment..." rows="3"></textarea>
                    </div>
                    <div class="card-footer">
                        <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
                        <button class="btn btn-sm btn-primary" type="submit">Post Comment</button>
                    </div>
                </form>

                @foreach($comments as $comment)
                <div class="card">
                    <div class="card-block">
                        <p class="card-text">
                            {{ $comment->comment }}
                        </p>
                    </div>

                    <div class="card-footer">
                        <a href="/profile/author" class="comment-author">
                            <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
                        </a>
                        &nbsp;
                        <a href="/profile/jacob-schmidt" class="comment-author">{{ $comment->name }}</a>
                        <span class="date-posted">{{ $conduit->created_at->format('F j\t\h') }}</span>
                        <i class="ion-trash-a"></i>
                    </div>
                </div>
                @endforeach


                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
