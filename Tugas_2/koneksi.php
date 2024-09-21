<?php
//kelas database
//kelas database mengelola koneksi ke database MySQl
class Database {
    //parameter koneksi database
    protected $host = "localhost"; //properties hanya bisa digunakan di kelas database dan kelas turunannya
    protected $username = "root"; //properties hanya bisa digunakan di kelas database dan kelas turunannya, melindungi informasi username 
    protected $password = ""; //properties hanya bisa digunakan di kelas database dan kelas turunannya, melindungi informasi sensitif
    protected $database = "db_mahasiswa"; //properties hanya bisa digunakan di kelas database dan kelas turunannya
    protected $koneksi = ""; //properties hanya bisa digunakan di kelas database dan kelas turunannya, untuk mengurangi kesalahan yang disebabkan oleh pengubahan nilai secara langsung di luar kelas

    //konstruktor untuk membangun koneksi ke database
    public function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    //metod tampilData untuk mengambil semua data dari tabel db_mahasiswa
    function tampilData() {
        $data = mysqli_query($this->koneksi, "select * from db_mahasiswa"); //memilih tabel yang akan ditampilkan datanya
        while($row = mysqli_fetch_array($data)) {
            $hasil[] = $row; //mengumpulkan hasil dalam array
        }
        return $hasil; //mengembalikan array hasil
    }

    //metod untuk mengambil semua data dari tabel nilai
    function tampilDataNilai() {
        $data = mysqli_query($this->koneksi, "select * from nilai"); //memilih tabel yang akan ditampilkan datanya
        while($row = mysqli_fetch_array($data)) {
            $hasil[] = $row; //mengumpulkan hasil dalam array
        }
        return $hasil; //mengembalikan array hasil
    }
}

//kelas turunan dari kelas Database
//kelas nilaiTurunan untuk memperluas kelas Database untuk fungsi tambahan
class nilaiTurunan extends Database {
    private $databasee; //referensi ke instansi database,, hanya bisa diakses oleh kelas nilaiTurunan

    //konstruktor menerima objek Database dan menginisialisasi parent
    public function __construct(Database $databasee) {
        parent::__construct();
        $this->databasee = $databasee; //menyimpan instansi databasee
    }

    //metod untuk mengambil data dari tabel nilai dengan kriteria tertentu
    public function tampilDataNilai($kriteria = null) {
        $query = "SELECT * FROM nilai"; //memilih tabel yang akan ditampilkan datanya
        if ($kriteria) {
            $query .= " WHERE " .$kriteria; //menambahkan kriteria
        }
        $data = mysqli_query($this->databasee->koneksi, $query); //menjalankan query yang disimpan dalam variabel $query terhadap koneksi database yang telah dibangun
        $hasil = [];

        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] =$row; //mengumpilkan hasil dalam array
        }
        return $hasil; //mengembalikan array hasil
    }
}

// kelas turunan dari kelas Database
//kelas mahasiswaTurunan untuk memperluas Kelas Database untuk fungsi tambahan 
class mahasiswaTurunan extends Database {
    private $databaseee; //referensi ke instansi database, hanya bisa diakses oleh kelas mahasiswaTurunan

    //konstruktor menerima objek Database dan menginisialisasi parent
    public function __construct(Database $databaseee) {
        parent::__construct();
        $this->databaseee = $databaseee; //menyimpan isntansi databaseee
    }

    //metod untuk mengambil data dari tabel db_mahasiswa dengan kriteria tertentu
    public function tampilData($kriteria = null) {
        $query = "SELECT * FROM db_mahasiswa"; //memilih tabel yang akan ditampilkan datanya
        if ($kriteria) {
            $query .= " WHERE " .$kriteria; //menambahkan kriteria
        }
        $data = mysqli_query($this->databaseee->koneksi, $query); //menjalankan query yang disimpan dalam variabel $query terhadap koneksi database yang telah dibangun
        $hasil = [];
        
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row; //mengumpulkan hasil dalam array
        }
        return $hasil; //meengembalikan array hasil
    }
}
?>
