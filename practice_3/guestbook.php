<?php
// TODO 1: PREPARING ENVIRONMENT: 1) session 2) functions
session_start();

// TODO 2: ROUTING

// TODO 3: CODE by REQUEST METHODS (ACTIONS) GET, POST, etc. (handle data from request): 1) validate 2) working with data source 3) transforming data

if (!empty($_POST)){
    $jsonString = json_encode ($_POST); // Перетворимо масив в json -рядок

    var_dump($jsonString);

    $fileStream = fopen("file.csv", 'a'); // Відкрити (і створити) файл
    fwrite($fileStream , $jsonString . "\n"); // записати json- рядок в кінець файлу
    fclose ($fileStream ); // Закрити файл
}

// TODO 4: RENDER: 1) view (html) 2) data (from php)

?>

<!DOCTYPE html>
<html>

<?php require_once 'sectionHead.php' ?>

<body>

<div class="container">

    <!-- navbar menu -->
    <?php require_once 'sectionNavbar.php' ?>
    <br>

    <!-- guestbook section -->
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            GuestBook form
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">

                 <!-- TODO: create guestBook html form   -->
                    <form method="post" action="guestbook.php">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="text" name="comment" placeholder="Comment" required>
                        <button>Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Сomments
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                    <!-- TODO: render guestBook comments   -->
                    <?php
                        if (!file_exists ("file.csv")) // Перевіряє, що файл існує
                        {
                            return;
                        }
                            $fileStream = fopen("file.csv", "r"); // відкриває файл

                            while (!feof($fileStream))// йде по файлу, поки не буде досягнуто кінця
                            {
                                $jsonString = fgets($fileStream ); // отримує черговий рядок файлу
                                $array = json_decode($jsonString , true); // Перетворює рядок в масив

                                if ( empty ($array)) break ; // якщо немає даних, то кінець файлу та зупинка

                                echo $array['name'];
                                echo "<br>";
                                echo $array['comment']; // вивести значення за ключем
                                echo "<br>";
                            }

                            fclose ($fileStream ); // Закрити файл
                    ?>

                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
