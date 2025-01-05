<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassBook - Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>ClassBook</h1>
        <p>Kelola Data Siswa dengan Mudah</p>
    </div>

    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Tambah Data Siswa</h5>
                <form id="formSiswa">
                   <div class="mb-3">
                      <label for="nama" class="form-label">Nama Siswa</label>
                      <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama Siswa" required>
                   </div>
                   <div class="mb-3">
                      <label for="kelas" class="form-label">Kelas</label>
                      <input type="text" id="kelas" class="form-control" placeholder="Masukkan Kelas" required>
                </div>
                <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat siswa" required>
                 </div>
                    <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Siswa</h5>
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="dataSiswa"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const formSiswa = document.getElementById('formSiswa');
        const dataSiswa = document.getElementById('dataSiswa');
        let siswaList = JSON.parse(localStorage.getItem('siswaList')) || [];

        function renderSiswa() {
            dataSiswa.innerHTML = '';
            siswaList.forEach((siswa, index) => {
                dataSiswa.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${siswa.nama}</td>
                        <td>${siswa.kelas}</td>
                        <td>${siswa.alamat}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editSiswa(${index})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteSiswa(${index})">Hapus</button>
                        </td>
                    </tr>
                `;
            });
        }

        function addSiswa(event) {
            event.preventDefault();
            const nama = document.getElementById('nama').value;
            const kelas = document.getElementById('kelas').value;
            const alamat = document.getElementById('alamat').value;

            siswaList.push({ nama, kelas, alamat });
            localStorage.setItem('siswaList', JSON.stringify(siswaList));
            renderSiswa();
            formSiswa.reset();
        }

        function editSiswa(index) {
            const siswa = siswaList[index];
            document.getElementById('nama').value = siswa.nama;
            document.getElementById('kelas').value = siswa.kelas;
            document.getElementById('alamat').value = siswa.alamat;

            siswaList.splice(index, 1);
            localStorage.setItem('siswaList', JSON.stringify(siswaList));
            renderSiswa();
        }

        function deleteSiswa(index) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                siswaList.splice(index, 1);
                localStorage.setItem('siswaList', JSON.stringify(siswaList));
                renderSiswa();
            }
        }

        formSiswa.addEventListener('submit', addSiswa);
        renderSiswa();
    </script>
</body>
</html>
