<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Products - RG Comps</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
</head>

<body class="d-flex">
  @include('utils.sidebar')
  
  <main class="container">
    
    <div class="px-4 pt-4">
      <span class="fs-3">Products</span>
    </div>
    
    {{-- Table --}}
    <div class="mt-2 px-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 shadow rounded p-4">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Barang</th>
                  <th class="w-50" scope="col">Nama Barang</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Stok</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $key => $item)
                <tr>
                  <td scope="row">{{ $key+1 }}</td>
                  <td>{{ $item->code }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->stock }}</td>
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
