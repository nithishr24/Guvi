function profileUser() {
        var formData = {
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            age: $("#age").val(),
            dob: $("#dob").val(),
            phoneNumber: $("#phoneNumber").val(),
            currentPassword: $("#currentPassword").val(),
            newPassword: $("#newPassword").val(),
            confirmNewPassword: $("#confirmNewPassword").val(),
        };

        // AJAX request
        $.ajax({
            type: "POST",
            url: "php/profile.php",  // Replace with the actual PHP script to handle form submission
            data: formData,
            success: function(response) {
                alert(response);  // You can customize how to handle the response
            },
            error: function(error) {
                console.log(error);
            }
        });
    }