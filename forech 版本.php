<?php 
$file = "Hamlet, Prince of Denmark.txt"; #读取
$content = file_get_contents($file);
#echo $content;
#取得content的长度
$len = 0;
for($i = 0;;$i++){
    if(isset($content[$len])){
        $len++ ;
    }
    else
    {
        break;

}
}
// 开始提取单词
$in_word = false;  // 是否在单词中
$word_list = array();  // 存储单词的数组
$word = '';  // 
$total_word = 0; #定义单词总数初始值为0

for ($i=0; $i<$len; ++$i) {
    // 取得当前字符
    
    $char = $content[$i];
    if (($char >= 'a' && $char <= 'z') || ($char >= '0' && $char <= '9')
    ||($char >= 'A' && $char <= 'Z')) 
    {
        // 如果是字母或数字，加入单词
        $word .= $char;
        $in_word = true;
    } elseif ($in_word) {
        // 如果不是字母或数字，且之前在单词中，则将单词加入结果数组
        $word_list[] = $word;
        $word = '';
        $in_word = false;
    }
}
#var_dump($word_list);
// 统计每个单词个数
$word_count = array(); #存储每个单词出现的次数
foreach ($word_list as $word) {
    if (isset($word_count[$word])) {   #判断word是否已经在word_count里面
        $word_count[$word]++; #如果word在word_count里面那么它的次数就加一
    } else {
        $word_count[$word] = 1;#如果之前不在word_count里面那么就给他记录为1
    }
}
    
    foreach ($word_list as $word) {
        $total_word ++; // 每遍历到一个单词，总数加1
    }
echo "Total words: $total_word\n";

// 输出每个字母开头的单词数量
$first_letters = array(); #存储每个首字母
foreach ($word_list as $word) {
    $first_letter = strtolower($word[0]); #取得单词的首字母并转换为小写
    if (isset($first_letters[$first_letter])) {
     $first_letters[$first_letter]++; #单词的首字母已经在数组里面，对应的值加一
     } else {
     $first_letters[$first_letter] = 1; #单词的首字母不在数组里面，对应的值记录为1
     }
    }
arsort($first_letters);#根据关联数组的值，对数组进行降序排列
#var_dump ($first_letters);
#按照首字母进行输出
foreach ($first_letters as $letter => $count) {
    
    echo "$letter: $count\n";
    }

?>