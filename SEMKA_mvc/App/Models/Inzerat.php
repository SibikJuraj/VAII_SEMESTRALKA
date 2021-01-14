<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Inzerat extends Model
{

    protected $id;
    protected string $titulok;
    protected string $text;
    protected float $cena;
    protected string $obrazok;

    public function __construct(string $titulok = "", string $text = "", float $cena = 0, string $obrazok = "")
    {
        $this->titulok = $titulok;
        $this->text = $text;
        $this->cena = $cena;
        $this->obrazok = $obrazok;
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



    static public function setDbColumns()
    {
        return ['id', 'titulok', 'text', 'cena', 'obrazok'];
    }

    static public function setTableName()
    {
        return "inzeraty";
    }
}