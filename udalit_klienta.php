<?php
print "<html>";
print "<head>";
print '<link rel="stylesheet" href="style.css">';
print "<title>";
print "Добавление клиента";
print "</title>";
print "</head>";
print "<body>";
print '<a href="index.php">Главная</a><br><br>';

$con = pg_connect('host=localhost port=5432 dbname=sclad user=postgres password=123456');
if (!$con) {
    echo "Произошла ошибка соединения.\n";
    print pg_last_error();
    exit;
}

$fio = trim($_REQUEST['fio']);
$nomer_telefona = trim($_REQUEST['nomer_telefona']);

if ($fio != '' && $nomer_telefona != '') {
    print "Клиент: ".$fio."<br>";
    print "Телефон: ".$nomer_telefona."<br>";

    $sql = "delete from klienty where nomer_telefona='$nomer_telefona'";
    $result = pg_query($con, $sql);

    if ($result) {
        print "<p>✅ Удален</p>";
    } else {
        print "<p>❌ Ошибка</p>";
    }
}
else {
    print "Не полные данные";
}

print "<button>Ок</button>";

pg_close($con);

print "</body>";
print "</html>";

?>


