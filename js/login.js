$(function(){
	$('#submit').click(function(){
		if(!$('#user').val()){
			$('#error').css('display',"block");
			$('#info').html('你忘记输入用户id<br>');
		}
		else if(!$('#password').val()){
			$('#error').css('display',"block");
			$('#info').html('你忘记输入用户密码<br>');
		}
		else{
			loginAjax();
		}
	})
	function loginAjax(){
        $.post('login.php', {
        	position:$('#position').val(),
          	user:$('#user').val(),
          	password:$('#password').val() 
        }, function(data){
          	if(data[0] === 'false'){
          		$('#error').css('display',"block");
          		$('#info').html('')
          		$('#info').html('你输入用户id或者密码有误<br>');
          	}
          	else{
          		if($('#position').val() === '管理员'){
          			location.href = 'guanliyuan_guzhang.html';
          		}
          		else{
          			location.href = 'jiancerenyuan.html';
          		}
          	}
        },"json");
	}
	//设置高度
	var height =$('.container .header').width() * 186/963;
	height = parseInt(height);
	$('.container .header').height(height);
})