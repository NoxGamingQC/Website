var idleTime = 1;
var checkStatus = 1;
    $(document).ready(function () {
        checkIfOnline();
        setTimeout(checkIfOnline, 46000);
        var idleInterval = setInterval(timerIncrement, 100000);

        $(this).mousemove(function (e) {
            checkIfOnline();
            checkStatus = 0;
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            checkIfOnline();
            checkStatus = 0;
            idleTime = 0;
        });
    });

    function checkIfOnline () {
        if(checkStatus) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/profile/update_state',
                method: 'POST',
                data: {
                    'state': 'online'
                },
                
                success: function() {
                    $('.user-status').addClass('status-online');
                    $('.user-status').removeClass('status-offline');
                    $('.user-status').removeClass('status-idle');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    }

    function timerIncrement() {
        idleTime = idleTime + 1;
        checkStatus = 1;
        if(idleTime > 1) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/profile/update_state',
                method: 'POST',
                data: {
                    'state': 'idle'
                },
                
                success: function() {
                    $('.user-status').addClass('status-idle');
                    $('.user-status').removeClass('status-offline');
                    $('.user-status').removeClass('status-online');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        if (idleTime > 39) {
            window.location.reload();
        }
    }

    window.addEventListener('beforeunload', function (e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/profile/update_state',
            method: 'POST',
            data: {
                'state': 'offline'
            },
            
            success: function() {
            },
            error: function (error) {
                console.log(error);
            }
        });
    });