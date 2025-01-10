<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Todo List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: #f8f9fa;">

    <div class="container py-5 ">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-lg-8">
                <div class="card shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <!-- Header -->
                        <h2 class="text-center mb-4">To-Do App</h2>

                        <!-- Create Task Button -->
                        <div class="text-center mb-4">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
                        </div>

                        <!-- Task Table -->
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-white">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Task</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $task->id }}</th>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            @if ($task->is_complete)
                                                <span class="badge bg-success">Done</span>
                                            @else
                                                <span class="badge bg-danger">Not Done</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
