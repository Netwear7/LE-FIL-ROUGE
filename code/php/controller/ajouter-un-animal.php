<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Ajouter un compagnon</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="header-and-color-test.css">
</head>

<body>

    <div class="row mt-5">

        <div class="col-lg-2">

        </div>

        <div class="col-lg-10">

            <form>
                <div class="col-lg-10 offset-lg-1 border border-dark">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row justify-content-center">
                            <h1>Ajouter un compagnon</h1>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="Koala.jpg" class="rounded w-100" alt="img-profil-5">
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="Koala.jpg" class="rounded w-100" alt="img-profil-4">
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <img src="Koala.jpg" class="rounded w-100" alt="img-profil-3">
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <img src="Koala.jpg" class="rounded w-100" alt="img-profil-2">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <img src="Koala.jpg" class="rounded w-100" alt="img-profil-1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 mt-2">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-row text-center">
                                            <label for="type"></label><div class="col-lg-12"><h4>Choisir le type :</h4></div></label>
                                    
                                            <div class="col-lg-12 form-group mt-4">
                                            <input type="text" class="form-control" placeholder="Nom">
                                            </div>
                                            <div class="col-lg-12 form-group mt-2">
                                            <input type="text" class="form-control" placeholder="Age">
                                            </div>
                                            <div class="col-lg-12 form-group mt-2">
                                                <input type="text" class="form-control" placeholder="Poil">
                                            </div>
                                            <div class="col-lg-12 form-group mt-2">
                                                <select id="type" class="form-control">
                                                    <option selected>Race</option>
                                                    <option>...</option>
                                                    <option>...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 form-group mt-2">
                                                <input type="text" class="form-control" placeholder="Taille">
                                            </div>
                                            <div class="col-lg-12 form-group mt-2">
                                                <input type="text" class="form-control" placeholder="Poids">
                                            </div>
                                            <div class="col-lg-12 form-group mt-5">
                                                <button type="button" href="#" class="btn btn-secondary btn-lg" style="width:100%">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row text-center">
                                            <div class="form-group col-lg-12">
                                                <select id="type" class="form-control">
                                                    <option selected>Animal</option>
                                                    <option>...</option>
                                                    <option>...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="form-check col-lg-6 mt-2">
                                                <input class="form-check-input" type="radio" name="radio-male" id="radio-male" value="male" checked>
                                                <label class="form-check-label" for="radio-male">
                                                Mâle
                                                </label>
                                            </div>
                                            <div class="form-check col-lg-6 mt-2">
                                                <input class="form-check-input" type="radio" name="radio-femelle" id="radio-femelle" value="femelle">
                                                <label class="form-check-label" for="radio-femelle">
                                                Femelle
                                                </label>
                                            </div>
                                            <div class="col-lg-12 form-group mt-3">
                                                <input type="text" id="numero-puce" class="form-control" placeholder="N° de la puce">
                                            </div>
                                            <div class="col-lg-12 form-group mt-2">
                                                <textarea rows="4" id="comportement" class="form-control" placeholder="Comportement :"></textarea>
                                            </div>
                                            <div class="col-lg-12 form-group mt-2">
                                                <textarea rows="4" id="Particularités" class="form-control" placeholder="Particularités : Dîtes nous-en un peu plus ..."></textarea>
                                            </div>
                                            <div class="col-lg-12 form-group mt-5">
                                                <button type="button" href="#" class="btn btn-primary btn-lg" style="width:100%">valider</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>


 

</body>

</html>