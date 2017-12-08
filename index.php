<?php

/**
 * @param string $lang - язык категории
 * @param $items_amount - кол-во эл-тов в категории
 * @param $word_single - название категории в ед.ч.
 * @param $word_plural - название категории в множ.ч.
 * @return string
 *
 */
function translate($lang, $items_amount, $word_single, $word_plural)
{

    $amount = $items_amount;

    $ending['ru'] = ['ка'];


    $amount_str = (string) $amount;
    $l = strlen($amount_str);
    if ($l > 2) {
        $amount_str = substr($amount_str,-2+$l, strlen($amount_str));
        $amount = (int) $amount_str;
    }

    $divModuleEnding = $amount % 10;

    if(('ru' == $lang) && (substr($word_single,0,2) != substr($word_plural,0,2) )) {
        if (((1 == $divModuleEnding) || (1 == $amount)) && (!((11 == $amount) || (11 == $divModuleEnding)))) {
            $word = $word_single;
        } else {
            if ((in_array($amount, range(2, 4)) || in_array($divModuleEnding,
                  range(2, 4)))
              && (!(in_array($amount, range(11, 19)) || (in_array($divModuleEnding,
                  range(11, 19)))))
            ) {
                $word = $word_single . $ending[$lang][0];
            } else {
                $word = $word_plural;
            }
        }
    } else {
        if (1 == $amount) {
            $word = $word_single;
        } else {
            $word = $word_plural;
        }
    }



    var_dump($items_amount.' '.$word);
    //die;

    return $items_amount.' '.$word;
}


$category['ru'][] = ['ребенок', 'детей'];
$category['ru'][] = ['очки', 'очков'];
$category['en'][] = ['child', 'children'];
$category['en'][] = ['glasses','glasses'];

$category['es'][] = ['niño', 'niños'];
$category['es'][] = ['espectáculos', 'espectáculos'];


for ($i=1;$i<10;$i++) {
    translate('ru', $i, $category['ru'][0][0],$category['ru'][0][1]);
}
for ($i=1;$i<10;$i++) {
    translate('ru', $i, $category['ru'][1][0],$category['ru'][1][1]);
}
for ($i=1;$i<10;$i++) {
    translate('en', $i, $category['en'][0][0], $category['en'][0][1]);
}

for ($i=1;$i<10;$i++) {
    translate('es', $i, $category['es'][0][0],$category['es'][0][1]);
    //translate('en', $i, $category['en'][1][0],$category['en'][1][1]);
}
