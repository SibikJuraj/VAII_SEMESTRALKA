<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Models\Message;
use App\Models\User;

class ForumController extends AControllerBase
{


    public function index()
    {
        return $this->html();
    }

    public function detail()
    {
        return $this->html();
    }

    public function users()
    {
        return $this->json($users = User::getAll());
    }
    public function messages()
    {
        $messages = Message::getAll();
        $this->assignUsers($messages);


        return $this->json($messages);
    }

    private function assignUsers($messages)
    {
        $users = User::getAll();
        /** @var Message $message */
        foreach ($messages as $message) {
            foreach ($users as $user) {
                if ($message->getRecipientId() == $user->getId()) {
                    $message->setRecipient($user);
                }
                if ($message->getSenderId() == $user->getId()) {
                    $message->setSender($user);
                }
            }
        }
    }


}