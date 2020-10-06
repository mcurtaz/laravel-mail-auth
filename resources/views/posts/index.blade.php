@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card mt-2 mb-3">
                <div class="card-header">
                    <a href=" {{ route('post-show', $post -> id) }} ">
                        {{ $post -> title }}
                    </a>
                </div>

                <div class="card-body">
                    {{ $post -> body }}
                </div>
            </div>           
            @endforeach
        </div>
    </div>
</div>
@endsection