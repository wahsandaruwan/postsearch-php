<?php
  include_once 'header.php';
?>

<link rel="stylesheet" href="../main.css">
<h1>Search Result</h1>
<a href="../index.php" class="home-page-button">Home Page</a>
<div class="posts-container">
  <?php
  //If click the search button
    if(isset($_POST['submitSearch'])){
      $search = mysqli_real_escape_string($conn,$_POST['search']);

      if(!$search == ""){
        //Get data according to search term
        $sql = "SELECT * FROM posts WHERE p_title LIKE '%$search%' OR p_content LIKE '%$search%' OR p_author LIKE '%$search%' OR p_date LIKE '%$search%'";
        $result = mysqli_query($conn,$sql);
        $allResult = mysqli_num_rows($result);
        if($allResult > 0){ //If have records
          echo "<p>There are ".$allResult." search results</p>";
          while($row = mysqli_fetch_assoc($result)){
            //Check the post title and date before go to the post.php page | Include them into url
            echo "<a class='search-result' href='../post.php?title=".$row['p_title']."&date=".$row['p_date']."'> 
              <div class='posts-box'>
              <h3>".$row['p_title']."</h3>
              <p>".$row['p_content']."</p>
              <p>".$row['p_date']."</p>
              <p>".$row['p_author']."</p>
              </div>
            </a>";
          }
        }
        else{ //If not
          header("Location: ../index.php?search=no_any_search_result");
        }
      }
      else{ //If search empty search field
        header("Location: ../index.php?search=null");
      }
    }
  ?>
</div>
