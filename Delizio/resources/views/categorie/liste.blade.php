@extends('layouts.main')
@section('title')
    liste des categories
@endsection
@section('main')
    <table class="table ">
        <caption class="thead text-text">
            <caption>Liste des categories</caption>
        </caption>
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <th scope="row">{{ $categorie->id }}</th>
                    <th scope="row">{{ $categorie->nom }}</th>
                    <th scope="row">

                        <form action="{{ route('categorie.destroy', $categorie->id) }}" method='delete'>
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="function(event) {event.preventDefault();}"
                                class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                        </form>


                    </th>
                </tr>
            @endforeach



        </tbody>

    </table>

    <section aria-label="Page navigation d-flex jsutify-content-center align-items-center">
        <ul class="pagination">
            {{ $categories->links() }}
        </ul>
    </section>
@endsection
