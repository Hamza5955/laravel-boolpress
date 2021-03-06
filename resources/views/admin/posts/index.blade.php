@extends('layouts.dashboard')

@section('content')
   <h1>Lista dei Posts</h1>

   {{-- Alert di modifica --}}
   @if(session("inserted"))
         <div class="alert alert-success">
            {{ session("inserted") }}
         </div>
   @endif

   @if(session("updated"))
      <div class="alert alert-success">
         {{ session("updated") }}
      </div>
   @endif

   @if(session("deleted"))
      <div class="alert alert-danger">
         {{ session("deleted") }}
      </div>
   @endif

   <table class="table table-striped">
      <thead> 
         <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
         </tr>
      </thead>
      {{-- Body --}}
      <tbody>
         @foreach ($posts as $post)
            <tr>
               <td scope="row"> {{ $post["id"] }}</td>
               <td>{{ $post["title"] }}</td>
               <td>{{ $post["slug"] }}</td>
                {{-- @dump($post->category()) --}}
               <td>
                  @if ($post["category"])
                      {{ $post["category"]["name"] }}
                  @endif
               </td>
               {{-- <td>{{ $post["category"] }}</td> --}}
               {{-- Details --}}
               <td>
               <a href="{{ route("admin.posts.show", $post["id"]) }}" class="btn btn-info">Details</a>
               {{-- Modify --}}
               <a href="{{ route("admin.posts.edit", $post["id"]) }}" class="btn btn-warning">Modify</a>
               {{-- Delete --}}
               <a class="btn btn-danger" data-toggle="modal" data-target="#deletePost{{$post->id}}" href="#deletePost">Delete</a>
               </td>
               {{-- <td>
                  <form action="{{ route("admin.posts.destroy", $post["id"]) }}" method="post" class="d-inline-block">
                     @csrf
                     @method("DELETE")
                     <button type="submit" onclick="window.confirmDelete()" class="btn btn-danger">Delete</button>
                  </form>
               </td> --}}
            </tr>
         @endforeach
      </tbody>
   </table>
@endsection 