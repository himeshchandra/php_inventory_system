<?php
require_once "config/database.php";
function getAvailableStock($product_id)
{
    global $conn;
    $sql = "
        SELECT
            COALESCE(
                SUM(CASE WHEN type = 'IN' THEN quantity ELSE 0 END),
                0
            )
            -
            COALESCE(
                SUM(CASE WHEN type = 'OUT' THEN quantity ELSE 0 END),
                0
            ) AS current_stock
        FROM stock_transactions
        WHERE product_id = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$product_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['current_stock'];
}
