@extends('admin.layouts.master')
@section('content')
@section('title', 'Competitive Exam')
<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('/admin/competitive_exam/create')}}" class="btn btn-primary pull-right"> Add Competitive Exam</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="examtable" name="examtable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Select Year</th>
                                            <th>Name</th>
                                            <th>pdf</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="exams">
                                        @if(count($exams) > 0)
                                        @php
                                        $count = 1;
                                        @endphp
                                        @foreach($exams as $exam)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <!--  0 = '2022-2023' , 1= '2023-2024' -->
                                            <td>
                                                @foreach($data as $participation)
                                                @if($participation->id == $exam->selectyear)
                                                {{ $participation->year }}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>{{$exam->name}}</td>
                                            <td>
                                                @if(!empty($exam->pdf))
                                                <a href="{{ URL::asset('/admin/upload/competitiveExam/'.$exam->pdf)}}" target="_blank"><i class="fas fa-eye"></i></a>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td style='display:inline-flex'>
                                                <a class="btn btn-primary" style='margin-right:5px;' href="{{ route('competitive_exam.edit', $exam->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('competitive_exam.destroy',$exam->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete competitive exam?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 15px;"></i></button>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                        $count++;
                                        @endphp
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        new DataTable('#examtable');
    });
</script>
@endsection