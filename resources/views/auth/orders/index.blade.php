@extends('auth.layout.master')
@section('title', 'Заказы')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <h1>Заказы</h1>
            <table class="table">
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Когда отправлен</th>
                    <th>Сумма</th>
                    <th>Действия</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->created_at->format('H:i d/n/y')}}</td>
                        <td>{{$order->getFullPrice()}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" type="button"
                                   @admin
                                        href="{{route('orders.show', $order)}}"
                                   @else
                                        href="{{route('person.orders.show', $order)}}"
                                   @endadmin >Открыть</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$orders->links()}}
    </div>
@endsection
