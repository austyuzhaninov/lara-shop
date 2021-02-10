@extends('layout')

@section('title')
    Контакты
@endsection

@section('content')
    <div class="container">
        <br>
        <h3 class="text">Мы на карте</h3><br>
        <div class="row justify-content-center">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6e8eeeadfd39ae358334e87a728031158360cbcbfe921ab9106cb51275e60ad8&amp;width=1120&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>

        <br>
        <h3 class="text">Контакты</h3><br>

        <div class="row">
            <div class="col-md-8">
                @if($errors->any())
                    <div class="alesrt alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="about/add">
                    @csrf
                    <input type="text" name="name" id="name" class="form-control" placeholder="Имя"><br>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Номер телефона"><br>
                    <input type="email" name="email" id="email" class="form-control"  placeholder="E-mail"><br>
                    <textarea name="message" id="message" class="form-control" placeholder="Введите текст сообщения" style="height:150px;"></textarea><br>
                    <input class="btn btn-primary" type="submit" value="Отправить"><br><br>
                </form>
            </div>
            <div class="col-md-4">
                <b>Техническое сопровождение:</b> <br>
                Телефон: +7(343)224-27-35<br>
                E-mail: <a href="mailto:support@mysite.com">support@shop.com</a><br>
                <br><br>
                <b>Офис в Екатеринбурге:</b><br>
                Магазинус, <br>
                Екатеринбург, пр. Ленина, д. 39<br>
                Центр, Кировский район, 620000<br>
                Phone: +7(343)224-27-35<br>
                <a href="mailto:usa@mysite.com">office@shop.com</a><br>

            </div>
        </div>
        <br>

    </div>
@endsection
