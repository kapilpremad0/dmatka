@extends('admin.layouts.app')
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body" id="set_data">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    {{-- <div class="col-xl-4 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <h5>Congratulations 🎉 John!</h5>
                                <p class="card-text font-small-3">You have won gold medal</p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    <a href="#">$48.9k</a>
                                </h3>
                                <button type="button" class="btn btn-primary">View Sales</button>
                                <img src="{{ asset('public/admin/app-assets/images/illustration/badge.svg')}}')}}" class="congratulation-medal" alt="Medal Pic" />
                            </div>
                        </div>
                    </div> --}}
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Statistics</h4>
                                <div class="d-flex align-items-center">
                                    {{-- <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p> --}}
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-primary me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">0</h4>
                                                <p class="card-text font-small-3 mb-0">Total Games</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-info me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="users" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">0</h4>
                                                <p class="card-text font-small-3 mb-0">Users Count</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-danger me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">0</h4>
                                                <p class="card-text font-small-3 mb-0">Today Earning</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-success me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">0</h4>
                                                <p class="card-text font-small-3 mb-0">Today Bids</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->
                </div>
                
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        
        let intervalId;
        intervalId = setInterval(fetch_data, 5000);

    

        document.body.addEventListener('click', function(event) {
            const clickedElement = event.target;
            if (clickedElement && clickedElement.classList.contains('btn')) {
                clearInterval(intervalId);
            }
        });

       

        function fetch_data() {
            
            $.ajax({
                url: "",
                method: 'GET',
                data: {},
                dataType: 'html',
                success: function (data) {
                    $('#set_data').html(data);
                }
            });
        }

    });




</script> --}}




{{-- <script>
    // Function to execute repeatedly
    function doSomething() {
        console.log('Interval is running...');
    }

    let intervalId;
    const button = document.getElementById('button');

    // Start interval when mouse is pressed down
    button.addEventListener('mousedown', function() {
        intervalId = setInterval(doSomething, 1000);
    });

    // Stop interval when mouse is released
    button.addEventListener('mouseup', function() {
        clearInterval(intervalId);
    });

    // Stop interval if mouse leaves the button
    button.addEventListener('mouseleave', function() {
        clearInterval(intervalId);
    });
</script> --}}


@endsection