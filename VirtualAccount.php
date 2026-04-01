<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

class VirtualAccount extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Pembayaran Virtual Account Rp {$this->jumlah} diterbitkan";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->totalBayar();
        return "Struk Virtual Account: Rp {$total}";
    }
}
?>