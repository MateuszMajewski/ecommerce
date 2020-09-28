<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shop Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/product_styles.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
</head>

<body class="antialiased">
    <section>
        <h1 class="display-4">Edytuj Produkt:</h1>
        <form method="post" action="/product/{{$product->id}}/update">
            @csrf
            <div class="form-group">
                <label for="name">Enter name:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}" required>
            </div>
            <div class="form-group">
                <label for="desc">Enter description:</label>
                <input id="desc" type="text" class="form-control" name="desc" value="{{$product->description}}" required>
            </div>
            <div class="form-group">
                <label for="category">Choose a category:</label>
                <select stlyes="width: 100px" id="category" class="form-control" name="category" size="3" value="{{$product->category}}" required>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Enter price:</label>
                <input id="price" class="form-control" type="text" name="price" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="stock_amount">Enter amount:</label>
                <input id="stock_amount" class="form-control" type="text" name="stock_amount" value="{{$product->stock_amount}}" required>
            </div>
            <div class="form-group">
                <label for="image_url">Enter image url: </label>
                <input id="image_url" class="form-control" type="text" name="image_url" value="{{$product->image_url}}" required>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </section>
</body>

</html>