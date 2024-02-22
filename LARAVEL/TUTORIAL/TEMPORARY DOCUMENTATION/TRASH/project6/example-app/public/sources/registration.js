$(document).ready(function() {
    // Do anything
    $(".registration-sign-up").click(function(){
        let name = $(".registration-name").val();
        let email = $(".registration-email").val();
        let password = $(".registration-password").val();

        let data = new registration_details(name,email,password)
        let validate = data.validate();

        if(validate == ""){
            $.ajax({
                type: "POST",
                url: "/registration/addaccount",
                data: {data},
                dataType: "dataTpye",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response, textStatus, jqXHR) {
                    //Do anything
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.table(jqXHR)
                }
            });
        }else{
            console.log("error");
        }
    })
});
class registration_details{
    name;
    email;
    password;
    constructor(set_name,set_email,set_password){
        this.name = set_name
        this.email = set_email
        this.password = set_password
    }
    validate(){
        let error_arr = [];
        new validate_error();
        if(this.name==""){
            error_arr.push(new validate_error(0,"name_empty","Name is invalid"));
        }
        if(this.email==""){
            error_arr.push(new validate_error(0,"email_empty","Email is invalid"));
        }
        if(this.password==""){
            error_arr.push(new validate_error(0,"password_empty","Password is invalid"));
        }
        return error_arr;
    }
}
class validate_error{
    code;
    info;
    message;
    constructor(set_code,set_info,set_message){
        this.code = set_code
        this.info = set_info
        this.message = set_message
    }
}
