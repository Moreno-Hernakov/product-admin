@extends('layouts.admin.app')

@section('content')

<div class="row">
  <div class="col-md-4">

    <div class="card">
      <div class="card-header">
        <h5>Admin Aktif</h5>
      </div>
      <div class="card-body">
        <ul>
          @forelse ($admin_online as $item)
            <li>
              <a href="{{ route('app.users.show', $item->id) }}">{{ "$item->name $item->last_active" }}</a>
            </li>
          @empty

          @endforelse
        </ul>
      </div>
    </div>

  </div>
  <div class="col-md-4">

    <div class="card">
      <div class="card-header">
        <h5>Laba Bersih</h5>
      </div>
      <div class="card-body">
        <p>{{$laba_bersih}}</p>
      </div>
    </div>

  </div>
  <div class="col-md-4">

    <div class="card">
      <div class="card-header">
        <h5>Total Product</h5>
      </div>
      <div class="card-body">
        <p>{{$total_product}}</p>
      </div>
    </div>

  </div>
</div>

@endsection
