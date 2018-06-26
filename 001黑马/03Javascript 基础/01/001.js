//根据数字显示对应的星期
var num=parseInt(prompt("请输入一个星期的数字。。"));
switch (num){
    case 1:console.log("星期一");break;
    case 2:console.log("星期二");break;
    case 3:console.log("星期三");break;
    case 4:console.log("星期四");break;
    case 5:console.log("星期五");break;
    case 6:console.log("星期六");break;
    case 7:console.log("星期天");break;
    default:console.log("输入错误");
}