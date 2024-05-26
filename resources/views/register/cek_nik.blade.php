<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Warga - Cek NIK</title>
</head>
<body>
    <h2>Cek NIK</h2>
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('nik.check') }}" method="POST">
        @csrf
        <label for="nik">NIK:</label><br>
        <input type="text" id="nik" name="nik"><br><br>
        <button type="submit">Cek NIK</button>
    </form>
</body>
</html>
