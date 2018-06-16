<!DOCTYPE html>
<html>
  <head>
    <title>Dropdown Test</title>
  </head>
  <body>
    <form name="dropdowntest"action="#"method="post">
      <select id="Musician" name="Musician">
        <?php
        $host = '127.0.0.1'; //host address
        $user = 'tester'; //change to user name for database
        $pass = '1234outfd'; //change to password for database
        $dbName = 'MyTunes1.0'; // change to database name

        //create connection
        $connection = mysqli_connect($host, $user, $pass, $dbName);

        //test for failure
        if(mysqli_connect_errno()) {
          die("connection failed: "
            . mysqli_connect_error()
            . " (" . mysqli_connect_errno()
            . ")");
        }

        //get results from database
        $result = mysqli_query($connection,"SELECT Name,MusicianID FROM Musicians");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['MusicianID'];
          $name = $row['Name'];
          echo '<option value="'.$id.'">'.$name.'</option>';
        }
        ?>
      </select>
    </form>
  </body>
  </html>
