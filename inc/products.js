function Products2kw(Val){
	DisDiv("products2_sx_bg",1);
	DisDiv("products2_sx_win",1);
	Products2sx(1);
}
function Products2sx(Val){
	for (var i=1;i<=3;i++){
		$2("products2_sx_p"+i).style.display="none";
	}
	$2("products2_sx_p"+Val).style.display="block";
}

function ProductsQuantity(Val,Price){
	var Quantity=$2("p_quantity_val");
	if (isNaN(Quantity.value)){
		alert("请输入正确的购买数量！");
		Quantity.value=1;
	}
	else {
		if (Val==0){
			Quantity.value--;
			if (Quantity.value<=0) Quantity.value=1;
		}
		if (Val==1){
			Quantity.value++;
		}
		if (Quantity.value<=0) Quantity.value=1;
	}
	$2("p_prices").innerHTML=(Price*Quantity.value).toFixed(2);
}

function Products2Quantity(Type,ID,Val){
	var Quantity=$2("p"+Type+"_quantity_"+ID);
	if (isNaN(Quantity.value)){
		alert("请输入正确的购买数量！");
		Quantity.value=1;
	}
	else {
		if (Val==0){
			Quantity.value--;
			if (Quantity.value<0) Quantity.value=0;
		}
		if (Val==1){
			Quantity.value++;
		}
		if (Quantity.value<0) Quantity.value=0;
	}
	var Node=$2("products2_sx_p"+Type);
	var TagCount=Node.getElementsByTagName("input").length;
	var Amount=0;
	for (var i=0;i<TagCount;i++){
		Amount+=(Node.getElementsByTagName("input")[i].value*parseInt($2("p"+Type+"_price_"+i).innerHTML));
	}
	$2("p"+Type+"_total").innerHTML=Amount;
}

function Quantity(ID,ObjID,Price,Val){
	var Quantity=$2("quantity_"+ObjID);
	var Amount=0;
	if (isNaN(Quantity.value)){
		alert("请输入正确的购买数量！");
	}
	else {
		if (Val==0){
			Quantity.value--;
		}
		if (Val==1){
			Quantity.value++;
		}
		if (Quantity.value<=0) Quantity.value=1;
		Quantity.value=Quantity.value;
		//Prices=parseFloat($2("cart_price_"+ObjID).innerHTML,2);
		$2("cart_amount_"+ObjID).innerHTML=(Price*Quantity.value);
		Ajax("","?meter=cart_update&id="+ID+"&quantity="+Quantity.value);
		var Node=$2("cart");
		var TagCount=Node.getElementsByTagName("input").length;
		var TotalAmount=0;
		var TotalAmount2=0;
		for (var i=0;i<TagCount;i++){
			TotalAmount2=parseInt($2("cart_amount_"+i).innerHTML);
			TotalAmount=TotalAmount+TotalAmount2;
		}
		$2("cart_totalamount").innerHTML=TotalAmount;
	}
}

var CartTid;
function UnAddCart2(){
	CartTid=setTimeout(UnAddCart,2000);
}

function UnAddCart(){
	if (CartTid) clearTimeout(CartTid);
	RemoveElement("addcart_bg");
	RemoveElement("addcart");
}
function RemoveElement(ObjID){
	var Node=$2(ObjID);
	Node.parentNode.removeChild(Node);
}

function AddCart(ID){
	var Quantity=$2("p_quantity_val");
	if (isNaN(Quantity.value)){
		alert("请输入正确的购买数量！");
		return false;
	}
	if (Quantity.value<=0){
		alert("请输入正确的购买数量！");
		return false;
	}
	var BgDiv=document.createElement("div");
	BgDiv.id="addcart_bg";	
	BgDiv.style.position="absolute";
	BgDiv.style.top="0px";
	BgDiv.style.left="0px";
	BgDiv.style.zIndex="9998";
	BgDiv.style.width=document.documentElement.clientWidth+"px";
	BgDiv.style.height=document.documentElement.scrollHeight+"px";
	
	var BuyDiv=document.createElement("div");
	BuyDiv.id="addcart";
	var HTML="";
	HTML+="<p id=\"addcart_title\"><strong id=\"addcart_titles\">正在处理中……</strong><span onclick=\"UnAddCart()\">×</span></p>";
	HTML+="<div id=\"addcart_contents\">";
	HTML+="<div id=\"addcart_content\"><p id=\"addcart_loading\"></p></div>";
	HTML+="</div>";
	BuyDiv.innerHTML=HTML;
	document.body.appendChild(BgDiv);
	document.body.appendChild(BuyDiv);
	var xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
  		alert ("您的浏览器不支持AJAX!");
		return false;
	}
	var Url="ajax.php?meter=cart&type=1&id="+ID+"&quantity="+Quantity.value+"&sid="+Math.random();
	xmlHttp.onreadystatechange=function(){
		if (xmlHttp.readyState==4){ 
			if (xmlHttp.status==200){
				$2("addcart_content").innerHTML=xmlHttp.responseText;
				$2("addcart_titles").innerHTML="商品已成功加入购物车";
				$2("header_carts").innerHTML=$2("addcart_quantity").innerHTML;
				UnAddCart2();
			}
		}
	}
	xmlHttp.open("GET",Url,true);
	xmlHttp.send(null);
}

