@extends('layouts.admin.app')

@section('content')

  <div class="card">
    <div class="card-body table-responsive">

      @if (check_authorized("003U"))
      <a href="{{ route('app.Products.create') }}" class="btn btn-success btn-sm mb-3">Tambah</a>
      @endif

      @if (check_authorized("004R"))
      <a href="{{ route('app.roles.index') }}" class="btn btn-info btn-sm mb-3 mx-1">Role Management</a>
      @endif

      @if (check_authorized("003U"))
        <table class="table table-bordered" id="tableUsers">
          <thead>
            <tr>
              <th>No</th>
              <th>Product Name</th>
              {{-- <th>Product Description</th> --}}
              <th>product price capital</th>
              <th>product price sell</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      @endif

    </div>
  </div>

@endsection

@if (check_authorized("003U"))
  @push('script')
    <script>
      CORE.dataTableServer("tableUsers", "/app/products/get");
    </script>
  @endpush
@endif
