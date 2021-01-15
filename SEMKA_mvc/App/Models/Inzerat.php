<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
use mysql_xdevapi\Exception;

class Inzerat extends Model
{

    protected $id;
    protected $idOwner;


    protected string $titulok;
    protected string $text;
    protected float $cena;
    protected string $obrazok;
    protected $owner;



    public function __construct(string $titulok = "", string $text = "", float $cena = 0, string $obrazok = "",$idOwner = "")
    {
        $this->titulok = $titulok;
        $this->text = $text;
        $this->cena = $cena;
        $this->obrazok = $obrazok;
        $this->idOwner = $idOwner;
        $this->owner = null;
    }


    // region Getters and Setters

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
        return ['id', 'titulok', 'text', 'cena', 'obrazok','idOwner'];
    }

    static public function setTableName()
    {
        return "inzeraty";
    }
}