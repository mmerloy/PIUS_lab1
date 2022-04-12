<?php

require_once './User.php';

class Comment
{
    protected User $obj;
    protected string $message;

    public function __construct(User $obj, string $message)
    {
        $this->obj = $obj;
        $this->message = $message;
    }

    public function getObj(): User
    {
        return  $this->obj;
    }

    public function getMessage(): string
    {
        return  $this->message;
    }
}
