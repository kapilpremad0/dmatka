<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ url('public/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('public/frontend/css/responsive.css')}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend/img/footerlogo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>

    <section>

        <div class="bannerwp-hm" style="background-image: url('{{ url('public/frontend/img/bannerbg.png')}}');">
            <div class="container">
                <div class="bannersec-hm">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Let's Play</h3>
                            <h1>The <span>Games</span><br>and <span>Win</span></h1>
                            <a href="{{ url('public/app-release.apk') }}" download="app-release.apk">DOWNLOAD APP</a>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ url('public/frontend/img/bannerimg.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="hometwo-wp" style="background-image: url('{{ url('public/frontend/img/hometwo-bg.png')}}');">
            <div class="container">
                <div class="hometwo-sec">
                    <div class="hmtwo-head">
                        <img src="{{ url('public/frontend/img/starimg.png')}}" alt="">
                        <h2>Our Games Results</h2>
                    </div>
                    <div class="hometow-backbg">
                        <div class="hmtwo-btns">
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="previous-btn" class="mb-3">PREVIOUS RESULT</button>
                                </div>
                                <div class="col-md-4">
                                    <button id="today-btn" class="mb-3">TODAY RESULT</button>
                                </div>
                                <div class="col-md-4">
                                    <button id="upcoming-btn" class="mb-3">UPCOMING RESULT</button>
                                </div>
                            </div>
                        </div>
                        <div class="previous-resultwp mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="previous-cmnbox">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ url('public/frontend/img/previous1.png')}}" alt="">
                                            </div>
                                            <div class="col-md-5">
                                                <a href="#">
                                                    Andheri Market
                                                </a>
                                                <p>Winner Number</p>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <span>18</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="previous-cmnbox">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ url('public/frontend/img/previous2.png')}}" alt="">
                                            </div>
                                            <div class="col-md-5">
                                                <a href="#">
                                                    Gaziabad
                                                </a>
                                                <p>Winner Number</p>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <span>18</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="today-resultwp mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="previous-cmnbox">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ url('public/frontend/img/previous1.png')}}" alt="">
                                            </div>
                                            <div class="col-md-5">
                                                <a href="#">
                                                    Faridabad
                                                </a>
                                                <p>Winner Number</p>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <span>18</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="upcoming-resultwp mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="previous-cmnbox">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ url('public/frontend/img/previous1.png')}}" alt="">
                                            </div>
                                            <div class="col-md-5">
                                                <a href="#">
                                                    Shri Ganesh
                                                </a>
                                                <p>Winner Number</p>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <span>18</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="previous-cmnbox">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ url('public/frontend/img/previous2.png')}}" alt="">
                                            </div>
                                            <div class="col-md-5">
                                                <a href="#">
                                                    Delhi Market
                                                </a>
                                                <p>Winner Number</p>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <span>18</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <section>

        <div class="homethree-wp">
            <div class="container">
                <div class="homethree-sec">
                    <div class="homethree-head">
                        <h3>It's easy to <br><span>Start Playing </span>on {{ env('APP_NAME') }}</h3>
                        <p>{{ env('APP_NAME') }} games are easy to understand and easy to play, so many people love <br>to play {{ env('APP_NAME') }} online as this is a fascinating game. </p>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="homethree-cmnbg mb-3" style="background-image: url('{{ url('public/frontend/img/hmthree-mocup.png')}}');">
                               <img src="{{ url('public/frontend/img/hmthree-mocupimg1.png')}}" alt="">
                               <div class="text-start">
                                <h3>SELECT A</h3> 
                                <span>GAME</span>
                                <p>Choose a game that you want to play</p>
                                <img class="dotcmn" src="{{ url('public/frontend/img/dot1.png')}}" alt="">
                               </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="homethree-cmnbg mb-3" style="background-image: url('{{ url('public/frontend/img/hmthree-mocup.png')}}');">
                               <img src="{{ url('public/frontend/img/hmthree-mocupimg2.png')}}" alt="">
                               <div class="text-start">
                                <h3>SELECT A</h3> 
                                <span>GAME</span>
                                <p>Choose a game that you want to play</p>
                                <img class="dotcmn" src="{{ url('public/frontend/img/dot2.png')}}" alt="">
                               </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="homethree-cmnbg mb-3" style="background-image: url('{{ url('public/frontend/img/hmthree-mocup.png')}}');">
                               <img src="{{ url('public/frontend/img/hmthree-mocupimg3.png')}}" alt="">
                               <div class="text-start">
                                <h3>SELECT A</h3> 
                                <span>GAME</span>
                                <p>Choose a game that you want to play</p>
                                <img class="dotcmn" src="{{ url('public/frontend/img/dot3.png')}}" alt="">
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="homefour-wp" style="background-image: url('{{ url('public/frontend/img/fourbg.png')}}');">
            <div class="container">
                <div class="homefour-sec">
                    <img src="{{ url('public/frontend/img/fourm.png')}}" alt="">
                    <h2>About {{ env('APP_NAME') }} games</h2>
                    <p>{{ env('APP_NAME') }} games are easy to understand and easy to play, so many people love to play {{ env('APP_NAME') }} online as this is a <br>
                        fascinating game. Live {{ env('APP_NAME') }} App is one of the best satta {{ env('APP_NAME') }} App and website of india. <br><br>
                        You may wonder why? well, the list is long.Live {{ env('APP_NAME') }} is the only website and application that has live satta <br>
                        {{ env('APP_NAME') }} online play and result fastest {{ env('APP_NAME') }} updates it has been very among all tha cities of india as live D <br>
                        Matka App shows accurate {{ env('APP_NAME') }} result and fast updates off all satta {{ env('APP_NAME') }} games. 
                    </p>
                    <button>KNOW MORE <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="homefive-wp" style="background-image: url('i{{ url('public/frontend/mg/homefive-bg.png')}}');">
            <div class="container">
                <div class="homefive-sec">
                    <div class="row">
                        <div class="col-md-6">
                            <h3><span>Game</span> <br> Companies name</h3>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="homefive-cmn" style="background-image: url('{{ url('public/frontend/img/homefive-box.png')}}');">
                                <img src="{{ url('public/frontend/img/homefiveimg.png')}}" alt="">
                                <div class="text-center">
                                    <p>Andheri Market</p>
                                </div>
                            </div>
                            <div class="homefive-cmn" style="background-image: url('{{ url('public/frontend/img/homefive-box.png')}}');">
                                <img src="{{ url('public/frontend/img/homefiveimg.png')}}" alt="">
                                <div class="text-center">
                                    <p>Gaziabad</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="homefive-cmn" style="background-image: url('{{ url('public/frontend/img/homefive-box.png')}}');">
                                <img src="{{ url('public/frontend/img/homefiveimg.png')}}" alt="">
                                <div class="text-center">
                                    <p>Faridabad</p>
                                </div>
                            </div>
                            <div class="homefive-cmn" style="background-image: url('{{ url('public/frontend/img/homefive-box.png')}}');">
                                <img src="{{ url('public/frontend/img/homefiveimg.png')}}" alt="">
                                <div class="text-center">
                                    <p>Shri Gamesh</p>
                                </div>
                            </div>
                            <div class="homefive-cmn" style="background-image: url('{{ url('public/frontend/img/homefive-box.png')}}');">
                                <img src="{{ url('public/frontend/img/homefiveimg.png')}}" alt="">
                                <div class="text-center">
                                    <p>Delhi Market</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="homesix-wp">
            <div class="container">
                <div class="homesix-sec">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="homesix-ulfirst">
                                <li>
                                    <i style="color: #37B7C3;" class="fa-solid fa-people-group"></i>
                                </li>
                                <li>
                                    <h3>4.0</h3>
                                </li>
                                <li>
                                    <ul>
                                        <li>
                                            <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="homesix-two">
                                <div class="row">
                                    <div class="col-md-1 col-1">
                                        5
                                    </div>
                                    <div class="col-md-1 col-1">
                                        <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-1">
                                        4
                                    </div>
                                    <div class="col-md-1 col-1">
                                        <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 75%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-1">
                                        3
                                    </div>
                                    <div class="col-md-1 col-1">
                                        <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 50%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-1">
                                        2
                                    </div>
                                    <div class="col-md-1 col-1">
                                        <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 30%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-1">
                                        1
                                    </div>
                                    <div class="col-md-1 col-1">
                                        <i style="color: #37B7C3;" class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 15%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <h3>Games <br><span>Reviews & Rating</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="homesevan-wp">
            <div class="container">
                <div class="homesevan-sec">
                    <div class="row">
                        <div class="col-md-7">
                            <h3>People love to <br><span>Play & Earn More</span></h3>
                            <p>{{ env('APP_NAME') }} games are easy to understand and easy to play, so many people love <br> to play {{ env('APP_NAME') }} online as this is a fascinating game. </p>
                        </div>
                        <div class="col-md-5">
                            <div class="homesevan-box">
                                <div class="row">
                                    <div class="col-md-3 col-3">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div class="col-md-9 col-9">
                                        <h4>15 Lakhs+</h4>
                                        <p>Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="homesevan-box">
                                <div class="row">
                                    <div class="col-md-3 col-3">
                                        <i class="fa-regular fa-money-bill-1"></i>
                                    </div>
                                    <div class="col-md-9 col-9">
                                        <h4>₹ 200 Crore+</h4>
                                        <p>In daily winning</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <section>

        <div class="homeeight-wp" style="background-image: url('{{ url('public/frontend/img/homeeightbg.png')}}');">
            <div class="container">
                <div class="homeeight-sec">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Compete with Other</h3>
                            <h1>GAMES FANS <br>AND WIN</h1>
                            <div class="row">
                                <div class="col-md-2 col-4 m-auto">
                                    <img src="{{ url('public/frontend/img/homeeight-1.png')}}" alt="">
                                </div>
                                <div class="col-md-10">
                                    <p>Choose game, play with over 15 Lakhs+
                                        Users, place bets on your favorite
                                        numbers and win.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-4 m-auto">
                                    <img src="{{ url('public/frontend/img/homeeight-2.png')}}" alt="">
                                </div>
                                <div class="col-md-10">
                                    <p>Invite others and get 3% commission
                                        for his game</p>
                                </div>
                            </div>
                            <br>
                            <a href="#">
                                DOWNLOAD APP
                            </a>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ url('public/frontend/img/homeeight-img.png')}}" alt="" class="mt-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="homenine-wp">
            <div class="container">
                <div class="home-ninesec">
                    <img src="{{ url('public/frontend/img/homenine-img.png')}}" alt="">
                    <h2>Our <span>Games</span>  Winners </h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="homenine-cmnbox mb-3">
                                <h5>Mahesh Kumar</h5>
                                <h3>₹ 27 Lakhs</h3>
                                <p><span>Rohit Acharya</span> <br> Winner of Faridabad Game</p>
                            </div>      
                        </div>
                        <div class="col-md-4">
                            <div class="homenine-cmnbox mb-3">
                                <h5>Mahesh Kumar</h5>
                                <h3>₹ 27 Lakhs</h3>
                                <p><span>Rohit Acharya</span> <br> Winner of Faridabad Game</p>
                            </div>      
                        </div>
                        <div class="col-md-4">
                            <div class="homenine-cmnbox mb-3">
                                <h5>Mahesh Kumar</h5>
                                <h3>₹ 27 Lakhs</h3>
                                <p><span>Rohit Acharya</span> <br> Winner of Faridabad Game</p>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="hometen-wp" style="background-image: url('{{ url('public/frontend/img/homeeightbg.png')}}');">
            <div class="container">
                <div class="hometen-sec">
                    <i class="fa-solid fa-comments"></i>
                    <h2 style="color: #181818;">FREQUENTLY ASKED QUESTIONS</h2>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                What is {{ env('APP_NAME') }} ? 
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> {{ env('APP_NAME') }} is a Matka company which provides you a platform where you can play games, choose and bet on numbers from 00 to 99 and win a lot of money. </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Can I actually win money on {{ env('APP_NAME') }} ? 
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> Yes, it is true. You can win money on {{ env('APP_NAME') }}, place bet on n numbers and if your numbers gets declared as a winning number you'll win money. You can win a lot of money on {{ env('APP_NAME') }}. </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Is it safe to add money to {{ env('APP_NAME') }} ? 
                            </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"> es, it is absolutely safe to put your money indiscriminately inside {{ env('APP_NAME') }}. The company assures you that your money will not go anywhere, the more money you win the more money you will get. </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

    </section>

    <footer>

        <div class="footer-wp">
            <div class="container">
                <div class="footer-sec">
                    <div class="footer-logo">
                        <img src="{{ url('public/frontend/img/footerlogo.png')}}" alt="">
                        <p>{{ env('APP_NAME') }} games are easy to understand and easy to play, so many people love to play {{ env('APP_NAME') }} online as this is a fascinating <br>
                            game. Live {{ env('APP_NAME') }} App is one of the best satta {{ env('APP_NAME') }} App and website of india.</p>
                        <ul>
                            <li><a href="#">About US</a></li>
                            <li><a href="#">How to Play</a></li>
                            <li><a href="#">Invite Friend</a></li>
                            <li><a href="#">Download App</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                        </ul>
                    </div>
                    <div class="footer-logosbor ">
                        <!--<div class="row">-->
                        <!--    <div class="col-md-4">-->
                        <!--        <p>Our official payment partners</p>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-8">-->
                        <!--        <span> <img src="img/footer-logosbor.png" alt=""> </span>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <ul>
                            <li>
                                Our official payment partners
                            </li>
                            <li>
                                <img src="{{ url('public/frontend/img/footer-logosbor-new.png')}}" alt="">  
                            </li>
                        </ul>
                    </div>
                    <div class="footer-socilm">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{ url('public/frontend/img/footer-socil1.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('public/frontend/img/footer-socil2.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('public/frontend/img/footer-socil3.png')}}" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p>Anyone who wants to show their company results on our website, please contact us on the given below mail ID.</p>
                    <p>जो भी अपनी कंपनी के परिणाम हमारी वेबसाइट पर दिखाना चाहते है कृपया निचे दी गयी ईमेल आईडी पर संपर्क करे |</p>
                    <strong>Contact Us: info@{{ env('APP_NAME') }}.com</strong>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <p>The game involves an element of financial risk and may be addictive. Please play at your own risk. <br>The game is applicable for people above 18 only.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <p>All Right Reserved | 2019 © {{ env('APP_NAME') }} Game</p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </footer>





    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const previousBtn = document.getElementById('previous-btn');
    const todayBtn = document.getElementById('today-btn');
    const upcomingBtn = document.getElementById('upcoming-btn');

    const previousResult = document.querySelector('.previous-resultwp');
    const todayResult = document.querySelector('.today-resultwp');
    const upcomingResult = document.querySelector('.upcoming-resultwp');

    // Show today's result by default
    todayBtn.classList.add('activemybg');
    todayResult.classList.add('activemybg');

    previousBtn.addEventListener('click', () => {
        previousBtn.classList.add('activemybg');
        todayBtn.classList.remove('activemybg');
        upcomingBtn.classList.remove('activemybg');

        previousResult.classList.add('activemybg');
        todayResult.classList.remove('activemybg');
        upcomingResult.classList.remove('activemybg');
    });

    todayBtn.addEventListener('click', () => {
        previousBtn.classList.remove('activemybg');
        todayBtn.classList.add('activemybg');
        upcomingBtn.classList.remove('activemybg');

        previousResult.classList.remove('activemybg');
        todayResult.classList.add('activemybg');
        upcomingResult.classList.remove('activemybg');
    });

    upcomingBtn.addEventListener('click', () => {
        previousBtn.classList.remove('activemybg');
        todayBtn.classList.remove('activemybg');
        upcomingBtn.classList.add('activemybg');

        previousResult.classList.remove('activemybg');
        todayResult.classList.remove('activemybg');
        upcomingResult.classList.add('activemybg');
    });
});

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>