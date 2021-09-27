$(document).ready(function() {
    $('#brand').mouseenter(function() {
        $('#logo').hide(450);
        $('#name').show(500);
    });
    $('#brand').mouseleave(function() {
        $('#logo').show(500);
        $('#name').hide(450);
    });
});

function first() {
    var cheffirst = document.getElementById("fname").value;
    if (!(cheffirst.trim())) {
        document.getElementById("fvalid").innerHTML = "Pls Enter Chef First Name";
        document.getElementById("fvalid").style.color = "red";
    }
    // else{
    //     document.getElementById("fvalid").style.display="none";
    // }
}

function firstname() {
    var cheffirst = document.getElementById("fname").value;
    if (cheffirst.trim()) {
        if (cheffirst.length >= 1 && cheffirst.length <= 50) {
            document.getElementById("fvalid").innerHTML = "Valid Chef First Name";
            document.getElementById("fvalid").style.color = "green";
        } else {
            document.getElementById("fvalid").innerHTML = "InValid Chef First Name";
            document.getElementById("fvalid").style.color = "Red";
        }
    }
}

function lastn() {
    // alert();
    var cheflast = document.getElementById("lname").value;
    if (!cheflast.trim()) {
        document.getElementById("lvalid").innerHTML = "Pls Enter Chef Last Name";
        document.getElementById("lvalid").style.color = "red";
    }
    // alert("Yamik");
}

function lastname() {
    var cheflast = document.getElementById("lname").value;
    if (cheflast.trim()) {
        if (cheflast.length >= 1 && cheflast.length <= 50) {
            document.getElementById("lvalid").innerHTML = "Valid Chef First Name";
            document.getElementById("lvalid").style.color = "green";
        } else {
            document.getElementById("lvalid").innerHTML = "InValid Chef First Name";
            document.getElementById("lvalid").style.color = "Red";
        }
    }
}

function validateFileType() {
    var fileName = document.getElementById("fileName").value,
        idxDot = fileName.lastIndexOf(".") + 1,
        extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
        document.getElementById("upload").innerHTML = "Verified Images";
        document.getElementById("upload").style.color = "green";
    } else {
        document.getElementById("upload").innerHTML = "Only JPEG/PNG Allowed";
        document.getElementById("upload").style.color = "Red";
        alert("Only jpg/jpeg and png files are allowed!");
    }
}

function email() {
    var a = document.getElementById("typeemail").value;
    if (!a.trim()) {
        document.getElementById("email").innerHTML = "Pls Enter Email";
        document.getElementById("email").style.color = "Red";
    }
    // alert();
}

function checkvalid() {
    var a = document.getElementById("typeemail").value;
    regex = /^[\w\d._%+-]+@(?:[\w\d-]+\.)+(\w{2,})(,|$)/;
    if (a.trim()) {
        if (regex.test(a)) {
            document.getElementById("email").innerHTML = "VeriFied Email";
            document.getElementById("email").style.color = "green";
        } else {
            document.getElementById("email").innerHTML = "Not VeriFied Email";
            // document.getElementById("email").style.visibility = "visible";
            document.getElementById("email").style.color = "red";
        }
    }
    // alert("called");
}

function pass() {
    var a = document.getElementById("pwd").value;
    if (!a.trim()) {
        document.getElementById("password").innerHTML = "Pls Enter Password";
        document.getElementById("password").style.color = "Red";
    } else {

    }
}

function password() {
    var a = document.getElementById("pwd").value;
    regex = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})/;
    if (a.length >= 7 && a.length <= 10) {
        if (regex.test(a)) {
            document.getElementById("password").innerHTML = "Strong Password";
            document.getElementById("password").style.color = "green";
        } else if (!regex.test(a)) {
            document.getElementById("password").innerHTML = "Week Password";
            document.getElementById("password").style.color = "Red";
        }
    } else {
        document.getElementById("password").innerHTML = "Password Size 8 to 10";
        document.getElementById("password").style.color = "Red";
    }
}
window.onload = function() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("content").style.display = "block";
};