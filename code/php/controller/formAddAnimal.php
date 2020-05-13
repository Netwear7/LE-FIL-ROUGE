                            <?php session_start();?>
                            <div class="row">
                                <div class="col-12 ">
                                    <form enctype="multipart/form-data" id="addUserAnimal">
                                        <div class="row mt-3">
                                            <!--titre-->
                                            <div class="col-lg-12 text-center">
                                                <h3 class="mt-2">Ajoutez votre compagnon</h3>                                                
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-3 ">
                                            <div class="col-12 ">
                                                <div class="row mt-3">
                                                    <div class="col-12  text-center">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                <h3>Nom :</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-sm-12 offset-4">
                                                                <input type="text" class="form-control" id="nomAnimal" name="nomAnimal">
                                                            </div>
                                                            <div class="col-lg-2 col-sm-12 offset-5">
                                                                <label for="inputDateNaissance" class="mt-2">Date de naissance : </label>
                                                                <input type="date" class="form-control" id="dateNaissance" name="dateNaissance">
                                                            </div >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5 ">
                                                    <div class="col-4 offset-4"><input type="file" name="photo" id="photo" accept="image/png, image/jpeg"></div>
                                                </div>

                                                <div class="row mt-3 ">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="inputEspece" class="mt-2">Espece : </label>
                                                        <select class="form-control" id="nom_espece" name="nom_espece">
                                                            <option>Selectionnez une race</option>
                                                            <option>Chat</option>
                                                            <option>Chien</option>
                                                        </select>
                                                        <label for="inputRace" class="mt-2">Race :</label>
                                                            <select class="form-control" id="popSelect" name="race">
                                                            </select>
                                                        <label for="inputSexe" class="mt-2">Sexe : </label>
                                                            <select class="form-control" name="sexe" id="selectSexe">
                                                                <option>Mâle</option>
                                                                <option>Femelle</option>
                                                            </select>

                                                        <label for="inputNumeroPuce" class="mt-2" >Numéro d'identification : </label>
                                                            <input type="text" class="form-control" id="numeroPuce" name="numeroPuce" placeholder="Numéro de Puce Electronique">
                                                        <label for="textAreaCaractere" class="mt-2">Caractère :</label>
                                                            <textarea class="form-control " id="textAreaCaractere" name="caractere" rows="3"></textarea>                          
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="inputPoils" class="mt-2">Poils :</label>
                                                                <select class="form-control " class="selectPoils" name="robe" id="robe">
                                                                    <option>Courts</option>
                                                                    <option>Mi-longs</option>
                                                                    <option>Long</option>
                                                                </select>
                                                            <label for="inputCouleur" class="mt-2">Couleur :</label>
                                                                <select class="form-control" class="selectCouleur" name="couleur" id="popCouleur">

                                                                </select>
                                                            <label for="inputTaille" class="mt-2" >Taille <small> (en centimètres)</small> :</label>
                                                                <input class="form-control " type="float" placeholder="100" name="taille" id="taille">
                                                            <label for="inputPoids" class="mt-2" >Poids <small> (en Kg)</small> :</label>
                                                                <input class="form-control " type="float" placeholder="1.3" name="poids" id="poids">
                                                            <label for="specTextArea" class="mt-2">Spécificités :</label>
                                                            <textarea class="form-control"  id="specificites" name="specificites" rows="3"></textarea>
                                                            <input type="hidden" name="idUtilisateur" id="idUtilisateur" value="<?php echo $_SESSION["user_id"]?>">
                                                            <input type="hidden" name="addAnimal">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 ">
                                                    <div class="col-lg-3 col-sm-12 offset-3">
                                                        <button type="button submit" id="addAnimalButton" class="btn btn-block btn-outline-info">Ajouter</button>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12">
                                                        <button type="button"  id="abortAddAnimal" class="btn btn-block btn-outline-info">Annuler</button>
                                                    </div>                                            
                                                </div>

                                                <div class="row mb-3" id="resultAjoutAnimal">

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <script src="../../javascript/addUserAnimal.js"></script>
                            <script src="../../javascript/scriptDisplayRaceInAddAnimals.js"></script>
                            <script src="../../javascript/scriptDisplaySelectColors.js"></Script>
                            <script src="../../javascript/abortAddUserAnimal.js"></script>