<?php

namespace Model;

class User{
    public function __construct(private ?string $user = null,
                                private ?string $pass = null)
    {
        
    }

    public function getUser():?string{
        return $this->user;
    }
    public function setUser(?string $user):void{
        $this->user = $user;
    }

    public function getPass():?string{
        return $this->pass;
    }
    public function setPass(?string $pass):void{
        $this->pass = $pass;
    }
}

?>