<?php

namespace App\Repository;

use Beaver\Repository\AbstractRepository;
use PDO;

class PathologyRepository extends AbstractRepository
{
    public function findByKeyWords(array $keywords)
    {
        // complex code to manage list with pdo, purposely not factorised
        $inKeywords = [];
        $in = '';
        foreach ($keywords as $id => $keyword) {
            $key = "keyword$id";
            $in .= ":$key,";
            $inKeywords[$key] = $keyword;
        }
        $in = rtrim($in, ',');

        $stmt = $this->db->prepare("
            SELECT s.*
            FROM keywords k
            JOIN keySympt ks ON k.idK = ks.idK
            JOIN symptome s ON s.idS = ks.idS
            WHERE k.name IN ($in);
        ");

        $stmt->execute($inKeywords);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
}
