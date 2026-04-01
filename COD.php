<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

class COD extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Pembayaran COD disiapkan. Siapkan uang Rp {$this->jumlah}";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->totalBayar();
        return "Struk COD: Rp {$total}";
    }
}
?>