<form method="GET">
    <h4>Podaj kwotę w PLN i wybierz walutę na którą chcesz wymienić:</h4>
    <input type=number step=0.01 min=0 name="pln" placeholder="0.00"><br>
    <input type="radio" name="waluta" value="EUR"> EUR<br>
    <input type="radio" name="waluta" value="USD"> USD<br>
    <input type="radio" name="waluta" value="CHF"> CHF<br><br>
    <button type="submit">Zamień</button><br><br>
</form>


<?php
// Wyświetl kursy walut
echo "Kursy:<br>";

foreach($codes as $code => $value){
    echo $code . ' ' . $value. '<br>';
}

echo '<br><br>';

if (isset($_GET['pln']) && isset($_GET['waluta'])){
    $wal = $_GET['waluta'];
    $pln = $_GET['pln'];
    $exchanged = 0.00;
    if($wal == 'EUR'){
        $exchanged = round(($pln / $codes['EUR']), 2, PHP_ROUND_HALF_DOWN);
        echo '<h4>Po wymianie ' . $pln . ' PLN dostaniesz ' . $exchanged . ' EURO.</h4><br>';
    } elseif ($wal == "USD"){
        $exchanged = round(($pln / $codes['USD']), 2, PHP_ROUND_HALF_DOWN);
        echo '<h4>Po wymianie ' . $pln . ' PLN dostaniesz ' . $exchanged . ' USD.</h4><br>';
    } else {
        $exchanged = round(($pln / $codes['CHF']), 2, PHP_ROUND_HALF_DOWN);
        echo '<h4>Po wymianie ' . $pln . ' PLN dostaniesz ' . $exchanged . ' CHF.</h4><br>';
    } 
}
?>