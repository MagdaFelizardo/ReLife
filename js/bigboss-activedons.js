document.addEventListener("DOMContentLoaded", () =>{

    //BOTAO DE APAGAR ACTIVOS//
    const deleteDons = document.querySelectorAll('button[value="delete"]');

    function deleteDonBtn(id){
        fetch("localhost/bigboss-activedons/", {
            "method": 'DELETE',
            "headers":{"Content-Type": "application/x-www.urlencoded"},
            "body": id
        })

    .then(res => res.json())
    .then(res => console.log(res.json)) 
    .catch(err => console.log(err))
    };


    for (let deleteDon of deleteDons){
        deleteDon.addEventListener("click", (e) => {
            let id = e.target.parentElement.dataset.id;
            deleteDonBtn(id);
            e.target.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
        });
    }

    //BOTAO DE COLOCAR PENDENTE (ESTADO 0)//
    const disapproveDons = document.querySelectorAll('button[value="disapprove"]');

    function disapproveDonBtn(id){
        fetch("localhost/bigboss-activedons/", {
            "method": 'POST',
            "headers":{"Content-Type": "application/x-www.urlencoded"},
            "body": id
        })

    .then(res => res.json())
    .then(res => console.log(res.json)) 
    .catch(err => console.log(err))
    };


    for (let disapproveDon of disapproveDons){
        disapproveDon.addEventListener("click", (e) => {
            let id = e.target.parentElement.dataset.id;
            disapproveDonBtn(id);
            e.target.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
        });
    }

});