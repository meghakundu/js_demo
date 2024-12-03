<?php
include_once("db_connect.php");
//$sqlQuery = "SELECT year(created_at) as year, count(case when gender='Male' then 1 end) as male_cnt, count(case when gender='Female' then 1 end) as female_cnt from influencers group by year(created_at)";
$sqlQuery ="SELECT industries.name as industry,COUNT(company_industries.company_id) as advertisers FROM `industries` INNER JOIN company_industries ON company_industries.industry_id = industries.id GROUP BY industries.name ORDER BY industries.name;
";
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
