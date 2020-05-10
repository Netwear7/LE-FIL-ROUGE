$(document).ready(function(){
    function onClickBtnLike(e){
        alert('cooooool');
    var user = this.querySelector('input.like_user_id').value;
    var animal = this.querySelector('input.like_animal_id').value;
    console.log(user);
    console.log(animal);
    const icone = this.querySelector('i');
    e.preventDefault();
    $.post(
        'displaySelecion.php',
        {
            userLike:user,
            animalLike:animal
        }
    )
}
        document.querySelectorAll('a.js-like').forEach(function(link){
        link.addEventListener('click', onClickBtnLike);
        })
    

})