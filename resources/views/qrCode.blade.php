<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>QR Code</title>
  <style>
    .qr-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .qr-code {
      border: 1px solid #ddd;
      padding: 20px;
      background: #fff;
    }
  </style>
</head>
<body>
  <div class="container qr-container">
    <div class="qr-code">
      <img src="{{ url('/generate-qr/' . $id) }}" alt="QR Code">
    </div>
  </div>
</body>
</html>
