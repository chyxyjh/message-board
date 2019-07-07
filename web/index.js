var url = 'http://106.12.202.189:8080/';
$(function() {
    loadMessages();
    $('#input-submit').click(function() {
        var contentValue = $('#input-content').val();
        var authorValue = $('#input-author').val();
        if (contentValue.length == 0 || authorValue.length == 0) {
            alert('请输入后提交');
            return false;
        }
        var submitData = {
            'content': contentValue,
            'author': authorValue,
            'time': getDatetime()
        };
        console.log(submitData);
        $.ajax({
            url: url,
            type: 'POST',
            data: submitData,
            success: function( response ) {
                console.log(response);
                loadMessages();
            }
        });
        return false;
    });
});

function loadMessages() {
    
    $.get(url, function(result) {
        renderMessages(result.data);
    });
}

function renderMessages(messages) {
    var messageTemplate = '<div class="panel panel-default">'
    + '<div class="panel-body">#{content}</div>'
    + '<div class="panel-footer">'
    + '<div class="row">'
    + '<div class="col-md-8"></div>'
    + '<div class="col-md-2">作者：#{author}</div>'
    + '<div class="col-md-2">#{time}</div>'
    + '</div>  </div> </div>';

    var keyWords = ['content', 'author', 'time'];
    var messageStrArr = [];
    messages.forEach((messageJson) => {
        var messageObj = JSON.parse(messageJson);
        var messageStr = messageTemplate;
        keyWords.forEach((keyWord) => {
            messageStr = messageStr.replace('#{' + keyWord + '}', messageObj[keyWord]);
        });
        messageStrArr.push(messageStr);
    });
    $('#messages-result').html(messageStrArr.join(''));
}

function getDatetime() {
    var d = new Date();
    var year = d.getFullYear();
    var month = change(d.getMonth() + 1);
    var day = change(d.getDate());
    // todo
    var hour = change(d.getHours());
    var minute = change(d.getMinutes());
    var second = change(d.getSeconds());
    
    function change(t) {
        if (t < 10) {
            return "0" + t;
        } else {
            return t;
        }
    }

    var time = year + '-' + month + '-' + day + ' ' 
            + hour + ':' + minute + ':' + second;

    return time;
}