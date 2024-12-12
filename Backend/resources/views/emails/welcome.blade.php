
<style>
    .email-container {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        max-width: 600px;
    }

    .email-header {
        text-align: center;
        padding: 20px 0;
        background-color: #0046FF;
        color: white;
        border-radius: 8px 8px 0 0;
    }

    .email-body {
        padding: 30px;
        background-color: white;
        border-radius: 0 0 8px 8px;
    }

    .email-body h2 {
        color: #333;
    }

    .email-body p {
        color: #666;
        line-height: 1.5;
    }

    .email-footer {
        text-align: center;
        color: #999;
        font-size: 12px;
        margin-top: 20px;
    }

    .button {
        background-color: #007BFF;
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        font-weight: bold;
    }

    .button:hover {
        background-color: #0056b3;
    }
</style>

<div class="email-container">
    <div class="email-header">
        <h1>Welcome to {{ config('app.name') }}!</h1>
    </div>

    <div class="email-body">
        <h2>Hello, {{ $user_name }}!</h2>
        <p>Thank you for registering with us. We're thrilled to have you on board!</p>
        <p>To get started, click the button below to visit your dashboard:</p>

        <a href="{{ config('app.frontend_url') . '/' }}" class="button">
            Go to Dashboard
        </a>

        <p>If you have any questions, feel free to contact us at any time.</p>
    </div>

    <!-- Email Footer -->
    <div class="email-footer">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</div>
