var idleTime = 0;
    $(document).ready(function () {
        var idleInterval = setInterval(timerIncrement, 15000);

        $(this).mousemove(function (e) {
            checkIfOnline();
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            checkIfOnline();
            idleTime = 0;
        });
    });

    function checkIfOnline () {
        if(idleTime != 0 && idleTime <= 1) {
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
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    }

    function timerIncrement() {
        idleTime = idleTime + 1;
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