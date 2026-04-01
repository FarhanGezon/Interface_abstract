<?php
require_once 'TransferBank.php';
require_once 'EWallet.php';
require_once 'QRIS.php';
require_once 'COD.php';
require_once 'VirtualAccount.php';
?>

<!DOCTYPE html> 
<html>
<head>
    <title>Sistem Pembayaran OOP</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;">

    <h2>Form Pembayaran</h2>
    <form method="POST">
        <label>Input Jumlah Harga: </label><br>
        <input type="number" name="jumlah" required min="1"><br><br>

        <label>Pilih Metode: </label><br>
        <select name="metode" required>
            <option value="TransferBank">Transfer Bank</option>
            <option value="EWallet">E-Wallet</option>
            <option value="QRIS">QRIS</option>
            <option value="COD">COD</option>
            <option value="VirtualAccount">Virtual Account</option>
        </select><br><br>

        <button type="submit">Proses</button>
    </form>
    <hr>

    <?php
    // Logika Pemrosesan Form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $jumlah = $_POST['jumlah'];
        $metode = $_POST['metode'];
        
        $objek = null;

        // pilihan dropdown
        if ($metode == 'TransferBank') {
            $objek = new TransferBank($jumlah);
        } elseif ($metode == 'EWallet') {
            $objek = new EWallet($jumlah);
        } elseif ($metode == 'QRIS') {
            $objek = new QRIS($jumlah);
        } elseif ($metode == 'COD') {
            $objek = new COD($jumlah);
        } elseif ($metode == 'VirtualAccount') {
            $objek = new VirtualAccount($jumlah);
        }

        // Output Pemrosesan
        if ($objek != null) {
            echo "<b>Proses:</b> " . $objek->prosesPembayaran() . "<br>";
            
            if ($objek->validasi()) {
                echo "<b>Rincian Harga Awal:</b> Rp {$jumlah} <br>";
                echo "<b>Diskon (10%):</b> - Rp " . $objek->hitungDiskon() . "<br>";
                echo "<b>Pajak (11%):</b> + Rp " . $objek->hitungPajak() . "<br>";
                
                echo "<hr>";
                echo "<h3>" . $objek->cetakStruk() . "</h3>";
            }
        }
    }
    ?>

</body>
</html>
