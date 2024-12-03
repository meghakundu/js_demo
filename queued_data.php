<?php
include_once("db_connect.php");
$sqlQuery ="SELECT COUNT(orders.customer_id) as queued_members , vendors.company_name as company_name FROM orders INNER JOIN vendors ON vendors.order_id=orders.id INNER JOIN queue on queue.vendor_id = vendors.id GROUP BY vendors.company_name";
//$sqlQuery = "SELECT feedbacks.actual_wait_time,orders.customer_id FROM `feedbacks` INNER JOIN queue ON feedbacks.queue_id=queue.id INNER JOIN vendors ON vendors.id=queue.vendor_id INNER JOIN orders ON vendors.order_id=orders.id WHERE feedbacks.reason IS NULL AND feedbacks.actual_wait_time<7 GROUP BY feedbacks.actual_wait_time";
$resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
$data = array();
foreach ($resultset as $row) {
  $data[] = $row;
}
echo json_encode($data);
exit;
?>
