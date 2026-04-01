<?php
abstract class Pembayaran {
    protected $jumlah;

    public function __construct($jumlah) {
        $this->jumlah = $jumlah;
    }
    abstract public function prosesPembayaran();

    public function validasi() {
        return $this->jumlah > 0;
    }

    // Fitur Diskon 10% dan Pajak 11%
    public function hitungDiskon() {
        return $this->jumlah * 0.10; // Diskon 10%
    }

    public function hitungPajak() {
        $setelahDiskon = $this->jumlah - $this->hitungDiskon();
        return $setelahDiskon * 0.11; // Pajak 11% dari harga setelah diskon
    }

    public function totalBayar() {
        return $this->jumlah - $this->hitungDiskon() + $this->hitungPajak();
    }
}
?>
