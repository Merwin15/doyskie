@php
    $requests = [
        [
            'user_id' => 1,
            'user_name' => 'Jose Rizal',
            'book_id' => 1,
            'book_name' => 'Dummy rani',
            'date_booked' => '2025-04-28',
            'status' => 'Pending',
        ],
        [
            'user_id' => 2,
            'user_name' => 'Maria Clara',
            'book_id' => 2,
            'book_name' => 'Not rel',
            'date_booked' => '2025-04-27',
            'status' => 'Pending',
        ],
    ];
@endphp
<!-- PS. DUMMY INFO RANING NAA SA TAAS, ANG REL IS SA DATABASE NA E RETRIEVE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pending Book Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">

    <!-- Back button -->
    <a href="{{ route('staff.dashboard') }}" class="inline-block mb-4">
    <img src="{{ asset('https://www.iconpacks.net/icons/2/free-back-arrow-icon-3095-thumb.png') }}" alt="Back to Dashboard" class="h-10">
    </a>

    <h1 class="text-3xl font-bold mb-8 text-center">Pending Book Requests</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-[#754E1A] text-white">
                <tr>
                    <th class="py-3 px-4">User ID</th>
                    <th class="py-3 px-4">User Name</th>
                    <th class="py-3 px-4">Book ID</th>
                    <th class="py-3 px-4">Book Name</th>
                    <th class="py-3 px-4">Date Booked</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr class="text-center border-b">
                        <td class="py-3 px-4">{{ $request['user_id'] }}</td>
                        <td class="py-3 px-4">{{ $request['user_name'] }}</td>
                        <td class="py-3 px-4">{{ $request['book_id'] }}</td>
                        <td class="py-3 px-4">{{ $request['book_name'] }}</td>
                        <td class="py-3 px-4">{{ $request['date_booked'] }}</td>
                        <td class="py-3 px-4">{{ $request['status'] }}</td>
                        <td class="py-3 px-4 space-x-2">
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Book</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Return</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
