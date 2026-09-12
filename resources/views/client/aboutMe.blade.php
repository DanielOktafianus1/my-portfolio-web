@extends('client.base')
@section('mainClientContent')
    <section class="detailEM"
        style="position: fixed; height:100vh; width:100vw; background-color:black; inset: 0; overflow:hidden">
        <div class="logoTransition2nd">
            <img src="{{ asset('staticImages/wlogo.png') }}" alt="">
        </div>

        <div class="conDetailAM">
            <div class="containerAvatar">
                <div class="mouseGlow"></div>
            </div>
            <div class="containerDetail">
                <div class="aboutMeDesc">
                    <h1>Daniel Oktafianus Maduwu</h1>
                    <h4>Freelance Web Developer | Laravel & JavaScript Enthusiast | Problem Solver</h4>
                    <hr>

                    <div class="d-flex justify-content-between">
                        <h6>Full Name :</h6>
                        <h6>Daniel Oktafianus Maduwu</h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6>Place / Date of Birth :</h6>
                        <h6>Jakarta, October 10, 2004 (21 Years Old)</h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6>Last Education :</h6>
                        <h6>Senior High School</h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6>Current Residence :</h6>
                        <h6>Kembangan, West Jakarta</h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6>Email :</h6>
                        <h6>daniel@email.com</h6>
                    </div>
                </div>

                <div class="aboutMeDesc">
                    <h4>HOBIES</h4>
                    <hr>
                    <div class="containerCardHobi">
                        <div class="cardHobi">
                            <img src="{{ asset('staticImages/wlogo.png') }}" alt="">
                            <h5>Bermusik</h5>
                        </div>
                        <div class="cardHobi">
                            <img src="{{ asset('staticImages/wlogo.png') }}" alt="">
                            <h5>Melukis</h5>
                        </div>
                        <div class="cardHobi">
                            <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                            <h5>Bermusik</h5>
                        </div>
                        <div class="cardHobi">
                            <img src="{{ asset('staticImages/wlogo.png') }}" alt="">
                            <h5>Melukis</h5>
                        </div>
                    </div>
                </div>
                <div class="aboutMeDesc">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis odit placeat consectetur quae a autem
                        aperiam sapiente cumque, beatae pariatur nisi fugit nihil et, accusantium rem ab. Ea, porro aperiam!
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
