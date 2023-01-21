<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">Data Karyawan</h1>
        <a href="{{ route('karyawan.create')}}" class="btn btn-primary mt-4 mb-2">Tambah Data</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered caption-top">
            <caption>List karyawan</caption>
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() > 0)
                @foreach ($data as $no => $result)
                    <tr>
                        <th scope="row" class="text-center">{{ $no+1 }}</th>
                        <td>{{ $result->nama }}</td>
                        <td>{{ $result->jabatan }}</td>
                        <td>{{ $result->email }}</td>
                        <td>{{ $result->nohp }}</td>
                        <td>
                            <form action="{{ route('karyawan.destroy', $result->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('karyawan.edit', $result->id) }}" class="btn btn-success">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                    @else
                    <tr>
                        <td colspan="10" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $data->links() }}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>