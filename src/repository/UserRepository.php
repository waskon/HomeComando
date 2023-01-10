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

//    public function getUserId(User $user): int
//    {
//        $stmt = $this->database->connect()->prepare('
//            SELECT * FROM public.user_data WHERE name = :name AND surname = :surname AND country = :country
//        ');
////        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
////        $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
////        $stmt->bindParam(':country', $user->getCountry(), PDO::PARAM_STR);
//        $stmt->execute();
//
//        $data = $stmt->fetch(PDO::FETCH_ASSOC);
//        return $data['id'];
//    }

}