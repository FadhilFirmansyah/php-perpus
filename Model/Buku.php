<?php

namespace Model;

class Buku{

    public function __construct(private ?int $id = null,
                                private ?string $judul = null,
                                private ?string $pengarang = null,
                                private ?string $penerbit = null,
                                private ?string $gambar = null,
                                private ?int $isbn = null)
    {
        
    }

    public function getId():?int{
        return $this->id;
    }
    public function setId(?int $id):void{
        $this->id = $id;
    }

    public function getJudul():?string{
        return $this->judul;
    }
    public function setJudul(?string $judul):void{
        $this->judul = $judul;
    }

    public function getPengarang():?string{
        return $this->pengarang;
    }
    public function setPengarang(?string $pengarang):void{
        $this->pengarang = $pengarang;
    }

    public function getPenerbit():?string{
        return $this->penerbit;
    }
    public function setPenerbit(?string $penerbit):void{
        $this->penerbit = $penerbit;
    }

    public function getGambar():?string{
        return $this->gambar;
    }
    public function setGambar(?string $gambar):void{
        $this->gambar = $gambar;
    }

    public function getIsbn():?int{
        return $this->isbn;
    }
    public function setIsbn(?int $isbn):void{
        $this->isbn = $isbn;
    }
}

?>