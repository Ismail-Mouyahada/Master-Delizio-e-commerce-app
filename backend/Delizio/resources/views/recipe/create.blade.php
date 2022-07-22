@extends('layouts.main')



@section('title')
    Soumession des recettes
@endsection

@section('main')
    <!-- Submit Recipe-->
    <div class="submit">
        <div class="title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Soumession de la recette</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <form method='POST' action='/recette/enregistrer' enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="form-group">
                                <label>Titre la recette</label>
                                <input type="text" name="title" class="form-control">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Catégorie</label>
                                <select class="js-search-category form-control" name="categorie"
                                    data-placeholder="choisssez une catégorie">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                    @endforeach

                                </select>
                                @error('categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Résumé</label>
                                <textarea class="form-control" rows="4" name="summary" required="required"></textarea>
                                @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Etiquette</label>
                                <input type="text" name="tag" class="form-control">
                                @error('tag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>lien de video</label>
                                <input type="text" name="video" class="form-control">
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Image Recette</label>
                                <input type="file" name="main_image" class="form-control dropzone" id="dropzone">
                                @error('main_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label>Téléverser D'autres images</label>
                                <input type="file" name="images[]" accept="image/*" multiple="multiple"  class="form-control dropzone" id="dropzone">
                                @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label>Ingredients:</label>

                                <div id="sortable">
                                    <div class="box ui-sortable-handle">
                                        <div class="row">
                                            <div class="col-lg-1 col-sm-1">
                                                <i class="fa fa-arrows" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-lg-3 col-sm-3">
                                                <input type="text" name="ingredient[]" class="form-control"
                                                    placeholder="Nom de l'ingredient">
                                                @error('ingredient')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 col-sm-4">
                                                <input type="text" name="quantite[]" class="form-control"
                                                    placeholder="Quantité ou information additionnelle">
                                                @error('quantite')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-2 col-sm-2">
                                                <input type="text" name="unite[]" class="form-control"
                                                    placeholder="Unité">
                                                @error('unite')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-1 col-sm-1">
                                                <i class="fa fa-times-circle-o minusbtn" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a href="#" class="btn btn-light">Ajouter un nouveau ingredient</a>

                            </div>

                            <div class="form-group">
                                <label>Etapes:</label>

                                <div id="sortableStep1">
                                    <div class="box ui-sortable-handle">
                                        <div class="row">
                                            <div class="col-lg-1 col-sm-1">
                                                <i class="fa fa-arrows" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="text" name="step_title[]" class="form-control"
                                                    placeholder="nom de l'étape">

                                            </div>

                                            <div class="col-lg-12 col-sm-12">

                                                <textarea name="step_details[]" id="quantite" class="w-100 my-2" rows="10"
                                                    placeholder="description de l'etape "></textarea>


                                            </div>

                                            <div class="col-lg-1 col-sm-1">
                                                <i class="fa fa-times-circle-o minusbtn1" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a href="#" class="btn btn-dark stepGen">Ajouter un nouveau etape</a>

                            </div>

                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" name="description" rows="4" required="required"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Informations supplimentaires</label>
                                <hr>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Repos</label>
                                <div class="col-sm-10">
                                    <input type="number" name="temps_repos" class="form-control">
                                </div>
                                @error('temps_repos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Temps de préparation</label>
                                <div class="col-sm-10">
                                    <input type="number" name="temps_preparation" class="form-control">
                                </div>
                                @error('temps_preparation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Temps de cuisson</label>
                                <div class="col-sm-10">
                                    <input type="number" name="temps_cuisson" class="form-control">
                                </div>
                                @error('temps_cuisson')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Valeur Alimentaire</label>
                                <hr>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Calories</label>
                                <div class="col-sm-10">
                                    <input type="number" name="calories" class="form-control">
                                    @error('calories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Carbohydrates</label>
                                <div class="col-sm-10">
                                    <input type="number" name="carbohydrates" class="form-control">
                                    @error('carbohydrates')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gras</label>
                                <div class="col-sm-10">
                                    <input type="number" name="gras" class="form-control">
                                    @error('gras')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Proteines</label>
                                <div class="col-sm-10">
                                    <input type="number" name="potreines" class="form-control">
                                    @error('potreines')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cholesterol (g)</label>
                                <div class="col-sm-10">
                                    <input type="number" name="cholesterole" class="form-control">
                                    @error('cholesterole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Niveau de diffculté</label>
                                <div class="col-sm-10">
                                    <select class="js-search-category form-control" name="difficulte"
                                        data-placeholder="selectionnez la difficulté">
                                        <option value="1">Facile</option>
                                        <option value="2">Moyenne</option>
                                        <option value="3">Difficile</option>
                                    </select>
                                    @error('difficulte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Budget (€)</label>
                                <div class="col-sm-10">
                                    <input type="number" name="budget" class="form-control"
                                        placeholder="Coût total de la recette pour 1 personne">

                                    @error('budget')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>


                            <button type="submit" class="btn btn-submit">Soumettre la recette</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endSection
