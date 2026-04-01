<?php
#Penggunaan Abstrak Class
abstract class Pembayaran {
    protected $jumlah;

    public function __construct($jumlah) {
        $this->jumlah = $jumlah;
    }

    // method wajib
    abstract public function prosesPembayaran();

    // method umum
    public function validasi() {
        return $this->jumlah > 0;
    }

    // --- TUGAS 2: Tambahan Fitur Diskon 10% dan Pajak 11% ---
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