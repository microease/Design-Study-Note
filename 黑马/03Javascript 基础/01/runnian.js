// 能被4整除但不能被100整除
// 或者能被400整除

// 设计一个从1到3000年所有闰年打印的程序
//
//
// var year = 2018;
// if (year%4==0&&year%400!=0||year%400==0){
//     console.log("闰年");
// } else{
//     console.log("平年");
// }

var years = 1;
while(years%4==0&&years%400!=0||years%400==0){
    console.log(years);
    years+=1;
}
