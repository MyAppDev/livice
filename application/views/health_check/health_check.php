<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>健康チェック</title>

	<style>
	body{
		color:#DDD;
	}

	div.check-group input {
	    display: none;
	}

	div.check-group label {
 background: -moz-linear-gradient(top,#BFD9E5, #3D95B7 50%,#0080B3 50%,#0099CC);
    background: -webkit-gradient(linear, left top, left bottom, from(#BFD9E5), color-stop(0.5,#3D95B7), color-stop(0.5,#0080B3), to(#0099CC));
    color: #FFF;
    font-weight:bold;
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border: 1px solid #0099CC;
    -moz-box-shadow: 1px 1px 1px rgba(000,000,000,0.3),inset 0px 0px 3px rgba(255,255,255,0.5);
    -webkit-box-shadow: 1px 1px 1px rgba(000,000,000,0.3),inset 0px 0px 3px rgba(255,255,255,0.5);
    text-shadow: 0px 0px 3px rgba(0,0,0,0.5);
    width: 100px;
    padding: 15px;
    margin:30px;

	}

	div.check-group input:checked+label {
	    color: #fff;
	    background: #C3C3C3;
	}

	p{
		font-size:20px;
	}
	</style>

</head>
<body>
<script type="text/javascript">
<!--

var flg=1;
var r=0;
var r2=0;
var r3=0;
var r4=0;

function pagechange(){
	if (flg==1){

		document.question1.style.display = "none";
		document.getElementById("question2").style.display = "block";
		flg=2;
	}else if(flg==2){
		document.getElementById("question2").style.display = "none";
		document.getElementById("question3").style.display = "block";
		flg=3;

	}else if(flg==3){
		document.getElementById("question3").style.display = "none";
		document.getElementById("question4").style.display = "block";
		flg=4;

	}else if(flg==4){
		document.getElementById("question4").style.display = "none";
		var radio1=document.getElementsByName("inpname1");
		for (i = 0; i < radio1.length; i++) {
		  if (radio1[i].checked) {
		    document.getElementById("result").style.display = "block";
		    document.getElementById("resultE").innerHTML="<p>運動について："+radio1[i].value+"</p>";
		  }
		}
		 var radio2=document.getElementsByName("inpname2");
		 var radio3=document.getElementsByName("inpname3");
		 var radio4=document.getElementsByName("inpname4");
		 for (i = 0; i < radio2.length; i++) {
		  if (radio2[i].checked) {
		  		r2=parseInt(radio2[i].value);
		    }
		}
		 for (i = 0; i < radio3.length; i++) {
		  if (radio3[i].checked) {
		  		r3=parseInt(radio3[i].value);
		    }
		}
		 for (i = 0; i < radio4.length; i++) {
		  if (radio4[i].checked) {
		  		r4=parseInt(radio4[i].value);
		    }
		}
		 r=r2+r3+r4;
		 if(r<=4){
		 	document.getElementById("resultM").innerHTML="<p>食事について：ビタミンCが足りていません。もっと野菜を摂りましょう</p>";
		 }else if(r<8){
		 	document.getElementById("resultM").innerHTML="<p>食事について：塩分の摂り過ぎです。控えましょう。</p>";
		 }else{
		 	document.getElementById("resultM").innerHTML="<p>食事について：カルシウムが足りていません。カルシウムは乳製品や魚介類に多く含まれています。</p>";
		 }

		flg=5;
	}else if(flg==5){
		document.getElementById("result").style.display = "none";
		document.question1.style.display = "block";
		flg=1;
	}
}

//-->
</script>

<form name="question1" style="display:block;">

<p style="font-size:20px;">日々の運動について選択していただけますでしょうか。</p>
<div class="check-group clearfix">
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname1" value="無理せず続けましょう" onClick="pagechange()" checked>毎日散歩を一時間以上</label>
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname1" value="無理せず続けましょう" onClick="pagechange()">毎日ウォーキングを30分以上</label>
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname1" value="出来れば毎日しましょう" onClick="pagechange()">二日に一度散歩を一時間以上</label>
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname1" value="出来れば毎日しましょう" onClick="pagechange()">二日に一度ウォーキングを30分以上</label>
	</div>
</div>
</form>

<div id="question2"class="check-group clearfix"  style="display:none;">
<p style="font-size:20px;">朝食のメニューを選択してください。</p>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname2" value="1" onClick="pagechange()" checked>スクランブルエッグ・ご飯・麦茶</label>　
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname2" value="2" onClick="pagechange()">食パン×2・コーヒー牛乳</label>
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname2" value="3" onClick="pagechange()">おにぎり・麦茶</label>
	</div>
</div>
<div id="question3"class="check-group clearfix" style="display:none;">
	<p style="font-size:20px;">昼食のメニューを選択してください。</p>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname3" value="1" onClick="pagechange()" checked>スパゲティ・麦茶</label>　
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname3" value="2" onClick="pagechange()">チーズバーガー・フライドポテトMサイズ・コーラ</label>
	</div>
		<div style="margin-top:50px;">
		<label><input type="radio" name="inpname3" value="3" onClick="pagechange()">オムライス・麦茶</label>
	</div>
</div>

<div id="question4"class="check-group clearfix" style="display:none;">
	<p style="font-size:20px;">夕食のメニューを選択してください。</p>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname4" value="1" onClick="pagechange()" checked>カレーライス・麦茶</label>
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname4" value="2" onClick="pagechange()">焼きそば・ご飯・麦茶</label>
	</div>
	<div style="margin-top:50px;">
		<label><input type="radio" name="inpname4" value="3" onClick="pagechange()">トンカツ・ご飯・麦茶</label>
	</div>
</div>
<div id="result" style="display:none;">
<div id="resultE">
</div>
<div id="resultM">
</div>
<br>
<input type="button" value="アドバイストップへ戻る" style="
 background: -moz-linear-gradient(top,#BFD9E5, #3D95B7 50%,#0080B3 50%,#0099CC);
    background: -webkit-gradient(linear, left top, left bottom, from(#BFD9E5), color-stop(0.5,#3D95B7), color-stop(0.5,#0080B3), to(#0099CC));
    color: #FFF;
    font-weight:bold;
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border: 1px solid #0099CC;
    -moz-box-shadow: 1px 1px 1px rgba(000,000,000,0.3),inset 0px 0px 3px rgba(255,255,255,0.5);
    -webkit-box-shadow: 1px 1px 1px rgba(000,000,000,0.3),inset 0px 0px 3px rgba(255,255,255,0.5);
    text-shadow: 0px 0px 3px rgba(0,0,0,0.5);
    width: 200px;
    padding: 15px;
    margin:30px;
" onClick="pagechange()">
</div>
</body>
</html>
