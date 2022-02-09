<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard - RG Comps</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
</head>

<body class="d-flex">
  @include('utils.sidebar')
  
  <main class="container">
    
    <div class="px-4 pt-4">
      <h1 class="fs-3">Dashboard</h1>
    </div>
    
    {{-- Chart --}}
    <div class="mt-2 px-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 shadow rounded p-4">
            <div class="d-flex">
              <div class="w-75" id="sales-chart" style="height: 320px;"></div>
              <div class="w-25" id="category-chart" style="height: 320px;"></div>
            </div>
          </div>
          {{-- <div class="card border-0 shadow rounded p-4">
          </div> --}}
        </div>
      </div>
    </div>  
    
    <div class="px-4 pt-4">
      <h2 class="fs-4">Latest sales</h2>
    </div>

    {{-- Table --}}
    <div class="mt-2 px-4 pb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 shadow rounded p-4">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Tgl Pembelian</th>
                  <th class="w-25" scope="col">Nama Pembeli</th>
                  <th scope="col">Alamat</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sales as $key => $item)
                <tr>
                  <td>{{ $item->date }}</td>
                  <td><a href="sales/{{ $item->id }}">{{ $item->buyer }}</a></td>
                  <td>{{ $item->buyer_address }}</td>
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

<!-- Charting library -->
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

{{-- Script --}}
<script>
  const chart = new Chartisan({
    el: '#sales-chart',
    url: "@chart('sales_chart')",
    hooks: new ChartisanHooks()
      .colors(['#4299E1'])
      .responsive()
      .beginAtZero()
      .legend({ position: 'bottom' })
      .title('Last 30 days sales')
      .datasets('bar'),
      // .datasets([{ type: 'line', fill: false }, 'bar']),
  });
  const pie = new Chartisan({
    el: '#category-chart',
    url: "@chart('category_chart')",
    hooks: new ChartisanHooks()
      .pieColors()
      .legend({ position: 'bottom' })
      .title('Category Charts')
      .datasets('pie')
      .options({ 
        tooltip: true,
        tooltipItems: ['25%','25%','25%','25%'],
      })
  });
</script>

</html>
