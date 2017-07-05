<div id="chat_advisor">
    <strong>JCORE Chat Beta</strong><span id="close_advisor" class="pull-right">&times;</span>
    <br>Needs to chat somebody? Just click me!
</div>

<div class="chat-box-button-wrapper">
    <button id="btn_open_chat" class="btn btn-warning chat-box-button">
        <span class="fa fa-comments"></span>
    </button>
</div>

<form id="session_id" action="" data-sessionid="<?php echo $this->session->user_id; ?>">
</form>

<div id="chat_user_box" class="panel chat-users rounded-right hidden">
    <div class="panel-heading chat-heading">
        <span class="chat-title">
            <strong style="font-size: 20px;" class="fa fa-comments"></strong>&nbsp;&nbsp;JCORE CHAT
        </span>
    </div>
    <div class="panel-body chat-users-body">
        <div class="row">
            <div class="container-fluid">
                <span>
                    <strong>Active <span id="active_count"></span></strong>
                </span>
                <div class="col-xs-12 online-list">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <span>
                    <strong>Offline <span id="offline_count"></span></strong>
                </span>
                <div class="col-xs-12 offline-list">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer chat-box-footer hidden">
        <div class="col-xs-10 message-wrapper">
            <input id="search_user" class="form-control" type="text" maxlength="160" name="message" placeholder="Search User or Groups...">
        </div>
    </div>
</div>
<div id="chat_box" class="panel chat-box hidden rounded-left rounded-bottom-left">
    <div class="panel-heading chat-heading">
        <span class="chat-title">
            <strong class="fa fa-user"></strong>&nbsp;&nbsp;<span class="chat-user"></span>
        </span>
    </div>
    <div id="chat_body" class="panel-body chat-box-body">
        <div class="row">
            <div class="container-fluid text-center show-more">
        </div>
        </div>
        <div id="chat_message_body">
        </div>
     </div>
     <div class="panel-footer chat-box-footer rounded-bottom-left">
        <div class="col-xs-10 message-wrapper">
            <input id="chat_msg" class="form-control" type="text" maxlength="160" name="message" placeholder="Enter Message Here">
        </div>
        <div class="col-xs-2">
            <a id="btn_send" class="send-link"><span class="fa fa-paper-plane"></span></a>
        </div>
    </div>
</div>