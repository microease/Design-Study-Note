//取最大值

var result = Math.max(10,20);
console.log(result);

function MyMath() {
    this.getMax = function () {
        var max = arguments[0];
        for(var  i = 0;i<arguments.length;i++){
            if (max<arguments[i]){
                max = arguments[i];
            }
        }
        return max;
    };

}

var mt = new MyMath();
var result1= mt.getMax(10,100,1);
console.log(result1);