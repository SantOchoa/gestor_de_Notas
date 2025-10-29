const form = document.forms['vacioForm'];
const forms = document.forms['startSession'];
const modal = document.getElementById('vacio');
const userNameInput = document.getElementById('user');
const userCodeInput = document.getElementById('pwd');

forms.addEventListener('submit',function(event){
    event.preventDefault();
    if (userNameInput.value === "" || userCodeInput.value === "") {
        modal.classList.add('show');
    }else{
        forms.action="operations/start-session.php";
        forms.method="post";
        forms.submit();
    }
    
    
});

form.addEventListener('reset',()=>{
    modal.classList.remove('show');
});