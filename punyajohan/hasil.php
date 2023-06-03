<!DOCTYPE html>
<html>

<head>
    <title>BMS | BangJoo Milky Store</title>
    <link rel="icon" href="https://s12.gifyu.com/images/SuIPf.png">
    <link rel="stylesheet" href="styleweb.css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href="menu.html"><img src="https://s12.gifyu.com/images/SuIPf.png" width="100px" height="100px" />
                </a>
                <a href="menu.html">Susu <span>BangJoo</span>
                </a>
            </div>
            <div class=" menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#lihatsusu">Lihat Susu</a></li>
                    <li><a href="#pesanan">Pesanan</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
    </nav>
    <?php
    session_start();

    // ini class
    class Pembelian
    {
        private $nama;
        private $alamat;
        private $saldo;
        private $pesanan;
        private $jumlah;

        // Setter methods
        public function setNama($nama)
        {
            $this->nama = $nama;
        }

        public function setAlamat($alamat)
        {
            $this->alamat = $alamat;
        }

        public function setSaldo($saldo)
        {
            $this->saldo = $saldo;
        }

        public function setPesanan($pesanan)
        {
            $this->pesanan = $pesanan;
        }

        public function setJumlah($jumlah)
        {
            $this->jumlah = $jumlah;
        }

        // Getter methods
        public function getNama()
        {
            return $this->nama;
        }

        public function getAlamat()
        {
            return $this->alamat;
        }

        public function getSaldo()
        {
            return $this->saldo;
        }

        public function getPesanan()
        {
            return $this->pesanan;
        }

        public function getJumlah()
        {
            return $this->jumlah;
        }
    }
    
    $pembelian = new Pembelian();
    $pembelian->setNama($_POST['nama'] ?? '');
    $pembelian->setAlamat($_POST['alamat'] ?? '');
    $pembelian->setSaldo($_POST['saldo'] ?? '');
    $pembelian->setPesanan($_POST['pesanan'] ?? '');
    $pembelian->setJumlah($_POST['jumlah'] ?? '');

    if (empty($pembelian->getNama())) {
        header("location:beli.php?errnama=<span style='color:white; background-color:black'>* Nama belum diisi</span>");
        exit();
    } elseif (empty($pembelian->getSaldo())) {
        header("location:beli.php?errsaldo=<span style='color:white; background-color:black'>* Saldo belum diisi</span>");
        exit();
    } elseif (empty($pembelian->getJumlah())) {
        header("location:beli.php?errjumlah=<span style='color:white; background-color: black'>* Jumlah belum diisi</span>");
        exit();
    }
    

    //jelasin ini
    function hasil($saldo, $harga, $jumlah)
    {
        return $saldo - $harga * $jumlah;
    }

    //array
    $hargaPesanan = [
        'Chocho Milk' => 35000,
        'Matcha Milk' => 28000,
        'Korean Strawberry' => 32000,
        'Tropical Milk Banana' => 26000,
        'Creamy Avocado' => 30000,
        'Taro Boba Milktea' => 37000
    ];

    $harga = $hargaPesanan[$pembelian->getPesanan()] ?? 0; //pengkondisian
    $hasil = hasil($pembelian->getSaldo(), $harga, $pembelian->getJumlah());
    $sisaSaldo = ($hasil < 0) ? 0 : $hasil; //pengkondisian

    ?>

    <table border="1" style="color:white; background-color: black;">
        <tr>
            <th colspan="2">Bukti Pembelian</th>
        </tr>
        <tr>
            <td style="color:white; background-color: black;">Saldo Awal</td>
            <td><?php echo $pembelian->getSaldo(); ?></td>
        </tr>
        <tr>
            <td>Pesanan</td>
            <td><?php echo $pembelian->getPesanan(); ?></td>
        </tr>
        <tr>
            <td style="color:white; background-color: black;">Jumlah</td>
            <td><?php echo $pembelian->getJumlah(); ?></td>
        </tr>
        <tr>
            <td>Sisa Saldo</td>
            <td><?php
            // code yang ditambahin
                if ($pembelian->getSaldo() <= 0) {
                    echo "Saldo kurang, pemesanan gagal.";
                } else if ($pembelian->getJumlah() <= 0) {
                    echo "Maaf, Anda memasukkan jumlah yang salah.";
                } else if ($hasil < 0) {
                    echo "Maaf, uang Anda kurang, pemesanan gagal.";
                } else {
                    echo "Pesanan akan dikirim ke " . $pembelian->getAlamat() . ". Sisa saldo: " . $sisaSaldo;
                }
                ?></td>
        </tr>
    </table>
    <br><br>

    <form action="beli.php" method="post">
        <input type="submit" name="Pesan" value="Pesan lagi">
    </form>
</body>

</html>