@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="calendar_area m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>

<div class="modal">
  <div class="modal__bg js-modal-close" ></div>
    <form action="/delete/calendar" method="POST">
      @csrf
    <div class="modal__content">
      <div class="modal_content_c">
      <div class="modal_reserve_day">
        <p>予約日：</p><p class= "modal-day"></p>
        <input type="hidden" name="day" class="hidden_day">
      </div>
      <div class="modal_reserve_day">
        <p>時間：</p><p class="modal-part"></p>
        <input type="hidden" name="part" class="hidden_part">
      </div>
      <p>上記の予約をキャンセルしてもよろしいでしょうか？</p>
      <button class="btn btn-primary js-modal-close">閉じる</button>
      <button class="btn btn-danger ml-10">キャンセル</button>
      </div>
    </div>
  </form>
</div>
@endsection
