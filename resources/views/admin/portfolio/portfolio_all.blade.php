@extends('admin.admin_master')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Portfolio Page</h4>
                            <p class="card-title-desc">DataTables has most features enabled by
                                default, so all you need to do to use it with your own tables is to call
                                the construction function: <code>$().DataTable();</code>.
                            </p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>About Multi Iage</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>

                                @php($i = 1)
                                @foreach($multiImages as $item)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ asset($item->multi_image) }}" alt="" height="50px"
                                                 width="50px">
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.multi.image', $item->id) }}"
                                               class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>


                                            <a href="{{ route('delete.multi.image', $item->id) }}" title="Delete Data"
                                               class="btn btn-danger" id="delete">
                                                <i class="fas fa-trash"></i>

                                            </a>

                                        </td>


                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>



    <script>
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
