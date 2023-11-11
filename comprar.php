<?php

include_once("config.php");
include_once("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set appropriate CORS headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Content-Type: application/json"); // Specify the content type as JSON

    // Process the JSON data sent by Axios
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if 'projectId' is in the received data
    if (isset($data['projectId'])) {
        // You can now use $data['projectId'] as needed
        $projectId = $data['projectId'];

        // Handle database operations and check for errors
        try {
            $sql = "INSERT INTO venda (user_id, project_id) VALUES (?, ?)";
            $motor = $con->prepare($sql);
            $motor->execute([$data['userId'], $data['projectId']]);

            $sql = "DELETE FROM carrinho WHERE user_id = ?";
            $motor = $con->prepare($sql);
            $motor->execute([$data['userId']]);

            echo json_encode(['message' => "Received projectId: $projectId"]);
        } catch (PDOException $e) {
            // Handle database errors
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'projectId is missing']);
    }
}
