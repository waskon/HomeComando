<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Address.php';

class AddressRepository extends Repository
{

    public function getAddressById(int $id): ?Address
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.Announcement_location
              WHERE location_id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $address = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$address) {
            return null;
        }

        return new Address(
            $address['street'],
            $address['house_number'],
            $address['flat_number'],
            $address['postal_code'],
            $address['city']
        );
    }
}

?>
