<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacts</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100">
        <div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Contact Details</h1>
            <div class="mb-4">
                <label class="text-gray-600 font-semibold">Name:</label>
                <p class="text-lg text-gray-900">{{ $contact->name }}</p>
            </div>
            <div class="mb-4">
                <label class="text-gray-600 font-semibold">Email:</label>
                <p class="text-lg text-gray-900">{{ $contact->email }}</p>
            </div>
            <div class="mb-4">
                <label class="text-gray-600 font-semibold">Phone:</label>
                <p class="text-lg text-gray-900">{{ $contact->phone ?? 'N/A' }}</p>
            </div>
            <div class="mb-4">
                <label class="text-gray-600 font-semibold">Address:</label>
                <p class="text-lg text-gray-900">{{ $contact->address ?? 'N/A' }}</p>
            </div>
            <div class="flex justify-between">
                <a href="/contacts/{{ $contact->id }}/edit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                <a href="/contacts" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
            </div>
        </div>
    </body>
</html>
