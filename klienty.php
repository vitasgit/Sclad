<?php
print "<html>";
print "<head>";
print '<link rel="stylesheet" href="style.css">';
print "<title>";
print "Клиенты";
print "</title>";
print "</head>";
print "<body>";
print '<a href="index.php">Главная</a>';

$con = pg_connect('host=localhost port=5432 dbname=sclad user=postgres password=123456');
if (!$con) {
    echo "Произошла ошибка соединения.\n";
    print pg_last_error();
    exit;
}

print "<h1>Список клиентов:</h1>"."<br>";
$sql = "select * from klienty order by id";
$result = pg_query($con, $sql);
if (!$result) {
    echo "Произошла ошибка.\n";
    print pg_last_error();
    exit;
}

$n = pg_num_rows($result);

print "<table>
        <tr>
            <th>id</th>
            <th>ФИО</th>
            <th>Номер</th>
        </tr>";

for($i = 0; $i < $n; $i++)
{
    $row = pg_fetch_object($result);
    $id =  $row->id;
    $fio = $row->fio;
    $nomer_telefona = $row->nomer_telefona;
    
    print "<tr>
            <td>$id</td>
            <td>$fio</td>
            <td>$nomer_telefona</td>
        </tr>";
}
print "</table>";

pg_close($con);
?>
