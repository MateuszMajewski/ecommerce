@extends('frame')
<!-- 
@push('styles')
<link href="{{ asset('css/custom_styles.css') }}" rel="stylesheet">
@endpush -->
@section('categories')
<button class="dropbtn menu-font">Kategorie</button>
<div class="dropdown-content menu-font">
    @foreach ($categories as $category)
    <a href="/category/{{$category->name}}">{{$category->name}}</a>
    @endforeach
</div>
@endsection
@section('content')
    <section>
        <div class="tile-container">
            @foreach ($products as $product)
            <x-tile :product="$product" />
            @endforeach
        </div>
    </section>
@endsection