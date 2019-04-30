<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->

<div class="guidelines_instruction">

<h2>Guidlines & Instruction</h2>

  <div class="contenttxt">

    @foreach($result as $key=>$row)
      @if($result[$key]->form_identifier !=$result[$key-1]->form_identifier)
        <div class="box">
          <div class="heading" id="{{ $row->id }}"> 
            <h4>{{$row->identifier_text}}</h4>
          </div>
      @endif
          <div class="txt">
          {{ $row->content}}
          </div>
       
      @if(($result[$key]->form_identifier !=$result[$key+1]->form_identifier) )
        </div>
      @endif
    @endforeach
    
  </div>
    
</div>

@endsection