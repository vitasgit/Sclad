<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Добавить клиента</title>
</head>
<body>
    <a href="index.php">Главная</a> <br><br>
    <p>Добавление клиента: </p>
    
    <form method="post" action="dobavit_klienta.php">
        <label for="fio">ФИО</label>
        <input type="text" name="fio" placeholder="Введите имя"> <br>

        <label for="">Телефон</label>
        <input type="tel" name="nomer_telefona" placeholder="Введите телефон"> <br>

        <input name='btn' type='submit' value='Добавить' title='кнопка добавление клиента'>
    </form>
</body>
</html>
