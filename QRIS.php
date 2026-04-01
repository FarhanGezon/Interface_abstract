<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

class QRIS extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Pembayaran QRIS Rp {$this->jumlah} berhasil";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->totalBayar();
        return "Struk QRIS: Rp {$total}";
    }
}
?>