@extends('layouts.master')
@section('title', 'Create Category')
@section('content')

    <div class="container">
        <h1>Create Category</h1>

        <form method="POST" action="/categories">
            @csrf

            <div>

                <label for="name">name</label>
                <input type="text" id="name" name="name">

                @error('name')
                    <p>{{ $message }}</p>
                @enderror

            </div>

            <div class="buttons">
                <button class="button" type="submit">create category</button>
            </div>

        </form>
        <div class="link">
            <a href="/categories">Back to categories</a>
        </div>
    </div>
@endsection
