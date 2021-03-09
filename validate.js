



function validateForm() {
    // Retrieving the values of form elements 
    var email = document.forms["form"]["email"].value;
    var password = document.forms["form"]["password"].value;
  
  
  
    var emailErr = passwordErr = true;
    if(email == "" && password == ""){
        alert("Please enter your email and password");
        var form=document.getElementById("form");
        form.reset();
         return false;
    }
    // Validate email
    if(email == "") {
       alert( "Please enter your email");
       var form=document.getElementById("form");
       form.reset();
       history.go(-1);
        return false;
    } else {
        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;                
        if(regex.test(email) === false) {
            alert( "Please enter a valid email");
        } else {
          
            emailErr = false;
        }
    }

    if(password == "") {
       alert("Please enter your password");
       var form=document.getElementById("form");
       form.reset();
        return false;
    } else {
        var regex = /^(?=.*[a-z])(?=.*[0-9]).{8,}$/;                
        if(regex.test(password) === false) {
           alert("Please enter a valid password ");
        } else {
           
            passwordErr = false;
        }
    }
   
    if(emailErr && passwordErr == true){
        var form=document.getElementById("form");
        form.reset();
        return false;
    }else alert("email: "+email+"pass: "+password);
        history.go(-1);
    
    

       
    
};