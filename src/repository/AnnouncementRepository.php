<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Announcement.php';

class AnnouncementRepository extends Repository
{

    public function getAnnouncement(int $id): ?Announcement
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.Announcement_details ad
                  INNER JOIN announcement a on a.ann_id = ad.announcement_ann_id
                  INNER JOIN announcement_location al on al.location_id = ad.announcement_location_location_id
              WHERE details_id = :id
            
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $announcement = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$announcement) {
            return null;
        }

        return new Announcement(
            $id,
            $announcement['title'],
            $announcement['description'],
            $announcement['image'],
            $announcement['price'],
            $announcement['size'],
            $announcement['phone_number'],
            $announcement['type'],
            $announcement['purpose'],
            $announcement['announcement_location_location_id']
        );
    }

    public function addAnnouncement(Announcement $announcement, User $user, Address $propertyAddress): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO announcement (user_id, type, purpose)
            VALUES (?, ?, ?) RETURNING ann_id
        ');

        $stmt->execute([
            $user->getUserId(),
            $announcement->getPropertyType(),
            $announcement->getPurpose()

        ]);

        $announcement_id = $stmt->fetchColumn();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO announcement_location (street, house_number, flat_number, postal_code, city)
            VALUES (?, ?, ?, ?, ?) RETURNING location_id
        ');


        $stmt->execute([
            $propertyAddress->getStreet(),
            $propertyAddress->getHouseNumber(),
            $propertyAddress->getFlatNumber(),
            $propertyAddress->getPostalCode(),
            $propertyAddress->getCity()
        ]);

        $location_id = $stmt->fetchColumn();

        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO announcement_details (title, description, image, price, size, phone_number, announcement_ann_id, announcement_location_location_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $announcement->getTitle(),
            $announcement->getDescription(),
            $announcement->getImage(),
            $announcement->getPrice(),
            $announcement->getSize(), "123456789",
//            $announcement->getPhoneNumber(),
            $announcement_id,
            $location_id
//            $announcement->getPurpose(),
//            $announcement->getPropertyType()
//            $date->format('Y-m-d'),
//            $assignedById,

        ]);
    }

    public function getNotices(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('SELECT * FROM Announcement_details');
        $stmt->execute();
        $notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notices as $notice) {
            $result[] = new Announcement(
                $notice['announcement_ann_id'],
                $notice['title'],
                $notice['description'],
                $notice['image'],
                $notice['price'],
                $notice['size'],
                $notice['phoneNumber'],
                $notice['propertyType'],
                $notice['purpose'],
                $notice['locationId']
            );
        }
        return $result;
    }

    public function getMyNotices($userId): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT  ann.user_id, title, description, image, price, size, type, purpose, announcement_location_location_id 
            From announcement ann 
            INNER JOIN announcement_details ad on ann.ann_id = ad.announcement_ann_id
        WHERE
            ann.user_id = :id
        ');
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notices as $notice) {
            $result[] = new Announcement(
                $notice['announcement_ann_id'],
                $notice['title'],
                $notice['description'],
                $notice['image'],
                $notice['price'],
                $notice['size'],
                $notice['phoneNumber'],
                $notice['propertyType'],
                $notice['purpose'],
                $notice['locationId']
            );
        }
        return $result;
    }

    public function getAnnouncementByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM Announcement_details WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllFilters(string $purpose, float $size, float $maxPrice)
    {
        $purpose = strtolower($purpose);
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM announcement a
            INNER JOIN announcement_details ad on a.ann_id = ad.announcement_ann_id
        WHERE 
            LOWER(a.type) LIKE :purpose AND
            ad.price <= :price AND
           ad.size >= :size
        ');
        $stmt->bindParam(':purpose', $purpose, PDO::PARAM_STR);
        $stmt->bindParam(':price', $maxPrice, PDO::PARAM_INT);
        $stmt->bindParam(':size', $size, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilteredByPriceAndSize(float $size, float $maxPrice)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM announcement a
            INNER JOIN announcement_details ad on a.ann_id = ad.announcement_ann_id
        WHERE 
            ad.price <= :price AND
           ad.size >= :size
        ');
        $stmt->bindParam(':price', $maxPrice, PDO::PARAM_INT);
        $stmt->bindParam(':size', $size, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}







