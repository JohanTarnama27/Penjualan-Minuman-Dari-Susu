<!DOCTYPE html>
<html>

<head>
    <title>Tugas Akhir Praktikum DKP</title>
    <link rel="icon" href="https://s12.gifyu.com/images/SuIPf.png">
    <link rel="stylesheet" href="styleweb.css">

    <head>

    <body>
        <nav>
            <div class="wrapper">
                <div class="logo">
                    <a href="menu.html"><img src="https://s12.gifyu.com/images/SuIPf.png" width="100px"
                            height="100px" />
                    </a>
                    <a href="menu.html">Susu <span>BangJoo</span>
                    </a>
                </div>

                <div class="menu">
                    <ul>
                        <li><a href="menu.html#home">Home</a></li>
                        <li><a href="menu.html#lihatsusu">Lihat Susu</a></li>
                        <li><a href="menu.html#pesanan">Pesanan</a></li>
                        <li><a href="menu.html#kontak">Kontak</a></li>
                    </ul>
                </div>
        </nav>
        <br>
        <form action="hasil.php" method="post">
            Nama:
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama">
            <?php
            if (isset($_GET['errnama'])) {
                $err1 = $_GET['errnama'];
                echo $err1;
            }
            ?>
            <br><br>
            Alamat:
            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat">
            <?php
            if (isset($_GET['erralamat'])) {
                $err2 = $_GET['erralamat'];
                echo $err2;
            }
            ?>
            <br><br>
            <label for="saldo">Total Saldo :</label>
            <input type="number" name="saldo" id="saldo" placeholder="Masukkan Saldo">
            <?php
            if (isset($_GET['errsaldo'])) {
                $err3 = $_GET['errsaldo'];
                echo $err3;
            }
            ?>
            <br><br>
            <label for="pesanan">Pesanan Anda :</label>
            <Select name="pesanan" id="pesanan">
                <option value='Chocho Milk'>Chocho Milk - Rp 35.000</option>
                <option value='Matcha Milk'>Matcha Milk - Rp 28.000</option>
                <option value='Korean Strawberry'>Korean Strawberry - Rp 32.000</option>
                <option value='Tropical Milk Banana'>Tropical Milk Banana - Rp 26.000</option>
                <option value='Creamy Avocado'>Creamy Avocado - Rp 31.000</option>
                <option value='Taro Boba Milktea'>Taro Boba Milktea - Rp 37.000</option>
            </Select><br><br>
            Jumlah :
            <input type="number" name="jumlah" placeholder="Masukkan Jumlah">
            <?php
            if (isset($_GET["errjumlah"])) {
                $err4 = $_GET["errjumlah"];
                echo $err4;
            }
            ?>
            <br><br>
            <input type="submit" name="Pesan" value="Pesan sekarang">
            <input type="reset" value="Pesan ulang">
        </form>
    </body>

</html>