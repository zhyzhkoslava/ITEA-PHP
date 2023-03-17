<?php
$name = 'Viacheslav Zhyzhko';
$photoURL = 'https://marketplace.canva.com/EAFEits4-uw/1/0/1600w/canva-boy-cartoon-gamer-animated-twitch-profile-photo-oEqs2yqaL8s.jpg';
$vacancy = 'Laravel Developer';
$info = <<<IDENTIFIER
                <h2 style="color:blue;">CAREER OBJECT:</h2>
                Want to be the part of a software developer organization and utilize my knowledge,Skills
                and expertise to contribute<br> towards organization and professional
                brilliance and to learn more with the passage of time from all<br>
                types of situations and circumstances.
                IDENTIFIER;
$salary = 5000;
$experience = 2.5;
$city = 'Kyiv';
$relocation = true;
$mail = 'zhizhkoslava@gmail.com';
$phone = '063-617-35-66';
$skills = ['PHP', 'SQL', 'Laravel', 'NGINX'];
$time = date('H');
if ($time > 6 && $time < 18){
    $dayTimeClass = 'day';
} else {
    $dayTimeClass = 'night';
}
?>

<!DOCTYPE html>
<html>
<?php include_once 'header.php'; ?>
<body class="<?php echo $dayTimeClass; ?>">
<h1><b><?php echo $name ?></b></h1>
<address style="color:red;"><?php echo $vacancy ?></address>
<img width="250px" height="250px" src="<?php echo $photoURL ?>">
<?php echo $info; ?>
<h3>Salary: <?php echo $salary; ?></h3>
<h3>Experience: <?php echo $experience; ?> years</h3>
<h3>City: <?php echo $city; ?></h3>
<h3>Ability to Relocate: <input type="checkbox"<?php if ($relocation === true) echo 'checked' ?>></h3>
<h3>Phone: <?php echo $phone; ?></h3>
<h3>Mail: <?php echo $mail; ?></h3>
<h3>Skills: <?php
        foreach ($skills as $skill)
        {
            echo $skill . ' ';
        }
    ?></h3>
</body>
<?php include_once 'footer.php'; ?>
</html>


