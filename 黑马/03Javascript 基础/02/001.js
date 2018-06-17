//找到100到200之间可以被7整除的第一个数字

for(var num=100;num<=200;num++){
    if(num%7==0){
        document.write(num);
        break;
    }
}