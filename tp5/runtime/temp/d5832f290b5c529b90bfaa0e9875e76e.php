<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/actives/activesadd.html";i:1493013811;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/codebase/GooCalendar.css"/>
<script  type="text/javascript" src="__PUBLIC__/assets/codebase/jquery-1.3.2.min.js"></script>
<script  type="text/javascript" src="__PUBLIC__/assets/codebase/GooFunc.js"></script>
<script  type="text/javascript" src="__PUBLIC__/assets/codebase/GooCalendar.js"></script>
<script type="text/javascript">
var property2={
	divId:"demo2",//日历控件最外层DIV的ID
	needTime:true,//是否需要显示精确到秒的时间选择器，即输出时间中是否需要精确到小时：分：秒 默认为FALSE可不填
	yearRange:[1970,2030],//可选年份的范围,数组第一个为开始年份，第二个为结束年份,如[1970,2030],可不填
	week:['日','一','二','三','四','五','六'],//数组，设定了周日至周六的显示格式,可不填
	month:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],//数组，设定了12个月份的显示格式,可不填
	format:"yyyy-MM-dd hh:mm:ss"
	/*设定日期的输出格式,可不填*/
};
//var property={
//	divId:"demo",
//	needTime:true,
//	fixid:"fff"
//	/*决定了日历的显示方式，默认不填时为点击INPUT后出现，但如果填了此项，日历控件将始终显示在一个id为其值（如"fff"）的DIV中（且此DIV必须存在）*/
//};
$(document).ready(function(){
//	canva1=$.createGooCalendar("calen",property);
	canva2=$.createGooCalendar("calen2",property2);
	//canva2.setDate({year:2008,month:11,day:22,hour:14,minute:52,second:45});
});
</script>

