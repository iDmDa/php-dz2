<?php

//1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа,
// третий – операция. Обязательно использовать оператор return.

function arithmeticOperations($a, $b, $mathOperator)
{
    if ($mathOperator == 'plus') {
        return $a + $b;
    }
    if ($mathOperator == 'minus') {
        return $a - $b;
    }
    if ($mathOperator == 'multiply') {
        return $a * $b;
    }
    if ($mathOperator == 'divide') {
        return $a / $b;
    } else {
        return 0;
    }
};

//2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1,
//$arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения
//операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное
//значение (использовать switch).

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'plus':
            echo arithmeticOperations($arg1, $arg2, 'plus');
            break;
        case 'minus':
            echo arithmeticOperations($arg1, $arg2, 'minus');
            break;
        case 'multiply':
            echo arithmeticOperations($arg1, $arg2, 'multiply');
            break;
        case 'divide':
            echo arithmeticOperations($arg1, $arg2, 'divide');
            break;
        default:
            echo "Unknown operation";
    }
};

mathOperation(5, 8, 'multiply');
echo "<br>";
echo "<br>";

//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве
// значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива,
// чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область:
// Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

$cities = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Гатчина',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань',
        'Касимов',
        'Михайлов',
        'Новомичуринск'
    ]
];

foreach ($cities as $key => $value) {
    echo $key .": ";
    for($i = 0; $i < count($value); $i++) {
        echo $value[$i];
        if($i + 1 < count($value)) echo ", ";
    }
    echo ". ";
}
echo "<br>";
echo "<br>";

//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
//буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

$letters = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'yo', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'ch', 'ц' => 'cz',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
    ' ' => ' ', ',' => ',', '.' => '.',
    '!' => '!', '?' => '?', '-' => '-'
];

function translit($str)
{
    $arrStr = mb_str_split($str);
    $newString = '';
    global $letters;
    
    for ($i = 0; $i < count($arrStr); $i++) {
        foreach ($letters as $key => $value) {
            if (mb_strtolower($arrStr[$i]) == $key && mb_strtolower($arrStr[$i]) == $arrStr[$i]) {
                $newString .= $value;
            }
            if (mb_strtolower($arrStr[$i]) == $key && mb_strtolower($arrStr[$i]) != $arrStr[$i]) {
                $newString .= strtoupper($value);
            }
        }
    }
    return $newString;
}

$str = 'Съешь еще этих мягких французских булок, да выпей чаю';
echo translit($str);
echo "<br>";
echo "<br>";

//5. *С помощью рекурсии организовать функцию возведения числа в степень.
//Формат: function power($val, $pow), где $val – заданное число, $pow – степень.


function power(int $val, int $pow): int
{
    if ($pow <= 0) {
        return 1;
    }
    return power($val, $pow - 1) * $val;
}

echo "Результат возведения в степень - " . power(3, 4);
echo "<br>";
echo "<br>";

// 6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты.

function timeNow()
{
    $time = date("H:i");
    $timeToArray = explode(':', $time);
    if ($timeToArray[0] % 10 == 0 || $timeToArray[0] % 10 >= 5 && $timeToArray[0] % 10 <= 20) {
        $hours = ' часов ';
    }
    if ($timeToArray[0] == 1 || $timeToArray[0] == 21) {
        $hours = ' час ';
    }
    if ($timeToArray[0] % 10 >= 2 && $timeToArray[0] % 10 <= 4) {
        $hours = ' часа ';
    }

    if ($timeToArray[1] == 1 || $timeToArray[1] > 20 && $timeToArray[1] % 10 == 1) {
        $minute = ' минута';
    }
    if ($timeToArray[1] >= 2 && $timeToArray[1] <= 4 || $timeToArray[1] > 20 && ($timeToArray[1] % 10 >= 2 && $timeToArray[1] <= 4)){
        $minute = ' минуты';
    } else {
        $minute = ' минут';
    }

    $time = $timeToArray[0] . $hours . $timeToArray[1] . $minute;
    return $time;
}

echo timeNow();