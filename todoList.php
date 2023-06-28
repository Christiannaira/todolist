<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <main class="container m-5 p-5 border rounded shadow">
        <h1 class="fw-bold">📋 Todo List</h1>

        <form id="todoForm" class="my-3">

            <input type="text" id="todoInput" class="form-control" placeholder="Add a todo item">

            <button type="submit" class="btn btn-primary mt-2">Add</button>

        </form>

        <ul id="todoList" class="list-group">

        </ul>

    </main>

    <script>
        fetchTodoItems()
        const todoForm = document.querySelector("#todoForm");
        todoForm.addEventListener("submit", handleSubmit);

        function handleSubmit(event) {

            event.preventDefault();

            const todoInput = document.querySelector("#todoInput").value;

            if (todoInput !== '') {

                fetch('http://localhost/php/newtodo.php', {

                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        title: todoInput
                    })

                })
                    .then(response => response.json())
                    .then(data => {

                        if (data.success) {
                            document.querySelector("#todoInput").value = '';
                            fetchTodoItems();
                        }


                    })

            } else {

                alert("field should not be empty!");

            }



        }


        function fetchTodoItems() {

            const todoList = document.querySelector("#todoList");
            todoList.innerHTML = '';

            fetch('http://localhost/php/fetchtodo.php')
                .then(response => response.json())
                .then(data => {

                    data.forEach(item => {

                        if (item.status === 'pending') {

                            todoList.innerHTML += `<div class="alert alert-light mt-2">
                            
                            <button class="btn btn-primary" onclick="markComplete(${item.id})">${item.status}</button>
                            ${item.title}</div>`

                        } else {

                            todoList.innerHTML += `<div class="alert alert-success mt-2">${item.title}</div>`

                        }


                    })

                })

        }

        function markComplete(todoId) {

            fetch(`http://localhost/php/completetodos.php?id=${todoId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchTodoItems();
                    }
                })

        }

    </script>

</body>

</html>