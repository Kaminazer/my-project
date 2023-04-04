<?php
include 'validFunction.php';
    $region =[
        "Автономна республіка Крим",
        "Волинська область",
        "Вінницька область",
        "Дніпропетровська область",
        "Донецька область",
        "Житомирська область",
        "Закарпатська область",
        "Запорізька область",
        "Івано-Франківська область",
        "Київська область",
        "Кіровоградська область",
        "Луганська область",
        "Львівська область",
        "Миколаївська область",
        "Одеська область",
        "Польавська область",
        "Рівненська область",
        "Сумська область",
        "Тернопілька область",
        "Харківська область",
        "Херсонська область",
        "Хмельницька область",
        "Чернігівська область",
        "Черкаська область",
        "Чернівецька область",
    ];
    $hideForm = false;
    $status = [];
    $errors = [];
    $validData = [];
    $validRegionValue = "Оберіть один із пунктів";
    $user = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = [
            "firstName" => filter($_POST["firstName"]),
            "lastName" => filter($_POST["lastName"]),
            "region" => (int)filter($_POST["region"]),
            "city" => filter($_POST["city"]),
            "address" => filter($_POST["address"]),
            "birthDate" => filter($_POST["birthDate"]),
        ];

        if (validLength($user['firstName'])) {
            $status['name'] = 'correct';
            $validData[] = $user['firstName'];
        } else {
            $errors[] = "Ім'я має складатимися мінімум із 2, а максимум із 32 символів";
            $status['name'] = 'error';
            $validData[] ="";
        }

        if (validLength($user['lastName']) && validLastName($user['lastName'])) {
            $status['lastName'] = 'correct';
            $validData[] = $user['lastName'];
        } else {
            $errors[] = "Прізвище має складатимися мінімум із 2, а максимум із 32 символів";
            $status['lastName'] = 'error';
            $validData[] ="";
        }

        $validRegion = array_key_exists($user['region'], $region);
        if (!$validRegion || $_POST['region'] === "" ){
            $errors[] = "Виберіть область";
            $status['region'] = 'error';
            $validData[] ="";
        } else {
            $status['region'] = 'correct';
            $validData[] = $user['region'];
            $validRegionValue = $region[$user['region']];
        }

        if (validCity($user['city']) && validLength($user['city'])) {
            $status['city'] = 'correct';
            $validData[] = $user['city'];
        } else {
            $errors[] = "Місто може складатимися максимум із двох слів розділених комою або 
            тире та містити від 2 до 32 символів";
            $status['city'] = 'error';
            $validData[] ="";
        }

        if (!empty($user['address'])){
            $status['address'] = 'correct';
            $validData[] = $user['address'];
        } else {
            $errors[] = "Введіть адресу";
            $status['address'] = 'error';
            $validData[] ="";
        }

        if (validDate($user['birthDate'])) {
            $status['date'] = 'correct';
            $validData[] = $user['birthDate'];
        } else {
            $errors[] = "Діапазон допустиих років від 1900 до 2023";
            $status['date'] = 'error';
            $validData[] ="";
        }

        if (!empty($_FILES["avatar"])) {
            $blacklist = ['.php', '.phtml', '.php3', '.php4'];
            $errorFile = false;
            foreach ($blacklist as $ext) {
                if (str_contains($_FILES['avatar']['name'], $ext)) {
                    $errorFile = true;
                    $errors[] = "Обрано недопустимий формат файлу , а саме .php, .phtml, .php3, .php4";
                    $status['avatar'] = 'error';
                }
            }
            if (!$errorFile) {
                $fileName = $_SERVER['DOCUMENT_ROOT'] . "/image/" . $_FILES["avatar"]["name"];
                if (!(move_uploaded_file($_FILES["avatar"]["tmp_name"], $fileName))) {
                    $errors[] = "Невдалося перемістити файл";
                }
            }
        }

        if (!empty($errors)){
            foreach ($errors as $error) {
                echo "<p> $error </p>";
            }
        } else {
            $hideForm = true;
            $image = "/image/" . $_FILES["avatar"]["name"];
            echo "<img  class =\"image\" src = \"$image\" alt='avatar'>";
            echo "<p>Користувач: " .$user['firstName']
                ." "
                .$user['lastName']
                ." "
                .$user['birthDate']
                ." року народження, що проживає за адресою: "
                .$region[$user['region']]
                .", місто "
                .$user['city']
                .", "
                .$user['address']
                ." був успішно доданий у систему.</p>";
        }
    }
?>
<html lang="ua">
    <head>
        <title>Create new user </title>
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body>
    <?php if (!$hideForm) { ?>
        <h1>Create new user</h1>
        <form action="form.php" method="post" enctype="multipart/form-data">
            <label for="POST-name">Ім'я</label><br>
            <input class="<?php echo $status['name'];?>" id="POST-name" type="text" name="firstName"
                   value="<?php echo $validData[0];?>"><br> <br>

            <label for="POST-firstName">Прізвище</label><br>
            <input class="<?php echo $status['lastName'];?>" id="POST-firstName" type="text" name="lastName"
                   value="<?php echo $validData[1];?>"><br> <br>

            <label for="POST-region">Область</label><br>
            <select class="<?php echo $status['region'];?>" id="POST-region" name="region" >
                <option value="<?php echo $validData[2];?>"><?php echo $validRegionValue;?></option>
                <?php
                foreach ($region as $key => $value) {
                    echo "<option value=\"$key\">$value</option> ";
                }
                ?>
            </select>
            <br><br>

            <label for="POST-city">Місто</label><br>
            <input class="<?php echo $status['city'];?>" id="POST-city" type="text" name="city"
                   value="<?php echo $validData[3];?>"><br><br>

            <label for="POST-address">Адреса</label><br>
            <input class="<?php echo $status['address'];?>" id="POST-address" type="text" name="address"
                   value="<?php echo $validData[4];?>"><br> <br>

            <label for="POST-date">Дата народження</label><br>
            <input class="<?php echo $status['date'];?>" id="POST-date" type="date" name="birthDate"
                   value="<?php echo $validData[5];?>"><br> <br>
            <input class="<?php echo $status['avatar'];?>" type="file" name="avatar"> <br><br>

            <input type="submit" name="submit" value="Створити користувача">
        </form>
    <?php }?>
    </body>
</html>
