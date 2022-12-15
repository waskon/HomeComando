<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Announcement.php';

class AnnouncementRepository extends Repository
{

    public function getAnnouncement(int $id): ?Announcement
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.Announcement_details WHERE details_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $announcement = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$announcement){
            return null;
        }

        return new Announcement(
            $announcement['title'],
            $announcement['description'],
            $announcement['image'],
            $announcement['price'],
            $announcement['size'],
            $announcement['number'],
            $announcement['propertyType'],
            $announcement['purpose']
        );
    }

    public function addAnnouncement(Announcement $announcement): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO announcement_details (title, description, image, price, size, phone_number)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
//        $assignedById = 1;

        $stmt->execute([
            $announcement->getTitle(),
            $announcement->getDescription(),
            $announcement->getImage(),
            $announcement->getPrice(),
            $announcement->getSize(),
            $announcement->getPhoneNumber(),
            $announcement->getPropertyType(),
            $announcement->getPurpose()


//            $announcement->format('Y-m-d'),
//            $assignedById
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
                $notice['title'],
                $notice['description'],
                $notice['image'],
                $notice['price'],
                $notice['size'],
                $notice['phoneNumber'],
                $notice['propertyType'],
                $notice['purpose']
            );
        }

        return $result;
    }

    public function getAnnouncementByTitle(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM Announcement_details WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}