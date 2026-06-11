@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span> {{$date}}日</span><span class="ml-3">{{$part}}部</span></p>
    <div class="h-75 border calendar_reserve_detail">
      <table class="calendar_reserve_users">
        <tr class="text-center calendar_reserve_title">
          <th class="w-25">ID</th>
          <th class="w-25">名前</th>
          <th class="w-25">場所</th>

        </tr>
        @foreach($reservePersons as $reservePerson)
        @foreach($reservePerson->users as $user)
        <tr class="text-center calendar_reserve_info">
          <td class="w-25">{{$user->id}}</td>
          <td class="w-25">{{$user->over_name}}{{$user->under_name}}</td>
          <td class="w-25">リモート</td>
        </tr>
        @endforeach
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
