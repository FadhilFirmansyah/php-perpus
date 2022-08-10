<?php

namespace Repository;

use Model\Buku;
use PDO;

interface BukuRepository{
    public function show():array;
    public function showById($id):array;
    public function save(Buku $buku):void;
    public function delete($id):void;
    public function update(Buku $judul, Buku $pengarang, Buku $penerbit, Buku $isbn, $id):void;
    public function find($keyword);
}

class BukuRepositoryImpl implements BukuRepository{

    public function __construct(private PDO $conn)
    {
        
    }

    public function show(): array
    {
        $sql = <<<SQL
        SELECT * FROM tbl_buku ORDER BY judul 
        SQL;
        $stat = $this->conn->prepare($sql);
        $stat->execute();

        $stack = [];

        foreach($stat as $data){
            $buku = new Buku();
            $buku->setId($data["id_buku"]);
            $buku->setJudul($data["judul"]);
            $buku->setPengarang($data["pengarang"]);
            $buku->setPenerbit($data["penerbit"]);
            $buku->setGambar($data["gambar"]);
            $buku->setIsbn($data["isbn"]);

            $stack[] = $buku;
        }

        return $stack;
    }

    public function showById($id): array
    {
        $sql = <<<SQL
        SELECT judul, pengarang, penerbit, gambar, isbn FROM tbl_buku
        WHERE id_buku = ?
        SQL;
        $stat = $this->conn->prepare($sql);
        $stat->execute([$id]);

        $stack = [];

        while($data = $stat->fetch()){
            $buku = new Buku();
            $buku->setJudul($data["judul"]);
            $buku->setPengarang($data["pengarang"]);
            $buku->setPenerbit($data["penerbit"]);
            $buku->setGambar($data["gambar"]);
            $buku->setIsbn($data["isbn"]);

            $stack[] = $buku;
        }

        return $stack;
    }

    public function save(Buku $buku): void
    {
        $sql = <<<SQL
        INSERT INTO tbl_buku(judul, pengarang, penerbit, gambar, isbn)
        VALUES(?, ?, ?, ?, ?);
        SQL;

        $stat = $this->conn->prepare($sql);
        $stat->execute([$buku->getJudul(), 
                        $buku->getPengarang(), 
                        $buku->getPenerbit(),
                        $buku->getGambar(),
                        $buku->getIsbn()]);

    }

    public function delete($id): void
    {
        $sql = <<<SQL
        DELETE FROM tbl_buku
        WHERE id_buku = ?
        SQL;

        $stat = $this->conn->prepare($sql);
        $stat->execute([$id]);
    }

    public function update(Buku $judul, Buku $pengarang, Buku $penerbit, Buku $isbn, $id): void
    {
        $sql = <<<SQL
        UPDATE tbl_buku
        SET judul = ?,
        pengarang = ?,
        penerbit = ?,
        isbn = ?
        WHERE id_buku = ?
        SQL;
        $stat = $this->conn->prepare($sql);
        $stat->execute([$judul->getJudul(), $pengarang->getPengarang(),
                        $penerbit->getPenerbit(), $isbn->getIsbn(), $id]);
    }

    public function find($keyword)
    {
        $sql = <<<SQL
        SELECT * FROM tbl_buku WHERE judul like %?% ORDER BY judul
        SQL;
        $stat = $this->conn->prepare($sql);
        $stat->execute([$keyword]);
        
        $stack = [];

        foreach($stat->fetchAll() as $data){
            $buku = new Buku();
            $buku->setId($data["id_buku"]);
            $buku->setJudul($data["judul"]);
            $buku->setPengarang($data["pengarang"]);
            $buku->setPenerbit($data["penerbit"]);
            $buku->setGambar($data["gambar"]);

            $stack[] = $buku;
        }

        return $stack;
    }
}

?>