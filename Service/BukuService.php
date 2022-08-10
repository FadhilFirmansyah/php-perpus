<?php

namespace Service;

use Model\Buku;
use Repository\BukuRepositoryImpl;

interface BukuServive{
    public function showAll(): array;
    public function showBukuId($idBuku);
    public function saveBuku($judul, $pengarang, $penerbit, $gambar, $isbn);
    public function updateBuku($judulBuku, $pengarangBuku, $penerbitBuku, $isbnBuku, $idBuku);
    public function deleteBuku($idBuku);
    public function searchBuku($judul);
}

class BukuServiveImpl implements BukuServive{

    public function __construct(private BukuRepositoryImpl $bukuRepository)
    {
        
    }

    public function showAll():array
    {
        return $this->bukuRepository->show();
    }

    public function showBukuId($idBuku)
    {
        return $this->bukuRepository->showById($idBuku);
    }

    public function saveBuku($judul, $pengarang, $penerbit, $gambar, $isbn)
    {
        $buku = new Buku(
            judul: $judul,
            pengarang: $pengarang,
            penerbit: $penerbit,
            gambar: $gambar,
            isbn: $isbn
        );

        $this->bukuRepository->save($buku);
    }

    public function updateBuku($judulBuku, $pengarangBuku, $penerbitBuku, $isbnBuku, $idBuku)
    {
        $judul = new Buku(judul: $judulBuku);
        $pengarang = new Buku(pengarang: $pengarangBuku);
        $penerbit = new Buku(penerbit: $penerbitBuku);
        $isbn = new Buku(isbn: $isbnBuku);

        $this->bukuRepository->update($judul, $pengarang, $penerbit, $isbn, $idBuku);
    }

    public function deleteBuku($idBuku)
    {
        $this->bukuRepository->delete($idBuku);
    }

    public function searchBuku($judul)
    {
        return $this->bukuRepository->find($judul);
    }
}

?>