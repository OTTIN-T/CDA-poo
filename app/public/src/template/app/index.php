<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=m, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    {% for item in flashbag.flashItems %}
    <div>
        <p>{{ item.message }}</p>
    </div>
    {% endfor %}
    <h1>Nos produits:</h1>
    <div>
        <a href="/cart"> Cart: {{cartLength}}</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {% for product in products %}
            <tr>
                <td>{{ product.name }} </td>
                <td>{{ product.price }}</td>
                <td>
                    <form action="/cart/add" method="post">
                        <input type="hidden" name="product" value="{{ product.id }}">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                    <button>
                        <a href="/product/edit/?id={{product.id}}">Edit</a>
                    </button>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</body>

</html>