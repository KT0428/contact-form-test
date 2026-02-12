<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FashionablyLate
      </a>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Contact</h2>
      </div>
      <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-name">
              <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
              <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
            </div>
            @error('last_name')
            <div class="form__error">{{ $message }}</div>
            @enderror
            @error('first_name')
            <div class="form__error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--radio">
              <label>
                <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} />
                <span>男性</span>
              </label>
              <label>
                <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} />
                <span>女性</span>
              </label>
              <label>
                <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} />
                <span>その他</span>
              </label>
            </div>
            @error('gender')
            <div class="form__error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
            </div>
            @error('email')
            <div class="form__error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--tel">
              <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}" />
              <span>-</span>
              <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
              <span>-</span>
              <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
            </div>
            @error('tel1')
            <div class="form__error">{{ $message }}</div>
            @enderror
            @error('tel2')
            <div class="form__error">{{ $message }}</div>
            @enderror
            @error('tel3')
            <div class="form__error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
            </div>
            @error('address')
            <div class="form__error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--select">
              <select name="category_id">
                <option value="" disabled selected>選択してください</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                  </option>
                @endforeach
              </select>
            </div>
            @error('category_id')
            <div class="form__error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
            </div>
            @error('detail')
            <div class="form__error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>