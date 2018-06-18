//函数

// 求任意2个数的和
function getSum(x,y) {

}

//求1到100之间所有数字的和
function getEverySum(n) {
    var sum =0;
    for(i=1;i<=n;i++){
        sum+=i;
    }
    return sum;
}

//求n-m之间所有数字的和
function getEverySum2(n,m){
    var sum = 0;
    for(var i=n;i<=m;i++){
        sum+=i;
    }
    return sum;
}

function getS(r){
    return Math.PI*r*r;
}

//求2个数中的最大值
function getMax(n,m){
    var maxNumber = 0;
    if(n-m>0){
        maxNumber = n;
    }else{
        maxNumber = m;
    }
    return maxNumber;
}

//求2个数中的最小值
function getMin(n,m){
    var minNumber = 0;
    if(n-m<0){
        minNumber = n;
    }
    else{
        minNumber = m;
    }
    return minNumber;
}


//判断一个数是不是质数
/**
 * 
 * @param n
 * @returns {boolean}
 */
function getZhishu(n){
    for(var i=2;i<n;i++){
        if(n%i!=0){
            return true;
        }
        return false;
    }

}


console.log(getZhishu(5));
