<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve payment details from the form
    $amount = isset($_POST['amount']) ? htmlspecialchars($_POST['amount']) : '';
    $cardNumber = isset($_POST['card_number']) ? htmlspecialchars($_POST['card_number']) : '';
    $expiryMonth = isset($_POST['expiry_month']) ? htmlspecialchars($_POST['expiry_month']) : '';
    $expiryYear = isset($_POST['expiry_year']) ? htmlspecialchars($_POST['expiry_year']) : '';
    $cvv = isset($_POST['cvv']) ? htmlspecialchars($_POST['cvv']) : '';
    $cardholderName = isset($_POST['cardholder_name']) ? htmlspecialchars($_POST['cardholder_name']) : '';

    if (floatval($amount) > 0) {
        // Simulate a successful payment
        // Redirect to your Payment Successful Page (payment_success.html)
        header('Location: paymentstatus.html');
        exit();
    } else {
        // Simulate a failed payment
        header('Location: payment_failed.html');
        exit();
    }
} else {
    // If accessed directly without POST data, redirect back to the payment form
    header('Location: payment.html');
    exit();
}

?>
