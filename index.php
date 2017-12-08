<?php


/**
 * @param $amount - кол-во эл-тов в категории
 * @param $nominative - название категории в именительном падеже ед./мн.ч.
 * @param $genetive - название категории в родительском падеже ед.ч.
 * @param $plural_genetive - название категории в родительском падеже мн.ч.
 * @return string
 *
 */
function translate($amount, $nominative = '', $genetive = '', $plural_genetive = '')
{

    $nd = strlen((string) $amount);
    $divModuleEnding = $amount % (10**($nd-1));

    if (((1 == $divModuleEnding) || (1 == $amount)) && (!((11 == $amount) || (11 == $divModuleEnding)))) {
        $word = $nominative;
    } else {
        if ((in_array($amount, range(2, 4)) || in_array($divModuleEnding,
              range(2, 4)))
          && (!(in_array($amount, range(11, 19)) || (in_array($divModuleEnding,
              range(11, 19)))))
        ) {
            if (!empty($genetive)) {
                $word = $genetive;
            } else {
                $word = $plural_genetive;
            }
        } else {
            $word = $plural_genetive;
        }
    }

    return $amount.' '.$word;
}


$category['ru'][] = ['ребенок', 'ребенка', 'детей'];
$category['ru'][] = ['очки', '', 'очков'];
$category['en'][] = ['child', '', 'children'];
$category['en'][] = ['glasses','','glasses'];

$category['es'][] = ['niño', '', 'niños'];
$category['es'][] = ['espectáculos', '', 'espectáculos'];


for ($i=1;$i<103;$i++) {
    echo "\n".translate($i, $category['ru'][0][0],$category['ru'][0][1],$category['ru'][0][2]);
}
for ($i=1;$i<10;$i++) {
    echo "\n".translate($i, $category['ru'][1][0],$category['ru'][1][1],$category['ru'][1][2]);
}

for ($i=1;$i<10;$i++) {
    echo "\n".translate($i, $category['en'][0][0], $category['en'][0][1], $category['en'][0][2]);
}
for ($i=1;$i<10;$i++) {
    echo "\n".translate($i, $category['en'][1][0], $category['en'][1][1], $category['en'][1][2]);
}

for ($i=1;$i<10;$i++) {
    echo "\n".translate( $i, $category['es'][0][0],$category['es'][0][1], $category['es'][0][2]);
}
for ($i=1;$i<10;$i++) {
    echo "\n".translate($i, $category['es'][1][0],$category['es'][1][1], $category['es'][1][2]);
}

