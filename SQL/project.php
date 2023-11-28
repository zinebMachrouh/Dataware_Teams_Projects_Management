<?php
include './connect.php';
function createProject($name, $dateStart, $dateEnd, $status = 0, $productOwner = null) {
    global $conn;

    $query = "INSERT INTO projects (name, date_start, date_end, status, productOwner) 
            VALUES (:name, :date_start, :date_end, :status, :productOwner)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':date_start', $dateStart);
    $stmt->bindParam(':date_end', $dateEnd);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':productOwner', $productOwner);

    return $stmt->execute();
}


function updateProject($projectId, $name, $dateStart, $dateEnd, $status, $productOwner)
{
    global $conn;

    $query = "UPDATE projects 
            SET name = :name, date_start = :date_start, date_end = :date_end,      
            status = :status, productOwner = :productOwner 
            WHERE id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':date_start', $dateStart);
    $stmt->bindParam(':date_end', $dateEnd);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':productOwner', $productOwner);
    $stmt->bindParam(':id', $projectId);

    return $stmt->execute();
}

function deleteProject($projectId)
{
    global $conn;

    $query = "DELETE FROM projects WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $projectId);

    return $stmt->execute();
}

?>
