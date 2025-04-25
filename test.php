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

$sql = "select fio, nomer_telefona from klienty order by id";
$result = pg_query($con, $sql);
if (!$result) {
    echo "Произошла ошибка.\n";
    print pg_last_error();
    exit;
}


$fio = trim($_REQUEST['fio']);
$nomer_telefona = trim($_REQUEST['nomer_telefona']);
$n = pg_num_rows($result);
for($i = 0; $i < $n; $i++)
{
    $row = pg_fetch_object($result);
    $curr_fio = $row->fio;
    $curr_nomer_telefona = $row->nomer_telefona;

    if ($curr_fio == $fio) {
        print "$fio";
    }
}

// if ($fio != '' && $nomer_telefona != '') {
//     print "Клиент: ".$fio."<br>";
//     print "Телефон: ".$nomer_telefona."<br>";

//     $sql = "insert into klienty (fio, nomer_telefona) values ('$fio', '$nomer_telefona')";
//     $result = pg_query($con, $sql);

//     if ($result) {
//         print "<p>✅ Добавлен</p>";
//     } else {
//         print "<p>❌ Ошибка</p>";
//     }
// } else {
//     print "Не полные данные";
// }

// print "<button>Ок</button>";

pg_close($con);

print "</body>";
print "</html>";

?>


