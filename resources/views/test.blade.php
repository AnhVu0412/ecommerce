

<h1>Hello laravel</h1>
<h2>{{$welcome}}</h2>
<h3>{{request()->keyword}}</h3>
{!!$content!!}

<hr>
@for($i=1;$i<10;$i++)
    <p>Phần tử thứ: {{$i}}</p>
@endfor

<hr>
@foreach($dataArr as $key => $item)
    <p>Phần tử : {{$item}} </p>
@endforeach

@php()
