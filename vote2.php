<?php 

include('gallery_database.php');


$userIp = $_SERVER['REMOTE_ADDR'];
$imageId = $_POST['image_id'];

echo $imageId;
//CREATE TABLE street_votes  (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   image_id INT,
//   user_ip VARCHAR(45),
// FOREIGN KEY (image_id) REFERENCES street(id));

// Check if the user has already voted
$voteQuery = "SELECT id FROM street_votes WHERE image_id = ? AND user_ip = ?";
$voteStmt = $conn->prepare($voteQuery);
$voteStmt->bind_param("is", $imageId, $userIp);
$voteStmt->execute();
$voteResult = $voteStmt->get_result();

if ($voteResult->num_rows === 0) {
    // Insert vote
    $insertVoteQuery = "INSERT INTO street_votes (image_id, user_ip) VALUES (?, ?)";
    $insertVoteStmt = $conn->prepare($insertVoteQuery);
    $insertVoteStmt->bind_param("is", $imageId, $userIp);
    $insertVoteStmt->execute();
    $insertVoteStmt->close();
    
    // Update vote count 
    $updateVoteQuery = "UPDATE street SET vote_count = vote_count + 1 WHERE id = ?";
    $updateVoteStmt = $conn->prepare($updateVoteQuery);
    $updateVoteStmt->bind_param("i", $imageId);
    $updateVoteStmt->execute();
    $updateVoteStmt->close();
}

header("Location: vote_images_2.php");
exit();
?>

