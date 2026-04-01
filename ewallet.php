<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

#Class EWallet
class EWallet extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Pembayaran E-Wallet Rp {$this->jumlah} berhasil";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->totalBayar();
        return "Struk E-Wallet: Rp {$total}";
    }
}
?>
