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

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('image/logo1.png') }}" type="image/x-icon">

  <title>Absensi Panwas Jamblang</title>

  <!-- Custom CSS -->
  <style>
    body {
      font-family: fantasy;
      background-color: #f5f5f5;
    }

    .container {
      margin-top: 50px;
    }

    #qr-reader {
      height: 250px;
    }

    #qr-reader-results {
      margin-top: 20px;
      font-size: 20px;
      font-weight: bold;
      color: #ffffff;
      background-color: #fdb10d;
      padding: 10px;
      border-radius: 5px;
    }

    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-body {
      position: relative;
      padding: 1rem;
      background-color: #ffffff;
    }

    .center-flex {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    h1 {
      color: #343a40;
    }

    .table-responsive {
      margin-top: 30px;
    }

    table th, table td {
      text-align: center;
    }

    .alert-success {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="text-center mb-2">
      <img src="{{ asset('image/logo2.png') }}" alt="Logo" width="250">
    </div>
    <h1 class="mb-4 text-center">UPLOAD/SCAN QRCODE IMAGE UNTUK ABSENSI</h1>
    <div class="card">
      <div class="card-body center-flex">
        <div id="qr-reader"></div>
      </div>
    </div>

    @if (session()->has('sukses'))
      <div class="alert alert-success text-center">
        {{ session('sukses') }}
      </div>
    @endif

    <div id="qr-reader-results" class="text-center"></div>

    <form action="{{ route('store') }}" method="POST" id="form">
      @csrf
      <input type="hidden" name="nama_panwas" id="nama_panwas">
    </form>

    <div class="table-responsive">
      <h4 class="text-center mb-4">LIST ABSENSI BULAN JUNI</h4>
      <table class="table table-bordered table-hover">
        <thead class="table-warning">
          <tr>
            <th>NAMA</th>
            <th>HARI, TANGGAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($absensi as $absen)
            <tr>
              <td>{{ $absen->nama_panwas }}</td>
              <td>{{ \Carbon\Carbon::parse($absen->tanggal)->locale('id')->timezone('Asia/Jakarta')->isoFormat('dddd, D MMMM YYYY') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Html5Qrcode Script -->
  <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      function onScanSuccess(qrMessage) {
        console.log(`QR Code detected: ${qrMessage}`);
        document.getElementById('qr-reader-results').innerText = `QR Code detected: ${qrMessage}`;
        try {
          let qrData = JSON.parse(qrMessage);
          document.getElementById('nama_panwas').value = qrData.nama;
          document.getElementById('form').submit();
        } catch (e) {
          console.error('Failed to parse QR code:', e);
        }
      }

      var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
      html5QrcodeScanner.render(onScanSuccess);
    });
  </script>

  <!-- Bootstrap Bundle JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
