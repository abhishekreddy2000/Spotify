<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$songname = $dateofrelease = $artistname = $artwork = "";
$songname_err = $dateofrelease_err = $artistname_err = $artwork_err = "";
$name=$Date_of_birth=$Bio="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate songname
    $input_songname = trim($_POST["songname"]);
    if(empty($input_songname)){
        $songname_err = "Please enter a songname.";
    } elseif(!filter_var($input_songname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $songname_err = "Please enter a valid songname.";
    } else{
        $songname = $input_songname;
    }
    
    // Validate dateofrelease
    $input_dateofrelease = trim($_POST["dateofrelease"]);
    if(empty($input_dateofrelease)){
        $dateofrelease_err = "Please enter an dateofrelease.";     
    } else{
        $dateofrelease = $input_dateofrelease;
    }
    
    // Validate artistname
    $input_artistname = trim($_POST["artistname"]);
    if(empty($input_artistname)){
        $artistname_err = "Please enter the artistname.";
    }     
    else{
        $artistname = $input_artistname;
    }

    // Validate artistname
    $input_artwork = trim($_POST["artwork"]);
    if(empty($input_artwork)){
        $artwork_err = "Please enter the artwork link.";
    }  
    else{
        $artwork = $input_artwork;
    }
    
    // Check input errors before inserting in database
    if(empty($songname_err) && empty($dateofrelease_err) && empty($artistname_err) && empty($artwork_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO songs (Song_Name, DateOfRelease, Artist_Name, artwork) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_songname, $param_dateofrelease, $param_artistname, $param_artwork);
            
            // Set parameters
            $param_songname = $songname;
            $param_dateofrelease = $dateofrelease;
            $param_artistname = $artistname;
            $param_artwork= $artwork;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        #maindiv {
            width: 100%;
            height: 45px;
            background-color: #3a3b3c;
            display: flex;
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Add Song</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Song Name</label>
                            <input type="text" name="songname" class="form-control <?php echo (!empty($songname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $songname; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date of Release</label>
                            <input type="date" name="dateofrelease" class="form-control <?php echo (!empty($dateofrelease_err)) ? 'is-invalid' : ''; ?>"><?php echo $dateofrelease; ?>
                            <span class="invalid-feedback"><?php echo $dateofrelease_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Artist Name</label>
                            <input type="text" name="artistname" class="form-control <?php echo (!empty($artistname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $artistname; ?>">
                            <span class="invalid-feedback"><?php echo $artistname_err;?></span>
                        </div>
                        

                        <div class="form-group">
                            <label>Artwork</label>
                           
                            <input type="text" name="artwork" class="form-control"  <?php echo (!empty($artwork_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $artwork; ?>">
                            <span class="invalid-feedback"><?php echo $artwork_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                        
                      

<!--<div class="container">-->
<div class="container">
  <h2>Add some new artists</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+ Add Artists</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Add artist</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="fname">Artist name:</label>
  <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
 <!-- <input type="text" id="Name" name="Name"><br><br>-->
  <label for="lname">Date of birth:</label>
  <input type="date" name="Date of birth" class="form-control <?php echo (!empty($Date_of_birth_err)) ? 'is-invalid' : ''; ?>"><?php echo $Date_of_birth; ?>
 <!-- <input type="text" id="Date of birth" name="Date of birth"><br><br>-->
  <label for="lname">Biography :</label>
  <input type="text" name="Bio" class="form-control <?php echo (!empty($Bio_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Bio; ?>">
  <!--<input type="text" id="Bio" name="Bio"><br><br>-->
  <input type="submit" value="Submit">
</form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

      




                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>