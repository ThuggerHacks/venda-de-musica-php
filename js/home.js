function iniciarModal(modalID){
const modal = document.getElementById('modalID');
if(modal){
modal.classList.add('mostrar');

modal.addEventListener('click',(e)=> {
if(e.target.id == modalID || e.target.className == 'fechar'){
    modal.classList.remove('mostrar');
}

});
}}
const btn = document.querySelector('#voltar');
btn.addEventListener('click',()=>iniciarModal('modalConfirmacao'))


function close(){
    let modal = document.querySelector(".modal");
    modal.style.display = "none";
}
