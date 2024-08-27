
@extends('admin.layouts.app')

@section('content')

 <!-- BEGIN: Content-->
<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            
            <div class="content-body">

                @include('admin.user.show.tab-bar')


                <!-- Ajax Sourced Server-side -->
                <section id="ajax-datatable">
                     <!-- Responsive tables start -->
                <div class="row" >
                    <div class="col-12">
                        <div class="card card-company-table">
                            <div class="card-header">
                                
                                <div class="col-md-3">
                                    <label for="">Date From</label>
                                    <input type="date" class="form-control" id="date_from" value="{{ request()->input('date_from') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Date To</label>
                                    <input type="date" class="form-control" id="date_to" value="{{ request()->input('date_to') }}">
                                </div>

                                <div class="col-md-2" style="    align-self: end;"> 
                                    
                                </div>

                                <div class="col-md-3" style="text-align: end">
                                    <h4 class="card-title">Wallet Amount :  {{ $user->wallet_amount }}
                                        <a  href="#"><i data-feather="edit" class="me-50" data-bs-toggle="modal" data-bs-target="#wallet_setup" ></i>
                                        </a>
                                    </h4>
                                </div>

                                <div class="modal fade modal-dark text-start" id="wallet_setup" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel120">Wallet Transaction</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.transactions.store') }}" method="POST" id="form_submit">
                                                    @csrf
                                                    <div class="modal-body">
                                                        
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <div class="col-md-12 mb-1">
                                                            <label for="">Amount</label>
                                                            <input type="number" class="form-control" name="amount" placeholder="Enter Amount" >
                                                            <span class="error text-danger validation-class" id="amount-price_rate_error"></span>
                                                        </div>

                                                        <div class="col-md-6 mb-1">
                                                            <input type="radio" class="" name="type"  value="debit" checked>
                                                            <label for="">Debit</label>

                                                            <input type="radio" class="" name="type" value="credit">
                                                            <label for="">Credit</label>

                                                            <span class="error text-danger validation-class" id="type-price_rate_error"></span>
                                                        </div>

                                                        <div class="col-md-12 mb-1">
                                                            <label for="">Description</label>
                                                            <textarea name="description" class="form-control" id="" cols="3" rows="3" placeholder="Enter description"></textarea>

                                                            <span class="error text-danger validation-class" id="description-price_rate_error"></span>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark">Submit</button>
                                                    </div>

                                                </form>
                                                
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive" id="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" >#</th>
                                            <th scope="col" >Description</th>
                                            <th scope="col" >Amount</th>
                                            <th scope="col" >Type</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $i = ($transactions->currentPage() - 1) * $transactions->perPage() + 1; @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td >{{ $i }}</td>
                                                <td>{{ $item->description ?? ''}}</td>
                                                <td><strong>₹{{ $item->amount ?? 0 }}</strong></td>
                                                <td>
                                                    @if ($item->type == 'credit')
                                                        
                                                        <span class="badge bg-light-success">Credit</span>
                                                    @else
                                                        <span class="badge bg-light-danger">Debit</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at ?? '' }}</td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                @include('admin._pagination', ['data' => $transactions])
                            </div>
                            
                            {{-- <div class="table-responsive">
                                <table class="table mb-0">
                                    <!-- ... (your table structure) ... -->
                                </table>
                                {{ $transactions->links('admin._pagination') }}
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->
                </section>

                <!--/ Ajax Sourced Server-side -->
                
                

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- END: Content-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#date_from ,#date_to').on('input', function () {
            fetch_data();
        });

        function fetch_data() {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            $.ajax({
                url: "?page=1",
                method: 'GET',
                data: {date_from: date_from , date_to:date_to},
                dataType: 'html',
                success: function (data) {
                    $('#table-responsive').html(data);
                }
            });
        }


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

@endsection