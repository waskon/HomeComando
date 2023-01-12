<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM User_data WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }
        return new User(
            $user['user_id'],
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['country'],
            $user['password']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_data (name, surname, email, country, password)
            VALUES (?, ?, ?, ?, ?) 
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getCountry(),
            $user->getPassword(),
//            $this->getUserId($user)
        ]);
    }

   public function getUserById(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM User_data WHERE user_id = :id
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }
        return new User(
            $user['user_id'],
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['country'],
            $user['password']
        );
    }

}