<?php
include_once("db_connect.php");
//$sqlQuery = "SELECT year(created_at) as year, count(case when gender='Male' then 1 end) as male_cnt, count(case when gender='Female' then 1 end) as female_cnt from influencers group by year(created_at)";
$sqlQuery ="SELECT p.name as role, COUNT(c1.influencer_id) as influencers, COUNT(c2.company_id) as companies FROM industries AS p LEFT JOIN influencer_industries AS c1 ON p.id=c1.influencer_id LEFT JOIN company_industries AS c2 ON p.id = c2.company_id GROUP BY p.name";
$resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
// $population = "{";
// while( $records = mysqli_fetch_array($resultset) ) {
// 	$population.='"'.$records['year'].'":'.$records['male_cnt'].',';  		
// }
// $population=rtrim($population,",");
// $population.="}";
// $data[] = $population;
$data = array();
foreach ($resultset as $row) {
  $data[] = $row;
}
echo json_encode($data);
exit;
?>
