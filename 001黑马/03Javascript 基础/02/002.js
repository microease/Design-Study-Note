// //构造函数定义数组
// var arr1 = new Array(1,2,3);
// document.write(arr1[0]);


//字面量方式构造数组和for循环遍历数组
// var arr1 = [1,2,3,4,5];
// for (i=0;i<arr1.length;i++){
//     document.write(arr1[i]+"&nbsp;");
// }

// 求数组中所有元素的和

// var arr1=[10,20,30,40,50];
// var sum = 0;
// for (i=0;i<arr1.length;i++){
//     sum += arr1[i];
// }
// document.write(sum)

//求数组中所有元素的平均值


// var arr1=[10,20,30,40,50];
// var sum = 0;
// for (i=0;i<arr1.length;i++){
//     sum += arr1[i];
// }
// sum = sum/arr1.length;
// document.write(sum)


//求数组中所有元素的最大值
//
// var arr2 = [1,2,3,6,19,24242,23,232,35335,232,646575,573242,1212];
// var maxarr2 = arr2[0];
//
// for(i=0;i<arr2.length;i++){
//     if(maxarr2<arr2[i]){
//         maxarr2 = arr2[i];
//     }
// }
// document.write(maxarr2+"&nbsp;");


//求数组中所有元素的最小值


//
// var arr2 = [1,2,3,6,19,24242,23,232,35335,232,646575,573242,1212];
// var maxarr2 = arr2[0];
//
// for(i=0;i<arr2.length;i++){
//     if(maxarr2>arr2[i]){
//         maxarr2 = arr2[i];
//     }
// }
// document.write(maxarr2+"&nbsp;");



//倒序循环遍历数组

//
// var arr2 = [1,2,3,6,19,24242,23,232,35335,232,646575,573242,1212];
// for(i=arr2.length-1;i>=0;i--){
//     document.write(arr2[i]+"<br>");
// }


//把数组中每个元素用|拼接到一起产生一个字符串并输出

//
// var arr2 = [1,2,3,6,19,24242,23,232,35335,232,646575,573242,1212];
//
// for (i=0;i<arr2.length;i++){
//     document.write(arr2[i]);
//
//     document.write("-");
// }


//去掉数组中重复的0,把其他的数据放在一个新的数组中
// var arr2 = [1,2,3,6,0,19,24242,23,0,232,35335,232,0,646575,573242,1212];
// var arr3 = [];
// for(i=0;i<=arr2.length-1;i++){
//     if(arr2[i]!=0){
//         arr3[arr3.length] = arr2[i];
//     }
// }
// document.write(arr3);
// console.log(arr3);

// //反转数组
// var arr4=[10,20,30,40,50,60,70,80,90];
// //控制交换的次数
// for(var i=0; i<arr4.length/2;i++){
//     var temp = arr4[i];
//     arr4[i] = arr4[arr4.length-1-i];
//     arr4[arr4.length-1-i] = temp;
// }
// document.write(arr4);
//


//提示用户输入班级人数，求总成绩，平均值，最高分，最低分
//
// var perCount = parseInt(prompt("请输入班级人数："));
// var scores=[];
// for(i=0;i<perCount;i++){
//     scores[scores.length] = parseInt(prompt("请输入第"+(i+1)+"个人的成绩"));
// }
// document.write(scores+"<br>");

//
// var sum=0;
// //求总成绩
// for(i=0;i<scores.length;i++){
//     sum+=scores[i];
// }
// document.write("总成绩："+sum+"<br>");
// //求平均值
// var pingJunZhi = sum/scores.length;
// document.write("平均值："+pingJunZhi+"<br>");

// //求最高分
// var zuiDi = scores[0];
// for (i=0;i<scores.length;i++){
//     if (zuiDi < scores[i]){
//         zuiDi = scores[i];
//     }
//
// }
// document.write("最高分是"+zuiDi);


//求最低分
// var zuiDi = scores[0];
// for (i=0;i<scores.length;i++){
//     if (zuiDi > scores[i]){
//         zuiDi = scores[i];
//     }
//
// }
// document.write("最低分是"+zuiDi);






//冒泡排序


//冒泡排序是指把所有的数据按照一定的顺序排序
//
// var arr = [10,0,100,20,60,30];
//
// for(var i=0;i<arr.length-1;i++){
//     for(var j=0;j<arr.length-1-i;j++){
//         if(arr[j]>arr[j+1]){
//             var temp = arr[j+1];
//             arr[j+1] = arr[j];
//             arr[j] = temp;
//         }
//     }
// }
// document.write(arr);
