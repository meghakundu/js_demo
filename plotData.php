<?php
	include 'db_connect.php';
    $sqlQuery = "SELECT count(m_id) as no_of_matches,influencer_id as influencers FROM matches GROUP BY influencer_id";
$resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
$data = array();
while ($row = mysqli_fetch_array($resultset)) {
          		$data[]=$row;
}
echo json_encode($data);
exit;
?>