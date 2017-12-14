<?php
header("Content-Type: text/html; charset=utf-8");
ini_set('display_errors', 1);
include 'Object.php';
include 'Ingridients.php';
include 'Pizza.php';
?>
    <form method="post">
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="text" name="price">
        <button type="submit">Отправить</button>
    </form>
<?php
var_dump($_POST);
$oPizza = new Pizza([
    'name' => 'Вкусная',
    'description' => 'Точно вкусная'
]);
$dsn = 'mysql:dbname=pizza;host=localhost';
$user = 'root';
$password = '';
$oPDO = new PDO($dsn, $user, $password);

$oQuery = $oPDO->query('SELECT * FROM pizza');
//$oQuery = $oPDO->query('SELECT * FROM ing WHERE id=1 OR id=2 ');


$oQuery->execute();
var_dump(Ingridients::makeIngridients($oQuery->fetchAll(PDO::FETCH_ASSOC)));

//$oIngridient1 = new Ingridients($_POST);

//var_dump($oIngridient1);


//$oPizza
  //  ->addtIngridient($oIngridient1);




