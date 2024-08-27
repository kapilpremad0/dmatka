
@extends('admin.layouts.app')

@section('content')

 <!-- BEGIN: Content-->
<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            
            <div class="content-body">

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                                            {{$error}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            @endif


                <!-- Ajax Sourced Server-side -->
                <section id="ajax-datatable">
                     <!-- Responsive tables start -->
                <div class="row" >
                    <div class="col-12">
                        <div class="card card-company-table">
                            <form action="">
                                <div class="card-header">
                                    <div class="col-md-2" style="text-align: end">
                                        <input type="date" name="date" class="form-control" value="{{ $date }}" max="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-2" >
                                        <Button class="btn btn-primary ">Submit</Button>
                                    </div>
                                    <div class="col-md-7" style="text-align: end">
                                        <h4 class="card-title">Declare Result</h4>
                                    </div>
                                    
                                </div>
                            </form>
                            <div class="table-responsive" id="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" >Name</th>
                                            <th scope="col" >Hindi Name</th>
                                            <th>Declare</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($games as $item)
                                            <tr>
                                                <td>{{ $item->name ?? ''}}</td>
                                                <td>{{ $item->hindi_name ?? ''}}</td>
                                                <td>

                                                    @if (!empty($item->result_declare))
                                                    
                                                    <span class="badge bg-light-primary">Number : {{ $item->result_declare->number }} 

                                                        
                                                    </span>
                                                    
                                                        <span class="badge bg-light-warning">Declared Time : {{ $item->result_declare->created_at }} </span>

                                                        <a href="#" class="text-danger badge bg-light-danger" data-bs-toggle="modal" data-bs-target="#danger_ke{{ $item->result_declare->id }}">
                                                            <i data-feather="trash" class="me-50"></i>
                                                        </a> 

                                                        <div class="modal fade modal-danger text-start" id="danger_ke{{ $item->result_declare->id }}" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel120">Delete</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete !
                                                                        </div>
                                                                        <form action="{{route('admin.declare_result.destroy',$item->result_declare->id)}}" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                            </div>
                                                        </div>



                                                    @else
                                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#danger_ke{{ $item->id }}">Declare</button>

                                                        <div class="modal fade modal-success text-start" id="danger_ke{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel120">Declare Game : {{ $item->name }}</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="{{ route('admin.declare_result.store') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="game_id" value="{{ $item->id }}">
                                                                            <input type="hidden" name="date" value="{{ $date }}">
                                                                            <div class="modal-body">
                                                                                <div class="col-md-12 mb-2">
                                                                                    <label for="">Enter Number</label>
                                                                                    <select name="number" id="number_{{ $item->id }}" class="form-select select2" required>
                                                                                        <option value="">(Select Number)</option>
                                                                                        @for ($i = 1 ; $i<=100 ; $i++)
                                                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                                                        @endfor
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-success">Declare</button>
                                                                            </div>
                                                                        </form>
                                                                        
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            {{-- <div class="table-responsive">
                                <table class="table mb-0">
                                    <!-- ... (your table structure) ... -->
                                </table>
                                {{ $bids->links('admin._pagination') }}
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
        $('#searchInput').on('input', function () {
            fetch_data($(this).val());
        });

        function fetch_data(query = '') {
            $.ajax({
                url: "",
                method: 'GET',
                data: {search: query},
                dataType: 'html',
                success: function (data) {
                    $('#table-responsive').html(data);
                }
            });
        }


    });

</script>

@endsection