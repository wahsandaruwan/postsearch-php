<?php
    include_once 'includes/header.php';
?>
    <link rel="stylesheet" href="main.css">
    
    <h1>Post Page</h1>

    <a href="index.php" class="home-page-button">Home Page</a>
    <a href="#" onclick="history.back();" class="home-page-button">Back</a>
    
    <div class="posts-container">
        <?php
            //Display clicked post
            $title = mysqli_real_escape_string($conn,$_GET['title']); //From the url 'title'
            $date = mysqli_real_escape_string($conn,$_GET['date']); //From the url 'date'

            $sql = "SELECT * FROM posts WHERE p_title = '$title' AND p_date = '$date'"; //Both date and title should be equal
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
