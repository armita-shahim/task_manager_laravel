@extends('layouts.master')
@section('title', 'Categories')
@section('content')

    <div class="container">
        <h1>Categories</h1>

        <a class="button" href="/categories/create">create category</a>

        @if ($categories->isEmpty())

            <p>no categories found</p>
        @else
            @foreach ($categories as $category)
                <div class="category-card">

                    <h2>{{ $category->name }}</h2>

                    <div class="actions">
                        <a class="button" href="/categories/{{ $category->id }}/edit">edit</a>

                        <form method="POST" action="/categories/{{ $category->id }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit">delete</button>
                        </form>

                    </div>
                </div>
            @endforeach

        @endif

    </div>
@endsection
