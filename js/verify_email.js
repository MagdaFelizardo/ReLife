document.addEventListener("DOMContentLoaded", () =>{

    //
    const email_input = document.getElementById("email");

    function verify_email(){
        fetch("localhost/register/", {
            "method": 'POST["verify"]',
            "headers":{"Content-Type": "text/plain"},
            "body": email_input.value
        })

    .then(res => res.text())
    .then(data => { document.getElementById("email_existente").textContent = data; } )
    .catch(err => console.log(err))
    };


    email_input.addEventListener("focusout", () => {
        verify_email();
    });


});