@extends('layout')

@section('content')
<div class="container">
    <h2 class="text-center bg-warning">
        Book List
    </h2>

    <div class="text-center">
        <table class="text-dark table-bordered table-striped">
            <thead>
                <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Year Released</th>
                        <th>Book Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $books)
                    <tr>
                        <td>{{$books->title}}</td>
                        <td>{{$books->category}}</td>
                        <td>{{$books->author}}</td>
                        <td>{{$books->publisher}}</td>
                        <td>{{$books->year}}</td>
                        <td><a href={{route('books.show', $books->id)}}>To Book Detail</a></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    
        <br>
        <br>

    <!-- ini bagian insertnya -->
    <div class="d-flex justify-content-start text-start flex-column">
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('publisher')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('year')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form enctype="multipart/form-data" method="POST" action="/upload" class="was-validated">
        @csrf
        <label>Title</label>
        <input type="text" name="title" id="title"><br> <br>

        <label>Category ID</label>
        <input type="text" name="category_id" id="category-id"><br> <br>

        <label>Author</label>
        <input type="text" name="author" id="author"><br><br>

        <label>Publisher</label>
        <input type="text" name="publisher" id="publisher"><br><br>

        <label>Year</label>
        <input type="number" name="year" id="year"><br><br>

        <label>Description </label>
        <input type="text" name="description" id="description"><br> <br>

        <br> <br>
        <input type="submit" value="UPLOAD">
    </form>
    </div>
</div>
<br>
@endsection