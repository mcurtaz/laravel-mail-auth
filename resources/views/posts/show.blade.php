@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post -> title}}</div>

                <div class="card-body">
                   <ul>
                       <li>
                           TEXT: {{ $post -> body }}
                       </li>
                       <li>
                           LIKES: {{ $post -> like }}
                       </li>
                       <li>
                           TAGS: {{ $post -> tag }}
                       </li>
                   </ul>
                   @auth
                   <a class="btn btn-primary" href=" {{ route('post-edit', $post -> id) }} ">EDIT</a>
                   <a class="btn btn-danger" href=" {{ route('post-delete', $post -> id) }} ">DELETE</a>
                   
                   @else
                   <a href=" {{ route('login') }} ">Log in to Edit/Delete posts</a>
                   @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection