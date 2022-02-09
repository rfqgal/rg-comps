<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sales - RG Comps</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
</head>

<body class="d-flex">
  @include('utils.sidebar')
  
  <main class="container">
    
    <div class="px-4 pt-4">
      <span class="fs-3">Sales</span>
    </div>
    
    {{-- Table --}}
    <div class="mt-2 px-4 pb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 shadow rounded p-4">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th class="w-25" scope="col">Nama Pembeli</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Tgl Pembelian</th>
                  <th scope="col">Total Penjualan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sales as $key => $item)
                <tr>
                  <td scope="row">{{ $key+1 }}</td>
                  <td><a href="sales/{{ $item->id }}">{{ $item->buyer }}</a></td>
                  <td>{{ $item->buyer_address }}</td>
                  <td>{{ $item->date }}</td>
                  <td>{{ $item->total }}</td>
                </tr>    
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
