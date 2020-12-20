<?php

namespace App\Repositories;

use App\DBConnectable;
use App\Models\Contribution as ContributionModel;
use DateTime;
use Exception;
use PDO;

class Contribution extends AbstractRepository
{

    public function save(ContributionModel $contribution): bool
    {
        $now = new DateTime();
        $query = "INSERT INTO contributions(student_id, annotation, valoration, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->execute([
            $contribution->getStudentId(),
            $contribution->getAnnotation(),
            $contribution->getValoration(),
            $now->format('Y-m-d H:i:s'),
            $now->format('Y-m-d H:i:s')
        ]);
        return !$stmt->rowCount()==0;
    }
}
