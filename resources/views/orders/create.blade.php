@extends('layouts.app')

@section('body')
<div class="container">
    <div class="col">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            <div class="row my-3 d-flex justify-content-center">
                <div class="d-grid col-6 mx-auto">
                    <div class="form-group mb-3">
                        <label for="filter_name" class="form-label">Артикул</label>
                        <input type="text" name="filter_name" class="form-control form-control-sm" placeholder="Пример: Петров Семен Сидорович">
                    </div>

                    <div class="form-group mb-3">
                        <label for="filter_manufacturer" class="form-label">Бренд</label>
                        <input type="text" name="filter_manufacturer" class="form-control form-control-sm" placeholder="Пример: Azalita">
                    </div>

                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label">ФИО</label>
                        <input type="text" name="fullname" class="form-control form-control-sm" placeholder="Пример: AZ105W">
                    </div>

                    <div class="form-group">
                        <label for="comments" class="form-label">Комментарии</label>
                        <textarea type="text" name="comments" class="form-control form-control-sm" rows="10" placeholder="Пример:
                        Я узнал, что у меня
                        Есть огpомная семья —
                        И тpопинка, и лесок,
                        В поле каждый колосок!
                        Речка, небо голубое —
                        Это все мое, pодное!
                        Это Родина моя!
                        Всех люблю на свете я!"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success btn-sm btn-block mt-5">Создать заказ</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
