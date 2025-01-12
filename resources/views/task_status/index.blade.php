<x-app-layout>
<x-slot name="content">
    <h1 class="mb-5">Статусы</h1>
    <div>
        <a
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            href={{route('task_statuses.create')}}
        >
            Создать статус
        </a>
    </div>
    <div>
        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <td>ID</td>
                <td>Имя</td>
                <td>Дата создания</td>
                <td>Действия</td>
            </tr>
            </thead>
            <tbody>
            @foreach($statuses as $status)
                <tr class="border-b border-dashed text-left">
                    <td>{{$status->id}}</td>
                    <td>{{$status->name}}</td>
                    <td>{{$status->created_at}}</td>
                    <td>
                        <a class="text-decoration-none link-danger"
                           href="{{route('task_statuses.destroy', $status->id)}}"
                           data-confirm="Are you sure?"
                           rel="nofollow"
                           data-method="delete"
                        >
                            Удалить
                        </a>
                        <a class="text-blue-600 hover:text-blue-900"
                           href="{{route('task_statuses.edit', $status->id)}}"
                        >
                            Изменить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$statuses->links()}}
</x-slot>
</x-app-layout>
