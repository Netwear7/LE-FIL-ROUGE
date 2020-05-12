$(document).ready(function(){

    function onClickBtnLike(e){
        var user = this.querySelector('input.like_user_id').value;
        var animal = this.querySelector('input.like_animal_id').value;
        console.log(user);
        console.log(animal);
        const icone = this.querySelector('i');
        e.preventDefault();
        $.post(
            'animalLike.php',
            {
                userLike:user,
                animalLike:animal
            },           
        )
        if (icone.classList.contains('fas'))
            icone.classList.replace('fas', 'far')
        else
            icone.classList.replace('far', 'fas')      
    }

    document.querySelectorAll('a.js-like').forEach(function(link){
        link.addEventListener('click', onClickBtnLike);
    })
    
})