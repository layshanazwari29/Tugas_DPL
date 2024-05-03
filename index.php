<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container p-3 mx-auto">
        <div class="w-full mb-2 mx-auto rounded overflow-hidden shadow-lg bg-white">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Informasi Karyawan</div>
                <p class="text-gray-700 text-base">
                <p>Nama: Laysha Nazwari Iklies Putri</p>
                <p>Kelas: D4RPL2B</p>
                <p>Prodi: Rekayasa Perangkat Lunak</p>
                <p>Matkul: Desain Perangkat Lunak</p>
                </p>
            </div>
        </div>
        <?php
        require_once 'Database.php';
        require_once 'Karyawan.php';

        $karyawan = new Karyawan();

        if (isset($_POST['create'])) {
            $no_karyawan = $_POST['no_karyawan'];
            $nama = $_POST['nama'];
            $alamat = $_POST['bidang'];
            $bidang = $_POST['bidang'];
            $karyawan->createKaryawan($no_karyawan, $nama, $alamat, $bidang);
        }

        if (isset($_POST['update'])) {
            $no_karyawan = $_POST['no_karyawan'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $bidang = $_POST['bidang'];
            $karyawan->updateKaryawan($no_karyawan, $nama, $alamat, $bidang);
        }

        if (isset($_POST['read'])) {
            $no_karyawan = $_POST['no_karyawan'];
            $karyawan->readKaryawan($no_karyawan);
        }

        if (isset($_POST['delete'])) {
            $no_karyawan = $_POST['no_karyawan'];
            $karyawan->deleteKaryawan($no_karyawan);
        }
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div class="w-full mx-auto rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Deskripsi Tugas</div>
                    <p class="text-gray-700 text-base">
                        ✨Tugas ini dijadikan sebagai pengganti presensi hari sebelumnya yang kosong
                        <br>
                        Buatlah kode program pada Bahasa pemrograman PHP untuk melakukan konktivitas database dengan ketentuan sebagai berikut:
                        <br>
                        - Satu mahasiswa, satu database (tidak boleh sama)
                        <br>
                        - Satu database, minimal ada 1 table (tidak boleh sama)
                        <br>
                        - Satu table, minimal ada 4 fields
                        <br>
                        - Lakukanlah transaksi database (bebas CRUD apa saja) lebih dari satu kali, kemudian buktikan bahwa setiap transaksi tersebut hanya menggunakan satu objek (Menerapkan creational design pattern - Singleton)
                    </p>
                </div>
            </div>
            <div class="w-full mx-auto bg-white p-6 rounded-lg shadow-xl">
                <h1 class="text-3xl mb-6">CRUD Karyawan</h1>
                <form method="post">
                    <div class="mb-4">
                        <label for="no_karyawan" class="block text-gray-700">No_karywan:</label>
                        <input type="text" id="no_karyawan" name="no_karyawan" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama:</label>
                        <input type="text" id="nama" name="nama" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="bidang" class="block text-gray-700">Bidang:</label>
                        <input type="text" id="bidang" name="bidang" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <input type="submit" name="create" value="Tambah" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="update" value="Perbarui" class="cursor-pointer bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="read" value="Baca" class="cursor-pointer bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="delete" value="Hapus" class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>