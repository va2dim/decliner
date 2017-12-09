<?php

function translate(int $amount, $words)
{

    while (!is_null($key = key($words))) {

        if($amount == $key) {
            break;
        } elseif ($amount < $key) {
            if (prev($words) === false ) {
                end($words);
            }
            break;
        } else {
                if (next($words) === false ) {
                    end($words);
                    break;
                }
            }
    }

    $word = current($words);

    return $amount.' '.$word;
}

assert('0 детей' == translate(0, [1 => 'ребёнок',2 => 'ребёнка',5 => 'детей']));
assert('1 ребёнок' == translate(1, [1 => 'ребёнок',2 => 'ребёнка',5 => 'детей']));
assert('3 ребёнка' == translate(3, [1 => 'ребёнок',2 => 'ребёнка',5 => 'детей']));
assert('7 детей' == translate(7, [1 => 'ребёнок',2 => 'ребёнка',5 => 'детей']));

assert('1 child' == translate(1, [1 => 'child',2 => 'children']));
assert('9 children' == translate(9, [1 => 'child',2 => 'children']));


assert('1 glasses' == translate(1, [1 => 'glasses']));
assert('3 glasses' == translate(3, [1 => 'glasses']));

assert('1 очки' == translate(1, [1 => 'очки',2 => 'очков']));
assert('2 очков' == translate(2, [1 => 'очки',2 => 'очков']));
assert('7 очков' == translate(7, [1 => 'очки',2 => 'очков']));

assert('1 квїжік' ==  translate(1, [1 => 'квїжік',3 => 'квїжіт',6 => 'квїжім', 9 => 'квїжіф']));
assert('5 квїжіт' ==  translate(5, [1 => 'квїжік',3 => 'квїжіт',6 => 'квїжім', 9 => 'квїжіф']));
assert('7 квїжім' ==  translate(7, [1 => 'квїжік',3 => 'квїжіт',6 => 'квїжім', 9 => 'квїжіф']));
assert('10 квїжіф' ==  translate(10, [1 => 'квїжік',3 => 'квїжіт',6 => 'квїжім', 9 => 'квїжіф']));








