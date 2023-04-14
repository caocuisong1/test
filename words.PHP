<?php 
$file = "Hamlet, Prince of Denmark.txt";
$content = file_get_contents($file);

// 获取 $content 的长度
$len = 0;
$i = 0;
while (isset($content[$len])) {
    $len++ ;
    $i++;
}

// 开始提取单词
$in_word = false;
$word_list = array();
$word = '';
$total_word = 0;

$i = 0;
while ($i < $len) {
    $char = $content[$i];
    if (($char >= 'a' && $char <= 'z') || ($char >= '0' && $char <= '9') || ($char >= 'A' && $char <= 'Z')) {
        $word .= $char;
        $in_word = true;
    } elseif ($in_word) {
        $word_list[] = $word;
        $word = '';
        $in_word = false;
    }
    $i++;
}

// 统计每个单词个数
$word_count = array();
$i = 0;
while ($i < count($word_list)) { 
    if (isset($word_count[$word_list[$i]])) {
        $word_count[$word_list[$i]]++;
    } else {
        $word_count[$word_list[$i]] = 1;
    }
    $i++;
}

$total_word = count($word_list);
echo "Total words: $total_word\n";

$first_letters = array();
$i = 0;
while ($i < count($word_list)) {
    $word = $word_list[$i];
    if (!empty($word)) {
        $first_letter = strtolower($word[0]);
        if (isset($first_letters[$first_letter])) {
            $first_letters[$first_letter]++;
        } else {
            $first_letters[$first_letter] = 1;
        }
    }
    $i++;
}

$keys = array_keys($first_letters);
$values = array_values($first_letters);
arsort($first_letters);
$i = 0;
while ($i < count($keys)) {
    echo $keys[$i] . ": " . $values[$i] . "\n";
    $i++;
}
?>