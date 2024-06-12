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

  <title>ABSENSI PANWAS JAMBLANG</title>

  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    #qr-reader {
      height: 400px;
    }

    #qr-reader-results {
      margin-top: 20px;
      font-size: 20px;
      font-weight: bold;
      color: #ffffff; /* Changed for better visibility */
      background-color: #0D6EFD; /* Bootstrap primary color */
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
      background-color: #f8f9fa; /* Light background for the card */
    }

    .center-flex {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    h1 {
      color: #343a40; /* Darker shade for text */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mt-5 mb-4 text-center">SCAN QR-CODE UNTUK ABSENSI</h1>
    <div class="card">
      <div class="card-body center-flex">
        <div id="qr-reader"></div>
      </div>
    </div>

    @if (session()->has('sukses'))
      <p>Sukses: {{ session('sukses') }}</p>
    @endif

    <div id="qr-reader-results" class="text-center"></div>

    <form action="{{ route('store') }}" method="POST" id="form">
      @csrf
      <input type="hidden" name="nama_panwas" id="nama_panwas">
    </form>

    <div class="table-responsive mt-5">
      <table class="table table-bordered table-hover">
        <h4 class="text-center">ABSEN JUNI</h4>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($absensi as $absen)
            <tr>
              <td>{{ $absen->nama_panwas }}</td>
              <td>{{ $absen->tanggal }}</td>
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
