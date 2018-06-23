// 给定一个字符串如：“abaasdffggghhjjkkgfddsssss3444343”问题如下： 
// 1、 字符串的长度
// 2、 取出指定位置的字符，如：0,3,5,9等
// 3、 查找指定字符是否在以上字符串中存在，如：i，c ，b等
// 4、 替换指定的字符，如：g替换为22,ss替换为b等操作方法
// 5、 截取指定开始位置到结束位置的字符串，如：取得1-5的字符串
// 6、 找出以上字符串中出现次数最多的字符和出现的次数
// 7、 遍历字符串，并将遍历出的字符两头添加符号“@”输出至当前的文档页面。

var zuoye = "abaasdffggghhjjkkGfddssSSs3444343";
// 1、 字符串的长度
console.log(zuoye.length);
// 2、 取出指定位置的字符，如：0,3,5,9等
console.log(zuoye.charAt(0));
// 3、 查找指定字符是否在以上字符串中存在，如：i，c ，b等
console.log(zuoye.search("s"));
// 4、 替换指定的字符，如：g替换为22,ss替换为b等操作方法
// do {
//     zuoye = zuoye.replace("g","22");
//     zuoye = zuoye.replace("ss","b");
// }while (zuoye.indexOf("g")>-1);
// console.log(zuoye);
// 5、 截取指定开始位置到结束位置的字符串，如：取得1-5的字符串
// zuoye = zuoye.slice(1,6);
// console.log(zuoye);
// 6、 找出以上字符串中出现次数最多的字符和出现的次数
//统一大小写
zuoye = zuoye.toLocaleLowerCase();
var obj = {};
for (var i =0;i<zuoye.length;i++){
    var key = zuoye[i];
    if(obj[key]){//判断obj中有没有这个键
    obj[key]++;
    }else {
        obj[key] = 1;//对象中没有这个字母，就把字母加到对象中
    }
}
for(var key in obj){
    console.log(key+"出现了"+obj[key]+"次");
}

// 7、 遍历字符串，并将遍历出的字符两头添加符号“@”输出至当前的文档页面。
