<?php

function getCategories($con,$id){
    $query = "SELECT * FROM categories WHERE id='$id'";
    $result = mysqli_query($con,$query);
    return $categorie = $result->fetch_assoc(); }



/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
// function getPublishedArticles() {
// 	// use global $conn object in function
// 	global $con;
// 	$sql = "SELECT * FROM articles";
// 	$result = mysqli_query($con, $sql);

// 	// fetch all posts as an associative array called $posts
// 	$article = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 	return $article;
// }

?>