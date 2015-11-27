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
		    document.getElementById("resultM").innerHTML="<p>食事について："+radio1[i].value+"</p>";
		  }
		flg=5;;
		}
	}else if(flg==5){
		document.getElementById("result").style.display = "none";
		document.question1.style.display = "block";
		flg=1;
	}
}

//-->
</script>
<form name="question1" style="display:block;">
<p>日々の運動について選択していただけますでしょうか。</p>
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
<p>朝食のメニューを選択していただけますでしょうか。</p>
<label><input type="radio" name="inpname2"value="1" onClick="pagechange()" checked>栄養バランスを考えて食事している</label>　
<br>
<label><input type="radio" name="inpname2"value="2" onClick="pagechange()">好きなものを好きなように食べる</label>
</div>
<div id="question3" style="display:none;">
<p>昼食のメニューを選択していただけますでしょうか。</p>
<label><input type="radio" name="inpname3"value="1" onClick="pagechange()" checked>バランスを考えて〇している</label>　
<br>
<label><input type="radio" name="inpname3"value="2" onClick="pagechange()">好きなもの〇している</label>
</div>
<div id="question4" style="display:none;">
<p>夕食のメニューを選択していただけますでしょうか。</p>
<label><input type="radio" name="inpname4"value="1" onClick="pagechange()" checked>4thバランスを考えて〇している</label>
<br>
<label><input type="radio" name="inpname4"value="2" onClick="pagechange()">4th好きなもの〇している</label>
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
