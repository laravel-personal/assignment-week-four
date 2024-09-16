<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-7xl mx-auto">
    <div class="flex mb-6 items-center gap-3">
        <h1 class="text-2xl font-bold">Contact List</h1>
        <a href="/contacts/create" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Add New Contact
        </a>
    </div>

    <!-- Search Form -->
    <form method="GET" action="/contacts" class="mb-6">
        <div class="flex">
            <input type="text" name="search" placeholder="Search by name or email"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                   value="{{ request('search') }}">
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Search
            </button>
        </div>
    </form>

    <!-- Sort by Name Link -->
    <div class="mb-4">
        <a href="/contacts?sort=name" class="text-blue-600 hover:underline">
            Sort by Name
        </a>
        <a href="/contacts?sort=name" class="text-blue-600 hover:underline">
            Sort by Name
        </a>
    </div>

    <!-- Contact Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
            <tr>
                <th class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                <th class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                <th class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 overflow-y-auto max-h-10">
            @foreach ($contacts as $contact)
                <tr>
                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->name }}</td>
                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->email }}</td>
                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->phone }}</td>
                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->address }}</td>
                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->created_at }}</td>
                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <a href="/contacts/{{ $contact->id }}" class="text-blue-600 hover:underline">View</a>
                        <a href="/contacts/{{ $contact->id }}/edit" class="ml-4 text-green-600 hover:underline">Edit</a>
                        <form action="/contacts/{{ $contact->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
    </div>
</div>

</body>
</html>
