window.setTimeout(function () {
	$(".alert").fadeTo(1500, 0).slideUp(500, function () {
		$(this).remove();
	});
}, 2000);

var confirmBox = function(text,callback=''){
	swal({
		title: 'ยืนยันการทำรายการ?',
		text: text,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'ตกลง',
		cancelButtonText:'ยกเลิก',
		allowOutsideClick:false
	}).then(function () {
		callback();
	}).catch(swal.noop);
};

var alertBox = function(title,text,type,callback=''){
	swal({
		title: title,
		text: text,
		type: type,
		confirmButtonText: 'ตกลง',
		allowOutsideClick:false
	}).then(function(){
		callback();
	}).catch(swal.noop);
};


var confirmAjax = function(text, conf, callback =''){
	swal({
		title: 'ยืนยันการทำรายการ?',
		text: text,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'ตกลง',
		cancelButtonText:'ยกเลิก',
		allowOutsideClick:false,
		showLoaderOnConfirm: true,
		preConfirm: function () {
			return new Promise(function (resolve, reject) {	
				callback(function(data){
					if(data.state == 1 && data.msg ==''){
						resolve();	
					} else {
						reject('เกิดข้อผิดพลาด! \n\r '+ data.msg );
					}
				});				
			});
			
		}
	}).then(function () {		
		swal(
			'ทำรายสำเร็จ',
			conf,
			'success'
			)
	}).catch(swal.noop);
};