<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TODO LIST</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>



</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Ma ToDo Liste</h1>


        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <div>
                <label for="content">Description de la tâche</label>
                <input type="text" name="content" id="content" required>
            </div>

            <button type="submit">Ajouter</button>
        </form>


        <ul>
            @foreach ($todos as $todo)

                        <div class="todo-item @php
                            if ($todo->etat == true) {

                                $value = 'done';
                            } else {
                                $value = 'notdone';
                            }
                        @endphp
                            {{$value}} ">

                            <li class="flex-grow">
                                <span>{{ $todo->content }}</span>
                            </li>

                            <span class="ml-4">
                                {{ $todo->etat == 'true' ? 'Fait' : 'Non Fait' }}
                            </span>


                            <form action="{{ route('todo.updateEtat', $todo->id) }}" method="POST" class="ml-4">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="px-3 py-1 
                                                                        @if ($todo->etat == 'true')
                                                                            bg-red-500 text-white
                                                                        @else
                                                                            bg-green-500 text-white
                                                                        @endif
                                                                        rounded">
                                    @if ($todo->etat == 'true')
                                        Marquer comme non fait
                                    @else
                                        Marquer comme fait
                                    @endif
                                </button>
                            </form>


                            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" class="flex items-center ml-4">
                                @csrf
                                @method('DELETE')

                                <img src="{{ asset('image/poubelle.png') }}" alt="image poubelle" class="w-6 h-6 cursor-pointer">

                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded ml-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                    Supprimer
                                </button>
                            </form>
                        </div>
            @endforeach
        </ul>




    </div>
</body>


</html>