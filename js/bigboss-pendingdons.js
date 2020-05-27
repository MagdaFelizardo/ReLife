document.addEventListener("DOMContentLoaded", () =>{

    //BOTAO DE APAGAR PENDENTES//
    const deleteDons = document.querySelectorAll('button[value="delete"]');

    function deleteDonBtn(id){
        fetch("localhost/bigboss-pendingdons/", {
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


    //BOTAO DE APROVAR//
    const approveDons = document.querySelectorAll('button[value="approve"]');

    function approveDonBtn(id){
        fetch("localhost/bigboss-pendingdons/", {
            "method": 'POST',
            "headers":{"Content-Type": "application/x-www.urlencoded"},
            "body": id
        })

    .then(res => res.json())
    .then(res => console.log(res.json)) 
    .catch(err => console.log(err))
    };


    for (let approveDon of approveDons){
        approveDon.addEventListener("click", (e) => {
            let id = e.target.parentElement.dataset.id;
            approveDonBtn(id);
            e.target.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
        });
    }

});