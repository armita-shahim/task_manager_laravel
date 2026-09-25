@extends('layouts.master')
@section('title', 'Edit Category')
@section('content')

    <h1>Edit Category</h1>
    <div class="container">
        <form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">name</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}">

                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="buttons">
                <button class="button" type="submit">update category</button>
            </div>
        </form>
        <div class="link">
            <a href="/categories">Back to categories</a>
        </div>

    </div>
@endsection
