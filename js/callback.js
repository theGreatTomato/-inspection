function callback(data){
	console.log(data);
	//故障图页面
	var up_total = 0;
	var down_total = 0;
	data.forEach(function(item,index){
		//上行
		if(item.up_down === '上行'){
			up_total++;
			for (var i = 0; i < $('#stationName td').length; i++) {
				if(item.addr === $('#stationName td').eq(i).text()){
					$('#up td').eq(i).text(function(){
						if($('#up td').eq(i).text()){
							$('#up td').eq(i).text(parseInt($('#up td').eq(i).text())+1);
						}
						else{
							$('#up td').eq(i).text(1);
						}
					});
					if($('#up td').eq(i).find('div').length === 0){
						$('#up td').eq(i).wrapInner('<div class = "orange"></div>');
					}
				}
			}
		}
		//下行
		else{
			down_total++;
			for (var i = 0; i < $('#stationName td').length; i++) {
				if(item.addr === $('#stationName td').eq(i).text()){
					$('#down td').eq(i).text(function(){
						if($('#down td').eq(i).text()){
							$('#down td').eq(i).text(parseInt($('#down td').eq(i).text())+1);
						}
						else{
							$('#down td').eq(i).text(1);
						}
					});
					if($('#down td').eq(i).find('div').length === 0){
						$('#down td').eq(i).wrapInner('<div class = "orange"></div>');
					}
				}
			}
		}
		$('#up th').eq(1).text(up_total);
		$('#down th').eq(1).text(down_total);
	})
	//详细数据
	function createTable(j){
		var j = (j-1)*5; 
		for(let i = data.length-j-1 ; i > data.length-j-6; i--){
			if(i>0)
			createTr(data[i]);
		}
		function createTr(data){
			var txt = "<td>"+data.date+"</td>";
			txt = txt+"<td>"+data.up_down+"</td>";
			txt = txt+"<td>"+data.addr+"</td>";
			txt = txt+"<td>"+data.variety+"</td>";
			txt = txt+"<td>"+data.grade+"</td>";
			txt = txt+"<td class ='image_td'>"+"<span style = 'display:none;'>"+data.image+'</span>'+'查看'+"</td>";
			txt = txt+"<td>"+data.inspector+"</td>";
			var tr = $('<tr></tr>').append(txt);
			$('#LDTable').append(tr);
		}
	}
	createTable(1);//传页数，初始页是第一页面
	var page = 1;
	//tab标签页
	//最后那项的值
	function max(){
			if(data.length%5 === 0){
				return parseInt(data.length/5);
			}
			else{
				return parseInt(data.length/5)+1;
			}
	}
	(function(){
		$('.last').html($('.last').text()+max());
	})()
	$('.longData .tab button').click(function(){
		var num = parseInt($('#page_index').val());
		console.log(num,'num')
		if(num != '' && num <= max() && num > 0){
			$('#LDTable tr').not('#tableHead').remove();
			page = num;
			createTable(page);
			$('#page_index').val('');
			$('#page_index').attr('placeholder',page)	
		}
	})
	//上一页
	$('.tab li').eq(0).click(function(){
		if(page > 1){
			console.log('上一页')
			console.log(page)
			$('#LDTable tr').not('#tableHead').remove();
			createTable(--page);
			$('#page_index').attr('placeholder',page)
		}
	})
	//下一页
	$('.tab li').eq(1).click(function(){
		if(page < max()){
			console.log('下一页	')
			$('#LDTable tr').not('#tableHead').remove();
			createTable(++page);
			$('#page_index').attr('placeholder',page)
		}
	})
	$('#page_index').focus(function(){$('#page_index').attr('placeholder','')})
	$('#page_index').blur(function(){$('#page_index').attr('placeholder',page)})
	$('.image_td').click(function(){
		var src = 'insertData/upload/'
		src= src + $(this).find('span').text();
		console.log(src)
	$('#image_mask img').attr('src',src);
	$('#image_mask').css('display','block');	
	})
}
