<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <?php
    $fullName = "Король Назарій Володимирович";
    $photo = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpAUnmYLsOz_IqvwB_EQu84fpgg1855WYUfg&usqp=CAU;";
    $requiredJobPosition = "Junior php-developer";
    $about ="Мені 21 рік. Студент 5-ого курсу Національного авіаційного університету за спеціальністю: \"Комп'ютерна інженерія \"";
    $requiredSalaryLevel = 500;
    $workExperience = 0.5;
    $placeOfResidence ="Камінь-Каширський, Волинська область";
    $readyToMove = true;
    $mail = "example@gmail.com";
    $telephone = "+380981357896";
    ?>
    <h1 class="fullName"> <?php echo $fullName; ?></h1>
    <div class="block-image">
        <img class="image" src="<?php echo $photo;?>" alt="Photo">
    </div>

    <div>
        <span> <?php echo $requiredJobPosition;?></span>
        <p class="about">
            <span><b>Коротко про мене</b> </span> <br>
            <?php
                echo <<<HEREDOC
                $about
                HEREDOC ;
            ?>
        </p>

        <p class="salary">
            <b>Бажаний рівень заробітної плати: </b>
            <?php
            echo $requiredSalaryLevel."$";
            ?>
        </p>

        <p class="work-experience">
            <b>Досвід роботи: </b>
            <?php
            echo $workExperience. "року";
            ?>
        </p>

        <p class="placeOfResidence">
            <b>Місце проживання: </b>
            <?php
            echo $placeOfResidence;
            ?>
        </p>

        <p class="readyToMove">
            <b>Готовність до переїзду: </b>
            <?php
                if ($readyToMove)
                    echo "готовий";
            ?>
        </p>

        <p class="mail">
        <b>Електронна пошта</b>
            <a href= "mailto:<?php echo $mail;?>"><?php echo $mail;?></a>

        </p>

        <p class="phone">
        <b>Мобільний телефон </b>
        <?php
            echo $telephone;
        ?>
        </p>
</div>
</body>
</html>

