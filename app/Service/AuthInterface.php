<?php

namespace App\Service;

interface AuthInterface
{
    public function login(array $data): array;
    public function register(array $data):array;
    public function logout(): void;
}