(function(){

var _mateUserId=0
var	_chatCode;
var	_isOpen=0;
var	_revChatCode;
var	_isScrolled=0;
var _session_id = $('#session_id').data('sessionid');
var timeout;

var bindEventHandlers=(function(){  

	$('#btn_open_chat').on('click',function() {

        $('#chat_user_box').toggleClass('hidden');
        $('#chat_box').addClass('hidden');
        $('#chat_advisor').remove();
        $(this).find('span').toggleClass("fa fa-comments ti ti-close");

        //flag
        if (_isOpen == 0) {
            _isOpen=1;
            startInterval();
        }
        else {
            _isOpen=0;
            stopInterval();
        }

    });

    $('#close_advisor').click(function(){
    	$('#chat_advisor').remove();
    });

    var position = $('#chat_body').scrollTop();

    $('#chat_body').scroll(function(){
        var scroll = $('#chat_body').scrollTop();

        if (scroll < position)  {
            _isScrolled=1;
        } else {
            _isScrolled=0;
        }
        
        position = scroll;
    });

    $('#btn_send').on('click',function() {
        if ($('#chat_msg').val() == '' || $('#chat_msg').val() == ' ') {
            showNotification({title: 'Error', msg: 'Please Enter a Message!', stat: 'error' })
        } else {
            sendChat().done(function(response){
                $('#chat_body').html('');

                $.each(response.retrieve_messages, function(i,data) {
                    if (data.user_id == _session_id) {
                        $('#chat_body').append(
                            '<div class="row">'+
                                '<div class="container-fluid pull-right">'+
                                    '<div class="label label-user pull-right">'
                                        +data.message+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                    } else {
                        $('#chat_body').append(
                            '<div class="row">'+
                                '<div class="container-fluid pull-left">'+
                                    '<div class="pull-left">'+
                                        '<img style="margin-top:10px; height: 30px; width: 30px; border-radius: 50%;" src="'+ data.photo_path +'"/>'+
                                    '</div>'+
                                    '<div class="label label-others pull-left">'
                                        +data.message+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                    }
                });
            
                var objDiv = document.getElementById("chat_body");
                objDiv.scrollTop = objDiv.scrollHeight;
                $('#chat_msg').val('');
            });
        }
    });

    $('#close_chat').click(function(){
        $('#chat_box').toggleClass('hidden');
    });

    $('#chat_msg').keydown(function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            $('#btn_send').click();
        }
    });
})();


function startInterval() {
    timeout = setInterval(function() {
	        _chatCode='User'+_session_id+':'+'User'+_mateUserId;
	        _revChatCode='User'+_mateUserId+':'+'User'+_session_id;

	        retrieveMessages().done(function(response){
	            $('#chat_body').html('');
	            $('#active_count').html('('+response.status_info[0].online_count+')');
	            $('#offline_count').html('('+response.status_info[0].offline_count+')');

	            $('.online-list').html('');
	            $('.offline-list').html('');

	            $.each(response.users_status, function(i,data) {
	                if (data.is_online == 1) {
	                    $('.online-list').append(
	                    '<div class="row">'+
	                        '<div class="col-xs-2">'+
	                            '<img style="margin-top:10px; height: 30px; width: 30px; border-radius: 50%;" src="'+ data.photo_path +'" onerror="$(this)"/>'+
	                        '</div>'+
	                        '<div class="col-xs-8" style="margin-top: 15px;">'+
	                            '<span><a class="chat_box_'+ data.user_id +'" style="color: #404040;">'+ data.user_fname + ' ' + data.user_lname + ' ' + '</a></span>'+
	                        '</div>'+
	                    '</div>'
	                    );
	                } else {
	                    $('.offline-list').append(
	                        '<div class="row">'+
	                            '<div class="col-xs-2">'+
	                                '<img style="margin-top:10px; height: 30px; width: 30px; border-radius: 50%;" src="'+ data.photo_path +'"/>'+
	                            '</div>'+
	                            '<div class="col-xs-8" style="margin-top: 15px;">'+
	                                '<span><a class="chat_box_'+ data.user_id +'" style="color: #404040;">'+ data.user_fname + ' ' + data.user_lname + ' ' + '</a></span>'+
	                            '</div>'+
	                        '</div>'
	                    );
	                }

	                $('.chat_box_' + data.user_id).click(function(){
	                    _mateUserId=data.user_id;

	                    $('.chat-user').html(data.user_fname + ' ' + data.user_lname);
	                    $('#chat_box').removeClass('hidden');
	                });
	            });

	            $('img').on( 'error', function(){
	                $(this).attr('src', 'assets/img/anonymous-icon.png');
	            });
	            
	            if (response.messages.length >= 30) {
	                $('#chat_body').append('<div class="text-center see-more"><a class="see-more">See more messages...</a></div>');
	            }

	            $.each(response.messages, function(i,data) {
	                if (data.user_id == _session_id) {
	                    $('#chat_body').append(
	                        '<div class="row">'+
	                            '<div class="container-fluid pull-right">'+
	                                '<div class="label label-user pull-right">'
	                                    +data.message+
	                                '</div>'+
	                            '</div>'+
	                        '</div>'
	                    );  
	                } else {
	                    $('#chat_body').append(
	                        '<div class="row">'+
	                            '<div class="container-fluid pull-left">'+
	                                '<div class="pull-left">'+
	                                    '<img style="margin-top:10px; height: 30px; width: 30px; border-radius: 50%;" src="'+ data.photo_path +'"/>'+
	                                '</div>'+
	                                '<div class="label label-others pull-left">'
	                                    +data.message+
	                                '</div>'+
	                            '</div>'+
	                        '</div>'
	                    );
	                }
	            });


	            if (_isScrolled == 0) {
	                var objDiv = document.getElementById("chat_body");
	                objDiv.scrollTop = objDiv.scrollHeight;
	            }
	        });
	    },1000);
}

function stopInterval() {
	clearInterval(timeout);
}

	var retrieveMessages=function(){
	    return $.ajax({
	        "dataType":"json",
	        "type":"POST",
	        "url":"Chat/transaction/retrieve",
	        "data": { chat_code : _chatCode, rev_chat_code : _revChatCode }
	    });
	};

	var sendChat=function() {
	    return $.ajax({
	        "dataType":"json",
	        "type":"POST",
	        "url":"Chat/transaction/send",
	        "data": { message : $('#chat_msg').val(), chat_code : _chatCode, rev_chat_code : _revChatCode }
	    });
	};  

	var toggleIsOpen=function(){
		if (_isOpen == 0) {
			return _isOpen=1;
		} else {
			return _isOpen=0;
		}
	};

	var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };
})();