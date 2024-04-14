<?php 

if($prepared) {
    $results = $conn->fetch_from_prepared($sqlQuery);
} else {
    $conn->set_query($sqlQuery);
    $results = $conn->get_results();
}
