<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Database;
use Kreait\Firebase\Storage;


class FirebaseService
{
    protected $factory;
    protected $auth;
    protected $database;
    protected $storage;

    public function __construct()
    {
        $this->factory = (new Factory)
            ->withServiceAccount(storage_path('app/firebase-service-account.json'));

        $this->auth = $this->factory->createAuth();
        $this->database = $this->factory->createDatabase();
        $this->storage = $this->factory->createStorage();
    }

    public function auth(): Auth
    {
        return $this->auth;
    }

    public function database(): Database
    {
        return $this->database;
    }

    public function storage(): Storage
    {
        return $this->storage;
    }

    

public function createCustomToken(string $uid, array $claims = []): \Lcobucci\JWT\UnencryptedToken
{
    return $this->auth->createCustomToken($uid, $claims);
}
}
