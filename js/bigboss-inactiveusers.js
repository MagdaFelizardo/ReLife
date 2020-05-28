document.addEventListener("DOMContentLoaded", () =>{

    //BOTAO DE COLOCAR USER ACTIVO (ESTADO 1)//
    const activateUsers = document.querySelectorAll('button[value="activate-user"]');

    function activateUserBtn(id){
        fetch("localhost/bigboss-inactiveusers/", {
            "method": 'POST',
            "headers":{"Content-Type": "application/x-www.urlencoded"},
            "body": id
        })

    .then(res => res.json())
    .then(res => console.log(res.json)) 
    .catch(err => console.log(err))
    };


    for (let activateUser of activateUsers){
        activateUser.addEventListener("click", (e) => {
            let id = e.target.parentElement.dataset.id;
            activateUserBtn(id);
            e.target.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
        });
    }


});