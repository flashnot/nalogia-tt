<?php
set_time_limit(0);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Проверяет является ли второй параметр анаграммой (состоит из тех же чисел) первого
 * @param $num1
 * @param $num2
 * @return bool
 */
function isAnagramm($num1, $num2)
{
    $arr1 = str_split($num1);
    $arr2 = str_split($num2);

    sort($arr1);
    sort($arr2);

    $str1 =  implode('', $arr1);
    $str2 = implode('', $arr2);

    return strcasecmp($str1, $str2) == 0;
}

$multipliers = array(2, 3, 4, 5, 6);
$multipliersCount = count($multipliers);

// Основной алгоритм
// Перебираем натуральный ряд от 1 до 2147483647 (для 32-разрядной версии) и последовательно умножаем текущее число
// на каждый из заданных множителей. Если результат умножения для каждого множителя является анаграммой текущего числа,
// то - выводим результат

for ($num = 1; $num <= PHP_INT_MAX; $num++)  {

    $anagramms = array();

    foreach ($multipliers as $m) {
        $numAfterMultiplication = $num * $m;

        if (isAnagramm($num, $numAfterMultiplication)) {
            $anagramms[] = $numAfterMultiplication;

            if (count($anagramms) == $multipliersCount) {
                // текущее число является корректной анаграммой для всех множителей, значит, - это то, что мы искали
                echo $num, PHP_EOL;

                // не требовалось по заданию, но для простоты/наглядности проверки результата
                if (0
                    || !empty($argv) && is_array($argv) && in_array('verbose', $argv)
                    || !empty($_GET['verbose'])
                ) {
                    foreach ($anagramms as $i => $a) {
                        echo "\t x", $multipliers[$i], " = ", $a, PHP_EOL;
                    }
                }

                die();
            }
        } else {
            // для одного из множителей число не является анаграммой - поэтому, переходим к следующему
            // натуральному числу
            break;
        }
    }

}

echo "number not found :(", PHP_EOL;