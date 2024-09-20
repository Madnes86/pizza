<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Заказы для курьера') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center mt-4">
        <div class="menu flex justify-center my-8">
            <div class="menu__frm1 flex justify-around w-full flex-wrap">
                <a href="{{ route('Courier_Orders', 1) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">В процессе</p>
                </a>
                <a href="{{ route('Courier_Orders', 2) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Ожидает принятия на кухне</p>
                </a>
                <a href="{{ route('Courier_Orders', 3) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">На кухне</p>
                </a>
                <a href="{{ route('Courier_Orders', 4) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Ожидает курьера</p>
                </a>
                <a href="{{ route('Courier_Orders', 5) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Передан курьеру</p>
                </a>
                <a href="{{ route('Courier_Orders', 6) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Курьер в пути</p>
                </a>
                <a href="{{ route('Courier_Orders', 7) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Завершено</p>
                </a>
                <a href="{{ route('Courier_Orders', 8) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Отклонено</p>
                </a>
                <a href="{{ route('Courier_Orders', 9) }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Отклонено клиентом</p>
                </a>
                <a href="{{ route('Courier_Orders') }}" class="text-decoration-none bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mx-2 mb-2">
                    <p class="textOff">Все</p>
                </a>
            </div>
        </div>
    </div>

    <section class="py-8">
        @foreach ($orders as $order)
            <div class="flex justify-center p-4">
                <div class="order-block bg-white border border-gray-200 rounded-lg p-4 shadow-md w-full max-w-4xl">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Заказ #{{ $order->id }}</h3>
                    <p class="text-gray-600 mb-2">Статус: {{ $order->status->name }}</p>

                    <ul class="list-disc list-inside text-gray-600 mb-4">
                        @foreach($order->positions as $position)
                            <li>
                                {{ $position->dish->name }} - ${{ $position->price }}
                                <ul class="list-disc list-inside pl-5">
                                    @foreach ($position->ingredients as $ingredient)
                                        <li>{{ $ingredient->name }}</li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>Количество: {{ $position->quantity }}</li>
                        @endforeach
                    </ul>

                    <p class="text-gray-800 font-semibold">Адрес: {{ $order->address }}</p>
                    <p class="text-gray-800 font-semibold">Ожидаемое время: {{ $order->expected_at }}</p>
                    <p class="text-gray-800 font-semibold">Комментарий: {{ $order->comment }}</p>

                    <p class="text-gray-800 font-semibold">Итоговая стоимость: ${{ $order->price }}</p>
                    <div class="flex justify-between mt-4">
                        @if($order->status_id == 4) <!-- Assuming status 4 is "Ожидает курьера" -->
                            <form action="{{ route('courier.pickup', ['id' => $order->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Принять</button>
                            </form>
                        @elseif($order->status_id == 5) <!-- Assuming status 5 is "Передан курьеру" -->
                            <form action="{{ route('courier.deliver', ['id' => $order->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Доставить</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</x-app-layout>
