function registerUser() {
    var firstName = $("input[name='firstname']").val();
    var lastName = $("input[name='lastname']").val();
    var email = $("input[name='email']").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirmpassword").val();

    // if (password !== confirmpassword) {
    //     $("#passwordError").text("Passwords do not match");
    //     return;
    // }
    $.ajax({
        type: "POST",
        url: "php/register.php",
        data: {
            firstname: firstName,
            lastname: lastName,
            email: email,
            password: password,
            confirmpassword: confirmPassword
        },
        success: function(response) {
           if(response == 'Registration Successful'){
                $("#success-message").text("Registered successfully!");
            }else if (response === 'Email Already Exists') {
                alert("Email already exists. Please use a different email.");
            }
            else{
                alert("Registration Failed");
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
