@extends('layouts.app')
@section('main-section')
<div>
    <h1 class="text-align-center">Dishes</h1>
    <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Create</a>
    <section class="cards d-flex flex-wrap" style="width: calc(100 / 3);">
    @foreach ($dishes as $dish )
        <div class="card" style="width: 18rem;">
            <img class=" immagine w-100 align-self-center" src="{{ $dish->photo }}" alt="{{ $dish->name }}">
                <div class="card-body">
                <h5 class="card-title">{{ $dish->name }}</h5>
                <p class="card-text"><p>{{ $dish->description }}</p></p>
                <p>{{ $dish->price }}</p>
                <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this dish?')">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection
