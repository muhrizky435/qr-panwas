<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <title>Rekap Absensi Panwas Jamblang</title>

  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-body {
      position: relative;
      padding: 1rem;
      background-color: #f8f9fa; /* Light background for the card */
    }

    h1 {
      color: #343a40; /* Darker shade for text */
    }

    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mt-5 mb-4 text-center">Rekap Absensi Per Bulan</h1>

    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Bulan</th>
            <th>Jumlah Absen</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rekapAbsensi as $rekap)
            <tr>
              <td>{{ $rekap->nama_panwas }}</td>
              <td>{{ Carbon\Carbon::create()->month($rekap->bulan)->locale('id')->isoFormat('MMMM') }}</td>
              <td>{{ $rekap->jumlah_absen }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

  <!-- Bootstrap Bundle JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
