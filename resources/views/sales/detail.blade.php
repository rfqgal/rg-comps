<?php 
  $total = 0;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sales #{{$sales_id}} - RG Comps</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
</head>

<body class="d-flex">
  @include('utils.sidebar')
  
  <main class="container">
    
    <div class="px-4 pt-4">
      <span class="fs-3">Sales #{{$sales_id}}</span>
    </div>
    
    {{-- Table --}}
    <div class="mt-2 px-4 pb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 shadow rounded p-4">
            <div class="mb-4">
              <div>Pembeli : {{ $sales_detail[0]->buyer }}</div>
              <div>Alamat : {{ $sales_detail[0]->buyer_address }}</div>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Produk</th>
                  <th class="w-50" scope="col">Barang</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sales_detail as $key => $item)
                <tr>
                  <td scope="row">{{ $key+1 }}</td>
                  <td>{{ $item->product_code }}</td>
                  <td>
                    <a href="products/{{ $item->product_id }}">
                      {{ $item->name }}
                    </a>
                  </td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->quantity }}</td>
                  <td>{{ $item->total }}</td>
                </tr>    
                @endforeach
                <tr>
                  <th colspan="5">Total Harga</th>
                  <div hidden>
                    @foreach ($sales_detail as $item) 
                      {{ $total += (int)$item->total }}
                    @endforeach
                  </div>
                  <th>
                    {{ $total }}
                  </th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>