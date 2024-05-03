<?php

class karyawan 
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createKaryawan($no_karyawan, $nama, $alamat, $bidang)
    {
        if (empty($no_karyawan) || empty($nama) || empty($alamat) || empty($bidang)) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Error!</div>
                <p class="text-gray-700 text-base">
                    Mohon lengkapi semua data.
                </p>
            </div>
        </div>';
            return;
        }

        $sql = "INSERT INTO karyawan (no_karyawan, nama, alamat, bidang) VALUES ('$no_karyawan', '$nama', '$alamat', '$bidang')";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-blue-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                    Data karyawan berhasil ditambahkan.
                </p>
            </div>
        </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
    }

    public function readKaryawan($no_karyawan)
    {
        $sql = "SELECT * FROM karyawan WHERE nim='$no_karyawan'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-yellow-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Read!</div>
                <p class="text-gray-700 text-base">
                NO_KARYAWAN: ' . $row['no_karyawan'] . ' - Nama: ' . $row['nama'] . ' - Alamat: ' . $row['alamat'] . ' - bidang: ' . $row['bidang'] . '<br>
                </p>
            </div>
        </div>';
            }
        } else {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Error!</div>
                <p class="text-gray-700 text-base">
                Data karyawan tidak ditemukan.
                </p>
            </div>
        </div>';
        }
    }

    public function updateKaryawan($no_karyawan, $nama, $alamat, $bidang)
    {
        $sql = "UPDATE karyawan SET nama='$nama', alamat='$alamat', bidang='$bidang' WHERE no_karyawan='$no_karyawan'";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-green-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                Data karyawan berhasil diperbarui.
                </p>
            </div>
        </div>';
        } else {
            echo "Error updating record: " . $this->db->error;
        }
    }

    public function deleteKaryawan($no_karyawan)
    {
        $sql = "DELETE FROM karyawan WHERE no_karyawan='$no_karyawan'";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                Data karyawan berhasil dihapus.
                </p>
            </div>
        </div>';
        } else {
            echo "Error deleting record: " . $this->db->error;
        }
    }
}


