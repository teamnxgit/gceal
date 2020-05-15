<table class="table table-responsive" id="MCQTable">
    <thead class="thead thead-primary">
        <tr>
            <td colspan="3">
                {{$mcqs->links()}}
            </td>
        </tr>
        <tr>
            <td>Unit</td>
            <td>Question</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($mcqs as $mcq)
            <tr>
                <td>{{$mcq->unit}}</td>
                <td>@php echo $mcq->question @endphp</td>
                <td><a class="btn btn-success text-light" href="/lms/activity/{{$activity->id}}/add/mcq/{{$mcq->id}}">Add</a></td>
            </tr>
        @endforeach
    </tbody>
<table>