//找到100到200之间可以被7整除的第一个数字

// for(var num=100;num<=200;num++){
//     if(num%7==0){
//         document.write(num);
//         break;
//     }
// }

//求100到200之间所有奇数的和，用continue
//答案是7500
//此处没有用到continue
// var sum=0;
// for(var num=100;num<=200;num++){
//     if(num%2!=0){
//     sum += num;
//     }
//
// }document.write(sum+"<br>");

//此处用continue
// var sum=0;
// for(var num=100;num<=200;num++){
//     if(num%2==0){
//         continue;
//     }
//     sum+=num;
//     document.write(sum+"<br>");
//
// }

//求整数1-100的累计值，但要求跳过所有个位数为3的数
var sum = 0;
for(i=1;i<=100;i++){
    if(i%10==3){
        continue;
    }
    sum += i;

}document.write(sum+"<br>");