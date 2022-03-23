

        <h5>Click link to checkout: {{url('http://127.0.0.1:8000/checkout')}}</h5>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItem as $item)
                <tr>
                    <td>{{$item->products->name}}</td>
                    <td>{{$item->prod_qty}}</td>
                    <td>{{$item->products->selling_price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

