<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

class TransferBank extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Transfer Bank sebesar Rp {$this->jumlah}";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        // Menampilkan total bayar
        $total = $this->totalBayar();
        return "Struk Transfer Bank: Rp {$total}";
    }
}
?>
