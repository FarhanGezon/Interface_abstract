<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

#Penggunaan Class Transfer Bank dari Extend
class TransferBank extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Transfer Bank sebesar Rp {$this->jumlah}";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        // Dimodifikasi untuk Tugas 2 (menampilkan total bayar)
        $total = $this->totalBayar();
        return "Struk Transfer Bank: Rp {$total}";
    }
}
?>