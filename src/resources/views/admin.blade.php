<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FashionablyLate
      </a>
      <form action="/logout" method="post">
        @csrf
        <button class="header__link" type="submit">logout</button>
      </form>
    </div>
  </header>

  <main>
    <div class="admin__content">
      <div class="admin__heading">
        <h2>Admin</h2>
      </div>

      <form class="search-form" action="/admin" method="get">
        <div class="search-form__row">
          <input class="search-form__input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}" />
          <select class="search-form__select" name="gender">
            <option value="" {{ request('gender') == '' ? 'selected' : '' }}>性別</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
          </select>
          <select class="search-form__select" name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
              </option>
            @endforeach
          </select>
          <input class="search-form__date" type="date" name="date" value="{{ request('date') }}" />
          <button class="search-form__button-search" type="submit">検索</button>
          <a class="search-form__button-reset" href="/admin">リセット</a>
        </div>
      </form>


      <div class="admin__export">
        <a class="admin__export-button" href="/admin/export?{{ http_build_query(request()->query()) }}">エクスポート</a>
      </div>

      <div class="admin__pagination">
        {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
      </div>

      <div class="admin__table">
        <table class="admin-table">
          <tr class="admin-table__header">
            <th class="admin-table__th">お名前</th>
            <th class="admin-table__th">性別</th>
            <th class="admin-table__th">メールアドレス</th>
            <th class="admin-table__th">お問い合わせの種類</th>
            <th class="admin-table__th"></th>
          </tr>
          @foreach($contacts as $contact)
          <tr class="admin-table__row">
            <td class="admin-table__td">{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td class="admin-table__td">
              @if($contact->gender == 1) 男性
              @elseif($contact->gender == 2) 女性
              @else その他
              @endif
            </td>
            <td class="admin-table__td">{{ $contact->email }}</td>
            <td class="admin-table__td">{{ $contact->category->content }}</td>
            <td class="admin-table__td">
              <button class="admin-table__detail-button" onclick="openModal({{ $contact->id }})">詳細</button>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>

    @foreach($contacts as $contact)
    <div class="modal" id="modal-{{ $contact->id }}">
      <div class="modal__overlay" onclick="closeModal({{ $contact->id }})"></div>
      <div class="modal__content">
        <button class="modal__close" onclick="closeModal({{ $contact->id }})">×</button>
        <table class="modal-table">
          <tr>
            <th>お名前</th>
            <td>{{ $contact->last_name }}{{ $contact->first_name }}</td>
          </tr>
          <tr>
            <th>性別</th>
            <td>
              @if($contact->gender == 1) 男性
              @elseif($contact->gender == 2) 女性
              @else その他
              @endif
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>{{ $contact->email }}</td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td>{{ $contact->tel }}</td>
          </tr>
          <tr>
            <th>住所</th>
            <td>{{ $contact->address }}</td>
          </tr>
          <tr>
            <th>建物名</th>
            <td>{{ $contact->building }}</td>
          </tr>
          <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $contact->category->content }}</td>
          </tr>
          <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $contact->detail }}</td>
          </tr>
        </table>
        <form class="modal__delete-form" action="/admin/delete" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $contact->id }}" />
          <button class="modal__delete-button" type="submit">削除</button>
        </form>
      </div>
    </div>
    @endforeach

    <script>
      function openModal(id) {
        document.getElementById('modal-' + id).classList.add('modal--active');
      }
      function closeModal(id) {
        document.getElementById('modal-' + id).classList.remove('modal--active');
      }
    </script>
  </main>
</body>

</html>