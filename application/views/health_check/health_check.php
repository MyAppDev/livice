<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>健康チェック</title>

	<!-- ウェアラブル側で読み込むので文字色を白に変更しました。 -->
	<style>
	body{
		color: #DDD;
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
<<<<<<< HEAD
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
=======
		flg=5;;
		}
>>>>>>> 99f0e6b7842bbfe798f2f00262e6c8adc5cfb112
	}else if(flg==5){
		document.getElementById("result").style.display = "none";
		document.question1.style.display = "block";
		flg=1;
	}
}

//-->
</script>
<form name="question1" style="display:block;">
<p>日々の運動について選択してください。</p>
<label><input type="radio" name="inpname1" value="無理せず続けましょう" onClick="pagechange()" checked>毎日散歩を一時間以上</label>
<br>
<label><input type="radio" name="inpname1" value="無理せず続けましょう" onClick="pagechange()">毎日ウォーキングを30分以上</label>
<br>
<label><input type="radio" name="inpname1" value="出来れば毎日しましょう" onClick="pagechange()">二日に一度散歩を一時間以上</label>
<br>
<label><input type="radio" name="inpname1" value="出来れば毎日しましょう" onClick="pagechange()">二日に一度ウォーキングを30分以上</label>
<br>
</form>
<div id="question2" style="display:none;">
<p>朝食のメニューを選択してください。</p>
<label><input type="radio" name="inpname2" value="1" onClick="pagechange()" checked>スクランブルエッグ・ご飯・麦茶</label>　
<br>
<label><input type="radio" name="inpname2" value="2" onClick="pagechange()">食パン×2・コーヒー牛乳</label>
<br>
<label><input type="radio" name="inpname2" value="3" onClick="pagechange()">おにぎり・麦茶</label>
</div>
<div id="question3" style="display:none;">
<p>昼食のメニューを選択してください。</p>
<label><input type="radio" name="inpname3" value="1" onClick="pagechange()" checked>スパゲティ・麦茶</label>　
<br>
<label><input type="radio" name="inpname3" value="2" onClick="pagechange()">チーズバーガー・フライドポテトMサイズ・コーラ</label>
<br>
<label><input type="radio" name="inpname3" value="3" onClick="pagechange()">オムライス・麦茶</label>
</div>
<div id="question4" style="display:none;">
<p>夕食のメニューを選択してください。</p>
<label><input type="radio" name="inpname4" value="1" onClick="pagechange()" checked>カレーライス・麦茶</label>
<br>
<label><input type="radio" name="inpname4" value="2" onClick="pagechange()">焼きそば・ご飯・麦茶</label>
<br>
<label><input type="radio" name="inpname4" value="3" onClick="pagechange()">トンカツ・ご飯・麦茶</label>
</div>
<div id="result" style="display:none;">
<div id="resultE">
</div>
<div id="resultM">
</div>
<br>
<input type="button" value="戻る" onClick="pagechange()">
</div>
</body>
</html>
