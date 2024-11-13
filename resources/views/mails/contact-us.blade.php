<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Request</title>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css');
    </style>
</head>
<body>
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-lg w-full bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4 text-center">Contact Us Request</h1>
        <div class="mb-4">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-semibold">Full Name:</span>
                <span class="text-gray-900">{{ $full_name }}</span>
            </div>
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-semibold">Email:</span>
                <span class="text-gray-900">{{ $email }}</span>
            </div>
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-semibold">Phone Number:</span>
                <span class="text-gray-900">{{ $phone_number }}</span>
            </div>
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-semibold">Company Name:</span>
                <span class="text-gray-900">{{ $company_name }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600 font-semibold">Message:</span>
                <span class="text-gray-900">{{ $message_content }}</span>
            </div>
        </div>

        <footer class="mt-8">
            <p class="mt-3 text-gray-500 dark:text-gray-400">© 2024 Tareeg Alhareer. All Rights Reserved.</p>
        </footer>
    </div>
</div>
</body>
</html>
