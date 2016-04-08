
   //校验身份证号码

       var yyyy;

       var mm;

       var dd;

       var birthday;

       var address;

       var sex;

function CheckValue(u_zj_num){

       //是否输入

       var id=u_zj_num;

       var id_length=id.length;        

       if (id_length==0){

           alert("请输入身份证号码!");

           return false;

       }

       //长度校验

       if (id_length!=15 && id_length!=18){

           alert("身份证号长度应为15位或18位！");

           return false;

       }

  //判断是否纯数字

  if(isNaN(u_zj_num))

       {

          //alert("含有非法字符!");

          //return false;

       }

       //地区校验

               //

        var area={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江", 31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北", 43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏", 61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}


        if(area[parseInt(u_zj_num.toString().substr(0,2))]==null) 

        {

            alert('身份证地区非法!')

            return false;

        }

        else

          address = area[parseInt(u_zj_num.toString().substr(0,2))];

       //日期校验

       if (id_length==15){

           yyyy="19"+id.toString().substring(6,8);

           mm=id.toString().substring(8,10);

           dd=id.toString().substring(10,12);

           if (mm>12 || mm<=0){

               alert("输入身份证号,月份非法！");

               return false;

           }

           if (dd>31 || dd<=0){

               alert("输入身份证号,日期非法！");

               return false;

           }

           birthday=yyyy+ "-" +mm+ "-" +dd;

           if ("13579".indexOf(id.toString().substring(14,15))!=-1){

               sex="女";

           }else{

               sex="男";

           }

       }else if (id_length==18){


               yyyy=id.toString().substring(6,10);

               if (yyyy>2200 || yyyy<1900){

                   alert("输入身份证号,年度非法！");

                   return false;

               }

               mm=id.toString().substring(10,12);

               if (mm>12 || mm<=0){

                   alert("输入身份证号,月份非法！");

                   return false;

               }

               dd=id.toString().substring(12,14);

               if (dd>31 || dd<=0){

                   alert("输入身份证号,日期非法！");

                   return false;

               }

                       //校验位校验

               if (!isChinaIDCard(u_zj_num))

               {

                  return false ; 

               }

               birthday=yyyy+ "-" +mm+ "-" +dd;

		document.getElementById("u_birth").value =birthday

               if ("13579".indexOf(id.toString().substring(14,15))!=-1){

                   sex="女";

               }else{

                   sex="男";

               }


       }       

       return true;

}

//18位校验码校验

function isChinaIDCard(StrNo)

{

   StrNo = StrNo.toString();

   var a, b, c;

   a = parseInt(StrNo.substr(0, 1)) * 7+parseInt(StrNo.substr(1, 1)) * 9 +parseInt(StrNo.substr(2, 1)) * 10;

   a = a + parseInt(StrNo.substr(3, 1)) * 5+parseInt(StrNo.substr(4, 1)) * 8+parseInt(StrNo.substr(5, 1)) * 4;

   a = a + parseInt(StrNo.substr(6, 1)) * 2+parseInt(StrNo.substr(7, 1)) * 1+parseInt(StrNo.substr(8, 1)) * 6;

   a = a + parseInt(StrNo.substr(9, 1)) * 3+parseInt(StrNo.substr(10, 1)) * 7+parseInt(StrNo.substr(11, 1)) * 9;

   a = a + parseInt(StrNo.substr(12, 1)) * 10+parseInt(StrNo.substr(13, 1)) * 5+parseInt(StrNo.substr(14, 1)) * 8;

   a = a + parseInt(StrNo.substr(15, 1)) * 4+parseInt(StrNo.substr(16, 1)) * 2;

   b = a % 11;

   if (b == 2)

   //最后一位为校验位 

   {

       c = StrNo.substr(17, 1).toUpperCase(); //转为大写X 

   }

   else

   {

       c = parseInt(StrNo.substr(17, 1));

   }

   switch (b)

   {

       case 0:

           if (c != 1)

           {

               alert("身份证号码校验位错:最后一位应该为:1");                    

               return false;

           }

           break;

       case 1:

           if (c != 0)

           {

               alert("身份证号码校验位错:最后一位应该为:0");                     

               return false;

           }

           break;

       case 2:

           if (c != "X")

           {

               alert("身份证号码校验位错:最后一位应该为:X");                       

               return false;

           }

           break;

       case 3:

           if (c != 9)

           {

               alert("身份证号码校验位错:最后一位应该为:9");                   

               return false;

           }

           break;

       case 4:

           if (c != 8)

           {

               alert("身份证号码校验位错:最后一位应该为:8");                       

               return false;

           }

           break;

       case 5:

           if (c != 7)

           {

               alert("身份证号码校验位错:最后一位应该为:7");                  

               return false;

           }

           break;

       case 6:

           if (c != 6)

           {

               alert("身份证号码校验位错:最后一位应该为:6");                     

               return false;

           }

           break;

       case 7:

           if (c != 5)

           {

               alert("身份证号码校验位错:最后一位应该为:5");                      

               return false;

           }

           break;

       case 8:

           if (c != 4)

           {

               alert("身份证号码校验位错:最后一位应该为:4");                       

               return false;

           }

           break;

       case 9:

           if (c != 3)

           {

               alert("身份证号码校验位错:最后一位应该为:3");                      

               return false;

           }

           break;

       case 10:

           if (c != 2)

           {

               alert("身份证号码校验位错:最后一位应该为:2");                      

               return false

           }

   }

   return true ;

}

//响应单击事件

function myclick()

{ 

  var strinput=document.getElementById("u_zj_num").value ;

  if(CheckValue(strinput)) 

  {

     // alert('输入正确！请核对您的信息:出生日期：'+birthday+'.出生地：'+address); 

  }

}
function checkEmail() { 
//var emailReg = /^[_a-z0-9]+@([_a-z0-9]+\.)+[a-z0-9]{2,3}$/; 
var emailReg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/; 
if( emailReg.test(u_email) ){ 
return true; 
}else{ 
alert("您输入的Email地址格式不正确！"); 
return false; 
} 
} 

function checkPhone() { 
var phoneRegWithArea = /^[0][1-9]{2,3}-[0-9]{5,10}$/; 
var phoneRegNoArea = /^[1-9]{1}[0-9]{5,8}$/; 
var prompt = "您输入的电话号码不正确!" 
if( strPhone.length > 9 ) { 
if( phoneRegWithArea.test(u_tel) ){ 
return true; 
}else{ 
alert( prompt ); 
return false; 
} 
}else{ 
if( phoneRegNoArea.test( u_tel ) ){ 
return true; 
}else{ 
alert( prompt ); 
return false; 
} 

  
} 
} 
