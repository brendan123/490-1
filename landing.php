<?php    
    require 'header.php';
    require 'nav.php';
    require 'db_key.php';
?>

<body>
      
    <!-- Timeline Code --> 
    <div class='container'>
        <div class = 'row clearfix'>
            
    <div class = "col-lg-8 col-md-12 left-box">
	<h2> <b> My Timeline  </b></h2> 
        <?php
            $value = getenv("SPOTIFY_TOKEN");
            echo "<p>". $value."</p>";
        ?>
	
        <?php
            $user = $_SESSION['username'];
            $conn = connect_db();
            $result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
            $row = mysqli_fetch_array($result);
		    $user_id = $row['id'];
            
            
            $sql = $conn->query("SELECT distinct `user` FROM followers_table WHERE follower_id = '{$user_id}'");
            $arr = array();
            $counter = 0;
            if($sql->num_rows > 0){
                while($row = mysqli_fetch_array($sql))
                {
                    $arr[$counter] = $row['user'];
                    $counter++;
                }
                $arr[$counter] = $user;
                //}
                $list = implode("' ,'", $arr);
                $sql_query = $conn->query("SELECT * FROM `posts` Where `user` IN ('{$list}') ORDER BY `time` DESC");
                //if($sql_query->num_rows > 0){
                while($row = mysqli_fetch_array($sql_query))
                {
                    echo "<div class='card single_post'>";
                    echo "<p class='puser'>". $row['user']."</p>";
                    $name = $row['user'];
                    if ($name != $user){
                    
                        $result = $conn->query("SELECT id FROM followers_table WHERE follower_id = '{$user_id}' AND `user` = '{$name}'");
                        $record = mysqli_fetch_array($result);
                        echo '<form method="POST" action="backend.php">
                                <input type="hidden" name="id" value="'. $record['id'].'" />
                                <input type="hidden" name="username" value="'. $row['user'].'" />
                                <button id = followerButton class = "btn btn-outline-info" type="submit" name="unfollowbtn" value= "unfollow">Following</button>
                        </form>';
                    }
		    
                    $userP = $row['user'];
                    $result = $conn->query("SELECT id FROM `followers_table` WHERE `user` = '{$userP}' AND `follower_id` = '{$user_id}'");
                    $record = mysqli_fetch_array($result);
                    $id = $row['id'];
                    if($_SESSION['isAdmin']==1){
                        echo '<form method="POST" action="backend.php">
                        <input type="hidden" name="del" value="'. $id.'" />
                        <button id = "delete-button"  class = "btn btn-outline-info" type="submit" name="deletebtn" value= "delete">Delete</button>
                        </form>';
                    }
                    echo '<div class="card-body">';
                    echo '<img class="card-img-post" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
            
                    echo "<p class='ptext'>". $row['text']."</p>";
                    echo "<p class='ptime'>". $row['time']."</p>";
                    echo "<iframe src='https://open.spotify.com/embed/track/". $row['spotID'] . "'" . 'width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
                        
                    $id = $row['id'];
                    $sql = $conn->query("SELECT * FROM comments Where post_ID = '{$id}'");
                    if($sql->num_rows > 0){
                        while($r = mysqli_fetch_array($sql))
                        {
                            echo $r['date']."<br>";
                            echo $r['name'].":";
                            echo $r['text']."<br><br>";
                        }
                    }
                    echo '<form method="POST" action="backend.php">';
                    echo '<div class ="form-group">';
                    echo '<label>Comment:</label>';
                    echo '<input class= "form-control w-25" type="text" name="comment">';
                    echo '<input type="hidden" name="post_ID" value="'. $row['id'].'" />';
                    echo '</div>';
                    echo '<button class = "btn btn-outline-info" type="submit" name="commentbtn" value= "post_Comment">Comment</button>';
                    echo '</form>';
                    echo "</div>";
                    echo "</div>";
                    echo "<br><br>";
                }
            }
            
            $conn->close();
        ?>
        <div class = "col-lg-4 col-md-12 right-box">
            <?php
            echo "<h4> <b>". "You Might Like". "</b> </h4>";
            $user = $_SESSION['username'];
            $conn = connect_db();
            $result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
            $row = mysqli_fetch_array($result);
            $user_id = $row['id'];
        
            $sql = $conn->query("SELECT distinct `user` FROM followers_table WHERE follower_id = '{$user_id}'");
            $arr = array();
            $counter = 0;
            if($sql->num_rows > 0){
                while($row = mysqli_fetch_array($sql))
                {
                    $arr[$counter] = $row['user'];
                    $counter++;
                }
                $arr[$counter] = $user;
            } 
            
            //$k = array_rand($arr, 3);
            
            $list = implode("' ,'", $arr);
            $sql_query = $conn->query("SELECT * FROM `users` Where `username` NOT IN ('{$list}') ORDER BY Rand() LIMIT 3 ");
            //AND NOT IN '{$user}'
            if($sql_query->num_rows > 0){
                while($row = mysqli_fetch_array($sql_query))
                {
                    echo $row['username'];
                    echo '<button type="button>Follow"</button>';
                    echo '<button onclick="myFunction()>"Follow"</button>';
                        
                    echo '<form method="POST" action="backend.php">
                    <input type="hidden" name="user" value="'. $row['username'].'" /> <br>
                    <button id = followerButton class = "btn btn-outline-info" type="submit" name="followbtn" value= "follower">+ Follow</button>
                    </form>';
                    echo '<sp><sp>';
                        
                }
            }
            ?>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body></html> 
