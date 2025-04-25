<?php
print "<html>";
print "<head>";
print '<link rel="stylesheet" href="style.css">';
print "<title>";
print "Товары";
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

print "<h1>Список товаров:</h1>"."<br>";
$sql = "select * from tovary order by id";
$result = pg_query($con,$sql);
//print $result;

print "<table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>";

$n = pg_num_rows($result);
for($i = 0; $i < $n; $i++)
{
    $row=pg_fetch_object($result);
    $id =  $row->id;
    $nazvanie = $row->nazvanie;
    $cena = $row->cena;
    
    print "<tr>
            <td>$id</td>
            <td>$nazvanie</td>
            <td>$cena</td>
        </tr>";
}
print "</table>";

pg_close($con);
?>
