<?php

class User{
    private string $email;
    private string $password;
    public function __construct( $email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}