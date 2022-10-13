<!-- Catatan: Permisi pak, apabila belum berubah di tabel viewnya, silahkan tolong di-refresh page nya pak,
terima kasih. -->

<?php
     $server = "localhost";
     $db_username = "root";
     $db_password = "";
     $database = "asg1";
 
     $connect = mysqli_connect($server, $db_username, $db_password, $database);
     if(mysqli_connect_errno())
     {
         throw new exception("MySQL failed to connect").mysqli_connect_error();
     }else{
      
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASG1-LEC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <div style="font-size: 50px;"><b>INSERT MENU</b></div>
    <!-- INSERT -->
    <form>
        NIK: <input type="text" name="NIK" id="NIK"> <br>
        Name: <input type="text" name="userName" id="userName"><br>
        birthPlace: <input type="text" name="birthPlace" id="birthPlace"><br>
        birthDate: <input type="date" name="birthDate" id="birthDate"><br><br>
        <button class="button is-link" name="submit">Submit</button> <br><br>
    </form>

    <?php
        $NIK = $_GET['NIK'];
        $userName = $_GET['userName'];
        $birthPlace = $_GET['birthPlace'];
        $birthDate = $_GET['birthDate'];
        if($NIK != NULL)
        {
            $insertion = "INSERT INTO userdata VALUES ('$NIK', '$userName', '$birthPlace', '$birthDate')";
            if (mysqli_query($connect,$insertion))
            {
                echo "Data successfully inserted";
            }else{
                echo "Data failed inserted $insertion".mysqli_error($connect);
        
            }
        }
    ?>
    <br>
    <br>

    <div style="font-size: 50px;"><b>DELETE MENU</b></div>
    <!-- DELETE -->
    <form>
        NIK: <input type="text" name = "del_NIK" id="del_NIK">
        <button class="button is-link" name="submit">Submit</button> <br> <br>  
    </form>

    <?php
        $del_NIK  = $_GET['del_NIK'];
        $deletion = "DELETE FROM userdata WHERE NIK = '$del_NIK'";
        $del_query = mysqli_query($connect, $deletion); //Dari sini udah bekerja fungsi auto delete
    ?>
    <br>
    <br>
    
    <!-- SELECT -->
    <div style="font-size: 50px;"><b>VIEW DATA</b></div>
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col" style="color: white;">NIK</th>
                <th scope="col" style="color: white;">User Name</th>
                <th scope="col" style="color: white;">Birth Place</th>
                <th scope="col" style="color: white;">Birth Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //SELECT
            $view = "SELECT * FROM userdata";
            $views = mysqli_query($connect,$view);
            while($row = mysqli_fetch_assoc($views))
            {
                echo "<tr>";
                echo "<th> {$row['NIK']} </th>";
                echo "<th> {$row['userName']} </th>";
                echo "<th> {$row['birthPlace']} </th>";
                echo "<th> {$row['birthDate']} </th>";
                echo "</tr>";
            }   
            ?>
        </tbody>
    </table>
    <br>

     <!-- Update -->
    <div style="font-size: 50px;"><b>UPDATE MENU - USERNAME</b></div>
    <br>
    <form> 
        NIK: <input type="text" name = "upd_NIK" id="upd_NIK">
        Input your new username: <input type="text" name="new_name" id="new_name">
        <button class="button is-link" name="submit">Submit</button>
    </form>

    <?php
        $upd_NIK  = $_GET['upd_NIK'];
        $new_name = $_GET['new_name'];
        $update = "UPDATE userdata SET userName = '$new_name' WHERE NIK = '$upd_NIK'";
        $upd_result = mysqli_query($connect, $update);  
        while($row = mysqli_fetch_array($views))
        {
            if($upd_NIK == $row['NIK'])
            {
                echo "NIK EXIST";
                break;
            }
        }
    ?>
</body>
</html>