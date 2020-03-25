$("#ajoutAnimal").submit( function(e) {
    e.preventDefault();
  });


  $('#ajoutAnimal').click( function() {
    $.ajax({
        url: 'compte.php',
        type: 'post',
        dataType: 'json',
        data: $('#ajoutAnimal').serialize(),
        success: function(data) {
                   // ... do something with the data...
                 }
    });
});