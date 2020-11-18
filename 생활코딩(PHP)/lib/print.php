<!-- htmlspecialchars(사용자가 입력한 정보)
사용자가 입력한 정보가 보안에 취약할 수 있기 때문.
xss: cross site scripting
a테그(사용자가 입력한 정보를 가지고)로 페이지가 넘어갔을 때 넘어간 페이지 안에 
어떠한 보안에 위험한 자바스크립트 코드가 있을 수 있음.
그래서 자바스크립트 코드가 실행되지 않고 html코드로 그냥 문자열로 변환해주는 함수.
-->


<?php
function print_title(){
	if(isset($_GET['id'])){
		echo htmlspecialchars($_GET['id']);
	} else{
		echo 'welcome';
	}
}

function dataList(){
	$list = scandir('./data');
    $i = 0;
    
	while($i<count($list)){
        $title = htmlspecialchars($list[$i]);
		if($list[$i] != '.'){
			if($list[$i] != '..'){
				?>
				<li><a href = 'index.php?id=<?=$title?>'> <?=$title?> </a></li>
				<?php
			}
		}
		$i += 1;
	}
}


function description(){
	if(isset($_GET['id'])){
		$basename = basename($_GET['id']);
		//basename(): ./ or ../ 부모 디렉토리를 뜻하는 저것들을 없애주고 파일명만ㅇㅇ
		//사용자가 url 창에 ./ or ../ 사용해서 부모 디렉토리 갈 수 있게하면 보안문제.
			echo htmlspecialchars(file_get_contents("data/".$basename));
		} else{
			echo 'welcome!';
		}
}
?>

