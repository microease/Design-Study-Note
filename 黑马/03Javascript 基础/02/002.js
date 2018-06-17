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




//提示用户输入班级人数，求总成绩，平均值，最高分，最低分

//冒泡排序