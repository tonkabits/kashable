@extends('layouts.nologin')
@section('content')
<h1>POS</h1>
<div class="">
    <!-- <div class="w-3/4 flex flex-row bg-green">
        <div class="w-1/4">

            @foreach($categories as $category)
            <category :category="{{$category}}"></category>
            @endforeach

        </div>
        <div class="w-3/4 flex flex-wrap overflow-y-scroll pin-none">

            @foreach($plates as $plate)
            <plate :plate="{{$plate}}"></plate>
            @endforeach

        </div>
    </div>
    <div class="w-1/4 bg-blue">
        here

    </div> -->
    <point-of-sale :categories="{{$categories}}" :plates="{{$plates}}" :selectedtable="<?= $selectedtable !== null ? $selectedtable : '' ?>"></point-of-sale>
</div>
@endsection