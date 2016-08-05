@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="h1">{{ $location->name }}</h2>

    @if(Session::has('message'))
        <div class="row">
            <div class="alert alert-success col-md-4 col-md-offset-4 text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('message')}}
            </div>
        </div>
    @endif
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('comment.create', ['loca_id' => $location->id])  }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @if ( !$location->comments->count() )
                This location has no comments.
            @else
                @foreach( $location->comments->sortByDesc('created_at') as $comment )
                <article class="post" data-postid="{{ $comment->id }}">
                    <p>{{ $comment->commentBody  }}</p>
                    <div class="info">
                        Posted by {{ $comment->users->name}} on {{ $comment->created_at }}
                    </div>
                    <div class="interaction">
                        @if(Auth::user()->id == $comment->user_id)
                            <a href="#" class="edit">Edit</a> |
                            <a href="{{ route('comment.delete', ['comment_id' => $comment->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    @endif
</div>
@endsection