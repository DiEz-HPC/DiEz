<?php

namespace App\Interface;

interface ContactMessageInterface
{
    public function getNom(): ?string;
    public function getEmail(): ?string;
    public function getMessage(): ?string;
}