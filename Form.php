<?php
    $regions = [
            1 => 'Kyiv',
            2 => 'Odesa',
            3 => 'Lviv',
            4 => 'Donetsk',
            5 => 'Cherkasy',
    ];

    $fnameError = $lnameError = $cityError = $addressError = $birthdateError = '';
    $fname = $lname = $region = $city = $address = $birthdate = '';

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

    }

    if (isset($_POST['submit'])) {
        if ($fnameError == '' && $lnameError == '' && $cityError == '' && $addressError == '' && $birthdateError == '')
        {
            echo $fname . ' ' . $lname . ', ' . $birthdate . ', ' . $address . ', ' . 'was added to the system!';
        } else {
            echo 'Form is incorrect!';
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
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
  <body>
  <div class="container">
      <form action="/Form.php" method="POST">
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
              <input type="submit" name="submit" value="Submit">
          </div>
      </form>
  </div>
  </body>
</html>