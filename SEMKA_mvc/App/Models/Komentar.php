<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
use mysql_xdevapi\Exception;

class Komentar extends Model
{

    protected $id;
    protected $idAutor;
    protected $idInzerat;

    protected $autor;
    protected $inzerat;



    protected string $text;



    public function __construct(string $text = "", $idAutor = "", $idInzerat = "")
    {

        $this->text = $text;

        $this->idAutor = $idAutor;
        $this->idInzerat = $idInzerat;

        $this->autor = null;
        $this->inzerat = null;
    }

    // region Getters and Setters

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
    public function getIdAutor()
    {
        return $this->idAutor;
    }

    /**
     * @param mixed $idAutor
     */
    public function setIdAutor($idAutor): void
    {
        $this->idAutor = $idAutor;
    }

    /**
     * @return mixed
     */
    public function getIdInzerat()
    {
        return $this->idInzerat;
    }

    /**
     * @param mixed $idInzerat
     */
    public function setIdInzerat($idInzerat): void
    {
        $this->idInzerat = $idInzerat;
    }




    /**
     * @return User|null
     */
    public function getAutor(): ?User
    {
        try {
            return User::getOne($this->idAutor);
        } catch (Exception $e) {

        }
    }

    /**
     * @param User|null $autor
     */
    public function setAutor(?User $autor): void
    {
        $this->autor = $autor;
    }

    /**
     * @return Inzerat|null
     */
    public function getInzerat(): ?Inzerat
    {
        try {
            return Inzerat::getOne($this->idInzerat);
        } catch (Exception $e) {

        }

    }

    /**
     * @param Inzerat|null $inzerat
     */
    public function setInzerat(?Inzerat $inzerat): void
    {
        $this->inzerat = $inzerat;
    }





    //endregion

    static public function setDbColumns()
    {
        return ['id', 'text', 'idAutor', 'idInzerat'];
    }

    static public function setTableName()
    {
        return "komentare";
    }


}