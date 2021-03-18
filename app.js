

//ενα σκριπτακι για να μας εμφανιζεται το password 
function showpass() {
    var x = document.getElementById("password");

    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  