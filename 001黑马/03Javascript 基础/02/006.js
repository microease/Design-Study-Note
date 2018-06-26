// //创建对象练习
// var smallDog =new Object();
// smallDog.name="大黄";
// smallDog.age=3;
// smallDog.color="黄色";
// smallDog.weight="250";
// smallDog.eat=function () {
//     console.log("喜欢吃大骨头");
// }
// smallDog.walk=function () {
//     console.log("走路很慢");
// }
//
// smallDog.eat();
// smallDog.walk();

//创建一个手机对象，手机有型号，有颜色，可以打电话和发短信。

var phone = new Object();
phone.xinghao = "iPhoneX";
phone.color = "white";
phone.call = function () {
    console.log("打电话");
}
phone.msg = function () {
    console.log("发短信");
}

phone.call();
phone.msg();
console.log(phone.color);