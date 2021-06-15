<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="m-5 text-sm font-medium text-gray-500">
                        Ваш баланс: {{$balance->balance}}
                    </div>
                    <div class="m-5">
                        <table class="table-auto">
                            <thead>
                            <tr>
                                <td>Value</td>
                                <td>Balance</td>
                                <td>UserId</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($histories as $history)
                                <tr>
                                    <td> {{ $history->value }}</td>
                                    <td> {{ $history->balance }}</td>
                                    <td> {{ $history->user_id }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
