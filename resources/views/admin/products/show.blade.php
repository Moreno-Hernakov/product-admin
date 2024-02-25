@extends('layouts.admin.app')

@section('content')
  
  <div class="card">
    <div class="card-body">
      {{-- {{ dd($product) }} --}}
      <a href="{{ route('app.Products.edit', $product->id) }}" class="btn btn-info btn-sm mb-3">Edit</a>

      <div class="row p-2">
          <table class="table">
            <tr>
              <th>Product Name</th>
              <td>: {{ $product->product_name }}</td>
            </tr>
            <tr>
              <th>Product Description</th>
              <td>: {{ $product->product_description }}</td>
            </tr>
            <tr>
              <th>product price capital</th>
              <td>: {{ $product->product_price_sell }}</td>
            </tr>
            <tr>
              <th>product price sell</th>
              <td>: {{ $product->product_price_capital }}</td>
            </tr>
          </table>
      </div>

    </div>
  </div>

@endsection