@extends('layouts.web')
@section('content')

    <div class="col-lg-12 p-0 m-0">
        <div class="col-lg-12 p-0 m-0" id="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/slide1.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Free & Open Platform for Learning.</h5>
                            <p>Join today and become a learner</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slide2.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Free & Open Platform for Learning.</h5>
                            <p>Join today and become a learner</p>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div id="what-we-offer" class="col-lg-12 p-0 m-0 row pt-3 pb-5 bg-light">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h3 class="text-center pt-2 pb-3">What We Offer</h3>
                    <div class="col-lg-4 float-left text-center">
                        <img src="images/notes.png" alt="" height="100">
                        <h5 class="text-center pt-4">Notes & Practice Questions</h5>
                        <p class="text-justify">Unit Based notes from various parts of Srilanka. The student can access notes from various teachers, compare and refer to the one that suits the requirements.</p>
                    </div>
                    <div class="col-lg-4 float-left text-center">
                        <img src="images/video.png" alt="" height="100">
                        <h5 class="text-center pt-4">Video Lectures & Tutorials</h5>
                        <p class="text-justify">Our aim to bring free educational video lectures to everyone. You can watch videos by streaming them online, or you can download videos to watch offline.</p>
                    </div>
                    <div class="col-lg-4 float-left text-center">
                        <img src="images/exam.png" alt="" height="100" >
                        <h5 class="text-center pt-4">Past Papers & Model Papers</h5>
                        <p class="text-justify">Our easy-to-use past paper search gives you instant access to a large library of past exam papers and mark schemes. They’re available free to teachers and students.</p>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        <div id="help-us-grow" class="col-lg-12 p-0 m-0 row bg-danger pt-3 pb-3">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="col-lg-4 text-center float-left">
                    <img src="images/volunteer.png" alt="" height="150">
                    <h3 class="text-center text-light">Volunteer</h3>
                    <p></p>
                </div>
                <div class="col-lg-4 text-center float-left">
                    <img src="images/donate.png" alt="" height="150">
                    <h3 class="text-center text-light">Donate</h3>
                    <p></p>
                </div>
                <div class="col-lg-4 text-center float-left">
                    <img src="images/feedback.png" alt="" height="150">
                    <h3 class="text-center text-light">Feedback</h3>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
@stop
