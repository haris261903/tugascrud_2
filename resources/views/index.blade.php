<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #cfd0cf;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #274fdd;
            color: #cfd0cf;
        }
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .button:hover {
            background-color: #45a049;
        }
        .edit-btn, .delete-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .edit-btn i, .delete-btn i {
            font-size: 18px;
        }
        .delete-btn i {
            color: red;
        }
        .edit-btn i {
            color: blue;
        }
        .delete-btn i:hover {
            color: darkred;
        }
        .edit-btn i:hover {
            color: darkblue;
        }
        .edit-btn {
            margin-right: 10px; /* Menambah jarak antara tombol Edit dan Delete */
        }
        form {
            display: inline;
        }
        .add-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-btn i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h1>Daftar Siswa</h1>

    <!-- Tabel Daftar Siswa -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->kelas }}</td>
                <td>
                    <a href="{{ route('students.edit', $d->id) }}" class="edit-btn">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('students.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <!-- Tombol Tambah Siswa dengan Ikon -->
    <a href="{{ route('students.create') }}" class="add-btn">
        <i class="fas fa-plus"></i> Tambah Siswa
    </a>

</body>
</html>
