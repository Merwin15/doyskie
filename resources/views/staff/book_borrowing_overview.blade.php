@php
                        // Dummy data for now
                        $borrowHistory = [
                            [
                                'user_id' => 1,
                                'user_name' => 'Jose Rizal',
                                'book_id' => 1,
                                'book_title' => 'Dummy rani',
                                'date_borrowed' => '2025-04-25',
                                'date_returned' => '2025-04-28',
                                'status' => 'Returned',
                            ],
                            [
                                'user_id' => 2,
                                'user_name' => 'Maria Clara',
                                'book_id' => 2,
                                'book_title' => 'Not rel',
                                'date_borrowed' => '2025-04-26',
                                'date_returned' => null,
                                'status' => 'Borrowed',
                            ],
                        ];
                    @endphp
<!-- PS. DUMMY INFO RANING NAA SA TAAS, ANG REL IS SA DATABASE NA E RETRIEVE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Borrowed Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="p-8">

        <!-- Back button -->
        <a href="{{ route('staff.dashboard') }}" class="inline-block mb-4">
        <img src="{{ asset('https://www.iconpacks.net/icons/2/free-back-arrow-icon-3095-thumb.png') }}" alt="Back to Dashboard" class="h-10">
        </a>

        <h1 class="text-3xl font-bold mb-8 text-center">Book Borrowed Overview</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead class="bg-[#754E1A] text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">User ID</th>
                        <th class="py-3 px-6 text-left">User Name</th>
                        <th class="py-3 px-6 text-left">Book ID</th>
                        <th class="py-3 px-6 text-left">Book Title</th>
                        <th class="py-3 px-6 text-left">Date Borrowed</th>
                        <th class="py-3 px-6 text-left">Date Returned</th>
                        <th class="py-3 px-6 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($borrowHistory as $history)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $history['user_id'] }}</td>
                            <td class="py-2 px-4">{{ $history['user_name'] }}</td>
                            <td class="py-2 px-4">{{ $history['book_id'] }}</td>
                            <td class="py-2 px-4">{{ $history['book_title'] }}</td>
                            <td class="py-2 px-4">{{ $history['date_borrowed'] }}</td>
                            <td class="py-2 px-4">
                                {{ $history['date_returned'] ?? 'Not Returned' }}
                            </td>
                            <td class="py-2 px-4">
                                <span class="px-2 py-1 rounded 
                                    {{ $history['status'] === 'Returned' ? 'bg-green-500' : 'bg-yellow-500' }} text-white">
                                    {{ $history['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
