<?php
    include_once 'includes/header.php';
?>
    <link rel="stylesheet" href="main.css">
    <form class="searchFrm" action="includes/search.php" method="POST" name="myfrom">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submitSearch">Search</button>        
    </form>
    <?php
    //Search form validation according to url
        if(isset($_GET['search'])){
            $searchUrl = $_GET['search'];
            if($searchUrl == "no_any_search_result"){
                echo "<p class='error'>There is no any record to match your search term!</p>";
            }
            else if($searchUrl == "null"){
                echo "<p class='error'>Search box is empty!</p>";
            }
        }
    ?>
    <h1>Home Page</h1>
    <h2>All Posts</h2>
    
    <div class="posts-container">
        <?php
            //Get all posts from db
            $sql = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='posts-box'>
                        <h3>".$row['p_title']."</h3>
                        <p>".$row['p_content']."</p>
                        <p>".$row['p_date']."</p>
                        <p>".$row['p_author']."</p>
                    </div>";
                }
            }
        ?>
    </div>
</body>
</html>

