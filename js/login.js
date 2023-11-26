function loginUser() {
    var email = $("#email").val();
    var password = $("#password").val();

    
    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: {
            email: email,
            password: password
        },

        success: function(response) {
            if(response == 'success'){
                window.location.href='profile.html';
            }else{
                $("#success-message").text("Invalid Credentials");
            }
        },
        error: function(error) {
            
            console.log(error);
         
        }
    });
}
