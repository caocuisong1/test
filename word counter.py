import os
import re

with open('Hamlet, Prince of Denmark.txt', encoding='utf-8') as file_obj:  #打开项目文件夹下的文件
    contents = file_obj.read() #读取文件的内容
    #print(contents)  #打印内容
words = []   #建立一个列表
word = ''   #建立一个空字符串
for char in contents:      #从contents中遍历，判断检测到的字符是不是字母或者数字，是就存到word中，不是就将之前word中的字符串存到列表并且清空字符串
    if ((char >= 'a' and char <= 'z') or (char >= 'A' and char <= 'Z') or (char >= '0' and char <= '9')):
        word += char
    else:
        if len(word) > 0:
            words.append(word)
            word = ''
            if len(word) > 0:      #判断word中是否还有单词未被添加到words中，如果有那么需要在循环结束后再添加一次
                words.append(word)


word_counts = {} #建立一个空字典

for word in words:
    if word not in word_counts:
        word_counts[word] = 1
    else:
        word_counts[word] += 1  # 按照出现次数从大到小排序输出
        sorted_word_counts = sorted(word_counts.items(),key=lambda x: x[1], reverse=True)
        #将以特定字母为开头的单词的数量从多到少排序，并将结果存储在sorted_word_dict中


word_dict = {} #建立一个空字典
for word in words:
    if word[0] not in word_dict:   # 如果该单词未被添加到字典中，则将其添加，并将其初始出现次数设置为1。
        word_dict[word[0]] = 1
    else:
        word_dict[word[0]] += 1
        sorted_word_dict = sorted(word_dict.items(), key=lambda x: x[1], reverse=True)  # 按照单词数从多到少排序
for letter, count in sorted_word_dict:
    print(letter + ':' + str(count))








'''
string = contents.lower()
string = string.replace("\n"," ")

#删除字符串内除了字母与空格的字符
newstring = ""
for i in string:
    if((i >= 'a' and i <= 'z') or i == ' '):
        newstring += i

#print(newstring)

words = newstring.split(sep=' ')
#将文章中的单词分离成单独的个体
#空格
Kongge = [""]
statisticsWords =["best"]
for i in words:
    if(not (i in Kongge)):
        statisticsWords.append(i)
print(len(statisticsWords))

#统计单词个数并保存到字典中
wordsDict = {}
for i in statisticsWords:
    if(not (i in wordsDict.keys())):
        wordsDict[i] = 1
    else:
        wordsDict[i] += 1
#print(wordsDict)
#我发现这么导出单词数量里空格是最多的，考虑是否可以去掉空格只统计单词

wordsDict = sorted(wordsDict.items(),key=lambda x:x[1],reverse=True)

statisticsDescribe = ""
for i in wordsDict:
    statisticsDescribe += str(i[0]) + " : " + str(i[1]) + '\n'
#print(statisticsDescribe)
word_count = {}

for statisticsWord in statisticsWords:
    first_letter = statisticsWord[0].lower()
    if first_letter in word_count :
        word_count [first_letter] += 1
    else:
        word_count [first_letter] = 1


while True:
    letter = input("请输入首字母（按空格退出）：")
    if letter == ' ':
        break

    if letter in word_count:
        print("以{}开头的单词数目为：{}".format(letter, word_count[letter]))
    else:
        print("没有以{}开头的单词".format(letter))

'''







