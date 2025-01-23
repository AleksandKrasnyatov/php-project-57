<x-app-layout>
<x-slot name="content">
    <h1 class="mb-5">Задачи</h1>
    <div class="w-full flex items-center">
        <div>
            Форма с фильтрами
        </div>
        @auth
            <div class="ml-auto">
                <a
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"
                    href={{route('tasks.create')}}
                >
                    Создать задачу
                </a>
            </div>
        @endauth
    </div>
    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
        <tr>
            <td>ID</td>
            <td>Статус</td>
            <td>Имя</td>
            <td>Автор</td>
            <td>Исполнитель</td>
            <td>Дата создания</td>
            <td>Действия</td>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr class="border-b border-dashed text-left">
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status->name }}</td>
                <td>{{ $task->author->name }}</td>
                <td>{{ $task->assignee?->name }}</td>
                <td>{{ $task->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    @if($user ?? $task->isAuthor($user))
                        <a class="text-decoration-none link-danger"
                           href="{{route('tasks.destroy', $task->id)}}"
                           data-confirm="Are you sure?"
                           rel="nofollow"
                           data-method="delete"
                        >
                            Удалить
                        </a>
                    @endif
                    @auth
                        <a class="text-blue-600 hover:text-blue-900"
                           href="{{route('task_statuses.edit', $task->id)}}"
                        >
                            Изменить
                        </a>
                    @endauth
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$tasks->links()}}
</x-slot>
</x-app-layout>
