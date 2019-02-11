@extends('layouts.app')


@section('content')

@if(isset($msg))
<h4 class="mb-3"> <i class="fa fa-edit"></i>  Edit ToDo</h4>

<form method="POST" action="{{ url('edit/todo/'.$msg->id) }}">

{{ csrf_field() }}

<input type="text" placeholder="Edit Message" value="{{$msg->message}}" class="form-control" name="message" style="border-radius:25px;" required />


   <div class="row mt-4">
    <div class="col-sm">
     <input type="text" placeholder="Icon" class="form-control br-25" value="{{$msg->icon}}" name="icon"  />
    </div>
    <div class="col-sm">
     <input type="text" placeholder="Color Code" class="form-control  br-25" value="{{ $msg->color }}" name="color" />
    </div>
    <div class="col-sm">
     <input type="submit" class="btn btn-primary btn-block  br-25" value="Edit Todo" />
    </div>
  </div>

</form>
@else
<h4 class="mb-3"> <i class="fa fa-plus"></i>  Add ToDo</h4>

<form method="POST" action="{{ url('add/todo') }}">

{{ csrf_field() }}

<input type="text" placeholder="Add Message" class="form-control" name="message" style="border-radius:25px;" required />


   <div class="row mt-4">
    <div class="col-sm">
     <input type="text" placeholder="Icon" class="form-control br-25" name="icon"  />
    </div>
    <div class="col-sm">
     <input type="text" placeholder="Color Code" class="form-control  br-25" name="color" />
    </div>
    <div class="col-sm">
     <input type="submit" class="btn btn-success btn-block  br-25" value="Add Todo" />
    </div>
  </div>

</form>
@endif



<div class="lists mt-10">
<h4 class="mb-3"> <i class="fa fa-list"></i> ToDo List</h4>

    <ul class="list-group">
        @foreach($messages as $msg)
            <li style="border: 1px solid {{ $msg->color }}" class="list-group-item"> <i class="fa fa-{{$msg->icon}}"></i>
              {{ $msg->message }} <span class="format-date"> {{ date("h:i A d/m/Y", strtotime( $msg->created_at)) }}</span>
                <span class="pull-right">
                  <a href="{{ url('edit/'.$msg->id) }}"> <i class="fa fa-edit"></i> </a>
                  <a href="{{ url('delete/'.$msg->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">  <i class="fa fa-remove"></i></a>
                </span>
        </li>
      @endforeach

      @if(count($messages) == 0)
      <li style="border: 1px solid " class="list-group-item"> ✉  Currently there is no messages </li>
      @endif
    </ul>
</div>

@stop
