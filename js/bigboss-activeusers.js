document.addEventListener("DOMContentLoaded", () =>{

    //BOTAO DE COLOCAR PENDENTE (ESTADO 0)//
    const deactivateUsers = document.querySelectorAll('button[value="deactivate-user"]');

    function deactivateUserBtn(id){
        fetch("localhost/bigboss-activeusers/", {
            "method": 'POST',
            "headers":{"Content-Type": "application/x-www.urlencoded"},
            "body": id
        })

    .then(res => res.json())
    .then(res => console.log(res.json)) 
    .catch(err => console.log(err))
    };


    for (let deactivateUser of deactivateUsers){
        deactivateUser.addEventListener("click", (e) => {
            let id = e.target.parentElement.dataset.id;
            deactivateUserBtn(id);
            e.target.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
        });
    }


});