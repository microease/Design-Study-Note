//while循环
//循环就是一件事不停的做，反复的做
var i=0;
while(i<3000){
    i++;
    if (year%4==0&&year%400!=0||year%400==0){
    console.log("闰年");
    }
}