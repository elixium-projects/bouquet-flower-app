<!DOCTYPE html>
<html>

<head>
    <title>Pesan Baru</title>
</head>

<body>
    <h1>Pesan Baru dari {{ $data['name'] }}</h1>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>

</html>
