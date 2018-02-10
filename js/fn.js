/* Design by jason.leung, QQ,147430218, 新浪微博,@切片面包 */
function getClass(oParent,sClass)
{
	var value=[];
	var Ele=oParent.getElementsByTagName('*');
	for (var i=0; i<Ele.length; i++)
	{
		var aClass=Ele[i].className.split(' ');
		for (n=0; n<aClass.length; n++)
		{
			if (aClass[n]==sClass)
			{
				value.push(Ele[i]);
			}
		}
	}
	return value;
}

function getStyle(obj,name)
{
	if(obj.currentStyle)
	{
		return obj.currentStyle[name];
	}
	else
	{
		return getComputedStyle(obj,false)[name];
	}
}
function Running(obj,json,fnEnd)
{
	clearInterval(obj.timer);
	obj.timer=setInterval(function()
	{
		var now=0;
		var bStop=true;
		for (var attr in json)
		{
			if(attr=='opacity')
			{
				now=Math.round(parseFloat(getStyle(obj,attr))*100);
			}
			else
			{
				now=parseInt(getStyle(obj,attr));
			}
			var speed=(json[attr]-now)/5;
			speed=speed>0?Math.ceil(speed):Math.floor(speed);
			if(now!=json[attr])bStop=false;
			if(attr=='opacity')
			{
				obj.style.filter='alpha(opacity:'+now+speed+')';
				obj.style.opacity=(now+speed)/100;
			}
			else
			{
				obj.style[attr]=speed+now+'px';
			}
		}
		if(bStop)
		{
			clearInterval(obj.timer);
			if(fnEnd)fnEnd();
		}
	}, 30);
}
window.onload=function()
{
	var oBox=document.getElementById('box');
	var oTitle=getClass(oBox,'title');
	var closed='php工具箱︽';
	var opened='php工具箱︾';
	var i=0;
	
	oTitle[0].onclick=function()
	{
		i++;
		(i%2)?Running(oBox,{right:0},function()
		{
			oTitle[0].innerHTML=closed;			
		})
		:Running(oBox,{right:-130},function()
		{
			oTitle[0].innerHTML=opened;
		});	
	}
}