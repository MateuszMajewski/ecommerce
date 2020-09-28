@extends('frame')
@section('content')
<section>
    <h1 class="display-4">Produkty: </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nazwa</th>
                <th>cena</th>
                <th>Ilosc</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $cart_item)
            <tr>
                <td>{{$cart_item->product_id}}</td>
                <td>{{$cart_item->name}}</td>
                <td>{{$cart_item->price}}</td>
                <td>{{$cart_item->quantity}}</td>
                <td>
                    <button onclick="cartPlus('{{ $cart_item->product_id }}');" class="btn btn-primary">+</button>
                    <button onclick="cartMinus('{{ $cart_item->product_id }}');" class="btn btn-danger">-</button>
                    <button onclick="cartRemove('{{ $cart_item->product_id }}');" class="btn btn-danger">Remove</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form method="post" action="/order">
        @csrf
        <div class="form-group">
            <label for="name">Imie:</label>
            <input id="name" type="text" class="form-control" name="name" required>
            <div class="invalid-feedback">
                Wprowadz imie
            </div>
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input id="surname" type="text" class="form-control" name="surname" required>
            <div class="invalid-feedback">
                Wprowadz Nazwisko
            </div>
        </div>
        <div class="form-group">
            <label for="address">Adres</label>
            <input id="address" type="text" class="form-control" name="address" required>
            <div class="invalid-feedback">
                Wprowadz adres
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" class="form-control" name="email" required>
            <div class="invalid-feedback">
                Wprowadz adres
            </div>
        </div>
        <div class="form-group">
            <label for="number">Numer tel.</label>
            <input id="number" type="text" class="form-control" name="number" required>
            <div class="invalid-feedback">
                Wprowadz nuer tel.
            </div>
        </div>
        <input type="submit" value="Zamawiam" class="btn btn-primary"> <span>Platnosc odbywa sie przez payU</span>
    </form>
</section>
@endsection