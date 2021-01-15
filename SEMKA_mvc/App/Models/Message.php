<?php


namespace App\Models;


use App\Core\Model;

class Message extends Model
{

    protected string $message;


    protected ?User $sender = null;
    protected ?User $recipient = null;
    /**
     * @var null
     */
    protected $sender_id;
    /**
     * @var null
     */
    protected $recipient_id;




    public function __construct($message = "", $sender_id = null, $recipient_id = null)
    {


        $this->message = $message;
        $this->sender_id = $sender_id;
        $this->recipient_id = $recipient_id;
    }

    static public function setDbColumns()
    {
        return ['message', 'sender_id', 'recipient_id'];
    }

    static public function setTableName()
    {
        return 'messages';
    }


    //region Getters and Setters


    /**
     * @return mixed|string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed|string $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return null
     */
    public function getSenderId()
    {
        return $this->sender_id;
    }

    /**
     * @param null $sender_id
     */
    public function setSenderId($sender_id): void
    {
        $this->sender_id = $sender_id;
    }

    /**
     * @return null
     */
    public function getRecipientId()
    {
        return $this->recipient_id;
    }

    /**
     * @param null $recipient_id
     */
    public function setRecipientId($recipient_id): void
    {
        $this->recipient_id = $recipient_id;
    }

    /**
     * @return User|null
     */
    public function getSender(): ?User
    {
        return $this->sender;
    }

    /**
     * @param User|null $sender
     */
    public function setSender(?User $sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return User|null
     */
    public function getRecipient(): ?User
    {
        return $this->recipient;
    }

    /**
     * @param User|null $recipient
     */
    public function setRecipient(?User $recipient): void
    {
        $this->recipient = $recipient;
    }



    //endregion

    public function loadSender()
    {
        $this->sender = User::getOne($this->sender_id);
    }

    public function loadRecipient()
    {
        $this->recipient = ($this->recipient_id == null) ? null : User::getOne($this->recipient_id);

    }



}