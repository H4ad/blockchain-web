@extends ('layouts.home.master')

@section ('content')

@include ('home.header')

@include ('home.about')

@include ('home.contact')

@if($errors->any)

<?php redirect ('#contact');?>

@endif

@endsection