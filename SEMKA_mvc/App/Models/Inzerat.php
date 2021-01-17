<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
use mysql_xdevapi\Exception;

class Inzerat extends Model
{

    protected $id;
    protected $idOwner;
    protected $idKategoria;

    protected string $titulok;
    protected string $text;
    protected float $cena;
    protected string $obrazok;
    protected $owner;
    protected $kategoria;


    public function __construct(string $titulok = "", string $text = "", float $cena = 0, string $obrazok = "",$idOwner = "",$idKategoria = "")
    {
        $this->titulok = $titulok;
        $this->text = $text;
        $this->cena = $cena;
        $this->obrazok = $obrazok;
        $this->idOwner = $idOwner;
        $this->idKategoria = $idKategoria;

        $this->owner = null;
        $this->kategoria = null;

    }


    // region Getters and Setters

    /**
     * @return Kategoria|null
     */
    public function getKategoria(): ?Kategoria
    {
        try {
            return Kategoria::getOne($this->idKategoria);
        } catch (Exception $e) {

        }

    }

    /**
     * @param Kategoria|null $kategoria
     */
    public function setKategoria(?Kategoria $kategoria): void
    {
        $this->kategoria = $kategoria;
    }


    /**
     * @return mixed
     */
    public function getIdKategoria()
    {
        return $this->idKategoria;
    }

    /**
     * @param mixed $idKategoria
     */
    public function setIdKategoria($idKategoria): void
    {
        $this->idKategoria = $idKategoria;
    }


    /**
     * @return User|null
     */
    public function getOwner(): ?User
    {
        try {
            return User::getOne($this->idOwner);
        } catch (Exception $e) {

        }

    }

    /**
     * @param User|null $owner
     */
    public function setOwner(?User $owner): void
    {
        $this->owner = $owner;
    }


    /**
     * @return mixed
     */
    public function getIdOwner()
    {
        return $this->idOwner;
    }

    /**
     * @param mixed $idOwner
     */
    public function setIdOwner($idOwner): void
    {
        $this->idOwner = $idOwner;
    }



    /**
     * @return string
     */
    public function getTitulok(): string
    {
        return $this->titulok;
    }

    /**
     * @param string $titulok
     */
    public function setTitulok(string $titulok): void
    {
        $this->titulok = $titulok;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }


    /**
     * @return float
     */
    public function getCena(): float
    {
        return $this->cena;
    }

    /**
     * @param float $cena
     */
    public function setCena(float $cena): void
    {
        $this->cena = $cena;
    }

    /**
     * @return string
     */
    public function getObrazok(): string
    {
        return $this->obrazok;
    }

    /**
     * @param string $obrazok
     */
    public function setObrazok(string $obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }




    //endregion

    static public function setDbColumns()
    {
        return ['id', 'titulok', 'text', 'cena', 'obrazok','idOwner','idKategoria'];
    }

    static public function setTableName()
    {
        return "inzeraty";
    }


}