<script>
$(document).ready(function() {
    // Gestion upload avatar
    document.getElementById('image').addEventListener('change', function() {
        const fileName = this.value;
        const allowedExtensions = ['.jpg', '.png', '.jpeg'];
        const fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();

        if (!allowedExtensions.includes(fileExtension)) {
            alert('Invalid file type. Please select a JPG, JPEG or PNG image.');
            this.value = ''; 
        }
    });

    $('#image').on('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            if(['image/png','image/jpg','image/jpeg'].includes(input.files[0].type)) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#avatarURL').val(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    });

    // Submit AJAX
    $('#submit').on('click', function() {
        $.ajax({
            url: '/' + $('html').attr('lang') + "/user/me/save",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {
                'username': $('#username').val(),
                'firstname': $('#firstname').val(),
                'lastname': $('#lastname').val(),
                'birthdate': $('#birthdate').val(),
                'country': $('#country').val(),
                'gender': $('#gender').val(),
                'pronouns': $('#pronouns').val(),
                'about_me': $('#aboutMe').val(),
                'xbox_gamertag': $('#xbox').val(),
                'minecraft_uuid': $('#minecraft').val(),
                'roblox': $('#roblox').val(),
                'theme': $('#theme').val(),
                'color': $('#color').val(),
                'show_firstname': $('#showFirstname').is(':checked'),
                'show_lastname': $('#showLastname').is(':checked'),
                'show_birthdate': $('#showBirthdate').is(':checked'),
                'show_age': $('#showAge').is(':checked'),
                'show_gender': $('#showGender').is(':checked'),
                'language': $('#language').val(),
                'avatar_url': $('#avatarURL').val(),
                'avatar_preference': $('#avatar_preference').val()
            },
            beforeSend: function() {
                $('#submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
                $('#submit').addClass('disabled').attr('disabled', true);
            },
            success: function () {
                window.location.href = '/{{app()->getLocale()}}/user/{{$user->id}}';
            },
            error: function () {
                console.log('Save failed. An error occured.');
            },
            complete: function() {
                $('#submit').html('{{trans('general.save')}}').removeClass('disabled').attr('disabled', false);
            }
        });
    });
});
</script>