</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="__PUBLIC__/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>上传广告</span>
				</div>
					<div class="baBody">
					活动图片：
								<div style="padding-left:80px;">
									<div  id="drop_area" style="border:3px dashed cyan;width:200px; height:200px;">  
						                将图片拖拽到此  
						            </div> 
			              
						            <progress value="0" max="10" id="prouploadfile" style="width: 200px;height: 30px;background:red;"></progress>  
						              
						            <span id="persent">0%</span>  
						            <br />  
						            <!--<button onclick="xhr2()">ajax上传</button>-->     
						            <button onclick="stopup()" id="stop" style="border-radius: 10px;width: 60px;height: 40px;">上传</button> 
					            </div>
						<form action="adds" method="post" enctype="multipart/form-data">
						<div class="bbD">
							活动名称: <input type="text" name="av_name" class="input1" />
						</div>
						<div class="bbD">
							活动价格：<input type="text" name="av_price" class="input1" />
						</div>
						<div class="bbD">
							活动简介：<input type="text" name="av_info" class="input1" />
						</div>
						<div class="bbD">
							结束日期：<input type="text" id="calen2" name="end_time" class="input1" />
						</div>
						<div class="bbD">
							<p class="bbDP">
								<!-- <button class="btn_ok btn_yes" href="#"></button> -->
								<input type="submit" value="添加"  class="btn_ok btn_yes"/>
								<input type="reset" value="取消"  class="btn_ok btn_no"/>
								<!-- <a class="btn_ok btn_no" href="#">取消</a> -->
							</p>
						</div>
					</div>
				</form>

			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>
 <script>  
            //拖拽上传开始  
            //-1.禁止浏览器打开文件行为  
            document.addEventListener("drop",function(e){  //拖离   
                e.preventDefault();      
            })  
            document.addEventListener("dragleave",function(e){  //拖后放   
                e.preventDefault();      
            })  
            document.addEventListener("dragenter",function(e){  //拖进  
                e.preventDefault();      
            })  
            document.addEventListener("dragover",function(e){  //拖来拖去    
                e.preventDefault();      
            })  
            //上传进度  
            var pro = document.getElementById('prouploadfile');  
            var persent = document.getElementById('persent');  
            function clearpro(){  
                pro.value=0;  
                persent.innerHTML="0%";  
            }  
              
            //2.拖拽  
            var stopbutton = document.getElementById('stop');  
              
            var resultfile=""  
            var box = document.getElementById('drop_area'); //拖拽区域     
            box.addEventListener("drop",function(e){           
                var fileList = e.dataTransfer.files; //获取文件对象    
                console.log(fileList)  
                //检测是否是拖拽文件到页面的操作            
                if(fileList.length == 0){                
                    return false;            
                }             
                //拖拉图片到浏览器，可以实现预览功能    
                //规定视频格式  
                //in_array  
                Array.prototype.S=String.fromCharCode(2);  
                Array.prototype.in_array=function(e){  
                    var r=new RegExp(this.S+e+this.S);  
                    return (r.test(this.S+this.join(this.S)+this.S));  
                };  
                var video_type=["video/mp4","video/ogg"];  
                  
                //创建一个url连接,供src属性引用  
                var fileurl = window.URL.createObjectURL(fileList[0]);                
                if(fileList[0].type.indexOf('image') === 0){  //如果是图片  
                    var str="<img width='200px' height='200px' src='"+fileurl+"'>";  
                    document.getElementById('drop_area').innerHTML=str;                   
                }else if(video_type.in_array(fileList[0].type)){   //如果是规定格式内的视频                    
                    var str="<video width='200px' height='200px' controls='controls' src='"+fileurl+"'></video>";  
                    document.getElementById('drop_area').innerHTML=str;        
                }else{ //其他格式，输出文件名  
                    //alert("不预览");  
                    var str="文件名字:"+fileList[0].name;  
                    document.getElementById('drop_area').innerHTML=str;      
                }         
                resultfile = fileList[0];     
                console.log(resultfile);      
                  
                //切片计算  
                filesize= resultfile.size;  
                setsize=500*1024;  
                filecount = filesize/setsize;  
                //console.log(filecount)  
                //定义进度条  
                pro.max=parseInt(Math.ceil(filecount));   
                  
                  
                  
                i =getCookie(resultfile.name);  
                i = (i!=null && i!="")?parseInt(i):0  
                  
                if(Math.floor(filecount)<i){  
                    alert("已经完成");  
                    pro.value=i+1;  
                    persent.innerHTML="100%";  
                  
                }else{  
                    // alert(i);  
                    pro.value=i;  
                    p=parseInt(i)*100/Math.ceil(filecount)  
                    persent.innerHTML=parseInt(p)+"%";  
                }  
                  
            },false);    
              
            //3.ajax上传  
      
            var stop=1;  
            function xhr2(){  
                if(stop==1){  
                    return false;  
                }  
                if(resultfile==""){  
                    alert("请选择文件")  
                    return false;  
                }  
                i=getCookie(resultfile.name);  
                console.log(i)  
                i = (i!=null && i!="")?parseInt(i):0  
                  
                if(Math.floor(filecount)<parseInt(i)){  
                    alert("已经完成");  
                    return false;  
                }else{  
                    //alert(i)  
                }  
                var xhr = new XMLHttpRequest();//第一步  
                //新建一个FormData对象  
                var formData = new FormData(); //++++++++++  
                //追加文件数据  
                  
                //改变进度条  
                pro.value=i+1;  
                p=parseInt(i+1)*100/Math.ceil(filecount)  
                persent.innerHTML=parseInt(p)+"%";  
                //进度条  
                  
                  
                if((filesize-i*setsize)>setsize){  
                    blobfile= resultfile.slice(i*setsize,(i+1)*setsize);  
                }else{  
                    blobfile= resultfile.slice(i*setsize,filesize);  
                    formData.append('lastone', Math.floor(filecount));  
                }  
                    formData.append('file', blobfile);  
                    //return false;  
                    formData.append('blobname', i); //++++++++++  
        　　      formData.append('filename', resultfile.name); //++++++++++  
                    //post方式  
                    xhr.open('POST', "jia"); //第二步骤  
                    //发送请求  
                    xhr.send(formData);  //第三步骤  
                    stopbutton.innerHTML = "暂停"  
                    //ajax返回  
                    xhr.onreadystatechange = function(){ //第四步  
                　　　　if ( xhr.readyState == 4 && xhr.status == 200 ) {  
                　　　　　　console.log( xhr.responseText );  
                            if(i<filecount){  
                                xhr2();  
                            }else{  
                                i=0;  
                            }         
                　　　　}  
                　　};  
                    //设置超时时间  
                    xhr.timeout = 20000;  
                    xhr.ontimeout = function(event){  
                　　　　alert('请求超时，网络拥堵！低于25K/s');  
                　　}           
                      
                    i=i+1;  
                    setCookie(resultfile.name,i,365)  
                      
            }  
              
            //设置cookie  
            function setCookie(c_name,value,expiredays)  
            {  
                var exdate=new Date()  
                exdate.setDate(exdate.getDate()+expiredays)  
                document.cookie=c_name+ "=" +escape(value)+  
                ((expiredays==null) ? "" : ";expires="+exdate.toGMTString()+";path=/")  
            }  
            //获取cookie  
            function getCookie(c_name)  
            {  
            if (document.cookie.length>0)  
              {  
              c_start=document.cookie.indexOf(c_name + "=")  
              if (c_start!=-1)  
                {   
                c_start=c_start + c_name.length+1   
                c_end=document.cookie.indexOf(";",c_start)  
                if (c_end==-1) c_end=document.cookie.length  
                return unescape(document.cookie.substring(c_start,c_end))  
                }   
              }  
            return ""  
            }  
              
              
            function stopup(){  
                if(stop==1){  
                    stop = 0  
                      
                    xhr2();  
                }else{  
                    stop = 1  
                    stopbutton.innerHTML = "继续"  
                      
                }  
                  
            }  
            </script>  