function AddCart2(ID){
	var P1="",P2="",P3="";
	var p_ID="",p_Quantity="";
	var Node=$2("products2_sx_p1");
	var TagCount=Node.getElementsByTagName("input").length;
	for (var i=0;i<TagCount;i++){
		p_ID=$2("p1_id_"+i).innerHTML;
		p_Quantity=Node.getElementsByTagName("input")[i].value;
		if(p_Quantity!="0" && !isNaN(p_Quantity)){
			P1+=p_ID+"|"+p_Quantity+",";
		}
	}
	if (P1==""){
		alert("请选择您需要的！");
		Products2sx(1);
		return;
	}
	p_ID="";
	p_Quantity="";
	Node=$2("products2_sx_p2");
	TagCount=Node.getElementsByTagName("input").length;
	for (var i=0;i<TagCount;i++){
		p_ID=$2("p2_id_"+i).innerHTML;
		p_Quantity=Node.getElementsByTagName("input")[i].value;
		if(p_Quantity!="0" && !isNaN(p_Quantity)){
			P2+=p_ID+"|"+p_Quantity+",";
		}
	}
	p_ID="";
	p_Quantity="";
	Node=$2("products2_sx_p3");
	TagCount=Node.getElementsByTagName("input").length;
	for (var i=0;i<TagCount;i++){
		p_ID=$2("p3_id_"+i).innerHTML;
		p_Quantity=Node.getElementsByTagName("input")[i].value;
		if(p_Quantity!="0" && !isNaN(p_Quantity)){
			P3+=p_ID+"|"+p_Quantity+",";
		}
	}
	DisDiv("products2_sx_bg",0);
	DisDiv("products2_sx_win",0);
	var BgDiv=document.createElement("div");
	BgDiv.id="addcart_bg";	
	BgDiv.style.position="absolute";
	BgDiv.style.top="0px";
	BgDiv.style.left="0px";
	BgDiv.style.zIndex="9998";
	BgDiv.style.width=document.documentElement.clientWidth+"px";
	BgDiv.style.height=document.documentElement.scrollHeight+"px";
	var BuyDiv=document.createElement("div");
	BuyDiv.id="addcart";
	var HTML="";
	HTML+="<p id=\"addcart_title\"><strong id=\"addcart_titles\">正在处理中……</strong><span onclick=\"UnAddCart()\">×</span></p>";
	HTML+="<div id=\"addcart_contents\">";
	HTML+="<div id=\"addcart_content\"><p id=\"addcart_loading\"></p></div>";
	HTML+="</div>";
	BuyDiv.innerHTML=HTML;
	document.body.appendChild(BgDiv);
	document.body.appendChild(BuyDiv);
	var xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
  		alert ("您的浏览器不支持AJAX!");
		return false;
	}
	var Url="ajax.php?meter=cart&type=2&id="+ID+"&p1="+P1+"&p2="+P2+"&p3="+P3+"&sid="+Math.random();
	xmlHttp.onreadystatechange=function(){
		if (xmlHttp.readyState==4){ 
			if (xmlHttp.status==200){
				$2("addcart_content").innerHTML=xmlHttp.responseText;
				$2("addcart_titles").innerHTML="商品已成功加入购物车";
				$2("header_carts").innerHTML=$2("addcart_quantity").innerHTML;
				UnAddCart2();
			}
		}
	}
	xmlHttp.open("GET",Url,true);
	xmlHttp.send(null);
}