<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <h1>Замеры</h1>
    <h1>Отделение 1.1</h1>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            Выбор отделения
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" >Отделение</a>
            <a class="dropdown-item" href="#" >Отделение</a>
            <a class="dropdown-item" href="#" >Отделение</a>
        </div>
    </div>

    <br>
    <br>
    <br>

    <table class="table table-striped table-hover table-bordered" style="text-align: center">
        <thead>
        <tr>
            <th scope="col" style="width: 10rem"></th>
            <th scope="col" colspan="3">Капельница</th>
            <th scope="col" colspan="3">Дренаж</th>
            <th scope="col" colspan="2">Мат</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">№ клапана</th>
            <td>Объем</td>
            <td>EC</td>
            <td>pH</td>
            <td>Объем</td>
            <td>EC</td>
            <td>pH</td>
            <td>EC</td>
            <td>pH</td>
        </tr>
        <?php
        $mysql = new mysqli("localhost", "root", "root", "skolkovo");
        $mysql->query("SET NAMES 'utf8'");

        $compartment = "compartment_1_1";
        $result = $mysql->query("SELECT * FROM `$compartment`");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                '<tr>';
                foreach ($row as $key => $value) {
                    echo '
                            <td>
                              <a>' . $value . '</a>
                            </td>
                          ';
                }
                '</tr>';
            }
        }
        $mysql->close();
        ?>
        <tr>
            <form method="POST" action="">
                <td>
                    <input name="num" type="text" placeholder="Номер"/>
                </td>
                <td>
                    <input name="dropper_volume" type="text" placeholder="Объем"/>
                </td>
                <td>
                    <input name="dropper_EC" type="text" placeholder="EC"/>
                </td>
                <td>
                    <input name="dropper_pH" type="text" placeholder="pH"/>
                </td>
                <td>
                    <input name="drainage_volume" type="text" placeholder="Объем"/>
                </td>
                <td>
                    <input name="drainage_EC" type="text" placeholder="EC"/>
                </td>
                <td>
                    <input name="drainage_pH" type="text" placeholder="pH"/>
                </td>
                <td>
                    <input name="mat_EC" type="text" placeholder="EC"/>
                </td>
                <td>
                    <input name="mat_pH" type="text" placeholder="pH"/>
                    <br>
                    <input type="submit" value="Отправить"/>
                </td>
            </form>
        </tr>
        </tbody>
    </table>
    <?php
    $mysql = new mysqli("localhost", "root", "root", "skolkovo");
    $mysql->query("SET NAMES 'utf8'");

    $num = $_POST['num'];
    $dropper_volume = $_POST['dropper_volume'];
    $dropper_EC = $_POST['dropper_EC'];
    $dropper_pH = $_POST['dropper_pH'];
    $drainage_volume = $_POST['drainage_volume'];
    $drainage_EC = $_POST['drainage_EC'];
    $drainage_pH = $_POST['drainage_pH'];
    $mat_EC = $_POST['mat_EC'];
    $mat_pH = $_POST['mat_pH'];

    $mysql->query("INSERT INTO `$compartment` (`num`,`dropper_volume`,`dropper_EC`,`dropper_pH`,
                   `drainage_volume`,`drainage_EC`,`drainage_pH`,`mat_EC`,`mat_pH`)
                   VALUES('$num', '$dropper_volume', '$dropper_EC', '$dropper_pH', '$drainage_volume'
                   '$drainage_EC', '$drainage_pH', '$mat_EC', '$mat_pH')");
    ?>
</div>
</body>
</html>