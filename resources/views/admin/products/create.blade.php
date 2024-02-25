@extends('layouts.admin.app')

@section('content')

  <div class="card">
    <div class="card-body">

      <form action="{{ route('app.Products.store') }}" method="POST" with-submit-crud>
        @csrf

        @include('admin.products.form')

        <button class="btn btn-success btn-sm mt-3">Tambah User</button>

      </form>

    </div>
  </div>

@endsection
