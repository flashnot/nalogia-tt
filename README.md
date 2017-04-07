# Тестовое задание PHP:
Число 128574 примечательно тем, что, будучи удвоенным, образует число 257148, которое состоит из тех же цифр, только в другом порядке.

Напишите программу, которая находит и выводит минимальное натуральное число, которое, будучи умноженным на 2, 3, 4, 5 и 6, образует числа, состоящие из тех же цифр, что и исходное.

# Результат тестового задания PHP:
Реализован алгоритм с примерной (худшей) сложностью O(n). Перебираем натуральный ряд от 1 до 2147483647 (для 32-разрядной версии) и последовательно умножаем текущее число на каждый из заданных множителей. Если результат умножения для каждого множителя является анаграммой текущего числа, то - выводим результат.

# Ремарки:
Предполагается, что
* скрипт будет вызываться из консоли примерно вот так `php -f anagramms.php`
* доступен параметр `verbose`, при котором программа также выведет значения анаграмм `php -f anagramms.php verbose`
* возможен запуск через браузер (также с возможностью передать параметр `verbose`) c `anagramms.php?verbose=1`
* код писался в рамках тестового задания (т.е. были идеи реализовать 2 метода isAnagramm и search и уже из вызывать в основном потоке программы ИЛИ же вынести эти методы вообще в отдельный класс для некой такой группировки функциональности), но было решено не мудрить а выбрать некий такой компромисс между функциональностью и читаемостью, т.е. присланное решение оформленно именно так, потому что я посчитал, что городить тут ООП будет излишне)

# Ремарки по тестовому заданию SQL:
В файле `query.sql` в данном репозитории Вы найдёте 2 sql запроса, которые делают одно и тоже - выводят результат согласно заданию.

По сути это одинаковые решения, однако одно из них (вариант с SELECT в WHERE) является худшей версией первого запроса.

В первом случае мы 1 запросом выбираем для каждого склада/категории товара последнюю дату прихода - т.е. формируем временную таблицу а потом уже, грубо говоря, подставляем количество товара пришедшее в это время. Тогда как во 2м случае мы для каждой строки делаем подзапрос, что ни есть хорошо. Но я прислал 2 варианта - просто для демонстрации того, что я понимаю как можно сделать и как можно сделать лучше (хотя здесь это довольно очевидно и банально).
