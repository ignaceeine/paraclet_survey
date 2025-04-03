@extends('layouts.master')
@section('title','Nouveau feedback')
@section('content')
    <div class="wrapper_centering">
        <div class="container_centering">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                        <div class="main_title_1">
                            <h3><img src="{{ URL::asset('img/main_icon_1.svg') }}" width="50" height="50" alt="">
                                Formulaire d'enquête</h3>
                            <p>Donnez votre avis sur <strong> {{ $membre->prenom }} {{ mb_strtoupper($membre->nom) }} </strong>  en répondant aux questions suivantes</p>
                            <p><em>- l'équipe Paraclet</em></p>
                        </div>
                    </div>

                    <!-- /col -->
                    <div class="col-xl-5 col-lg-6 mt-5">
                        <div id="wizard_container">
                            <div id="top-wizard">
                                <div id="progressbar"></div>
                            </div>
                            <!-- /top-wizard -->
                            <form id="wrapped" method="POST" autocomplete="off" action="{{ route('feedback.store') }}">
                                @csrf
                                <input id="website" name="website" type="text" value="">
                                <input type="number" name="destinataire_id" value="{{ $membre->id }}" hidden>
                                <!-- Leave for security protection, read docs for details -->
                                <div id="middle-wizard">

                                    @foreach($questions as $q)
                                        <input name="question_id[]" value="{{ $q->id }}" hidden>
                                        <div class="step">
                                            <h3 class="main_question"><strong>{{ $loop->iteration }}
                                                    sur {{ count($questions) }}</strong>{{ $q->libelle }}</h3>
                                            <div class="form-group">
                                                <label for="additional_{{ $loop->iteration }}_message">Votre réponse</label>
                                                <textarea name="additional_message_{{ $loop->iteration }}"
                                                          id="additional_{{ $loop->iteration }}_message"
                                                          class="form-control" style="height:200px; resize: none"
                                                          onkeyup="getVals(this, 'additional_message_{{ $loop->iteration }}');" required></textarea>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="submit step">
                                        <h3 class="main_question">Résumé</h3>
                                        <div class="summary">
                                            <ul>
                                                @foreach($questions as $q)
                                                    <li>
                                                        <strong>{{ $loop->iteration }}</strong>
                                                        <h6>{{ $q->libelle }}</h6>
                                                        <p id="question_{{ $loop->iteration }}" class="mb-2"></p>
                                                        <p id="additional_message_{{ $loop->iteration }}" class="bg-success"></p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /step 4-->

                                </div>
                                <!-- /middle-wizard -->

                                <div id="bottom-wizard">
                                    <button type="button" name="backward" class="backward">Prec</button>
                                    <button type="button" name="forward" class="forward">Suiv</button>
                                    <button type="submit" name="process" class="submit">Envoyer</button>
                                </div>
                                <!-- /bottom-wizard -->

                            </form>
                        </div>
                        <!-- /Wizard container -->
                    </div>
                    <!-- /col -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container_centering -->
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/common_scripts.min.js') }}"></script>
    <script src="{{ URL::asset('js/functions.js') }}"></script>
    <script src="{{ URL::asset('js/survey_func.js') }}"></script>
@endsection
