<div id = "responcedata">
@if(!empty($data->directions))
  @foreach($data->directions as $direction)
<h3>Direction: #{{$direction->id}}</h3>
      
      @foreach($direction->stations as $station)
      <span class="span2">{{$station->city->name}}</span>
       
      @endforeach
   <p>Some additional information can put here </p>
@endforeach
@endif  
</div>