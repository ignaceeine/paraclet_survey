@php use Illuminate\Support\Facades\URL; @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Satisfaction Survey form Wizard by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Paraclet | Formulaire d'enquête de satisfaction</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ URL::asset('build/img/logo-paraclet.png') }}" type="image">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ URL::asset('build/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ URL::asset('build/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{ URL::asset('build/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{ URL::asset('build/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Caveat|Poppins:300,400,500,600,700&display=swap"
          rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ URL::asset('build/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('build/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('build/css/vendors.css') }}" rel="stylesheet">

</head>

<body class="style_3">

<div id="preloader">
    <div data-loader="circle-side"></div>
</div><!-- /Preload -->

<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div><!-- /loader_form -->

<header class="bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('build/img/logo-paraclet.png') }}" alt="" width="125" height="65"></a>
            </div>
            <div class="col-7">
                <div id="social">
                    <ul>
                        <li><a href="#" class="text-dark"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#" class="text-dark"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="#" class="text-dark"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#" class="text-dark"><i class="bi bi-tiktok"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</header>
<!-- /header -->

<div class="wrapper_centering">
    <div class="container_centering">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                    <div class="main_title_1">
                        <h3><img src="{{ URL::asset('build/img/main_icon_1.svg') }}" width="50" height="50" alt=""> Formulaire d'enquête</h3>
                        <p>An mei sadipscing dissentiet, eos ea partem viderer facilisi. Brute nostrud democritum in
                            vis, nam ei erat zril mediocrem. No postea diceret vix.</p>
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
                        <form id="wrapped" method="POST" autocomplete="off">
                            <input id="website" name="website" type="text" value="">
                            <!-- Leave for security protection, read docs for details -->
                            <div id="middle-wizard">

                                @for($step = 1; $step <= 5; $step++)
                                    <div class="step">
                                        <h3 class="main_question"><strong>{{ $step }} sur {{ 6 }}</strong>How was the service provided?</h3>
                                        <div class="form-group">
                                            <label for="additional_{{ $step }}_message">Votre réponse</label>
                                            <textarea name="additional_message_{{ $step }}" id="additional_{{ $step }}_message"
                                                      class="form-control" style="height:200px; resize: none"
                                                      onkeyup="getVals(this, 'additional_message_{{ $step }}');"></textarea>
                                        </div>
                                    </div>
                                @endfor

                                {{--<div class="step">
                                    <h3 class="main_question"><strong>1 sur 5</strong>How was the service provided?</h3>
                                    <div class="form-group">
                                        <label for="additional_message_label">Votre réponse</label>
                                        <textarea name="additional_message" id="additional_message_label"
                                                  class="form-control" style="height:200px; resize: none"
                                                  onkeyup="getVals(this, 'additional_message');"></textarea>
                                    </div>
                                </div>
                                <!-- /step 1-->

                                <div class="step">
                                    <h3 class="main_question mb-4"><strong>2 sur 5</strong>Would you reccomend our
                                        company?</h3>
                                    <div class="form-group">
                                        <label for="additional_message_2_label">Votre réponse</label>
                                        <textarea name="additional_message_2" id="additional_message_2_label"
                                                  class="form-control" style="height:200px; resize: none"
                                                  onkeyup="getVals(this, 'additional_message_2');"></textarea>
                                    </div>
                                </div>
                                <!-- /step 2-->

                                <div class="step">
                                    <h3 class="main_question"><strong>3 sur 5</strong>How did you hear about us?</h3>
                                    <div class="form-group">
                                        <label for="additional_message_3_label">Votre réponse</label>
                                        <textarea name="additional_message_3" id="additional_message_3_label"
                                                  class="form-control" style="height:200px; resize: none"
                                                  onkeyup="getVals(this, 'additional_message_3');"></textarea>
                                    </div>
                                </div>
                                <!-- /step 3-->--}}

                                <div class="step">
                                    <h3 class="main_question"><strong>{{ $step }} sur {{{ $step }}}</strong>Résumé</h3>
                                    <div class="summary">
                                        <ul>
                                            <li>
                                                <strong>1</strong>
                                                <h5>How was the service provided?</h5>
                                                <p id="question_1" class="mb-2"></p>
                                                <p id="additional_message_1"></p>
                                            </li>
                                            <li>
                                                <strong>2</strong>
                                                <h5>Would you reccomend our company?</h5>
                                                <p id="question_2" class="mb-2"></p>
                                                <p id="additional_message_2"></p>
                                            </li>
                                            <li>
                                                <strong>3</strong>
                                                <h5>How did you hear about our company?</h5>
                                                <p id="question_3" class="mb-2"></p>
                                                <p id="additional_message_3"></p>
                                            </li>
                                            <li>
                                                <strong>4</strong>
                                                <h5>How did you hear about our company?</h5>
                                                <p id="question_4" class="mb-2"></p>
                                                <p id="additional_message_4"></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /step 4-->

                                <div class="submit step">
                                    <h3 class="main_question"><strong>5 of 5</strong>Please fill with your details</h3>
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" id="firstname"
                                               class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email</label>
                                        <input type="email" name="email" id="email" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input type="text" name="telephone" id="telephone" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-3">
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="text" name="age" id="age" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group radio_input">
                                                <label class="container_radio">Male
                                                    <input type="radio" name="gender" value="Male" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container_radio">Female
                                                    <input type="radio" name="gender" value="Female" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="form-group terms">
                                        <label class="container_check">Please accept our <a href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#terms-txt"
                                                                                            style="color:#fff; text-decoration: underline;">Terms
                                                and conditions</a>
                                            <input type="checkbox" name="terms" value="Yes" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <!-- /step 5-->

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
    <footer>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-12">
                    ©{{ date('Y') }} Paraclet - Tous droits réservés
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container-fluid -->
    </footer>
    <!-- /footer -->
</div>
<!-- /wrapper_centering -->

<!-- COMMON SCRIPTS -->
<script src="{{ URL::asset('build/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ URL::asset('build/js/common_scripts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/functions.js') }}"></script>

<!-- Wizard script -->
<script src="{{ URL::asset('build/js/survey_func.js') }}"></script>

</body>
</html>
