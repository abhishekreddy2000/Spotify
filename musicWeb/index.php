<html lang="en">

<head>
    <title>Spotify.com</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .checked {
            color: orange;
        }
        
        #maindiv {
            width: 100%;
            height: 45px;
            background-color: #3a3b3c;
            display: flex;
        }
        
        .active {
            color: orangered;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div id="maindiv" class="flex-contianer d-flex m-0">
            <!-- <div class="flex-container" style="display: flex"></div> -->
            <!--<div class ="flex-container" style="display:flex; width:100%;justify-content:space-between">-->
            <div style="padding-left: 20px; padding-right: 20px; padding-top: 3px">
                <!-- <button type="button" class="btn btn-primary active">Home</button> -->
                <a href="index.php" class="btn btn-primary">Home</a>
            </div>
            <div style="padding-left: 20px; padding-right: 20px; padding-top: 3px">
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            + Add Songs
          </button> -->
                <a href="addSong.php" class="btn btn-primary">+Add Songs</a>
            </div>
        </div>
        <h2>Top 10 Songs</h2>
        <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM songs";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="top10songs" class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Artwork</th>";
                                        echo "<th>Song Name</th>";
                                        echo "<th>Date of Release</th>";
                                        echo "<th>Artist</th>";
                                        echo "<th>Ratings</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td style='width: 20%'><img src='" . $row['artwork'] . "' height='40%' width='40%'></td>";
                                        echo "<td>" . $row['Song_Name'] . "</td>";
                                        echo "<td>" . $row['DateOfRelease'] . "</td>";
                                        echo "<td>" . $row['Artist_Name'] . "</td>";
                                        echo "<td><span class='fa fa-star checked'></span>
                                        <span class='fa fa-star checked'></span>
                                        <span class='fa fa-star checked'></span>
                                        <span class='fa fa-star checked'></span>
                                        <span class='fa fa-star'></span></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    
                    echo "<h2>Top 10 Artists</h2>";
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM artists";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="top10artists" class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Artist</th>";
                                        echo "<th>Date of Birth</th>";
                                        echo "<th>Bio</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['Date of Birth'] . "</td>";
                                        echo "<td>" . $row['Bio'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
    </div>
</body>

</html>