<?php

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
    {
        $link = mysqli_connect('localhost', 'root', 'a3s2s29jt6', '');

        if (!$link) {
            die("Cannot connect to mysql server". mysqli_connect_error());
        }

        $id = trim(htmlspecialchars($_GET['id']));

        $sql = "SELECT * from user.users WHERE id = $id";
        $res = mysqli_query($link, $sql);
        if (!$res) {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        } else {
            $data = mysqli_fetch_assoc($res);
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
        }

        mysqli_close($link);

    }


    $regions = [
            0 => '',
            1 => 'Kyiv',
            2 => 'Odesa',
            3 => 'Lviv',
            4 => 'Donetsk',
            5 => 'Cherkasy',
    ];

    $fnameError = $lnameError = $cityError = $addressError = $birthdateError = $fileError = '';
    $fname = $lname = $region = $city = $address = $birthdate = $file = '';

    function validateLength($param)
    {
        if ( (strlen($param) < 2) || (strlen($param) > 32) )
        {
            return false;
        } else {
            return true;
        }
    }

    function validateBirthdate($birthdate)
    {
        $birthdate1 = new DateTime($birthdate);
        $birthdateMax = new DateTime('tomorrow');
        $birthdateMin = new DateTime('1900-01-01');

        if ( ($birthdate1 > $birthdateMax) || ($birthdate1 < $birthdateMin) )
        {
            return false;
        } else {
            return true;
        }
    }

    function tirm_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (isset($_POST['theme'])){
            setcookie('theme', $_POST['theme'], time() + 360);
        }
        $fname = tirm_input($_POST['fname']);
        $lname= tirm_input($_POST['lname']);
        $region = tirm_input($_POST['region']);
        $city = tirm_input($_POST['city']);
        $address = tirm_input($_POST['address']);
        $birthdate = tirm_input($_POST['birthdate']);

        if (!validateLength($fname))
        {
            $fnameError = 'Enter correct First Name field!';
        }

        if (!validateLength($lname))
        {
            $lnameError = 'Enter correct Last Name field!';
        }

        if (!validateLength($city))
        {
            $cityError = 'Enter correct City field!';
        }

        if (!validateBirthdate($birthdate))
        {
            $birthdateError = 'Enter correct Birthday field!';
        }

        if (!validateLength($address))
        {
            $addressError = 'Enter correct Address field!';
        }

        if($_FILES['file']['error'] > 0 ){
            $fileError =  'There is problem in file upload';
        } else {
            $whiteList = ['image/jpeg', 'image/gif', 'image/png'];

            if (!in_array($_FILES['file']['type'], $whiteList)){
                $fileError =  'Choose correct file type';
            }else {
                $fileName = $_SERVER['DOCUMENT_ROOT'] . '/images/' . $_FILES['file']['name'];
                $fileNameShort = '/images/' . $_FILES['file']['name'];
                if (move_uploaded_file($_FILES['file']['tmp_name'], $fileName))
                {
                    echo 'File ' . $_FILES['file']['name'] . ' uploaded!'.PHP_EOL;
                }
            }
        }

        if (isset($_POST['submit'])) {
            if ($fnameError == '' && $lnameError == '' && $cityError == '' && $addressError == '' && $birthdateError == '' && $fileError == '')
            {
                $link = mysqli_connect('localhost', 'root', 'a3s2s29jt6', '');

                if (!$link) {
                    die("Cannot connect to mysql server". mysqli_connect_error());
                }

                $sql = "INSERT INTO user.users (fname, lname, region, city, address, birthdate, fileUrl)
                    VALUES ('$fname', '$lname', '$region', '$city', '$address','$birthdate', '$fileName')";

                if (mysqli_query($link, $sql)) {
                    echo "New record created successfully".PHP_EOL;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }

                mysqli_close($link);

                echo $fname . ' ' . $lname . ', ' . $birthdate . ', ' . $address . ', ' . 'was added to the system!'.PHP_EOL;
            } else {
                echo 'Form is incorrect!';
            }
        }

    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .white{
            background-color: #fff5d9;
        }
        .dark{
            background-color: #2b2a28;
        }
        .error {
            color: red;
        }
        /* Style inputs, select elements and textareas */
        input[type=text], select, textarea{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        /* Style the label to display next to the inputs */
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        /* Style the container */
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        /* Floating column for labels: 25% width */
        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        /* Floating column for inputs: 75% width */
        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
  </head>
  <body class="<?php echo !empty($_COOKIE['theme']) ? 'white' : 'dark'?>">
  <div class="container">
      <form action="/Form.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-25">
                  <label for="fname">First Name</label>
              </div>
              <div class="col-75">
                  <input type="text" id="fname" name="fname" placeholder="Your name.." value="<?php echo $_POST['fname'] ?? ''; ?>" required>
                  <span class="error"><?php echo $fnameError; ?></span>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="lname">Last Name</label>
              </div>
              <div class="col-75">
                  <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $_POST['lname'] ?? ''; ?>" required>
                  <span class="error"><?php echo $lnameError; ?></span>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="region">Region</label>
              </div>
              <div class="col-75">
                  <select id="region" name="region" required>
                      <?php foreach ($regions as $key => $value)
                          echo "<option value=$key>$value</option>"
                      ?>
                  </select>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="city">City</label>
              </div>
              <div class="col-75">
                  <input type="text" id="city" name="city" placeholder="Your city.." value="<?php echo $_POST['city'] ?? ''; ?>" required>
                  <span class="error"><?php echo $cityError; ?></span>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="address">Address</label>
              </div>
              <div class="col-75">
                  <textarea id="address" name="address" placeholder="Write address.." style="height:200px" required><?php echo $_POST['address'] ?? ''; ?></textarea>
                  <span class="error"><?php echo $addressError; ?></span>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="birthdate">Birthdate</label>
              </div>
              <div class="col-75">
                  <input type="date" id="birthdate" name="birthdate" placeholder="Your birthdate.." value="<?php echo $_POST['birthdate'] ?? '' ?>" required>
                  <span class="error"><?php echo $birthdateError; ?></span>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="theme">Theme</label>
              </div>
              <div class="col-75">
                  <input type="radio" id="white" name="theme" value="White" checked>
                  <label for="white">White</label>
                  <input type="radio" id="dark" name="theme" value="Dark">
                  <label for="dark">Dark</label>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="birthdate">File</label>
              </div>
              <div class="col-75">
                  <input type="file" id="file" name="file" placeholder="Your file.." value="<?php echo $_POST['file'] ?? '' ?>" required>
                  <?php
                    if (@file_exists($fileName)){
                        echo "<img src=$fileNameShort alt='Uploaded img' width='150' height='150'>";
                    };
                  ?>
                  <span class="error"><?php echo $fileError; ?></span>
              </div>
          </div>
          <div class="row">
              <input type="submit" name="submit" value="Submit">
          </div>
      </form>
  </div>
  </body>
</html>