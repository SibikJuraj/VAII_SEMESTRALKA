<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Kategoria extends Model
{

    protected $id;
    protected string $nazov;
    protected string $obrazok;

    public function __construct(string $nazov = "", string $obrazok = "")
    {

        $this->nazov = $nazov;
        $this->obrazok = $obrazok;
    }

    /**
     * @return string
     */
    public function getNazov(): string
    {
        return $this->nazov;
    }

    /**
     * @param string $nazov
     */
    public function setNazov(string $nazov): void
    {
        $this->nazov = $nazov;
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



    static public function setDbColumns()
    {
        return ['id', 'nazov', 'obrazok'];
    }

    static public function setTableName()
    {
        return "kategorie";
    }
}