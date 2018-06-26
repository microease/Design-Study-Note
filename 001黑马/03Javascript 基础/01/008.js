//本金10000，存入银行，年利率千分之三，计算五年后的本金是多少
// var num=10000;
// var i=1;
// while(i<=5){
//     num=num+num*0.003;
//     i++;
// }document.write(num);

// for循环
// var num=10000;
// for(i=1;i<=5;i++){
//     num+=num*0.003;
// }
// document.write(num);

//斐波那契数列
// 每个数字是前两个数字的和
var num1=1;
var num2=1;//第二个月

for(i=3;i<=12;i++){
    var sum = num1+num2;
    num1=num2;
    num2=sum;
    document.write(sum+"&nbsp;");
}