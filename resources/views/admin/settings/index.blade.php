


@extends('admin.layouts.app')

@section('content')


 <!-- BEGIN: Content-->
 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            {{-- <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Setting</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Setting
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="content-body">

                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Game Rates</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.settings.store_game_rates') }}" method="POST" enctype="multipart/form-data" id="form_submit">
                                    {{ csrf_field() }}

                                    <table  class="table mb-5">
                                        <tr>
                                            <td style="width: 50%">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Jodi Betting Amount<span class="error"></span></label>
                                                    <br>
                                                    <span>₹1</span>
                                                </div>
                                            </td>

                                            <td style="width: 50%">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Jodi Winning Amount <span class="error"></span></label>
                                                    <input type="number" id="first-name-column" name="jodi_winning_amount" class="form-control" placeholder="Jodi Winning Amount"  value="{{ $game_rates['jodi_winning_amount'] ?? 0 }}" />
                                                    <span class="error text-danger validation-class" id="jodi_winning_amount-price_rate_error"></span>
                                                    @error('jodi_winning_amount')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Crossing Betting Amount<span class="error"></span></label>
                                                    <br>
                                                    <span>₹1</span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Crossing Winning Amount <span class="error"></span></label>
                                                    <input type="number" id="first-name-column" name="crossing_winning_amount" class="form-control" placeholder="Crossing Winning Amount"  value="{{ $game_rates['crossing_winning_amount'] ?? 0 }}" />
                                                    <span class="error text-danger validation-class" id="crossing_winning_amount-price_rate_error"></span>
                                                    @error('crossing_winning_amount')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Haruf Betting Amount<span class="error"></span></label>
                                                    <br>
                                                    <span>₹1</span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Haruf Winning Amount <span class="error"></span></label>
                                                    <input type="number" id="first-name-column" name="haruf_winning_amount" class="form-control" placeholder="Haruf Winning Amount"  value="{{ $game_rates['haruf_winning_amount'] ?? 0 }}" />
                                                    <span class="error text-danger validation-class" id="haruf_winning_amount-price_rate_error"></span>
                                                    @error('haruf_winning_amount')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </td>

                                        </tr>
                                    </table>
                                    
                                        <div class="row">

                                            {{-- <div class="col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Jodi Digit <span class="error"></span></label>
                                                    <input type="number" id="first-name-column" name="name" class="form-control" placeholder="Name"  value="{{ old('name') }}" />
                                                    @error('name')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div> --}}
                                            

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->



    @push('scripts')
    <script>
        $(document).ready(function() {

            $('#form_submit input').keypress(function(e) {
                if (e.which == 13) { // 13 is the Enter key
                    e.preventDefault(); // Prevent the default action (which would submit the form)
                    $('#form_submit').submit(); // Trigger AJAX form submission
                }
            });


            $('#form_submit').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                var $form = $('#form_submit');
                var url = $form.attr('action');
                var formData = new FormData($form[0]);
                $('.validation-class').html('');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.spinner-loader').css('display', 'block');
                    },
                    success: function (res) {
                    // Toastify({
                    //     text: `Login successful`,
                    //     className: "success",
                    //     style: {
                    //         background: "linear-gradient(to right, #00b09b, #96c93d)",
                    //     }
                    // }).showToast();
                      location.reload();
                    },
                    error: function (res) {
                    if(res.status == 422 || res.status == 401){
                        if (res.responseJSON && res.responseJSON.errors) {
                            var  error = res.responseJSON.errors
                            $.each(error, function (key, value) {
                                $("#" + key + "-price_rate_error").text(value);
                            });
                        }
                    }
                    
                    }
                });
            });
        });
    </script>
    @endpush

    
    
@endsection