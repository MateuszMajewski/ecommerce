@extends('frame')
@section('content')
<section>
    <div class="product-container">
        <div class="product-image-container">
            <img class="product-image" src="/images/{{$product->image_url}}">
        </div>
        <div class="product-info-container">
            <div>
                <span class="bold">Nazwa: </span><span>{{$product->name}}</span>
            </div>
            <div>
                <span class="bold">Cena: </span><span>{{$product->price}}</span><span class="bold"><span> PLN</span>
            </div>
            @if($product->stock_amount > 0)  
                <div>
                    <span class="bold">Ilosc: </span><span>{{$product->stock_amount}}</span>
                </div>
                <br>
                <a>
                    <button onclick="addToCart('{{ $product->id }}','{{ $product->name }}','{{ $product->price }}');" class="addToCartBtn">DODAJ DO KOSZYKA</button>
            </a>
            @else
                <div>
                    <span class="bold">Ilosc: </span><span>Produkt czasowo niedostepny</span>
                </div>
                <br>
                <a>
                    <div class="addToCartBtnGray">DODAJ DO KOSZYKA</div>
                </a>
            @endif
        </div>
        <div class="product-description-container">
            <h3 class="product-decription">Opis produktu:</h3>
            <p class="product-decription-text">{{$product->description}}</p>
        </div>
    </div>
</section>

@endsection