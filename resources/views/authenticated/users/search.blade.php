@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <div>
        <span class="name_color">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span class="name_color">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span class="name_color">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span class="name_color">性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span class="name_color">性別 : </span><span>女</span>
        @else
        <span class="name_color">性別 : </span><span>その他</span>
        @endif
      </div>
      <div>
        <span class="name_color">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span class="name_color">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span class="name_color">権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span class="name_color">権限 : </span><span>講師(英語)</span>
        @else
        <span class="name_color">権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span class="name_color">選択科目 :</span><span>{{$user->subjects->pluck('subject')->join(',')}}</span>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area border">
    <h4>検索</h4>
    <div class="">
      <div>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div style="display: grid">
        <lavel>カテゴリ</lavel>
        <select form="userSearchRequest" name="category" class="search_category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div style="display: grid">
        <label>並び替え</label>
        <select name="updown" form="userSearchRequest" class="search_category">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="">
        <p class="m-0 search_conditions"><span>検索条件の追加</span></p>
        <div class="arrow">

        </div>
        <div class="search_conditions_inner">
          <div class="s_area">
            <label >性別</label>
            <div class="flex">
            <span class="S_area_label">男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
            </div>
          </div>

          <div  class="role_flex">
            <label>権限</label>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label class="s_area">選択科目</label>
            <div class="flex">
            @foreach($subjects as $subject)
            <p>{{$subject->subject}}
            <input type="checkbox" name="subjects[]" value="{{$subject->id}}" form="userSearchRequest"></p>
            @endforeach
            </div>
          </div>
        </div>
      </div>
      <div>
        <input type="submit" name="search_btn" class="btn btn-primary  search_btn_s" value="検索" form="userSearchRequest">
      </div>
      <div>
        <input type="reset" value="リセット" class="reset_btn" form="userSearchRequest">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
