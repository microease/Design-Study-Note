//while循环
//循环就是一件事不停的做，反复的做

//计算1到100的和
// var i=0;
// var sum = 0;
// while(i<=100){
//     sum = sum+i;
//     i++;
// }
// console.log("和为："+sum);

// 求6的阶乘
// var i = 1;
// var sum = 1;
// while(i<=6){
//     sum = sum*i;
//     i++;
// }
// console.log("6的阶乘是"+sum);

//求1-100之间所有的偶数的和
//
// var i = 1;
// var sum = 0;
// while(i<=100){
//     if(i%2==0){
//         sum+=i;
//     }
//     i++;
// }
// console.log(sum);

//求1-100之间所有的奇数的和


//求账号和密码是否一致，登录的效果实现

var userName = prompt("请您输入账号");
var userPwd = prompt("请您输入密码");
while (userName!="admin"&&userPwd!="123"){
    userName = prompt("请您输入账号");
    userPwd = prompt("请您输入密码");
}
console.log("登录成功");