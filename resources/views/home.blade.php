@extends('layouts.app')
@section('title')
Accueil
@endsection
@section('content')
<div class="container px-5">
    <div class="row justify-content-center flex-grow-2">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        <div class="card">
        <div class="card-header fs-4"> Demande De Préinscription</div>
        <div class="card-body">
            <form class="form-submit" id="user-data-information" data-userID = {{$userID}}>
                    <div id="preinscription">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Information Personnel
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4">
                                    <div class="card">
                                        <div class="card-body row g-2">
                                            <form class="needs-validation" novalidate>
                                                <div class="col-md-6">
                                                    <label for="prenom" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" id="prenom" name="surname" required>
                                                     <div class="valid-feedback">
                                                        Looks good!
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" id="nom" name="name" required>
                                                     <div class="valid-feedback">
                                                    Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="pays-de-naissance" class="form-label">Pays de naissance</label>
                                                    <input type="text" class="form-control" id="pays-de-naissance" name="country" placeholder="" required>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="province" class="form-label">Province</label>
                                                    <input type="text" class="form-control" id="province" name="province"  required>
                                                    <div class="invalid-feedback">
                                                        Please provide a province.
                                                        </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="ville-de-naissance" class="form-label">Ville De Naissance</label>
                                                    <input type="text" class="form-control" id="ville-de-naissance" name="city_of_birth" required>
                                                    <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="sex" class="form-label">Sexe</label>
                                                    <select id="sex" class="form-select" name="sex" required>
                                                    <option selected>Choose...</option>
                                                    <option value="M">Masculin</option>
                                                    <option value="F">Féminin</option>
                                                    </select>
                                                     <div class="invalid-feedback">
                                                        Please select a sex.
                                                        </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary" id="btn-submit-personnal-informations">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Documents
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="g-3 row form-submit" id="user-documents">
                                                <div class="mb-3 col-md-6 ">
                                                    <label for="formFile" class="form-label">Photocopie Carte D'identité Ou Passport</label>
                                                    <input class="form-control bg-secondary-subtle" type="file" id="formFile" name="passport_pdf_or_img">
                                                </div>
                                                <div class="mb-3 col-md-6 ">
                                                    <label for="formFile" class="form-label">Dernier Diplome</label>
                                                    <input class="form-control bg-secondary-subtle" type="file" id="formFile" name="last_diploma">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formFileMultiple" class="form-label">Deux Derniers Bulletins</label>
                                                    <input class="form-control bg-secondary-subtle" type="file" id="formFileMultiple" multiple name="two_last_bulletin">
                                                </div>
                                                <div class="col-12">
                                                        <button type="submit" class="btn btn-primary" id="btn-submit-documents">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Formations
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card">
                                        <div class="card-header fs-3">
                                            Demande d'Admission 
                                        </div>
                                        <div class="card-body">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Ajouter Une Formation
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Choisir Une Formation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="accordion" id="modalExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingModalOne">
                                                                <button
                                                                    class="accordion-button"
                                                                    type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#modalCollapseOne"
                                                                    aria-expanded="true"
                                                                    aria-controls="modalCollapseOne"
                                                                >
                                                                    LICENCE
                                                                </button>
                                                            </h2>
                                                            <div
                                                                id="modalCollapseOne"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="headingModalOne"
                                                                data-bs-parent="#modalExample"
                                                            >
                                                                <div class="accordion-body">
                                                                    <div class="list-group" id="formation-licence">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingModalTwo">
                                                                <button
                                                                    class="accordion-button"
                                                                    type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#modalCollapseTwo"
                                                                    aria-expanded="true"
                                                                    aria-controls="modalCollapseTwo"
                                                                >
                                                                    MASTER
                                                                </button>
                                                            </h2>
                                                            <div
                                                                id="modalCollapseTwo"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingModalTwo"
                                                                data-bs-parent="#modalExample"
                                                            >
                                                                <div class="accordion-body">
                                                                    <div class="list-group" id="formation-master">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingModalThree">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#modalCollapseThree"
                                                                    aria-expanded="true" aria-controls="modalCollapseThree">
                                                                    INGENIEUR
                                                                </button>
                                                            </h2>
                                                            <div id="modalCollapseThree" class="accordion-collapse collapse" aria-labelledby="headingModalThree"
                                                                data-bs-parent="#modalExample">
                                                                <div class="accordion-body">
                                                                    <div class="list-group" id="formation-ingenieur">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nom Formation</th>
                                                        <th scope="col">Cycle</th>
                                                        <th scope="col">Département</th>
                                                        <th scope="col">Prix</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Informatique Appliquée</td>
                                                        <td>LICENCE 1</td>
                                                        <td>Génie Logiciel</td>
                                                        <td>850000</td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Feedback
                                </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card p-2">
                                        <div class="card-text">Vos impressions sur les procedures d'inscriptions :</div>
                                        <div class="card-body">
                                            <form action="" class="form-submit" id="feedback">
                                                <div class="form-floating mb-3 w-75">
                                                    <textarea class="form-control" placeholder="Leave a comment here" name="feedback" id="floatingTextarea" style="height: 100px;" required></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                                <button type="submit" class="btn btn-primary" id="btn-submit-feedback"> <i class="bi bi-send"></i> Envoyer</button>
                                                    </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="d-grid gap-2 mt-3"><button type="button" name="" id="candidate" class="btn btn-primary" disabled> Candidatez</button></div>
        </form>
    </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
