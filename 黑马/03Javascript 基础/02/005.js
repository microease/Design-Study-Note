//翻转数组
function reverseArray(arr) {
    for (var i = 0; i < arr.length / 2; i++) {
        var temp = arr[i];
        arr[i] = arr[arr.length - 1 - i];
        arr[arr.length - 1 - i] = temp;
    }
    return arr;
}

console.log(reverseArray([1, 2, 3, 4, 5]));

//求一个数字的阶乘

function getJieCheng(num) {
    var result = 1;
    for (var i = 1; i <= num; i++) {
        result *= i;
    }
    return result;
}

console.log(getJieCheng(5));


//斐波那契数列
function getFib(num) {
    var num1 = 1;
    var num2 = 1;
    var sum = 0;
    for (var i = 3; i <= num; i++) {
        sum = num1 + num2;
        num1 = num2;
        num2 = sum;
    }
    return sum;
}

console.log(getFib(12));

//输入年月日，获取这个日期是这一年的哪一天
function getDays(year, month, day) {
    var days = day;
    if (month == 1) {
        return days;
    }
    //需要判断这个年份是不是闰年
    //需要判断这个月份多少天
    var months = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    for (var i = 0; i <month-1; i++){
        days +=month[i];
    }

        }